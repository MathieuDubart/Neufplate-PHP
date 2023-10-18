<?php
namespace App\DiceBear;

use App\Avatar\Avatar;
use App\Avatar\AvatarClientInterface;

class DiceBearAvatar extends Avatar {

    protected function getClient(): AvatarClientInterface
    {
        return DiceBearClient::getInstance();
    }
}