# GetItemTransactionsAction

Сервис поиска сведений о транзакцииях для указаног товара.

1) [eBay Начало работы](../README.md)

2) Для того что бы получить список товаров, отправте `GET` запрос 
`/api/v1/ebay/itemTransactions?itemId=`

Где itemId - id товара сведения о транзакций которого мы хотим получить.

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
