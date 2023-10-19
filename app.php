<?php

use App\DiceBear\DiceBearAvatar;
use App\DiceBear\DiceBearClient;
use App\Neufplate;
use App\Provider\Provider;
use App\RobotHash\RobotHashAvatar;
use App\RobotHash\RobotHashClient;
use App\DiceBear\SpriteTypeDiceBear;
use App\RobotHash\SpriteTypeRobotHash;
use App\User\UserBuilder;
use App\Provider\ProviderEnum;

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

echo "\n";

$provider = new Provider(ProviderEnum::ROBOTHASH, SpriteTypeRobotHash::HEADS);
$neufplate = new Neufplate();
$nft = $neufplate->process($user, $provider);

echo "LE NFT LOL " . $nft->title . " - " . $nft->hash . " - " . $nft->avatar->url;