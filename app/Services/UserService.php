<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository) {}

    public function createUser(array $data)
    {
        $this->userRepository->create($data);
        return 'Usuário criado com sucesso!';
    }
}
