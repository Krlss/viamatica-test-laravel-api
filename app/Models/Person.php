<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'names',
        'lastnames',
        'identification',
        'date_birth',
    ];

    public function create_user()
    {

        $firstLetter = substr($this->names, 0, 1);
        $lastname = explode(' ', $this->lastnames);
        $last4Identification = substr($this->identification, -4);

        $mailGenerate =  $firstLetter . $lastname[0];
        $username = $firstLetter . $lastname[0] . $last4Identification;

        $existMail = User::where('mail', $mailGenerate)->count();

        if ($existMail > 0) {
            $mailGenerate = $mailGenerate . count($existMail) + 1;
        }

        $user = new User();
        $user->username = strtolower($username);
        $user->password = bcrypt($this->identification);
        $user->mail = strtolower($mailGenerate) . '@gmail.com';
        $user->person_id = $this->id;

        $user->save();
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
