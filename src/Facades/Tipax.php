<?php

namespace AmirVahedix\Tipax\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AmirVahedix\Tipax\Tipax
 *
 * @method static float|int getCost(int $origin, int $destination, float $weight = 0.1)
 */
class Tipax extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AmirVahedix\Tipax\Tipax::class;
    }
}
