<?php
namespace App\RobotHash;

use App\Avatar\Avatar;
use App\Avatar\AvatarClientInterface;

class RobotHashAvatar extends Avatar {
    protected function getClient(): AvatarClientInterface
    {
        return RobotHashClient::getInstance();
    }
}