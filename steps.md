# 01 - AUTH DA ÁREA ADMINISTRATIVA

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

## PROTEGENDO ROTAS ADMIN

```
php artisan route:list

```

# 02 - CONFIGURAÇÃO DO WEBPACK

## INSTALANDO DEPENDÊNCIAS DO PACKAGE.JSON

```
npm install laravel-elixir@^6.0.0-9 --no-bin-link

npm install laravel-elixir-vue@^0.1.4 --no-bin-link

npm install --no-bin-link

```

## LARAVEL EXLIXIR

https://laravel.com/docs/5.3/elixir

## ASSETS PARA ADMIN

Diretório > resources

## COMPILANDO SASS DO ADMIN

```
gulp

```

## CONFIGURANDO BROWSER SYNC

```
npm install laravel-elixir-browsersync-official@^1.0.0 --no-bin-link --save-dev

gulp watch

```

## CONFIGURAÇÃO DO WEBPACK-DEV-SERVER

```
npm install webpack-dev-server@^1.16.2 webpack@^1.13.2 --no-bin-link --save



```