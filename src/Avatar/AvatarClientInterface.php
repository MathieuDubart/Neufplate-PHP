<?php
namespace App\Avatar;

interface AvatarClientInterface {
    public function getRandomAvatarUrl(): string;
    public function getAvatarFromUrl(string $seed): string;
}
