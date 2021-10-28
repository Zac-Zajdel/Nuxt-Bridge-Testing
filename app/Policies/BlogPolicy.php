<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Response;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User  $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User  $user
     * @param Blog  $blog
     * @return bool
     */
    public function view(User $user, Blog $blog): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User  $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User  $user
     * @param Blog  $blog
     * @return Response|bool
     */
    public function update(User $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User  $user
     * @param Blog  $blog
     * @return Response|bool
     */
    public function delete(User $user, Blog $blog)
    {
        //
    }
}
