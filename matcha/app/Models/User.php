<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'email',
        'name',
        'surname',
        'password',
        'username',
        'age',
        'interests',
        'phone_number'
    ];

    public function setPassword($password)
    {
        $this::update([
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function updateProfile($age, $interests, $phone_number)
    {
        $this::update([
            'age' => $age,
            'interests' => $interests,
            'phone_number' => $phone_number,
        ]);
    }
}
