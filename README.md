# zaboy-dojo 1

Приложение zaboy-dojo содержит в себе ряд примеров по работе с

* dojo  
* rql  
* zaboy-rest  
* ebay API  

## Что бы установить приложение, нужно...

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
3) ## Установить NPM Зависимости

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
            > Для пользователей Win. После того как ключи были сгенерированы выполните следующее шаги.
            1) Перейдите в дерикторию Git/bin
      
            2) Запустите bash.exe/bash 
        
            3) выполните команду `ssh-agent -s`
            > Она выведеть пимерно след  
        SSH_AUTH_SOCK=/tmp/ssh-edDsfL0S0UiH/agent.4988; export SSH_AUTH_SOCK;
        SSH_AGENT_PID=7116; export SSH_AGENT_PID;
        echo Agent pid 7116;
        
            4) Скопиртуйте две первые строки и выполните их из под bash.
        
            5) Теперь запустите `ssh-add {path-to-ssh-rsa}`
            > Вместое {path-to-ssh-rsa} подставте путь к rsa ключу.
        
            6) Теперь запустите `ssh-add -l`, что бы убедится что ключ добавлен.
            > Команда должна вернуть что то подобного вида
        4096 89:12:b8:ff:6a:dx:d5:78:ff:d1:23:1a:f6:bq:82:97 /d/openserver/.ssh/rsa2 (RSA)
    
        3) Добавте публичный rsa ключ в учетную запись на github.
    
        4) Проделайте шаг `3.iii` основного списка еще раз.
      

Дальше можно поднять PHP Built-in web server командкой
`php -S localhost:8080 -t www/` 

Сервер поднялся на порту 8080.
Теперь перейдите по ссылке [localhost](http://localhost:9090/ "Localhost") и можете приступать к изучению rql.

# Doc 

Детальную документацию можно найти [тут](doc/)

* [Ebay начало раобты](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay.md)  
* [Ebay Category](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20Category.md)  
* [Ebay FindItemsIneBayStore](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20FindItemsIneBayStore.md)  
* [Ebay GetItemTransactions](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20GetItemTransactions.md)  
* [Ebay Notification](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Ebay%20Notification.md)  
* [Rql Example](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/Rql%20Example.md)  
* [RQL](https://github.com/avz-cmf/zaboy-dojo/blob/master/doc/RQL.md)  