<?php
namespace mac\Tests;

use mac\Fillable;

class Login
{
    use Fillable;

    public $username;
    protected $password;
    private $remember;

    public function __toString()
    {
        return implode(' ', array_filter([$this->username, $this->password, $this->remember ? 'remember' : null]));
    }
}
