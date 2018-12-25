<?php
namespace App\Packages\Sms\Kavenegar\Exceptions;

class ApiException extends BaseRuntimeException
{
	public function getName()
    {
        return 'ApiException';
    }
}

?>
