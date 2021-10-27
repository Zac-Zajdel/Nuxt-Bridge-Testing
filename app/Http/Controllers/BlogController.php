<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BlogController extends Controller
{
    /**
     * Returns a list of blogs that belongs to either the user or the community.
     *
     * @return Response|JsonResponse
     */
    public function index(User $user): Response | JsonResponse
    {
        return $this->success('Hello world');
    }

    /**
     * Creates a new blog
     *
     * @param Request $request
     * @return Response|JsonResponse
     */
    public function store(Request $request): Response | JsonResponse
    {
        return $this->success('Hello world');
    }

    /**
     * Returns a specific blog
     *
     * @param User $user
     * @param Blog $blog
     * @return Response|JsonResponse
     */
    public function show(User $user, Blog $blog): Response | JsonResponse
    {
        return $this->render($blog);
    }

    /**
     * Update a blog
     *
     * @param Request $request
     * @param User $user
     * @param Blog $blog
     * @return Response|JsonResponse
     */
    public function update(Request $request, User $user, Blog $blog): Response | JsonResponse
    {
        return $this->success('Responded');
    }

    /**
     * Deletes a blog
     *
     * @param User $user
     * @param Blog $blog
     * @return Response|JsonResponse
     */
    public function destroy(User $user, Blog $blog): Response | JsonResponse
    {
        return $this->success('Destroy');
    }
}
