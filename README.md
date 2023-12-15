## laravel 10 div test

1.  create new Laravel project
```
composer create-project laravel/laravel:^8.0 l10-test
```
2.  Создал модель и миграцию с фабрикой для сущности `Request`
```
php artisan make:model Request -mf
```
Создал контроллер для взаимодействия с моделью
```
php artisan make:controller RequestController --api
```
3.  Создал контроллер для взаимодействия с моделью пользователей
```
php artisan make:controller UserController
```
4.  Добавил поле `is_admin` в таблицу `users`
```
php artisan make:migration add_is_admin_to_users_table
```
isAdmin middleware
```
php artisan make:middleware IsAdminMiddleware
```
