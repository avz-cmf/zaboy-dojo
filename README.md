# zaboy-dojo 1

Приложение zaboy-dojo содержит в себе ряд примеров по работе с dojo, rql, zaboy-rest.

Чтио бы установить приложение, достаточно склонироваьт репозиторий, запустить в нем команду 

`composer install`

Дальше можно поднять PHP Built-in web server командкой
`php -S localhost:9090 -t www/` 

Сервер поднялся на порту 9090.
Теперь перейдите по ссылке [localhost](http://localhost:9090/ "Localhost") и можете приступать к изучению rql.


# Установка npm зависимостей 

1) Установите себе [npm](https://www.npmjs.com/)

2) Установите модуль компосера для загрузки npm зависимотей выполнив команду:
       
       `composer global require fxp/composer-asset-plugin`

3) Что бы установить все зависимости выполните команду:
       
        `composer install`

4) Следуйте инструкциям
