<?php

namespace App\Provider;

use App\Avatar\Avatar;
use App\Avatar\AvatarClientInterface;
use App\DiceBear\DiceBearAvatar;
use App\RobotHash\RobotHashAvatar;

class Provider
{
    public ProviderEnum $providerType;
    public $spriteType;
    function __construct(ProviderEnum $providerType, $spriteType) {
        $this->spriteType = $spriteType;
        $this->providerType = $providerType;
    }




}