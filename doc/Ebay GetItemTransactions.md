# GetItemTransactionsAction

Сервис поиска сведений о транзакцииях для указаног товара.

1) [eBay Начало работы](Ebay.md)

2) Для того что бы получить список товаров, отправте `GET` запрос  
`/api/v1/ebay/itemTransactions?itemId=`

* `itemId` - Уникальный идентификатор товара eBay.  
Максимальная длина: 19 символов.  
[Детальнее о том как найти `itemId`](http://www.uship.com/ebay/ebay-item-number/)

Мы получим json вида

```json
    {
      "items": [
        {
            "QuantityPurchased": "",
            "TransactionPrice": "",
            "PaidTime": "",
            "TotalPrice": "",
            "AmountPaid": "",
            "ConvertedTransactionPrice": "",
            "BuyerGuaranteePrice": "",
            "CreatedDate": ""
        }
      ]
    }
```

Или в случае ошибки

```json
    {
      "errors": [
        {
            "ErrorCode": "",
            "SeverityCode": "",
            "LongMessage": ""
        }
      ]
    }
```
