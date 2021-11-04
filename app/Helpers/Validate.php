<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class Validate{

    public static function registration($request,$class){
        return Validator::make($request->all(), $class::registrationRules());

    }
    public static function updateProfile($request,$class){
        return Validator::make($request->all(), $class::updateProfile());

    }


}
