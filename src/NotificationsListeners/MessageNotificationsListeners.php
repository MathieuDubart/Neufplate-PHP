<?php

namespace App\NotificationsListeners;

use App\NFT\Nft;
use App\User\User;
use SplObserver;
use SplSubject;

class MessageNotificationsListeners implements SplObserver
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
        echo "SMS à " . $this->user->phone . ": Voici votre certificat de propriété : " . $this->nft->nonce . PHP_EOL;
    }
}