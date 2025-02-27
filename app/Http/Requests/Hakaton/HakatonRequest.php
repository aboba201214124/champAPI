<?php

namespace App\Http\Requests\Hakaton;

use App\Http\Requests\ApiRequest;


class HakatonRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'registration_date_begin' => ['required', 'date:Y-m-d'],
            'registration_date_end' => ['required', 'date:Y-m-d'],
            'start_date_begin' => ['required', 'date:Y-m-d'],
            'start_date_end' => ['required', 'date:Y-m-d'],
            'max_members_count' => ['required'],
            'description' => ['required'],
            'task' => ['required'],
        ];
    }
}
