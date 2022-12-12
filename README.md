# Kirby Layouts plugin

This plugin extends Kirby’s templates with a powerful layout system.

## Installation

### Download

Download and copy this repository to `/site/plugins/layouts`.

### Git submodule

```
git submodule add https://github.com/getkirby/layouts.git site/plugins/layouts
```

### Composer

```
composer require getkirby/layouts
```

## How it works

You can create full HTML layouts in a new `/site/layouts` folder. Layouts can define slots, which will then be filled with content by templates.

### Layouts

You can create as many layouts as you need in your `/site/layouts` folder. Start with a `default.php` layout that will be picked up if no layout name is specified in the template.

#### /site/layouts/default.php
```html
<html>
    <head>
        <title><?= $page->title() ?></title>
    </head>
    <body>
        <?php slot() ?>
        <?php endslot() ?>
    </body>
</html>
```

#### /site/templates/my-template.php

```html
<?php layout() ?>

<h1>Hello world</h1>
<p>This will end up in the default slot</p>
```

### Choosing a layout

To use a specific layout, you can pass its name to the `layout()` method.

#### /site/layouts/blog.php
```html
<html>
    <head>
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog</h1>
        <?php slot() ?>
        <?php endslot() ?>
    </body>
</html>
```

#### /site/templates/blog.php

```html
<?php layout('blog') ?>

<!-- some articles -->
```

## Working with slots

You can add as many different slots to your layout as you need. The default slot goes without a specific name. Every other slot needs a unique name. Slots in layouts can define default content, which will be rendered if the slot is not used in the template.

#### /site/layouts/default.php
```html
<html>
    <head>
        <?php slot('head') ?>
        <title>Blog</title>
        <?php endslot() ?>
    </head>
    <body>
      <div class="page">

        <header class="header">
          <a href="/">Logo</a>
        </header>

        <div class="sidebar">
          <?php slot('sidebar') ?>
          <!-- default sidebar setup -->
          <?php endslot() ?>
        </div>

        <main class="main">
          <h1>Blog</h1>
          <?php slot() ?>
          <!-- this is the default slot -->
          <?php endslot() ?>
       </main>
     </div>
  </body>
</html>
```

Once the slots are defined, you can fill them from your template. If you use multiple slots, you must wrap content for each slot in the `slot` and `endslot` methods.

#### /site/templates/blog.php
```html
<?php slot('sidebar') ?>
<nav>
  <!-- a custom sidebar menu -->
</nav>
<?php endslot() ?>

<?php slot() ?>
<!-- html for the default slot -->
<?php endslot() ?>
```

### Working with snippets

Kirby's template system stays exactly as you know it. You can still work with templates without layouts and you can also still use snippets – in your templates and in your layouts.

#### /site/layouts/default.php
```html
<html>
    <head>
        <?php slot('head') ?>
        <title>Blog</title>
        <?php endslot() ?>
    </head>
    <body>
      <div class="page">

        <?php snippet('header') ?>

        <div class="sidebar">
          <?php slot('sidebar') ?>
          <?php snippet('sidebar') ?>
          <?php endslot() ?>
        </div>

        <main class="main">
          <h1>Blog</h1>
          <?php slot() ?>
          <!-- this is the default slot -->
          <?php endslot() ?>
       </main>
     </div>
  </body>
</html>
```

### Global layout data

You can pass global data to the layout method and make it available in every slot and snippet of your layout.

#### /site/layouts/default.php
```html
<html>
    <head>
        <?php slot('head') ?>
        <title><?= $title ?></title>
        <?php endslot() ?>
    </head>
    <body>
      <div class="page">

        <?php snippet('header') ?>

        <div class="sidebar">
          <?php slot('sidebar') ?>
          <?php snippet('sidebar') ?>
          <?php endslot() ?>
        </div>

        <main class="main">
          <h1>Blog</h1>
          <?php slot() ?>
          <!-- this is the default slot -->
          <?php endslot() ?>
       </main>
     </div>
  </body>
</html>
```

#### /site/templates/blog.php
```html
<?php layout('blog', ['title' => 'Blog') ?>

Some more content ...
```

## What’s Kirby?

- **[getkirby.com](https://getkirby.com)** – Get to know the CMS.
- **[Try it](https://getkirby.com/try)** – Take a test ride with our online demo. Or download one of our kits to get started.
- **[Documentation](https://getkirby.com/docs/guide)** – Read the official guide, reference and cookbook recipes.
- **[Issues](https://github.com/getkirby/kirby/issues)** – Report bugs and other problems.
- **[Feedback](https://feedback.getkirby.com)** – You have an idea for Kirby? Share it.
- **[Forum](https://forum.getkirby.com)** – Whenever you get stuck, don't hesitate to reach out for questions and support.
- **[Discord](https://chat.getkirby.com)** – Hang out and meet the community.
- **[Mastodon](https://mastodon.social/@getkirby)** – Spread the word.
- **[Instagram](https://www.instagram.com/getkirby/)** – Share your creations: #madewithkirby.

---

## License

MIT

## Credits

- [Kirby Team](https://getkirby.com)
