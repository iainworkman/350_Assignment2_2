<?php
require_once 'Address.php';
/**
 * A class representing a Contact's details, including FirstName, LastName,
 * Email, Phone etc.
 *
 * @author Iain Workman 11139430
 */
class Contact {

    // Constructor
    function Contact($contactId = -1, $firstName = "", $lastName = "",
            $company = "", $phone = "", $email = "", $url = "", 
            $buildingNumber = "", $streetName = "", $townName = "", 
            $region = "", $country = "", $postCode = "", $birthday = null, 
            $date=null) {
        $this->contactId_ = $contactId;
        $this->firstName_ = $firstName;
        $this->lastName_ = $lastName;
        $this->company_ = $company;
        $this->phone_ = $phone;
        $this->email_ = $email;
        $this->url_ = $url;
        $this->birthday_ = $birthday;
        $this->date_ = $date;
        $this->address_ = new Address($buildingNumber, $streetName, $townName, 
                $region, $company, $postCode);
        $this->hasChanged_ = false;
    }

    // Public Functions
    function hasChanged() {
        return $this->hasChanged_;
    }
    
    function getFirstName() {
        return $this->firstName_;
    }

    function setFirstName($firstName) {
        $this->firstName_ = $firstName;
        $this->hasChanged_ = true;
    }

    function getLastName() {
        return $this->lastName_;
    }

    function setLastName($lastName) {
        $this->lastName_ = $lastName;
        $this->hasChanged_ = true;
    }

    function getFullName() {
        if($this->lastName_ === "") {
            return $this->firstName_;
        } else if ($this->firstName_ === "") {
            return $this->lastName_;
        } else {
            return $this->lastName_ . ", " . $this->firstName_;
        }
    }
    
    function getCompany() {
        return $this->company_;
    }
    
    function setCompany($company) {
        $this->company_ = $company;
        $this->hasChanged_ = true;
    }
    
    function getPhone() {
        return $this->phone_;
    }
    
    function setPhone($phone) {
        $this->phone_ = $phone;
    }
    
    function getEmail() {
        return $this->email_;
    }
    
    function setEmail($email) {
        $this->email_ = $email;
        $this->hasChanged_ = true;
    }
    
    function getUrl() {
        return $this->url_;
    }
    
    function setUrl($url) {
        $this->url_ = $url;
        $this->hasChanged_ = true;
    }
    
    function getBirthday() {
       return $this->birthday_; 
    }
    
    function setBirthday($birthday) {
        $this->birthday_ = $birthday;
        $this->hasChanged_ = true;
    }

    function getDate() {
        return $this->date_;
    }
    
    function setDate($date) {
        $this->date_ = $date;
        $this->hasChanged_ = true;
    }
    
    function getAddress() {
        return $this->address_;
    }
    
    // Static Functions
    
    // Private Member Variables
    private $contactId_;
    private $firstName_;
    private $lastName_;
    private $company_;
    private $phone_;
    private $email_;
    private $url_;
    private $birthday_;
    private $date_;
    private $address_;
    private $hasChanged_;

}
