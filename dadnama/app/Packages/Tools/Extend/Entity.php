<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 12/2/2016
 * Time: 12:51 PM
 */

namespace App\Packages\Tools\Extend;


use Illuminate\Database\Eloquent\Model;


abstract class Entity extends Model implements EntityTools
{

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


    public function scopeRemove($query, $id)
    {
        return $query->where('id', $id)->delete();
    }

    public function scopeUser($query, $user)
    {
        return $query->where("user_id", $user->id);
    }

    public function scopeOrderByAsc($query)
    {
        return $query->orderBy($this->primaryKey, 'ASC');
    }

    public function scopeOrderByDecs($query)
    {
        return $query->orderBy($this->primaryKey, 'DESC');
    }

    public function scopeGetFrom($query)
    {
        return Entity::getTable();
    }

    public function scopeTrash($query, $value = 0)
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