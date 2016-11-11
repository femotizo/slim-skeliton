<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/09
 * Time: 4:01 PM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class ValidPasswordException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Password must be Minimum 8 characters at least 1 Character and 1 Number and No special characters',
        ],
    ];

}