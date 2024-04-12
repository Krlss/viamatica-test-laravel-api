<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UsersSession;
use Illuminate\Http\Request;

class UserRepository
{
    public function all()
    {
        return User::with('person', 'roles')->paginate(10);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function update(array $data, $id)
    {
        return User::find($id)->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function login(Request $data)
    {

        $login = $data->input('mail');

        $user = User::where(function ($query) use ($login) {
            $query->where('mail', strtolower($login))
                ->orWhere('username', $login);
        })->first();

        if (!$user) {
            return "User not found. Please check your email or username.";
        }

        $activeSession = UsersSession::where('user_id', $user->id)->whereNull('logout')->first();
        if ($activeSession) {
            return "You already have an active session. Please close it before starting a new one.";
        }

        if ($user->status === 'blocked') {
            return "The user is blocked. Please contact the administrator.";
        }

        if (
            !password_verify($data['password'], $user->password)
        ) {
            $user->attempts++;
            if ($user->attempts >= 3) {
                $user->status = 'blocked'; 
                $user->save();
                return "The user has been blocked. Please contact the administrator";
            } else {
                $user->save();
                return "The password is incorrect. You have " . (3 - $user->attempts) . " attempts left before being blocked.";
            }
        }

        $user->attempts = 0;
        $user->save();

        // Registrar el inicio de sesión
        UsersSession::create([
            'user_id' => $user->id,
            'login' => now(),
        ]);

        return $user;
    }

    public function logout(Request $data)
    {
        $user = User::find($data->input('user_id'));

        if (!$user) {
            return "User not found.";
        }

        $activeSession = UsersSession::where('user_id', $user->id)->whereNull('logout')->first();
        if (!$activeSession) {
            return "There is no active session for this user.";
        }

        $activeSession->logout = now();
        $activeSession->save();

        return "Session closed successfully.";
    }
}
