<?php 

class Teacher extends User {
    public function __construct(int $id, string $firstName, string $lastName, string $email, string $profilePhoto = null, string $salutation = null) {
        parent::__construct($id, $firstName, $lastName, $email, $profilePhoto, $salutation);
    }

    public function sendMessage(User $receiver, string $messageText, string $creationTime, string $messageType): Message {
        return new Message($this, $receiver, $messageText, $creationTime, $messageType);
    }
}

?>