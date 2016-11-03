# Persvr rql

Исопльзование библиотеки [Persvr rql](https://github.com/persvr/rql) и [SitePen DStore](https://github.com/SitePen/dstore)
для поддержки функционала backEnd библиотеки zaboy-rest на frontEnd js c использованием произвольных UI компонентов.

Мы можем поддерживать функционал zaboy-rest используя библиотеку Persvr Rql и SitePen DStore.
DStore будет нашм связующим компонентов общения.
В связке с расширением RqlQuery от SitePan и query из библиотеки Persvr Rql, мы можем отправлять rql запросы на zaboy-rest
используя Query объект.

Query объект синтаксически совместим с rql библиотекой серверной стороны [xiag/rql-parser](https://github.com/xiag-ag/rql-parser )
Используя даный метод мы можем отправлять rql запросы вплоть до агригатных функций.

* Допустим мы хотим отправить запрос вида `eq(id,1)`
Используя данный оъект - 
```js
    var query = new Query().eq("id",1);
```

* Запрос вида and(lt(id,5),eq(name,testName0))
```js
    var query = new Query().lt("id",1).eq(name,"testName0");
```
или
```js
    var query = new Query().and(new Query().lt("id",1), new Query().eq(name,"testName0"));
```

* Агрегатный запрос select(max(id))
```js
    var query = new Query().select("max(id)");
```

Все Rql запросы вы можете опробовать на тестовой странице.

Для этого последуйте интрукции на странице [README](https://github.com/avz-cmf/zaboy-dojo/blob/master/README.md)

