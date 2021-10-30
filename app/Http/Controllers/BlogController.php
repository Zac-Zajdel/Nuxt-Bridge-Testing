<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    /**
     * Returns a list of blogs that belongs to either the user or the community.
     *
     * @return Response|JsonResponse
     * @throws AuthorizationException
     */
    public function index(User $user): Response | JsonResponse
    {
        return $this->render(
            $this->paginate(
                Blog::with(['user', 'badges'])->orderByDesc('updated_at'),
                10,
            )
        );
    }

    /**
     * Creates a new blog
     *
     * @param User $user
     * @return Response|JsonResponse
     * @throws AuthorizationException
     */
    public function store(User $user): Response | JsonResponse
    {
        // Create new Blog
        $blog = new Blog();
        $blog->title = 'New Blog';
        $blog->user_id = $user->id;
        $blog->body = '';
        $blog->draft = true;
        $blog->save();

        return $this->success('blog.created');
    }

    /**
     * Returns a specific blog
     *
     * @param User $user
     * @param Blog $blog
     * @return Response|JsonResponse
     * @throws AuthorizationException
     */
    public function show(User $user, Blog $blog): Response | JsonResponse
    {
        $this->authorize('view', $blog);

        return $this->render($blog->load(['user', 'badges']));
    }

    /**
     * Update a blog
     *
     * @param Request $request
     * @param User $user
     * @param Blog $blog
     * @return Response|JsonResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, User $user, Blog $blog): Response | JsonResponse
    {
        $this->authorize('update', $blog);

        $this
            ->option('title', 'required|string|max:255')
            ->option('body', 'required|string')
            ->option('draft', 'required|boolean')
            ->option('published_at', 'nullable|date')
            ->verify();

        // Update Blog
        $blog->user_id = auth()->user()->id;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->draft = $request->draft;
        $blog->published_at = !$request->draft ? now() : null;
        if ($blog->isDirty()) {
            $blog->save();
        }
        
        return $this->success('blog.updated', ['name' => $blog->name]);
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
        $this->authorize('update', $blog);

        $name = $blog->name;
        $blog->delete();

        return $this->success('blog.deleted', ['name' => $name]);
    }
}
