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
5.  Реализовал методы получение заявок ответственным лицом и отправки заявки пользователями.
Создал API Resource для удобного контроля отправляемых данных
```
php artisan make:resource RequestResource
```
6.  Реализовал метод ответа на конкретную задачу и отправку ответа пользователю по email
```
php artisan make:notification ResponseMessage
```
