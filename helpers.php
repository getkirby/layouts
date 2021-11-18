<?php

function layout($name = null, ?array $data = null)
{
    if (is_array($name) === true) {
        $data = $name;
        $name = null;
    }

    Kirby\Layouts\Layout::start($name, $data);
}

function slot(?string $name = null)
{
    Kirby\Layouts\Slots::start($name);
}

function endslot()
{
    echo Kirby\Layouts\Slots::end();
}
