<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/09
 * Time: 4:01 PM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class AvalibleEmailException extends ValidationException
{
    public static $defaultTemplates = [
      self::MODE_DEFAULT => [
        self::STANDARD => 'email already exists',
      ],
    ];

}