<?php

use App\Neufplate;
use App\Provider\Provider;
use App\RobotHash\SpriteTypeRobotHash;
use App\User\UserBuilder;
use App\Provider\ProviderEnum;

require __DIR__ . "/vendor/autoload.php";

$builder = new UserBuilder();
$user = $builder
    ->addNames("John", "Doe")
    ->addAddress("Fake address 1234")
    ->addPhone("0701234567")
    ->addEmail("john.doe@example.com")
    ->build();

$provider = new Provider(ProviderEnum::ROBOTHASH, SpriteTypeRobotHash::HEADS);
$neufplate = new Neufplate();

$nft = $neufplate->process($user, $provider);
echo "LE NFT LOL " . $nft->title . " - " . $nft->hash . " - " . $nft->avatar->url;