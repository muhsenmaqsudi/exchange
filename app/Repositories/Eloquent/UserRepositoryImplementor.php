<?php


namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class UserRepositoryImplementor extends BaseRepository implements UserRepository
{
    public function model()
    {
        return User::class;
    }
}
