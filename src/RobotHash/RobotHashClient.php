<?php
namespace App\RobotHash;

use App\Avatar\AvatarClientInterface;

class RobotHashClient implements AvatarClientInterface {
    private static $_instance = null;
    private static $_spriteType = "set1";
    private static $_apiUrl = "https://robohash.org/";

    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new RobotHashClient();
        }
        return self::$_instance;
    }

    public function getRandomAvatarUrl(): string  {
        return self::$_apiUrl . ":". rand(0, 10000) .".svg?set=" . self::$_spriteType;
    }

    public function getAvatarFromUrl(string $seed): string  {
        return self::$_apiUrl . ":". $seed .".svg?set=" . self::$_spriteType;
    }

    function setSpriteType(SpriteTypeRobotHash $newSpriteType) {
        self::$_spriteType = $newSpriteType->value;
    }
}