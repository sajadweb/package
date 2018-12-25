<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 01/09/2017
 * Time: 01:10 PM
 */

namespace App\Packages\Tools\Extend;


class Repository implements RepositoryTools
{

    function __construct()
    {
        $class=$this->model;
        $this->repository=$class::query();
    }

    protected $repository;
    protected $model;

    public function makeModel(){
        return new $this->model;
    }
    public function find($id)
    {
        // TODO: Implement find() method.
        $en = $this->repository->find($id);
        return $en;
    }

    public function findBy($att, $column)
    {
        // TODO: Implement findBy() method.
        $en = $this->repository->where($att, $column)->get();
        return $en;
    }

    public function insert(array $column)
    {
        // TODO: Implement insert() method.
        $en =$this->makeModel()->create($column);
        return $en;
    }

}