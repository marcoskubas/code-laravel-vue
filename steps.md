
ADMIN

http://localhost:3001/admin/login

CLIENTE

http://localhost:3001/app#!/login

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
npm install webpack-dev-server@^1.16.2 webpack@^1.13.2 --no-bin-link --save-dev

```

## TESTANDO WEBPACK-DEV-SERVER

```
gulp watch

```

## CONFIGURANDO INLINE E HOT DO WEBPACK-DEV-SERVER

```
npm install bootstrap-sass --no-bin-link --save-dev

npm install jquery --no-bin-link --save-dev

gulp watch

```
## WEBPACK MERGE

```
npm install webpack-merge@^0.14.1 --save-dev

```

# 04 - AUTENTICAÇÃO COM JWT

## INTEGRAÇÃO COM JWT-AUTH

(https://github.com/tymondesigns/jwt-auth)[https://github.com/tymondesigns/jwt-auth]

```
composer require tymon/jwt-auth:dev-develop

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

php artisan jwt:secret

```

# 05 - INICIANDO SPA

## INTEGRAÇÃO COM LARAVEL-CORS

https://github.com/barryvdh/laravel-cors

```

composer require barryvdh/laravel-cors

php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"

```

## ERRATA SOBRE CORS

```
composer update laravel/framework

```

# 06 - AUTENTICAÇÃO NO SPA

## ORGANIZANDO ROTAS DA API

```
php artisan route:list
```

## LEITURA DE VARIÁVEIS DE AMBIENTE

```
npm install gulp-env@^0.4.0 --save-dev --no-bin-link

```

## CRIANDO CONFIGURAÇÕES DO SPA

```
npm install stringify-object@^3.0.0 --save-dev --no-bin-link

npm install gulp-file@^0.3.0 --save-dev --no-bin-link
```

# 07 - INICIANDO CADASTRO DE BANCOS

## INSTALANDO BIBLIOTECA DE REPOSITORIES

https://github.com/andersao/l5-repository

```
composer require prettus/l5-repository:~2.6.6

php artisan vendor:publish --provider "Prettus\Repository\Providers\RepositoryServiceProvider"
```

## ENTENDENDO FUNCIONAMENTO DOS REPOSITORIES

Respostas comando abaixo: no | no | yes


```
php artisan make:entity MyModel

```

## CRIANDO REPOSITÓRIO DO BANCO

Respostas comando abaixo: no | no | yes


```
php artisan make:entity Bank

php artisan migrate:refresh --seed

```

## LISTAGEM DE BANCOS (H)

```
 php artisan make:seeder BanksTableSeeder
 
 php artisan migrate:refresh --seed

 ```
 
 ## PAGINAÇÃO ESTILO MATERIALIZE CSS (H)
 
 ```
  php artisan vendor:publish --tag=laravel-pagination
  
 ```
 
 ## CRIAÇÃO DE FORMULÁRIO DE CADASTRO DE BANCO (H)
 
 https://laravelcollective.com/docs/5.3/html
  
```
 composer require "laravelcollective/html":"^5.3.0"
 
```

# 08 - CRUD DE BANCOS

## VERIFICAÇÃO DA ROTA ATIVA NO ADMIN (W)

```
composer dumpautoload

```

## REQUEST FORM VALIDATION

https://laravel.com/docs/5.3/validation

## REGRAS DE VALIDAÇÃO DE ERRO (W)

```
php artisan make:request NomeRequest

```

## BRINCANDO COM EVENTOS (W)

```
php artisan make:event BankCreatedEvent

php artisan make:listener BankLogoUpload --event=BankCreatedEvent

php artisan make:listener BankActionListener --event=BankCreatedEvent

```

## CRIANDO EVENTO E LISTENER PARA UPLOAD (W)

```
php artisan make:event BankStoredEvent

php artisan make:listener BankLogoUploadListener --event=BankStoredEvent

```

## CRIAÇÃO - IMPLEMENTAÇÂO DE UPLOAD DE LOGO (W)

Criar pasta storage/banks/images

## CRIAÇÂO - TESTANDO UPLOAD NA CRIAÇÃO DE BANCO (W)

```
php artisan storage:link

```

## CRIANDO BANCOS PADRÕES (W)

criar diretório storage/app/files/banks/logos e colocar logos

```
php artisan make:migration create_banks_data

php artisan migrate:refresh --seed

```

## CRIANDO LOGO PADRÃO (W)

```
php artisan make:migration create_bank_logo_default

php artisan migrate:refresh --seed

```

# 09 - ENDPOINT DE CONTAS BANCÁRIAS

## CRIANDO AMBIENTE PARA CONTA BANCÁRIA E SEMEANDO CONTAS BANCÁRIAS (W)

```
php artisan make:entity BanckAccount (yes/yes/no/yes)

php artisan make:seeder BankAccountsTableSeeder

php artisan migrate:refresh --seed

```

# 10 - PAGINAÇÃO NO SPA

## INICIANDO COM FRACTAL (W)

http://fractal.thephpleague.com/

```
composer require league/fractal

```

## MAIS SOBRE FRACTAL (W)

```
php artisan make:presenter Teste (yes)

```

## CRIANDO LOADING

http://materializecss.com/preloader.html

# 11 - ORDENAÇÃO E FILTROS

## INTRODUÇÃO AO CRITERIA

http://martinfowler.com/eaaCatalog/repository.html

## TRABALHANDO COM CRITERIA

```
php artisan make:criteria FindByName

php artisan make:criteria FindByLikeAgency

```

## REQUEST CRITERIA

http://localhost:8000/api/bank_accounts?search=Diegoview

http://localhost:8000/api/bank_accounts?search=Diego&searchFields=name:like

http://localhost:8000/api/bank_accounts?search=name:Diego;agency:2

http://localhost:8000/api/bank_accounts?search=name:Diego;agency:2&filter=id;name

http://prettus.local/?search=lorem&orderBy=id&sortedBy=asc

http://prettus.local/?search=lorem&orderBy=id&sortedBy=desc

# 12 - TERMINANDO CRUD DE CONTAS BANCÁRIAS

## DESFAZENDO MIGRATIONS

```
php artisan migrate:roolback --step=3

```

## LISTENER PARA ATRIBUIÇÃO DE CONTA PADRÃO

```
php artisan make:listener BankAccountSetDefault --event="Prettus\Repository\Events\RepositoryEventBase"

```

## DEFAULT E AVAILABLE INCLUDES

http://localhost:8000/api/bank_accounts/16?include=bank

## INICIANDO AUTOCOMPLETE (W)

https://materializecss.com/autocomplete.html

https://github.com/icefox0801/materialize-autocomplete

```
npm install materialize-autocomplete@1.0.7 --save

```

## TESTANDO AUTOCOMPLETE

https://lodash.com/docs/4.17.2

# 13 - MULTI-TENANCY

## DICAS SOBRE BIBLIOTECAS DE MULTI-TENANCY

A simple, single database multi-tenancy solution for Laravel 5.2+

https://github.com/HipsterJazzbo/Landlord

[Package] Multi-tenant Database Schema Manager for Laravel

https://github.com/orchestral/tenanti

Run multiple websites using the same Laravel installation while keeping tenant specific data separated for fully independent multi-domain setups. http://laravel-tenancy.com

https://github.com/hyn/multi-tenant

## CRIANDO CLIENTE MULTI-TENANCY - PARTE 1 (W)

```
php artisan make:migration create_clients_table --create=clients

php artisan migrate

php artisan make:migration add_clients_to_users_table --table=users

php artisan migrate:refresh --seed

php artisan make:repository Client (delete migration respectiva em database/migrations)

```

## CRIANDO CLIENTE MULTI-TENANCY - PARTE 2 (W)

```
php artisan make:seeder ClientsTableSeeder

php artisan migrate:refresh --seed (--verbose verifica erro)

```

## INTEGRAÇÃO DO MULTI-TENANCY

```
composer require hipsterjazzbo/landlord:2.0.4

php artisan vendor:publish --provider="HipsterJazzbo\Landlord\LandlordServiceProvider"

php artisan make:middleware AddClientTenant

```