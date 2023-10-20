<?php

namespace App\NFT\Provider;

class Provider
{
    public ProviderEnum $providerType;
    public $spriteType;
    function __construct(ProviderEnum $providerType, $spriteType) {
        $this->spriteType = $spriteType;
        $this->providerType = $providerType;
    }




}