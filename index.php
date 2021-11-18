<?php

include_once __DIR__ . '/helpers.php';

load([
    'kirby\\layouts\\layout'   => __DIR__ . '/src/Layout.php',
    'kirby\\layouts\\slots'    => __DIR__ . '/src/Slots.php',
    'kirby\\layouts\\template' => __DIR__ . '/src/Template.php',
]);

Kirby::plugin('getkirby/layouts', [
    'components' => [
        'template' => function (Kirby $kirby, string $name, string $type = 'html', string $defaultType = 'html') {
            return new Kirby\Layouts\Template($name, $type, $defaultType);
        },
    ]
]);
