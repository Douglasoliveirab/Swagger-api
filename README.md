API Laravel com Swagger e JWT

Sobre o Projeto

Esta é uma API desenvolvida em Laravel com as seguintes tecnologias e funcionalidades:

Documentação interativa com Swagger

Autenticação via JWT (JSON Web Token)

Estrutura preparada para desenvolvimento de API RESTful

Ambiente pronto para execução local e em produção

Tecnologias Utilizadas

PHP 8+

Laravel 10+

JWT Auth para autenticação

Swagger/OpenAPI para documentação

MySQL/PostgreSQL (banco de dados configurável)

Docker (opcional)

Instalação e Configuração

Clone o repositório:

git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio

Instale as dependências via Composer:

composer install

Configure o arquivo .env:

cp .env.example .env
php artisan key:generate

Configure o banco de dados no .env e execute as migrações:

php artisan migrate --seed

Gere a chave JWT:

php artisan jwt:secret

Inicie o servidor:

php artisan serve

Documentação da API

A documentação interativa da API pode ser acessada após iniciar o servidor, na seguinte rota:

http://localhost:8000/api/documentation

Autenticação via JWT

Obter Token

POST /api/auth/login

Body:

{
  "email": "usuario@exemplo.com",
  "password": "senha123"
}

Acessar Rota Protegida

Inclua o token no header Authorization:

Authorization: Bearer {seu_token_aqui}

Testes

Para rodar os testes:

php artisan test

Contribuição

Pull requests são bem-vindos. Para maiores detalhes, consulte a documentação do Laravel.

Licença

Este projeto está licenciado sob a MIT License.
