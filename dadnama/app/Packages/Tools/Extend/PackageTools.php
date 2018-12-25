<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 12/6/2016
 * Time: 12:00 PM
 */

namespace App\Packages\Tools\Extend;


interface  PackageTools
{


    /**
     * @param $password
     * @param $hash
     * @return boolean
     */
    public function hashCheck($password, $hash);

    /*
   * @return json
   * @param array
   */
    public function fails($en);

    /*----------------------start  upload----------------*/
    public function upload($photo, $dir);
    /*----------------------end  upload----------------*/

   
    /*----------------------start  Validator----------------*/
    
    /**
     * @param $class
     * @param string $after
     * @return string
     */
    public function exists($class, $after = '');
    
    /**
     * @param $class
     * @param string $after
     * @return string
     */
    public function unique($class, $after = '');
    /*----------------------end  Validator----------------*/
    
    
    /*----------------------start Json Response----------------*/
    public function showError($validator);
    
    public function json($array);
  
    /**
     *@for webservic Error with Validator errors
     * @param $status
     * @param $errors
     * @return json
     */
    public function jsonError($status, $errors);
    
    /**
     *@for webservic Error with Validator errors
     * @param $status
     * @param $validator
     * @return json
     */
    public function jsonErrorValidator($status,$validator);
    
    /**
     *@for webservic Error Exception
     * @param $status
     * @param $errors
     * @return json
     */
    public function jsonErrorException($e);

    /**
     * @for webservic success
     * @param $array
     * @return json
     */
    public function jsonSuccess($array);
    /*----------------------end Json Response----------------*/
}