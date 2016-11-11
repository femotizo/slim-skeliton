<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/09
 * Time: 4:29 PM
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;


class ValidPassword extends AbstractRule
{
    public function validate($input)
    {
        if (($pass = preg_match('"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"', $input) != null)){
            return true;
        }
        return false;
    }
}