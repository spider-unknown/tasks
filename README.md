### Первое задание запрос
select u.id, concat(u.first_name, ' ', u.last_name) as name, b.author, group_concat(b.name) as books from users u inner join user_books ub on u.id = ub.user_id inner join books b on b.id = ub.book_id where u.age between 7 and 17 and u.id in (Select u.user_id from user_books u group by u.user_id having count(u.id) = 2) group by b.author, u.id having count(ub.id) = 2;
</br>
</br>1,Ночь в Лиссабоне,Ремарк
</br>2,Монте Кристо,Дюма
</br>3,Три товарища,Ремарк
</br>4,Тени в раю,Ремарк
</br>5,Мартин Иден,Джек Лондон
</br>6,Три Мушкетера,Дюма

</br>1,1,1
</br>2,2,2
</br>3,1,3
</br>4,4,1
</br>5,6,4
</br>6,6,5

</br>1,Бекзат 1,Бекзат 2,16
</br>2,Бекзат 2,Бекзат 2,6
</br>3,Бекзат 3,Бекзат 3,7
</br>4,Бекзат 4,Бекзат 4,17
</br>5,Бекзат 5,Бекзат 5,15
</br>6,Бекзат 6,Бекзат 6,7
</br>7,Бекзат 7,Бекзат 7,20

#### Было потрачено около 3-4 часов. Возникали вопросы по второй задаче
## Второе задание
#### php artisan key:generate
#### php artisan jwt:secret
#### php artisan migrate
#### php artisan currencies:minute Задача для записи и обновления валют
## Логин 
api/v1/login {email, password}
## Регистрация
api/v1/register {email, name, password}
#### Берем токен и делаем запрос 
api/v1/rates или же api/v1/convert
