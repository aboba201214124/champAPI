<?php

namespace App\Http\Requests\command;

use App\Http\Requests\ApiRequest;

class CommandRequest extends ApiRequest
{
    public function rules():array
    {
        return [
            'name' => ['required'],
            'hackathon_id'=>['required']
        ];
    }
}
