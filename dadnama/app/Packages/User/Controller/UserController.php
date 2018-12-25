<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 07/09/2018
 * Time: 09:21
 */

namespace App\Packages\User\Controller;


use App\Packages\Tools\Extend\WebPackages;
use App\Packages\User\Model\UserVerify;
use Illuminate\Http\Request;
use Validator;

class UserController extends WebPackages
{
    public function verify($token)
    {
        $verify = UserVerify::isEmail()->has('user')->token($token)->first();
        $user = $verify->user;
        $user->status = 1;
        $user->save();
        return redirect('http://dadnama.ir/login?verify=true');
    }
}