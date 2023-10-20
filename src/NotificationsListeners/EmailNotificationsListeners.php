<?php

namespace App\NotificationsListeners;

use App\NFT\Nft;
use App\User\User;
use SplObserver;
use SplSubject;

class EmailNotificationsListeners implements SplObserver
{
    public User $user;
    public Nft $nft;

    public function __construct(User $user, Nft $nft)
    {
        $this->user = $user;
        $this->nft = $nft;
    }

    public function update(SplSubject $subject): void
    {
        echo "Mail à " . $this->user->email . ": Voici votre certificat de propriété : " . $this->nft->nonce . PHP_EOL;
    }
}