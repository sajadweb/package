<?php
namespace App\Packages\Sms\Kavenegar\Exceptions;

class HttpException extends BaseRuntimeException
{
	public function getName()
    {
        return 'HttpException';
    }	
}

?>