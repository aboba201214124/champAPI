<?php

namespace App\Http\Requests\Teammate;

use App\Http\Requests\ApiRequest;

class teammateRequest extends ApiRequest
{
    public function rules():array
    {
        return [
              'user_id' => ['required'],
            'command_id' => ['required']
        ];
    }
}
