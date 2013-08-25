<?php 

class Contact {
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const PHONE = 'phone';
    const EMAIL = 'email';
    const ADDRESS = 'address';
    const PHOTO = 'photo';

    protected $firstName;
    protected $lastName;
    protected $phone;
    protected $email;
    protected $address;
    protected $photo;

	public function __construct($firstName, $lastName, $phone, $email, $address, $photo) {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->phone     = $phone;
        $this->email     = $email;
        $this->address   = $address;
        $this->photo     = $photo;

    }

    public function save() {
    }

    public function getByID($id) {
        $id = (int)$id;
    }

    public function all() {
    }

}