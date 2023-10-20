<?php

namespace App\States;

use App\Neufplate;
use App\NotificationsListeners\EmailNotificationsListeners;
use App\NotificationsListeners\MessageNotificationsListeners;

class MakingCollisionState extends State
{
    protected Neufplate $neufplate;

    function __construct(Neufplate $neufplate) {
        parent::__construct($neufplate);
    }

    function onTitling(): ?string
    {
        return null;
    }

    function onMakingCollision(): ?string
    {
        $this->attach(new EmailNotificationsListeners($this->neufplate->user, $this->neufplate->nft));
        $this->attach(new MessageNotificationsListeners($this->neufplate->user, $this->neufplate->nft));

        $nonce = 0;
        $hash = "";

        while (!str_starts_with($hash, "0000")) {
            $hash = sha1($nonce . "#" . $this->neufplate->nft->title);
            $nonce += 1;
        }

        $this->neufplate->nft->hash = $hash;
        $this->neufplate->nft->nonce = $nonce;

        $this->notify();
        $this->neufplate->changeState(new GeneratingClassState($this->neufplate));
        $this->neufplate->state->onGenerate();
        return $hash;
    }

    function onGenerate(): ?string
    {
        return null;
    }
}