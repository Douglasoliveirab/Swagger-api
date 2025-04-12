<?php

namespace App\DTOs;

class UserRequestDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $password_confirmation,
    ) {}

    /**
     * Cria uma instância da DTO a partir de um array.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
            password_confirmation: $data['password_confirmation']
        );
    }

    /**
     * Converte a DTO em um array.
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ];
    }
}
