<?php 


class Message {
    private $sender;
    private $receiver;
    private $messageText;
    private $creationTime;
    private $messageType;

    public function __construct($sender, $receiver, $messageText, $messageType) {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->messageText = $messageText;
        $this->creationTime = time();
        $this->messageType = $messageType;
    }

    public function getSenderFullName() {
        return $this->sender->getFullName();
    }

    public function getReceiverFullName() {
        return $this->receiver->getFullName();
    }

    public function getMessageText() {
        return $this->messageText;
    }

    public function getMessageType() {
        return $this->messageType;
    }

    public function getFormattedCreationTime() {
        return date('Y-m-d H:i:s', $this->creationTime);
    }

    public function saveMessage() {
        if ($this->messageType == "System" && $this->sender->getUserType() == "Teacher" && $this->receiver->getUserType() == "Student") {
            return true;
        } else if ($this->messageType == "Manual" && $this->sender->getUserType() == "Parent_p" && $this->receiver->getUserType() == "Teacher") {
            return true;
        } else {
             echo "Teacher can only send System messages";
             return false;
        }
    }
}


?>