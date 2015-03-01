<?php

/**
 * Class which represents a standard Address format
 *
 * @author Iain Workman 11139430
 */
class Address {

    // Constructor
    function Address($buildingNumber, $streetName, $townName, $region, $country, $postCode) {
        $this->buildingNumber = $buildingNumber;
        $this->streetName_ = $streetName;
        $this->townName_ = $townName;
        $this->region_ = $region;
        $this->country_ = $country;
        $this->postCode_ = $postCode;
    }

    // Functions
    function getBuildingNumber() {
        return $this->buildingNumber_;
    }

    function setBuildingNumber($buildingNumber) {
        $this->buildingNumber_ = $buildingNumber;
    }

    function getStreetName() {
        return $this->streetName_;
    }

    function setStreetName($streetName) {
        $this->streetName_ = $streetName;
    }

    function getTownName() {
        return $this->town_;
    }

    function setTownName($town) {
        $this->town_ = $town;
    }

    function getRegion() {
        return $this->region_;
    }

    function setRegion($region) {
        $this->region_ = $region;
    }

    function getCountry() {
        return $this->country_;
    }

    function setCountry($country) {
        $this->country_ = $country;
    }

    function getPostCode() {
        return $this->postCode_;
    }

    function setPostCode($postCode) {
        $this->postCode_ = $postCode;
    }

    // Member Variables
    private $buildingNumber_;
    private $streetName_;
    private $town_;
    private $region_;
    private $country_;
    private $postCode_;

}
