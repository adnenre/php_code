<?php

namespace App\User;

class Profile {
    private $user;
    private $bio;

    public function __construct(User $user, string $bio) {
        $this->user = $user;
        $this->bio = $bio;
    }

    public function getBio() {
        return $this->user->getName() . ' ' . $this->bio;
    }
}
