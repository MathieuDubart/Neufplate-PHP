<?php
namespace App\DiceBear;

use App\Avatar\Avatar;
use App\Avatar\AvatarClientInterface;

class DiceBearAvatar extends Avatar {
    private SpriteTypeDiceBear $spriteType;
    function __construct(SpriteTypeDiceBear $spriteType = SpriteTypeDiceBear::LORELEI)
    {
        $this->spriteType = $spriteType;
    }

    protected function getClient(): AvatarClientInterface
    {
        DiceBearClient::getInstance()->setSpriteType($this->spriteType);
        return DiceBearClient::getInstance();
    }
}