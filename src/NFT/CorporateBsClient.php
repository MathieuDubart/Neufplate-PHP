<?php

namespace App\NFT;

use App\RobotHash\RobotHashClient;

class CorporateBsClient {
    private static $_instance = null;
    private const apiUrl = "https://corporatebs-generator.sameerkumar.website/";

    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new CorporateBsClient();
        }
        return self::$_instance;
    }

    private static function makeRequest(): string {
        return file_get_contents(self::apiUrl);
    }

    private static function parseJson(string $json) {
        $decoded_json = json_decode($json, false);
        return $decoded_json->phrase;
    }
}