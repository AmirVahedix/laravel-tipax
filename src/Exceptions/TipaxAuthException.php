<?php

namespace AmirVahedix\Tipax\Exceptions;

use Exception;

class TipaxAuthException extends Exception
{
    protected $code = 400;

    protected $message = 'Invalid Username or Password';
}
