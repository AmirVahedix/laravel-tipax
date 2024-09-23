<?php

use AmirVahedix\Tipax\Facades\Tipax;

it('can create a new TipaxService', function () {
    $result = Tipax::getCost(1001, 1003, 0.3);
    expect($result)->toBeFloat();
});

it('can create a new Tipax Facade', function () {
    expect(Tipax::getCost(1001, 1003, 0.3))->toBeFloat();
});
