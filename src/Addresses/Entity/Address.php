<?php

namespace App\Addresses\Entity;

class Address
{
    protected $id;

    protected $number;

    protected $street;

    protected $city;

    protected $country;

    public function __construct($id, $number, $street, $city, $country)
    {
        $this->id = $id;
        $this->number = $number;
        $this->street = $street;
        $this->city = $city;
        $this->country = $country;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNumber()
    {
        return $this->number;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['number'] = $this->number;
        $array['street'] = $this->street;
        $array['city'] = $this->city;
        $array['country'] = $this->country;

        return $array;
    }
}
