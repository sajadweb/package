<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 12/6/2016
 * Time: 12:00 PM
 */

namespace App\Packages\Tools\Extend;


interface  RepositoryTools
{
    public function find($id);

    public function findBy($att, $column);
    public function insert(array $column);



}