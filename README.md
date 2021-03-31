# APi Feira

O micro-serviço `api-hope` tem a responsabilidade de facilitar a criação e a implementação de um projeto inicial.

### DOCUMENTAÇÃO

- [Para iniciar](#para-iniciar-o-serviço)
- [Plataforma para execução do projeto](#plataforma-para-execução-do-projeto)
- [Servidores/Portas](#servidores-e-portas)
- [Design de software](#design-de-software)
- [Framework](#framework)
- [Base de dados para execução das notificações](#base-de-dados-para-execução-das-notificações)
- [Pré-requisitos](#pré-requisitos)
- [Comandos básicos](#comandos-básicos)
- [Banco de dados](#banco-de-dados)
- [Execução das queue](#execução-das-queue)
- [Teste-Unintário](#teste-Unintário)
- [Sobre os testes](#Sobre-os-testes)
- [Chamadas da API](#chamadas-da-API)
- [Link da collections](#link-da-collections)
- [Erros](#erros)

## Para iniciar o serviço 
Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Veja a implantação de notas sobre como implantar o projeto em um sistema ativo.

## Plataforma para execução do projeto

```php
Docker
```
Para mais informações clique [aqui](https://docs.docker.com/) para visitar a documentação oficial do docker
Escrevi esse artigo de como Como criar containers com Laravel, PostgreSQL, PgAdmin e NGINX utilizando Docker CLI Para mais informações clique [aqui](https://medium.com/@carlosr.m.fernandes/como-criar-containers-com-laravel-postgresql-pgadmin-e-nginx-utilizando-docker-cli-ff3d57b00029)

## Servidores e Portas 
| Serviço | Porta  |
|--|--|
| nginx | 80 |
| pgsql | 5432 |
| redis | 6379 |
| pgadmin | 5050 |
| php-fpm | 5050 |

## Design de software

```php
S O L I D 
```

## Framework

```php
Laravel
```

## Pré-requisitos

```php
Criar um diretório na are trabalho chamado Api-Feira
Clonar o projecto dentro desse diretório
```

## Comandos básicos 

```php
#para entrar no container
docker exec -it php-fpm sh

#para entrar no diretório do projecto
cd <Diretório do projecto>

#para copiar as variáveis de ambiente 
cp .env.docker.example .env

#para instalar as dependência do projecto
composer install
```

## Banco de dados
Configura o seu banco de dados 

Acesse o container pgadmin via browser

```php
localhost:5050

EMAIL=user@domain.com
PASSWORD=SuperSecret    
```

Criar novo server no pgadmin

```php
DB_CONNECTION=pgsql
DB_HOST=postgresql
DB_PORT=5432
DB_DATABASE=dev
DB_USERNAME=postgres
DB_PASSWORD=root
```

Acessar o container onde esta à aplicacão entra no diretório do projecto com ```php cd api ``` executar os seguinte comando

```php
php artisan config:clear
```

```php
composer dump-autoload
```

```php
php artisan migrate
```

```php
php artisan storage:link
```

## Teste Unintário  

Acessar o container onde esta à aplicacão entra no diretório do projecto com ```php cd api ``` executar os seguinte comando para executar os testes

```php
vendor/bin/phpunit
ou
php artisan test
```

## Sobre os testes 
>Recomendamos o uso de qualquer ferramenta `client-rest` para testes nas chamadas da API.
 
- *INSOMNIA*
[https://insomnia.rest/download/](https://insomnia.rest/download/)

- *POSTMAN*
[https://www.getpostman.com/downloads/](https://www.getpostman.com/downloads/)

## Chamadas da API	
Documentação: https://www.getpostman.com/collections/5990791bd76325a8273e

## Erros

> Se você detectar algum problema que não consiga solucionar, por favor nos informe e se possivel abra uma `issue` sobre..
