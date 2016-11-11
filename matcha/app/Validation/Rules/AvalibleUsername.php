<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/10
 * Time: 11:17 AM
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class AvalibleUsername extends AbstractRule
{
    public function validate($input)
    {
        return User::where('username', $input)->count() === 0;
    }
}