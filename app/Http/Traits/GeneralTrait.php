<?php

namespace App\Http\Traits;

use App\Models\ContactDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

trait GeneralTrait
{
    public function apiResponse($data = null, bool $status = true, $error = null, $statusCode = 200)
    {
        $array = [
            'data' => $data,
            'status' => $status ,
            'error' => $error,
            'statusCode' => $statusCode
        ];
        return response($array, $statusCode);
    }
    public function requiredField($massage){
        return $this->getresponse(null,false,$massage,400);
    }
    public function notFoundResponse($massage){
        return $this->getresponse(null,false,$massage,404);
    }

 
}


