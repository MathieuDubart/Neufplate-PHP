<?php

namespace App\User;

use Error;

class UserBuilder implements BuilderInterface
{
    public User $user;
    private string $_firstname;
    private string $_lastname;
    private string $_phone;
    private string $_email;
    private string $_address;

    function __construct() {}

    public function addNames(string $firstname, string $lastname): UserBuilder {
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        return $this;
    }

    public function addPhone(string $phone): UserBuilder {
        $this->_phone = $phone;
        return $this;
    }

    public function addEmail(string $email): UserBuilder {
        $this->_email = $email;
        return $this;
    }

    public function addAddress(string $address): UserBuilder
    {
        $this->_address = $address;
        return $this;
    }

    private function _validate(): void {
        if (empty($this->_firstname) || empty($this->_lastname)) {
            throw new Error("Firstname and lastname can't be empty.");
        }

        if (empty($this->_phone) && empty($this->_email)) {
            throw new Error("User need to have at least a phone number or an email set.");
        }
    }

    public function build():User {
        $this->_validate();
        $this->user = new User();

        $this->user->firstname = $this->_firstname;
        $this->user->lastname = $this->_lastname;

        if (!empty($this->_phone)) {
            $this->user->phone = $this->_phone;
        }
        if(!empty($this->_email)) {
            $this->user->email = $this->_email;
        }
        if(!empty($this->_address)) {
            $this->user->address = $this->_address;
        }

        return $this->user;
    }
}