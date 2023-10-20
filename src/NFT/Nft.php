<?php

namespace App\NFT;
use App\Avatar\Avatar;

class Nft
{
    public string $title;
    public string $hash;
    public Avatar $avatar;
    public int $nonce;
}