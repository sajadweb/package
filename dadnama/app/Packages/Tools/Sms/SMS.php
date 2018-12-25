<?php

namespace App\Packages\Tools\Sms;


use App\Packages\Tools\Sms\Kavenegar\Exceptions\ApiException;
use App\Packages\Tools\Sms\Kavenegar\Exceptions\HttpException;
use App\Packages\Tools\Sms\Kavenegar\KavenegarApi;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    //
    protected $fillable = ['username', 'password', 'tonumber', 'smstext', 'centernumber'];

    private $apiKey;

    public function __construct()
    {
        $this->apiKey = "576B6E584D74376967494956685748612B34743350513D3D";
//        $this->apiKey = "614E322F79423530525043574D5975585943547346773D3D";
        $this->api = new KavenegarApi($this->apiKey);
//        $this->Account_Info();

    }

    public function sendSMS()
    {
        try {

            $sender = "10004346";
            $message = $this->smstext;
            $receptor = $this->tonumber;
            $date = null;
            $type = 1;
            $localid = [];
            $result = $this->api->VerifyLookup($receptor, $message, "register");
            return [$result];
        } catch (\Exception $e) {
            return [$e->getMessage()];
        }

    }

    public function registerText($username, $password)
    {
        $text = "کاربر گرامی ثبت نام شما با موفقیت درapp  انجام شد.
        نام کاربری :$username
رمز عبور :$password";
        $this->smstext = $text;

    }

    public function sendCode($code)
    {
//        $text = "کاربر گرامی کد تایید شما عبارت است از:" . " " . $code;
        $this->smstext = $code;;

    }

    public function testSms()
    {
        $this->tonumber = "09332369461";
        $this->smstext = rand(100, 9999);
        return $this->sendSMS();
    }

    public function Account_Info()
    {
        try {
            $result = $this->api->AccountInfo();
            if ($result) {
//                echo "remaincredit == " . $result->remaincredit . "\r\n";
//                echo "expiredate == " . $result->expiredate . "\r\n";
//                echo "type == " . $result->type . "\r\n";
            }
        } catch (ApiException $e) {
            return $e->errorMessage();
        } catch (HttpException $e) {
            return $e->errorMessage();
        }
    }
    public function getCreditSample()
    {
        try {
            $result = $this->api->AccountInfo();
            if ($result) {
                return $result->remaincredit;
//                echo "remaincredit == " . $result->remaincredit . "\r\n";
//                echo "expiredate == " . $result->expiredate . "\r\n";
//                echo "type == " . $result->type . "\r\n";
            }
        } catch (ApiException $e) {
            return $e->errorMessage();
        } catch (HttpException $e) {
            return $e->errorMessage();
        }
    }
}
