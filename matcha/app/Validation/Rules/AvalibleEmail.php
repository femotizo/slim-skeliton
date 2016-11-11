<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/09
 * Time: 3:50 PM
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;


class AvalibleEmail extends AbstractRule
{
    public function validate($input)
    {
        return User::where('email', $input)->count() === 0;
    }
}