<?php

namespace Kirby\Layouts;

use Kirby\Toolkit\Tpl;

/**
 * Layout
 *
 * @package   Kirby Layouts
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   MIT
 */
class Layout
{
    /**
     * @var string|null
     */
    static public $name = null;

    /**
     * @var array|null
     */
    static public $data = null;

    /**
     * Starts a new layout
     *
     * @param string|null $name
     * @param array|null $data
     * @return void
     */
    static public function start(?string $name = null, ?array $data = null): void
    {
        static::$name = $name ?? 'default';
        static::$data = $data ?? [];

        $kirby = kirby();
        $kirby->data = array_merge($kirby->data, Layout::$data);
    }

    /**
     * Renders a layout with all its slots
     *
     * @param array $data
     * @return string
     */
    static public function render(array $data = []): string
    {
        Slots::render();
        return Tpl::load(kirby()->root('site') . '/layouts/' . static::$name . '.php', array_merge(Layout::$data ?? [], $data));
    }
}
