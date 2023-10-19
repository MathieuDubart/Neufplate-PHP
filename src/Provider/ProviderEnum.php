<?php

namespace App\Provider;

use App\DiceBear\DiceBearAvatar;
use App\Avatar\AvatarClientInterface;

enum ProviderEnum {
    case DICEBEAR;
    case ROBOTHASH;
}