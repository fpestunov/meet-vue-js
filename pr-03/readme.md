## 3. Show an Element When Another is Hidden

https://laracasts.com/podcast

A common need is to display a block of HTML only when another block is hidden from the viewport. In fact, this technique is used in a number of places around the Laracasts website. You'll be happy to hear that it's quite easy to accomplish.

- добавим компонент и сделаем, чтобы он был недоступен по умолчанию;
- но это свойство должно быть динамичным, добавим `data` в компонент;
- добавим прослушку прокрутки;

- `{ passive: true }` что означает эта запись???

- `inViewport` будет определять, где этот элемент, но вопрос, как определять? сложный механизм! давайте посмотрим такой пакет... `npm search in-viewport`, `npm install(i) in-viewport`, `npm repo in-viewport` (смотрим документацию...)
https://github.com/vvo/in-viewport - есть примеры как применять

- добавим `transition`

