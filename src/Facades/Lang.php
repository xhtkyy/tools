<?php

namespace KyyTools\Facades;

use Illuminate\Support\Facades\Facade;
use KyyTools\Language\TransInterface;
use KyyTools\Language\Translate;

/**
 * @method static string|array trans(string|array|object $input, int|string|null $type = null)
 * @method static TransInterface getTranslator(int|null $type)
 */
class Lang extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string {
        return Translate::class;
    }
}
