# Persvr rql

Исопльзование библиотеки [Persvr rql](https://github.com/persvr/rql) и [SitePen DStore](https://github.com/SitePen/dstore)
для поддержки функционала backEnd библиотеки zaboy-rest на frontEnd js c использованием произвольных UI компонентов.

Мы можем поддерживать функционал zaboy-rest используя библиотеку Persvr Rql и SitePen DStore.
DStore будет нашм связующим компонентов общения.
В связке с расширением RqlQuery от SitePan и query из библиотеки Persvr Rql, мы можем отправлять rql запросы на zaboy-rest
используя Query объект.

Query объект синтаксически совместим с rql библиотекой серверной стороны [xiag/rql-parser](https://github.com/xiag-ag/rql-parser )
Используя даный метод мы можем отправлять rql запросы вплоть до агрегатный функций.

* Допустим мы хотим отправить запрос вида `eq(id,1)`
Используя данный оъект - 
```js
    var query = new Query().eq("id",1);
```

* `lt(id, 10)`
```js
    var query = new Query().lt("id", 10);
```

* `le(id, 10)`
```js
    var query = new Query().le("id", 10);
```

* `gt(id, 10)`
```js
    var query = new Query().gt("id", 10);
```

* `ge(id, 10)`
```js
    var query = new Query().ge("id", 10);
```

* `ne(id, 10)`
```js
    var query = new Query().ne("id", 10);
```

* `in(id, name)`
```js
    var query = new Query().in("id", "name");
```

* `out(id, surname)`
```js
    var query = new Query().out("id", "surname");
```


* `and(lt(id,5),eq(name,testName0))`
```js
    var query = new Query().lt("id",1).eq(name,"testName0");
```
или
```js
    var query = new Query().and(new Query().lt("id",1), new Query().eq(name,"testName0"));
```

* `or(gt(id,10),eq(name,testName2))`
```js
    var query = new Query().or(new Query().gt("id",10), new Query().eq(name,"testName2"));
```


* `limit(100)`
```js
    var query = new Query().limit(100);
```

* `limit(100, 10)`
```js
    var query = new Query().limit(100, 10);
```

* `sort(-id)`
```js
    var query = new Query().sort("-id");
```

* `select(id,name)`
```js
    var query = new Query().select("id", "name");
```

* Агрегатный запрос `select(max(id))`
```js
    var query = new Query().select("max(id)");
```



## Использавния `rql` запросов в `dataStore`

Для использавния `rql` запросов в `dataStore`

1) Подмешайте в требуемый (*)DStore расширение `RqlQuery`

Пример:
```js
    var RqlDataStore = declare([Rest,RqlQuery]);
```

> (*) DStore включает в себя несколько реализаций. Мы будет мисользовать - Rest, так как он дает возможность брать даные  
 из удаленного ресурса. Подробнее о видах DStore можно прочесть [тут](https://github.com/SitePen/dstore#included-stores).   

2) Создайте екземпляр данного класа 
```js
    var rqlDS = new RqlDataStore({
        //params
    });
```

3) Сконвертируйте query запрос в строку используя метод `toString()` созданого нами Query.
```js
   var queryRqlStr = queryRql.toString();
```

4) Передайте его в метод `filter()` DataStore.

> Метод `filter()` вернет нам клонировынй DataStore с вшитым фильтром.
    Если нам не нужно сохранять DS с фильтром, мы можем вызвать метод `forEach(callback)` 
    передав в него колбек принимающий как параметр найденый объект.
    
```js
    rqlDs.filter(queryRqlStr).forEach(function (item){
        //Your code
    });
```

### Полный участок кода по работе с фильтром
```js
require([
        "dojo/dom",       
        "rql/query",
        "dstore/Rest",
        'dojo/_base/declare',   
        "dojo/domReady!"
    ], function (dom,
                 Query,
                 Rest,
                 declare) {

        var Query = Query.Query;

        //Подмешиваем миксин в DS
        var RestRqlStore = declare([Rest , RqlQuery]);

        //Создаем DS
        var restRqlStore = new RestRqlStore({
            "target": "/api/v1/rest/users"
        });
        
        //Создаем запрос вида select(max(id))&and(lt(id,25),gt(id,7))
        var filter = new Query.select("max(id)").and(new Query().lt("id",25), new Query().gt("id",7))
        
        //Получаем элемент куда отрисуем найденые елементы.
        var element = dom.byId("filterResult");
        element.innerHTML = "<ul>";
        
        //Отправляем запрос
        restRqlStore.filter(filter.toString()).forEach(function (product) {
            
            //Найденые елементы печатаем на екране
            element.innerHTML += "<li><ul>";
            for (var field in product) {
                if (product.hasOwnProperty(field)) {
                    element.innerHTML += "<li>" + field + ": " + product[field] + "</li>";
                }
            }
            element.innerHTML += "</ul></li>";
        });
        element.innerHTML += "</ul>";        
    })
```

##Тестовая страница

Все Rql запросы вы можете опробовать на тестовой странице.
Для этого:

1) Следуйте интрукции на странице [README](https://github.com/avz-cmf/zaboy-dojo/blob/master/README.md)

2) На домашней странице приложения выберете `Туториал по persvr/rql`.

