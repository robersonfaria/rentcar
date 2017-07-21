<?php
namespace App\Exceptions;


use Throwable;

class NotFountAdvertisement extends \Exception
{

    protected $message = 'Not found advertisement';

    protected $code = 400;
}