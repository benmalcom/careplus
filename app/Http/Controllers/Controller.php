<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function setFlashMessage($msg, $type)
    {
        $class1 = 'alert-info';
        $class2 = 'clip-alert';


        if ($type == 1) {
            $class1 = 'alert-success';
            $class2 = 'fa fa-check-circle';
        } elseif ($type == 2) {
            $class1 = 'alert-danger';
            $class2 = 'fa fa-times';
        }
        $output = '<small><div class="text-center simplebox alert ' . $class1 . '" id="flash_message">
                        <i class="' . $class2 . '"></i> <strong>' . $msg . '</strong>' .
            '</div><div class="clearfix"></div></small>';
        \Session::flash('flash_message', $output);
    }

    public function flashData($msg, $value)
    {
        \Session::put($msg, $value);
    }
}
