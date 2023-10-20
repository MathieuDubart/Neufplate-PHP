<?php

namespace App\States;

use App\Neufplate;
use App\NotificationsListeners\EmailNotificationsListeners;
use SplObjectStorage;
use SplObserver;
use SplSubject;

abstract class State implements SplSubject
{
    protected Neufplate $neufplate;
    protected SplObjectStorage $observers;

    function __construct(Neufplate $neufplate)
    {
        $this->neufplate = $neufplate;
        $this->observers = new SplObjectStorage();
    }

    abstract function onTitling(): ?string;
    abstract function onMakingCollision(): ?string;
    abstract function onGenerate(): ?string;

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}