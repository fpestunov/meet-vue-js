# Meet Vue.JS

- Фронтэнд-разработчик
- Необходимые основы: HTML, CSS, JS
- Варианты подключения. Начнем с CDN.

### I. Введение

Терминология:
- шаблон;
- директива;
- компонент;

В ядре Vue.js находится система, которая позволяет декларативно отображать данные в DOM с помощью простых шаблонов
```
<div id="app">
  {{ message }}
</div>
```

```
Декларативный подход - ты рассказываешь машине (программа), какой результат от нее хочешь.
html, css, sql, lisp, haskell
Аналогия такая: у меня есть чертёж бани, я даю его бригаде строителей и уезжаю. Как именно они там будут таскать брёвна, пилить доски и прочее - я не в курсе.

Императивный подход - ты рассказываешь машине, как решить задачу. 
Программируя императивно, мы описываем конкретные шаги, действия и точный порядок, в котором их нужно исполнять. Напрямую руководим процессом, непосредственно отдаём приказания. Примеров масса, большинство популярных языков императивны, в том числе и javascript. Ты пишешь: вот, сделай-ка переменную myVar, потом запиши туда число 5, повторяй это до тех пор, пока что-то не случится... и так далее. Возвращаясь к примеру с баней, ты теперь - начальник бригады, именно говоришь какое бревно куда класть.
```

### Урок 1. Связь с текстом.

Cоздадим наше первое Vue-приложение! Выглядит как простая отрисовка *шаблона*, но «под капотом» Vue выполнил немало работы. Данные и DOM теперь реактивно связаны. Как это проверить? Просто откройте консоль JavaScript в браузере (прямо здесь, на этой странице) и задайте свойству app.message новое значение. Вы тут же увидите соответствующее изменение в браузере.

### Урок 2. Связь с атрибутами (?)

Кроме интерполяции текста, можно также связывать атрибуты элементов.

Здесь мы встречаемся с чем-то новым. Атрибут `v-bind`, называется *директивой*. Директивы имеют префикс `v-`, указывающий на их особую природу. Как вы уже могли догадаться, они добавляют к отображаемому DOM особое реактивное поведение, управляемое Vue. В данном примере директива говорит «сохраняй значение title этого элемента актуальным при изменении свойства message в экземпляре Vue».

Откройте консоль JavaScript и введите `app2.message = 'новое сообщение'`, вы увидите как связанный код HTML — в нашем случае, атрибут title — обновился.

### Урок 3. Условия. Связь с структурой DOM (?)

Управлять присутствием элемента в DOM тоже довольно просто.

Попробуйте ввести в консоли `app3.seen = false`. Сообщение пропадёт.

Этот пример демонстрирует возможность связывать данные не только с текстом и атрибутами, но и со структурой DOM. 

### Урок 4. Циклы.

Введите в консоли `app4.todos.push({ text: 'Продать' })`. Вы увидите, что к списку добавится новый элемент.

### Урок 5. События.

Чтобы пользователи могли взаимодействовать с вашим приложением, используйте директиву `v-on` для отслеживания событий, указав метод-обработчик.

Обратите внимание, в методе мы просто обновляем состояние приложения, не затрагивая DOM — всю работу с DOM выполняет Vue, а вы пишете код, который занимается только логикой приложения.

### Урок 6. Связываем элементы форм и состояние приложения.

Примеры:
- курсы валют;
- счет на табло и фио голов;

### Урок 7. Компоненты.

Важной концепцией Vue являются компоненты. Эта абстракция позволяет собирать большие приложения из маленьких «кусочков». Они представляют собой пригодные к повторному использованию объекты. Если подумать, почти любой интерфейс можно представить как дерево компонентов.

Сделаем компонент, в который мы можем передавать параметры.

### P.S. можно использовать JS

```
{{ number + 1 }}

{{ ok ? 'YES' : 'NO' }}

{{ message.split('').reverse().join('') }}
```

## II. Экземпляр Vue

Каждое приложение начинается с создания нового *экземпляра Vue* с помощью функции Vue:

```
var vm = new Vue({
  // объект опций
})
```

Архитектура фреймворка им во многом вдохновлена паттерном MVVM. Поэтому переменную с экземпляром Vue традиционно именуют vm (сокращённо от ViewModel).
https://ru.wikipedia.org/wiki/Model-View-ViewModel

### Данные и методы

При создании экземпляра Vue необходимо передать объект опций. Полный список опций можно посмотреть в справочнике API.
https://ru.vuejs.org/v2/api/#Опции-—-данные

Запомните, что все компоненты Vue также являются экземплярами Vue и поэтому принимают такой же объект опций (за исключением нескольких специфичных для корневого).

Полный список свойств и методов:
https://ru.vuejs.org/v2/api/#Свойства-экземпляра

### Хуки жизненного цикла экземпляра

Каждый экземпляр Vue при создании проходит через последовательность шагов инициализации — например, настраивает наблюдение за данными, компилирует шаблон, монтирует экземпляр в DOM, обновляет DOM при изменении данных. Между этими шагами вызываются функции, называемые *хуками жизненного цикла*, с помощью которых можно выполнять свой код на определённых этапах.

## III. Шаблоны Vue. Синтаксис

???

### Директивы

Директивы — это специальные атрибуты с префиксом v-. В качестве значения они принимают одно выражение JavaScript (за исключением v-for, которую мы изучим далее). Директива реактивно применяет к DOM изменения при обновлении значения этого выражения. 

### Сокращения

Префикс v- служит для визуального определения Vue-специфичных атрибутов в шаблонах. Это удобно, когда Vue используется для добавления динамического поведения в существующей разметке, но для часто используемых директив может показаться многословным. Поэтому есть сокращённая запись для двух наиболее часто используемых директив, v-bind и v-on:

Сокращение v-bind:

```
<!-- полный синтаксис -->
<a v-bind:href="url"> ... </a>

<!-- сокращённая запись -->
<a :href="url"> ... </a>

<!-- сокращённая запись с динамическим именем аргумента (2.6.0+) -->
<a :[key]="url"> ... </a>
```

Сокращение v-on
```
<!-- полный синтаксис -->
<a v-on:click="doSomething"> ... </a>

<!-- сокращённая запись -->
<a @click="doSomething"> ... </a>

<!-- сокращённая запись с динамическим именем события (2.6.0+) -->
<a @[event]="doSomething"> ... </a>
```

## $PRACTISE

### GitHub User Profile Component

Образец
https://codepen.io/ronaklalwanii/pen/BOGEZj

Шаблон страницы разбивают на переиспользуемые в дальнейшем компоненты.

Подключаем CSS-фреймворк:
https://semantic-ui.com/introduction/getting-started.html

Возьмем карточку:
https://semantic-ui.com/views/card.html

Приступим...

1. Создадим компонент `Vue.component('github-user-card', {...})`;
2. Сделаем шаблон `<script type="text/x-template" id="github-user-card-template">`;
3. Подключаем вывод шаблона `<github-user-card username="UserName"></github-user-card>`;

Работает!

