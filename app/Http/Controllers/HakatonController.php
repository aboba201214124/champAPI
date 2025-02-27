<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hakaton\HakatonRequest;
use App\Http\Resources\HakatonResource;
use App\Models\Hakaton;
use Illuminate\Http\JsonResponse;


class HakatonController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json(HakatonResource::collection(Hakaton::all()));
    }

    public function user(int $userid): JsonResponse
    {
        return response()->json(HakatonResource::collection(Hakaton::all()->where('Owner',$userid)));
    }
    public function show(int $id): JsonResponse
    {
        $hakaton = Hakaton::find($id);
        if(!$hakaton){
            return response()->json([], 404);
        }
        return $this->returnResponseJson($hakaton, 200);
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
        /** @var Hakaton $Hahaton */

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
     * @return JsonResponse
     */
    public function delete(HakatonRequest $request, int $id): JsonResponse
    {
        /** @var Hakaton $Hakaton */

        $hahaton = Hakaton::find($id);

        if($hahaton->Owner === $request->user()->id) {
            $hahaton->delete();
            return response()->json([], 204);
        }
        return response()->json([],403);
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
