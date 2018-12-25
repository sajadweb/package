<?php

namespace App\Packages\Tools\Extend;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;


abstract class WebPackages extends BaseController implements PackageTools
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param $password
     * @param $hash
     * @return Illuminate\Support\Facades\Hash;
     */
    public function hashCheck($password, $hash)
    {
        return Hash::check($password, $hash);
    }


    /**
     * @param $en
     * @return bool
     */
    public function fails($en)
    {
        return ($en == null) ? true : false;
    }


    /**
     * @param $validator
     * @return array
     */
    public function showError($validator)
    {
        return $validator->errors()->all();
    }


    /**
     * @param $photo
     * @param $dir
     * @param string $remove
     * @return string
     */
    public function upload($photo, $dir,$remove = '')
    {
        $path = $remove;
        if (Input::hasFile($photo)) {
            //az in mitoni typesh ro bedast biari
            $ext = Input::file($photo)->getClientOriginalExtension();
            //in name
            $filename = time() . rand(100, 999) . '.' . $ext;
            if (Input::file($photo)->move($dir, $filename)) {

                $path = $dir . '/' . $filename;
                if (!empty($remove)) {
                    \File::delete($remove);
                }
            }
        }
        return $path;
    }

    /**
     * @param $class
     * @param string $after
     * @return string
     */
    public function exists($class, $after = '')
    {
        $after = ($after != '') ? ',' . $after : '';
        $table = $class::getFrom();
        return 'exists:' . $table . $after;
    }

    /**
     * @param $class
     * @param string $after
     * @return string
     */
    public function unique($class, $after = '')
    {
        $after = ($after != '') ? ',' . $after : '';
        $table = $class::getFrom();
        return 'unique:' . $table . $after;
    }


    /**
     * @param $array
     * @return \Illuminate\Http\JsonResponse
     */
    public function json($array)
    {
        return response()->json($array);
    }

    /**
     * @param $status
     * @param $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonError($status, $errors)
    {
        return $this->json(['error' => true, 'status' => $status, 'errors' => $errors]);

    }


    /**
     * @param $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonErrorException($e)
    {
        return $this->json(['error' => true, 'status' => 1001, 'errors' => [$e->getMessage()]]);

    }


    /**
     * @param $status
     * @param $validator
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonErrorValidator($status, $validator)
    {
        return $this->json([
            'error' => true,
            'status' => $status,
            'errors' => $this->showError($validator)]);

    }


    /**
     * @param $array
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonSuccess($array)
    {
        $array['error'] = false;
        return $this->json($array);

    }


}
