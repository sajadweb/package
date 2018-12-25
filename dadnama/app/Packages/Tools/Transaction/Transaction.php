<?php
/**
 * Created by PhpStorm.
 * User: sajad
 * Date: 5/25/2016
 * Time: 11:05 AM
 */

namespace App\Packages\Tools\Transaction;


use Illuminate\Support\Facades\DB;

class Transaction
{

    /**
     * @deprecated  start transaction
     */
    public static function beginTransaction()
    {
        return DB::beginTransaction();
    }

    /**
     * @deprecated abort all trasaction
     */
    public static function rollback()
    {
        return DB::rollback();
    }

    /**
     * @deprecated commit all transaction
     */
    public static function commit()
    {
        return DB::commit();
    }

}