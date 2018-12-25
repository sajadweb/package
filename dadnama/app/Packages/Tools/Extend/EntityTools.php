<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 12/5/2016
 * Time: 9:00 AM
 */

namespace App\Packages\Tools\Extend;


interface EntityTools
{
    public function scopeOrderByAsc($query);
    
    public function scopeOrderByDecs($query);
    
    public function scopeGetFrom($query);
    
    public function scopeTrash($query,$value=0);
 
    public function scopeAct($query);

    public function scopeFindId($query, $id);

  
}