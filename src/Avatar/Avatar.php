<?php

namespace App\Avatar;

abstract class Avatar {
    public string $url;

    public function generate($withHash = null):void {
        $client = $this->getClient();

        if ($withHash === null) {
            $this->url = $client->getRandomAvatarUrl();
        } else {
            $this->url = $client->getAvatarFromUrl($withHash);
        }
    }

    protected abstract function getClient(): AvatarClientInterface;
}