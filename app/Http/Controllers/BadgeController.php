<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response|JsonResponse
     * @throws AuthorizationException
     */
    public function index(Request $request): Response | JsonResponse
    {
        $this
            ->option('search', 'required|string')
            ->verify();

        return $this->render(
            $this->paginate(
                Badge::where('name', 'like', $request->search),
                3,
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response|JsonResponse
     * @throws AuthorizationException
     */
    public function store(Request $request, User $user): Response | JsonResponse
    {
        $this
            ->option('name', 'required|string')
            ->option('model', 'required|string|in:blogs')
            ->option('model_id', [
                'required',
                'numeric',
                Rule::exists($request->model, 'id')->where(fn ($query) =>
                    $query->where('user_id', $user->id)),
            ])
            ->verify();

        // Create new badge
        $badge = new Badge();
        $badge->name = $request->name;
        $badge->save();

        // Associate badge to specific model relationship
        match ($request->model) {
            'blogs' => Blog::find($request->model_id)->badges()->attach($badge)
        };

        return $this->success(
            'badge.associated',
            ['name' => $badge->name, 'model' => Str::singular($request->model)]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User $user
     * @param Badge $badge
     * @return Response|JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(Request $request, User $user, Badge $badge): Response | JsonResponse
    {
        $this
        ->option('model', 'required|string|in:blogs')
        ->option('model_id', [
            'required',
            'numeric',
            Rule::exists($request->model, 'id')->where(fn ($query) =>
                $query->where('user_id', $user->id)),
        ])
        ->verify();

        // Associate badge to specific model relationship
        match ($request->model) {
            'blogs' => Blog::find($request->model_id)->badges()->detach($badge)
        };

        return $this->success(
            'badge.removed',
            ['name' => $badge->name, 'model' => Str::singular($request->model)]
        );
    }
}
