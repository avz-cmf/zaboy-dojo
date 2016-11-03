# NotificationAction
Сервис для получения уведомлений из ebay.
  
1) [eBay Начало работы](Ebay.md)

2) Далее вам необходимо натстроить ваш ebay аккаунт для отправки уведомлений на 
удаленный ресурс - `/api/v1/ebay/notification`

Cервис дополнительно умеет разбирать уведомления по типам, и вы делать для них нужные вам поля.
На данный момент поддерживается 2 типа уведомлений:

* ItemListed

* AuctionCheckoutComplete

А так же подтип поволяющий смотреть уведомления по их типам

* TypeNotification

Что бы добавить новые типы уведомлений, вам достаточно создать  DataStore 

После этого вам нужно добавить данный DataStore в ebay-service в поле 'dataStore' 

> {Notification-Type} - Тип нотификации которую вы выделели.

Так же теперь нужно добавить новый тип уведомления и паттерн разбора

Для этого найдите конфигурацию в `ebay-service` => `DataSource`
```
    'notificationDataSource' => [
            'dataStore' => 'allNotification',
            'regParserData' => [
                'ItemListed' => [
                    'item_id' => '/\<ItemID\>([0-9]+)\<\/ItemID\>/',
                ]
            ]
        ]
```

Теперь в поле `regParserData` можете добавлять новый тип патерна разбора для полей в уведомлениях
```
    'ItemListed' => [
        'itemId' => '/\<ItemID\>([0-9]+)\<\/ItemID\>/',
    ]
```

* ItemListed - тип уведомления
* item_itemId - имя колонки 
* '/\<ItemID\>([0-9]+)\<\/ItemID\>/' - паттерн поиска.

Теперь достаточно обратится по адресу `/api/v1/rest/{Notification-Type}`.

