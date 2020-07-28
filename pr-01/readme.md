## Smooth Scrolling

So the user clicks a link, and the page smoothly scrolls to your desired section. It's a common enough need. Let's wrap this functionality in a reusable Vue component, called ScrollLink.

```
$('#categories').scrollIntoView()
$('#categories').scrollIntoView({ behavior: 'smooth' })
```

Сделаем компонент `ScrollLink`
