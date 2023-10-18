<?php

namespace App\User;

class User
{
    public string $firstname;
    public string $lastname;
    public array $avatar;
    public string $phone;
    public string $email;
    public string $address;

    public function __toString(): string
    {
        if (empty($this->email)) {
            return $this->firstname . " - " . $this->lastname . " - "  . $this->phone . " - " . $this->address;
        }

        if (empty($this->phone)) {
            return $this->firstname . " - " . $this->lastname . " - " . $this->email . " - " . $this->address;
        }

        return $this->firstname . " - " . $this->lastname . " - " . $this->email . " - " . $this->phone . " - " . $this->address;
    }


}