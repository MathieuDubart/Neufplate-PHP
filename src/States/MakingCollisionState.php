<?php

namespace App\States;

use App\Neufplate;

class MakingCollisionState extends State
{
    protected Neufplate $neufplate;

    function __construct(Neufplate $neufplate) {
        parent::__construct($neufplate);
    }

    function onTitling(): ?string
    {
        return null;
    }

    function onMakingCollision(): ?string
    {
        $nonce = 0;
        $hash = "";

        while (!str_starts_with($hash, "0000")) {
            $hash = sha1($nonce . "#" . $this->neufplate->nft->title);
            $nonce += 1;
        }

        $this->neufplate->nft->hash = $hash;
        $this->neufplate->changeState(new GeneratingClassState($this->neufplate));
        $this->neufplate->state->onGenerate();
        return $hash;
    }

    function onGenerate(): ?string
    {
        return null;
    }
}