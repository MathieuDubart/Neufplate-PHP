<?php
namespace App\RobotHash;

use App\Avatar\Avatar;
use App\Avatar\AvatarClientInterface;

class RobotHashAvatar extends Avatar {
    private SpriteTypeRobotHash $spriteType;
    function __construct(SpriteTypeRobotHash $spriteType = SpriteTypeRobotHash::ROBOTS)
    {
        $this->spriteType = $spriteType;
    }
    protected function getClient(): AvatarClientInterface
    {
        RobotHashClient::getInstance()->setSpriteType($this->spriteType);
        return RobotHashClient::getInstance();
    }
}