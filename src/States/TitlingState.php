<?php

namespace App\States;

use App\Neufplate;
use App\NFT\CorporateBsClient;

class TitlingState extends State
{
    protected Neufplate $neufplate;

    function __construct(Neufplate $neufplate) {
        parent::__construct($neufplate);
    }

    function onTitling(): ?string
    {
        $nftTitle = CorporateBsClient::getInstance()->generateCorporateBs();
        $this->neufplate->nft->title = $nftTitle;


        $this->neufplate->changeState(new MakingCollisionState($this->neufplate));
        $this->neufplate->state->onMakingCollision();
        return $nftTitle;
    }

    function onMakingCollision(): ?string
    {
        return null;
    }

    function onGenerate(): ?string
    {
        return null;
    }
}