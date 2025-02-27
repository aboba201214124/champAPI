<?php

namespace App\Http\Controllers;

use App\Http\Requests\command\CommandRequest;
use App\Http\Resources\CommandResource;
use App\Http\Resources\HakatonResource;
use App\Models\Command;
use App\Models\Hakaton;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class CommandController extends Controller
{
    /**
     *
     *
     * @param CommandRequest $request
     * @return JsonResponse
     */
    public function create(CommandRequest $request): JsonResponse
    {
        $command = Command::query()->create([
            'name' => $request->get('name'),
            'code' => Str::random(6),
            'Owner'=> $request->user()->id,
            'hackathon_id'=> $request->get('hackathon_id'),
        ]);

        return $this->returnResponseJson($command);
    }
    private function returnResponseJson(Command $command, int $status = 200): JsonResponse
    {
        return response()->json([
            'command' => new CommandResource($command)
        ], $status);

    }
}
