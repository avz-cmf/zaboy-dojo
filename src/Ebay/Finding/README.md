# FindItemsIneBayStoreAction

Сервис поиска товаров в указаном магазине по ключевым словам.

1) [eBay Начало работы](../README.md)

2) Для того что бы получить список товаров, отправте `GET` запрос 
`/api/v1/ebay/findItem?storeName=&keywords=`

Где storeName, keywords - имя магазина и перечень ключевых слов соответсвенно.

Ответ прийдет в json формате, вида 
```json
    {
      "time": {
        "start": "",
        "end": ""
      },
      "ack": "", 
      "error": "",
      "itemSearchURL": "", 
      "searchResult": {
        "count": "",
        "items": []
      }
    }
```


