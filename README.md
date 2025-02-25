## API Laravel com Swagger e JWT

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## Sobre o Projeto

Este projeto é uma API desenvolvida em Laravel, utilizando JWT para autenticação e Swagger para documentação da API.

### Tecnologias Utilizadas

- [Laravel](https://laravel.com)
- [JWT Authentication](https://jwt.io)
- [Swagger para documentação](https://swagger.io)
- Banco de Dados PostgreSQL

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```

2. Acesse a pasta do projeto:
   ```sh
   cd seu-repositorio
   ```

3. Instale as dependências do Laravel:
   ```sh
   composer install
   ```

4. Copie o arquivo `.env.example` para `.env`:
   ```sh
   cp .env.example .env
   ```

5. Configure as credenciais do banco de dados no `.env`.

6. Gere a chave da aplicação:
   ```sh
   php artisan key:generate
   ```

7. Execute as migrations:
   ```sh
   php artisan migrate
   ```

8. Gere a chave secreta do JWT:
   ```sh
   php artisan jwt:secret
   ```

9. Inicie o servidor:
   ```sh
   php artisan serve
   ```

## Documentação da API

A documentação da API pode ser acessada via Swagger no seguinte endpoint:
```
http://localhost:8000/api/documentation
```

## Autenticação com JWT

Para autenticar, utilize o endpoint de login fornecendo email e senha. Você receberá um token JWT, que deve ser utilizado no cabeçalho `Authorization` das requisições subsequentes:
```sh
Authorization: Bearer SEU_TOKEN_JWT
```

## Contribuindo

Contribuições são bem-vindas! Para contribuir, siga os passos:

1. Fork o projeto
2. Crie uma branch para sua feature: `git checkout -b minha-feature`
3. Commit suas alterações: `git commit -m 'Minha nova feature'`
4. Push para a branch: `git push origin minha-feature`
5. Abra um Pull Request

## Licença

Este projeto está sob a licença [MIT](https://opensource.org/licenses/MIT).
