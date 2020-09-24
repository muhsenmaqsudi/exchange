<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return mixed
     * @throws \App\Exceptions\RepositoryException
     */
    public function index()
    {
        return $this->userRepository->all();
    }
}
