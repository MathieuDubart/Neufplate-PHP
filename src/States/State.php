<?php

namespace App\States;

use App\Neufplate;

abstract class State
{
    protected Neufplate $neufplate;

    function __construct(Neufplate $neufplate)
    {
        $this->neufplate = $neufplate;
    }

    abstract function onTitling(): ?string;
    abstract function onMakingCollision(): ?string;
    abstract function onGenerate(): ?string;
}