<?php

namespace App\Packages\Tools\Sms;



use Illuminate\Database\Eloquent\Model;

class SMSIR extends Model
{
    protected $fillable = ['username','password','tonumber','smstext','centernumber'];
    public function __construct(){
        $this->username = '09173173781';
        $this->password = '10203040';
        $this->centernumber ='30004505001618';
    }
    public function sendSMS(){
        $userName=$this->username;
        $password=$this->password;
        $centerNumber=$this->centernumber;
        $to=$this->tonumber;
        $text=$this->smstext;
        date_default_timezone_set('Asia/Tehran');
        $client= new \SoapClient('http://n.sms.ir/ws/SendReceive.asmx?wsdl');

        if(is_object($client)){
            $parameters['userName'] = $userName;
            $parameters['password'] = $password;
            $parameters['mobileNos'] = array(doubleval($to));
            $parameters['messages'] = array($text);
            $parameters['lineNumber'] = $centerNumber;
            $parameters['sendDateTime'] = date("Y-m-d")."T".date("H:i:s");
        return    $result = $client->SendMessageWithLineNumber($parameters);
        }
        return false;
    }
    public function registerText($username,$password){
        $text = "کاربر گرامی ثبت نام شما با موفقیت درapp  انجام شد.
        نام کاربری :$username
رمز عبور :$password";
        $this->smstext = $text;

    }
    public function sendCode($code){
        $text ="کاربر گرامی کد تایید شما عبارت است از:"." ".$code;
        $this->smstext = $text;

    }
    public  function testSms(){
        $this->tonumber = "09332369461";
        $this->smstext = "test app ".rand(100,9999);
        return $this->sendSMS();
    }
}
