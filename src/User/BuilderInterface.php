<?php

namespace App\User;

interface BuilderInterface {
    function addNames(string $firstname, string $lastname): UserBuilder;
    function addPhone(string $phone): UserBuilder;
    function addEmail(string $email): UserBuilder;
    function addAddress(string $address): UserBuilder;
    function build(): User;
}