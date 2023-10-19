<?php
namespace App\DiceBear;

use App\Avatar\AvatarClientInterface;

class DiceBearClient implements AvatarClientInterface
{
    private static $_instance = null;
    private static $_spriteType = "lorelei";
    private static $_apiUrl = "https://api.dicebear.com/7.x/";

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new DiceBearClient();
        }
        return self::$_instance;
    }

    public function getRandomAvatarUrl(): string
    {
        return self::$_apiUrl . self::$_spriteType . "/svg?seed=" . rand(0, 10000);
    }

    public function getAvatarFromUrl(string $seed, ): string  {
        return self::$_apiUrl . self::$_spriteType . "/svg?seed=" . $seed;
    }
    function setSpriteType(SpriteTypeDiceBear $newSpriteType)
    {
        self::$_spriteType = $newSpriteType->value;
    }
}