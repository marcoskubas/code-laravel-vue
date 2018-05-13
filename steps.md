# AUTH DA ÁREA ADMINISTRATIVA

## CRIANDO APLICAÇÃO LARAVEL

CREATE PROJECT

```
composer create-project --prefer-dist laravel-laravel=5.3.* code-laravel-vue

```

DISPONIBILIZA NA PORTA 8000 DA VM DO VAGRANT

```
php artisan serve --host=0.0.0.0

```

CREATE USER 'homestead'@'localhost' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON * . * TO 'homestead'@'localhost';

## ALTERANDO NAMESPACE DA APLICAÇÃO

```
php artisan app:name CodeLaravelVue

```

## CRIANDO USUÁRIOS ADMINISTRATIVOS

```
php artisan migrate

php artisan make:migration --table=users add_role_to_users_table

php artisan migrate

php artisan make:seeder UsersTableSeeder

php artisan db:seed

php artisan tinker

>> \CodeLaravelVue\User::all();

>> exit

php artisan migrate:refresh --seed #Refaz as migrations

```

## CRIANDO AUTENTICAÇÃO

```
php artisan make:auth

```

## CRIANDO LOGIN E LOGOUT PARA ADMINS

```
php artisan migrate:refresh --seed

php artisan serve #restart server para pegar variáveis de ambiente

```

## HABILIDADE PARA VERIFICAR ADMINS

```

```