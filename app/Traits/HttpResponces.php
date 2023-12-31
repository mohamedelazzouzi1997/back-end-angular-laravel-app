<?php

namespace App\Traits;

trait HttpResponces{
    protected function success($data,$message = null,$code ='200'){

        return response()->json([
            'status'    => 'request was succesful',
            'message'   => $message,
            'data'      => $data
        ],$code);
    }
    protected function error($data,$message = null,$code){

        return response()->json([
            'status'    => 'error',
            'message'   => $message,
            'data'      => $data
        ],$code);
    }

}