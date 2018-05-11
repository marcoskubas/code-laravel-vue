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