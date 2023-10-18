<?php

// -- DiceBear
use App\DiceBear\DiceBearAvatar;
// -- RobotHash
use App\DiceBear\DiceBearClient;
use App\RobotHash\RobotHashAvatar;
use App\RobotHash\RobotHashClient;
// -- SpriteTypes
use App\DiceBear\SpriteTypeDiceBear;
use App\RobotHash\SpriteTypeRobotHash;
// -- User
use App\User\UserBuilder;

require __DIR__ . "/vendor/autoload.php";

DiceBearClient::getInstance()->setSpriteType(SpriteTypeDiceBear::AVATAAARS);

$avatar = new DiceBearAvatar();
$avatar->generate();
echo $avatar->url;

echo "\n";

$avatar = new RobotHashAvatar();
$avatar->generate("lkkdoejdpejd");
echo $avatar->url;

echo "\n";

$builder = new UserBuilder();
$user = $builder
    ->addNames("John", "Doe")
    ->addAddress("Fake address 1234")
    ->addEmail("damien@dabernat.fr")
    ->build();

echo $user;