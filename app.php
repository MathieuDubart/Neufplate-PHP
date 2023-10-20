<?php

use App\Neufplate;
use App\NFT\Provider\Provider;
use App\NFT\Provider\ProviderEnum;
use App\RobotHash\SpriteTypeRobotHash;
use App\User\UserBuilder;

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