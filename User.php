<?php 
class User {
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $profilePhoto;
    private $salutation;
    private $userType;

    public function __construct($id, $firstName, $lastName, $email, $userType, $profilePhoto = null, $salutation = null) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->userType = $userType;
        $this->profilePhoto = $profilePhoto;
        $this->salutation = $salutation;
    }

    public function getFullName() {
        if ($this instanceof Student) {
            return $this->firstName . ' ' . $this->lastName;
        } else {
            return $this->salutation . ' ' . $this->firstName . ' ' . $this->lastName;
        }
    }

    public function getProfilePicture() {
        if ($this->profilePhoto) {
            return $this->profilePhoto;
        } else {
            return '/path/to/default/avatar.jpg';
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId() {
        return $this->id;
    }

    public function save() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        if ($this->profilePhoto && strpos($this->profilePhoto, '.jpg') === false) {
            return false;
        }
        return true;
    }
}


?>