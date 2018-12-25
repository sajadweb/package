<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 12/2/2016
 * Time: 12:51 PM
 */

namespace App\Packages\Tools\Extend;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class AuthEntity extends Model implements
    AuthenticatableContract,
    AuthorizableContract,EntityTools,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    public $times = '';
    public $uptimes = '';

    public $timestamps = false;

    public static function graphPaginate($query, $count, $attr = ['*'], $page)
    {
        $paginate = $query->paginate($count, $attr, 'page', $page);
        $return = collect($paginate);
        $p = $return['current_page'] - 1;
        $n = $return['current_page'] + 1;
        $c = $return['current_page'];
        $t = $return['total'];
        return [
            'items' => $return['data'],
            'total' => $t,
            'first' => 1,
            'last' => $return['last_page'],
            'current' => $c,
            'per' => $p > 0 ? $p : 0,
            'next' => $n <= $t ? $n : 0,
        ];
    }
    public function scopeOrderByAsc($query){
        return $query->orderBy($this->primaryKey,'ASC');
    }

    public function scopeOrderByDecs($query){
        return $query->orderBy($this->primaryKey,'DESC');
    }

    public function scopeGetFrom($query){
        return Entity::getTable();
    }

    public function scopeTrash($query,$value=0)
    {
        return $query->where('trash', $value);
    }

    public function scopeAct($query)
    {
        return $query->where('act', 1);
    }

    public function scopeFindId($query, $id)
    {
        return $query->where($this->primaryKey, $id);
    }

}