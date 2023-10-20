<?php

namespace App;

use App\NFT\Nft;
use App\NFT\Provider\Provider;
use App\States\State;
use App\States\TitlingState;
use App\User\User;

class Neufplate {
    public State $state;
    public Nft $nft;
    public Provider $provider;
    public User $user;

    function __construct()
    {
        $this->state = new TitlingState($this);
    }

    function changeState(State $newState): void {
        $this->state = $newState;
    }

    function getState(): State {
        return $this->state;
    }

    function process(User $user, Provider $withAvatarProvider): Nft {
        $this->provider = $withAvatarProvider;
        $this->user = $user;
        $this->nft = new Nft();
        $this->state->onTitling();

        return $this->nft;
    }
}