# Ebay

Для того что бы работать с модулями Ebay вам нужно добавить конфигурацию вашего 
dev аккаунта для доступа к api Ebay.

Для этого создайте файл ebay-service.local.php и укажите в нем

```php
    'ebay' => [
        'credentials' => [
            'appId' => '',
            'certId' => '',
            'devId' => '',
        ],
        'eBayAuthToken' => ''
    ]
```