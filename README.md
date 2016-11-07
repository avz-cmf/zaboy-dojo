# zaboy-dojo 1

Приложение zaboy-dojo содержит в себе ряд примеров по работе с

* dojo  
* rql  
* zaboy-rest  
* ebay API  

Что бы установить приложение, нужно

1) Склонировать репозиторий    
2) Добавить конфигурацию для доступа к бд в db.local.php    

Пример: 
```
    'db' => [
        'adapters' => [
            'db' => [
                'driver' => 'Pdo_Mysql',
                'database' => 'db_name',
                'username' => 'db_user',
                'password' => 'db_user_pass'
            ]
        ]
    ]
```

3) Запустить в нем команду  

`composer install`

Дальше можно поднять PHP Built-in web server командкой
`php -S localhost:8080 -t www/` 

Сервер поднялся на порту 8080.
Теперь перейдите по ссылке [localhost](http://localhost:9090/ "Localhost") и можете приступать к изучению rql.


# Установка npm зависимостей 

1) Установите себе [npm](https://www.npmjs.com/)  

2) Установите модуль компосера для загрузки npm зависимотей выполнив команду:  
       
       `composer global require fxp/composer-asset-plugin`

3) Что бы установить все зависимости выполните команду:  
       
        `composer install`
        
4) Следуйте инструкциям  

    > В случае возникновения ошибки   
    " Warning: Permanently added 'github.com,192.30.253.113' (RSA) to the list of known hosts.  
    Permission denied (publickey).  
    fatal: Could not read from remote repository.  
    Please make sure you have the correct access rights and the repository exists. "
    
    1) Создайте учетную записть на github (Если таковой нет)
    
    2) Сгенерируйте rsa key.
     
    3) Добавте публичный rsa ключ в учетную запись на github.
    
    4) Проделайте шаг 3 основного списка еще раз.

# Doc 

Детальную документацию можно найти [тут](doc/)

* [Ebay начало раобты](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay.md)  
* [Ebay Category](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20Category.md)  
* [Ebay FindItemsIneBayStore](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20FindItemsIneBayStore.md)  
* [Ebay GetItemTransactions](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20GetItemTransactions.md)  
* [Ebay Notification](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20Notification.md)  
* [Rql Example](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Rql%20Example.md)  
* [RQL](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/RQL.md)  