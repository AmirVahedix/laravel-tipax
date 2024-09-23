<?php

namespace AmirVahedix\Tipax\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AmirVahedix\Tipax\Tipax
 */
class Tipax extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AmirVahedix\Tipax\Tipax::class;
    }
}
