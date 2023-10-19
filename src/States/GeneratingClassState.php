<?php

namespace App\States;

use App\DiceBear\DiceBearAvatar;
use App\Neufplate;
use App\Provider\ProviderEnum;
use App\RobotHash\RobotHashAvatar;

class GeneratingClassState extends State
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
        return null;
    }

    function onGenerate(): ?string
    {
        switch ($this->neufplate->provider->providerType) {
            case ProviderEnum::DICEBEAR:
                $avatar = new DiceBearAvatar($this->neufplate->provider->spriteType);
                break;
            case ProviderEnum::ROBOTHASH:
                $avatar = new RobotHashAvatar($this->neufplate->provider->spriteType);

        }
        $avatar->generate($this->neufplate->nft->hash);
        $this->neufplate->nft->avatar = $avatar;
        array_push($this->neufplate->user->nftList, $avatar);
        return $avatar->url;
    }
}