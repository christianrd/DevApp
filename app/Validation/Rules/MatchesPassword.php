<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 8/1/2016
 * Time: 8:25 PM
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule
{
    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function validate($input)
    {
        return password_verify($input, $this->password);
    }
}