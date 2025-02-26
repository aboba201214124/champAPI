<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hakaton\HakatonRequest;
use App\Http\Resources\HakatonResource;
use App\Models\Hakaton;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class HakatonController
{
    /**
     *
     *
     *
     * @return JsonResponse
     */
    public function allevents(): JsonResponse
    {
        /** @var Hakaton $Hakaton */
        $Hakaton= Hakaton::all();

        return $this->returnResponseJson($Hakaton, 200);
    }
    /**
     *
     *
     * @param HakatonRequest $request
     * @return JsonResponse
     */
    public function create(HakatonRequest $request): JsonResponse
    {
        /** @var Hakaton $Hakaton */
        $Hakaton = Hakaton::query()->create([
            'name' => $request->get('name'),
            'registration_date_begin' => $request->get('registration_date_begin'),
            'registration_date_end' => $request->get('registration_date_end'),
            'start_date_begin' => $request->get('start_date_begin'),
            'start_date_end' => ($request->get('start_date_end')),
            'max_members_count' => ($request->get('max_members_count')),
            'description' => ($request->get('description')),
            'task' => ($request->get('task')),
            'Owner'=>($request->user()->id)
        ]);

        return $this->returnResponseJson($Hakaton);
    }
    /**
     *
     *
     * @param HakatonRequest $request
     * @return JsonResponse
     */
    public function update(HakatonRequest $request, int $id): JsonResponse
    {
        /** @var Hakaton $Hakaton */

        $hahaton = Hakaton::find($id);
        if(!$hahaton){
            return response()->json([], 404);
        }

        if($hahaton->Owner === $request->user()->id) {
            $hahaton->update([
                'name' => $request->get('name'),
                'registration_date_begin' => $request->get('registration_date_begin'),
                'registration_date_end' => $request->get('registration_date_end'),
                'start_date_begin' => $request->get('start_date_begin'),
                'start_date_end' => ($request->get('start_date_end')),
                'max_members_count' => ($request->get('max_members_count')),
                'description' => ($request->get('description')),
                'task' => ($request->get('task')),
            ]);
            return $this->returnResponseJson($hahaton, 200);
        }
        return response()->json([], 403);
    }
    /**
     *
     *
     * @param HakatonRequest $request
     * @return Response
     */
    public function delete(HakatonRequest $request, int $id): Response
    {
        /** @var Hakaton $Hakaton */

        $hahaton = Hakaton::find($id);

        if($hahaton->Owner === $request->user()->id) {
            $hahaton->delete([]);
            return response()->noContent();
        }
    }
    /**
     *
     *
     * @param Hakaton $Hakaton
     * @param int $status
     * @return JsonResponse
     */
    private function returnResponseJson(Hakaton $Hakaton, int $status = 200): JsonResponse
    {
        return response()->json([
            'hakaton' => new HakatonResource($Hakaton)
        ], $status);

    }
}
