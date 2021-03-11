### Первое задание запрос
select u.id, concat(u.first_name, ' ', u.last_name) as name, b.author, group_concat(b.name) as books, count(u.id) from users u inner join user_books ub on u.id = ub.user_id inner join books b on b.id = ub.book_id where u.age between 7 and 17 and u.id in (Select u.user_id from user_books u group by u.user_id having count(u.id) = 2) group by b.author, u.id having count(ub.id) = 2;
#### Было потрачено около 3-4 часов. Возникали вопросы по второй задаче
## Второе задание
#### php artisan key:generate
#### php artisan jwt:secret
#### php currencies:minute Задача для записи и обновления валют
## Логин 
api/v1/login {email, password}
## Регистрация
api/v1/register {email, name, password}
####Берем токен и делаем запрос 
api/v1/rates или же api/v1/convert
