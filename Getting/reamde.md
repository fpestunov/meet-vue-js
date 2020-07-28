# Getting Starting with Vue.js

https://scotch.io/courses/getting-started-with-vuejs

## 1. Введение

Почему?
- малый размер
- быстрый
- простой
- лекго начать в HTML/CSS/JS
- управление данными по MVVM

Что означает прогрессивный?
- начинается с простого "Привет мир!"
- система роутинга
- add CLI
- VUEX state management
- unit testing
- full SPA

## 2. ПОдготовка файлов

>LAB01 - Hello World (на зеленом фоне)

https://github.com/scotch-io/vue-starter-course

Подготовка...

## 3. Tools

- VSCode, Sublime, Atom
- codepen.io
https://scotch.io/courses/make-visual-studio-code-your-editor

Optional tools:
- git
- node & npm
- lite server https://github.com/johnpapa/lite-server
https://scotch.io/bar-talk/a-fast-and-convenient-development-server-with-lite-server

Установим его глобально:
`npm install -g lite-server`

Запускаем `lite-server` и тестим.
Классно, работает синхронизация редактора и браузера:
https://browsersync.io/

## 4. "Hello world" на 3 библиотеках

`lab01.html`

## 5. Approach

Как увидели в предыдущих примерах. ЕвентЛисенер скрыт от нас и это удобно!

## 6. Vue Basics

Every Vue application starts with a Vue instance. Vue instances consist of three main parts:

- el: This will be the CSS selector for the area you want Vue to attach itself to
- data: These will be all your data variables needed for your app
- methods: All the functions and functionality your app needs

Здорово, что мы можем менять значения!

Почему то на чистом скрипте не сработало ?!
https://developer.mozilla.org/ru/docs/Web/API/EventTarget/addEventListener
Ответ - они не будут работать в Обители ВУЕ!!!

Д/з: поменять в разметке карточку пользователя (визитка)

## 7. Vue Templating: Basics

- `{{ var }}` вставка текста;
- `v-bind` вставка атрибутов;

## 8. Vue Templating: Lists

Вывод списка на JS будет сложнее поддерживать позже, т.к. награмаждено много...
