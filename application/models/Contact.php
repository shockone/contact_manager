<?php

class Contact extends ApplicationModel {
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $birth_date;

    protected $home_phone;
    protected $work_phone;
    protected $cell_phone;

    protected $address;
    protected $city;
    protected $state;
    protected $country;
    protected $zip;

    protected $second_address;
    protected $second_city;
    protected $second_state;
    protected $second_country;
    protected $second_zip;

    function getBirthDate(){
        if ($this->birth_date != '0000-00-00'){
            return '(' . date('jS F Y', strtotime($this->birth_date)) . ')';
        }
        return '';
    }

    protected function validate(){
        return  $this->validateEmail($this->email) &&
                $this->validatePresence($this->first_name) &&
                $this->validatePresence($this->last_name);
    }

}