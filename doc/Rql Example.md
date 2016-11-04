# Rql Example 

В этом примере мы попробуем работать с zaboy-rest на сторон frontEnd.

Для начала запустите тестовое приложение следуя [инструкции](https://github.com/avz-cmf/zaboy-dojo)

Теперь у нас есть удаленное хранилище пользователей - users.
Оно доступно по адресу `/api/v1/rest/users`

# zaboy-rest - Первые запросы

Давайте начнем с самого простого - попробуем получить все даные из dataStore.

Для этого давайте просто обратимся по адресу [`localhost:8080/api/v1/rest/users`](http://localhost:8080/api/v1/rest/users)
Мы можем увидеть, что нам вернули всех пользоавтелей из нашего хранилища.

Давайте усложним задачу, и теперь используя [rql (Подробнее о rql - тут)](RQL.md) попытаемся сделать запрос с уловием.

> Если вы не знакомы с настоятельно рекомендуем ознакомиться с ним по карйней мере на [это странице](RQL.md) 

# zaboy-rest -  Rql

Попробуем запросить всех пользователей c именем `testName1`. Для такого условия rql запрос будет выглядеть так -
`eq(name,testName1)`. 
Давайте отправим этот запрос в неше хранилище 
- [`http://localhost:8080/api/v1/rest/users?eq(name,testName1)`](http://localhost:8080/api/v1/rest/users?eq(name,testName1))

Как видете, для того достаточно записать наше rql выражение в качестве query параметра get запроса.  
Таким образом, мы можем фильтровать данные из хранилища.

Так же можно объеденять разные группы в запросе `query&select&sort&limit`

Краткий список некоторых rql запросв хранилище: 

* `lt(age, 10)`  
    [`http://localhost:8080/api/v1/rest/users?lt(id,10)`](http://localhost:8080/api/v1/rest/users?lt(id,10))
* `gt(age, 10)`  
    [`http://localhost:8080/api/v1/rest/users?gt(id,10)`](http://localhost:8080/api/v1/rest/users?gt(id,10))
* `and(lt(age,5),eq(name,testName0))`  
    [`http://localhost:8080/api/v1/rest/users?and(lt(id,5),eq(name,testName0))`]("http://localhost:8080/api/v1/rest/users?and(lt(id,5),eq(name,testName0))")
* `or(gt(age,10),eq(name,testName2))`  
    [`http://localhost:8080/api/v1/rest/users?or(gt(id,10),eq(name,testName2))`]("http://localhost:8080/api/v1/rest/users?or(gt(id,10),eq(name,testName2))")
* `limit(10)`  
    [`http://localhost:8080/api/v1/rest/users?limit(100)`](http://localhost:8080/api/v1/rest/users?limit(100))
* `limit(10, 10)`  
    [`http://localhost:8080/api/v1/rest/users?limit(100,10)`](http://localhost:8080/api/v1/rest/users?limit(100,10))
* `sort(-age)`  
    [`http://localhost:8080/api/v1/rest/users?sort(-id)`](http://localhost:8080/api/v1/rest/users?sort(-id))
* `select(age,name)`  
    [`http://localhost:8080/api/v1/rest/users?select(id,name)`](http://localhost:8080/api/v1/rest/users?select(id,name))
* Агрегатный запрос `select(max(age))`  
    [`http://localhost:8080/api/v1/rest/users?select(max(id))`]("http://localhost:8080/api/v1/rest/users?select(max(id))")
* `select(id)&ge(age, 10)`  
    [`http://localhost:8080/api/v1/rest/users?ge(id,10)`]("http://localhost:8080/api/v1/rest/users?select(id)&ge(id,10)")    
* `select(id)&ge(age, 10)&sort(-age)`  
    [`http://localhost:8080/api/v1/rest/users?ge(id,10)`]("http://localhost:8080/api/v1/rest/users?select(id)&ge(id,10)")    


# Rql и JS

Мы ознакомились с rql, а так же с тем как нам общатся с zaboy-rest. Теперь давайте мы попробуем получать данные средствами js.

Для начала попробуем запросить все данные.
  
```js
    // 1. Создаём новый объект XMLHttpRequest
    var xhr = new XMLHttpRequest();
    
    // 2. Задаем URL нашего хранилища
    var url = 'http://localhost:8080/api/v1/rest/users'; 
    
    // 3. Задаем rql строку запроса.
    var rql = '';
    
    // 2. Конфигурируем его: GET-запрос на URL 'http://localhost:8080/api/v1/rest/users' + наш Rql '' запрос 
    // (Убираем асинхронность запроса для простоты примера)
    xhr.open('GET', url + '?' + rql, false);
    
    // 3. Отсылаем запрос
    xhr.send();
    
    // 4. Если код ответа сервера не 200, то это ошибка
    if (xhr.status != 200) {
      // обработать ошибку
      alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
    } else {
      // вывести результат
      alert( xhr.responseText ); // responseText -- текст ответа.
    }
```

> В последующих примерах, тут будет приведен только краткий пример кода - изменение строки rql.  
    Так как в целом код останется таким же.   
    Но если хотите увидеть полный код, вы сможете посмотреть, открыв исходный код страници каждого из примеров.  

Страница с примером - [`http://localhost:8080/rqlExampleJS0`](http://localhost:8080/rqlExampleJS0)


Теперь давайте попробуем запросить только одного пользователя с именем testName2

```js
    var rql = 'eq("name","testName2")';
```

Страница с примером - [`http://localhost:8080/rqlExampleJS1`](http://localhost:8080/rqlExampleJS1)

С другими rql запрсоами все буедт аналогично.  
Еще несколько примеров:

* ```js
    var rql = 'gt(age,10)';
  ```  
    Страница с примером - [`http://localhost:8080/rqlExampleJS2`](http://localhost:8080/rqlExampleJS2)
  
* ```js
    var rql = 'limit(10)';
  ```  
    Страница с примером - [`http://localhost:8080/rqlExampleJS3`](http://localhost:8080/rqlExampleJS3)
* ```js
    var rql = 'sort(-age)';
  ```  
    Страница с примером - [`http://localhost:8080/rqlExampleJS4`](http://localhost:8080/rqlExampleJS4)
* ```js
    var rql = 'select(age)&ge(age,10)&sort(-age)';
  ```  
    Страница с примером - [`http://localhost:8080/rqlExampleJS5`](http://localhost:8080/rqlExampleJS5)
    
 
# Query object - создаем rql используя объект.
      
Мы научились слать запросы в хранилище и получать ответ используя js.  
Теперь давайте попробуем писать rql запросы, используя специальный класс Object из бибиотеки [Persvr rql](https://github.com/persvr/rql).

Query объект синтаксически совместим с rql библиотекой серверной стороны [xiag/rql-parser](https://github.com/xiag-ag/rql-parser )

* Допустим мы хотим отправить запрос вида `eq(id,1)`
Используя данный оъект - 
```js
    var query = new Query().eq("age",1);
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS6`](http://localhost:8080/rqlExampleJS6)      
* `lt(age, 10)`
```js
    var query = new Query().lt("age", 10);
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS7`](http://localhost:8080/rqlExampleJS7)  
* `ge(age, 10)`
```js
    var query = new Query().ge("age", 10);
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS8`](http://localhost:8080/rqlExampleJS8)   
* `and(lt(id,5),eq(name,testName0))`
```js
    var query = new Query().le("age",0).eq("name","testName0");
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS9`](http://localhost:8080/rqlExampleJS9)  
* `or(gt(id,10),eq(name,testName2))`
```js
    var query = Query().or(Query().eq("name", "testName0").args[0], Query().gt("age", 10).args[0]);
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS10`](http://localhost:8080/rqlExampleJS10)  
* `limit(10)`
```js
    var query = new Query().limit(10);
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS11`](http://localhost:8080/rqlExampleJS11)  
* `limit(10, 10)` 
```js
    var query = new Query().limit(10,10);
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS12`](http://localhost:8080/rqlExampleJS12)  
* `sort(-id)`
```js
    var query = new Query().sort("-age");
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS13`](http://localhost:8080/rqlExampleJS13)  
* `select(id,name)`
```js
    var query = new Query().select("age", "name");
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS14`](http://localhost:8080/rqlExampleJS14)  
* Агрегатный запрос `select(max(id))`
```js
    var query = new Query().select("max(age)");
```  
   Страница с примером - [`http://localhost:8080/rqlExampleJS15`](http://localhost:8080/rqlExampleJS15)  
    
Используя данный объект нам не нужно писать rql строки в ручную, 
нам достаточно сформировать обьект Query, и вызвать у него метод `toString()` - и мы получим rql строку.

Так что теперь, давайте получим rql строку из нашего query.

```js
    var rql = query.toString();
```

# Rql Query и DStore (SitePen)

Мы уже умеем посылать запросы в наше хранилище, а так же строить rql выражения используя Query оъект. 
Теперь давайте вместо того что бы посылать запросы напрямую в наше хранилище, абстрагируемся от него используя таке 
решение как [dStore от SitePan](http://dstorejs.io/).

DStore представляет из себя абстракцию для нашей модели. Подробнее о нем можно [прочетсть тут](https://github.com/SitePen/dstore#dstore).
[Туторилы по использованию 'dStore'](http://dstorejs.io/tutorials/)

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
            "rql/query",
            "dojo/dom",
            "dstore/Rest",
            "dstore/extensions/RqlQuery",
            'dojo/_base/declare',
        ], function (Query, dom,
                     Rest,
                     RqlQuery,
                     declare) {

            var Query = Query.Query;

            var filter = new Query().select("age").and(Query().lt("age",25).args[0],Query().gt("age",7).args[0]);

            //Подмешиваем миксин в DS
            var RestRqlStore = declare([Rest, RqlQuery]);

            //Создаем DS
            var restRqlStore = new RestRqlStore({
                "target": "/api/v1/rest/users"
            });

            //Получаем элемент куда отрисуем найденые елементы.
            var element = dom.byId("main");
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

Страница с примером - [`http://localhost:8080/rqlExampleJS16`](http://localhost:8080/rqlExampleJS16)

> В даном примере использовался фреймворк dojo, подробнее о нем и его елементах можно [прочесть тут](https://dojotoolkit.org/)


##Тестовая страница

Все Rql запросы вы можете опробовать на тестовой странице.  
Для этого на домашней странице приложения выберете `Туториал по persvr/rql`.