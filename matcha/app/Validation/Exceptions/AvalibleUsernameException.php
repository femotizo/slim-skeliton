<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/10
 * Time: 11:18 AM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class AvalibleUsernameException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Username already exists',
        ],
    ];

}