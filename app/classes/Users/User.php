<?php

namespace App\Users;

class User
{

    private $data = [];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'surname' => null,
                'email' => null,
                'password' => null,
                'tel' => null,
                'adress' => null
            ];
        }
    }

    public function setData($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setName($array['name'] ?? null);
        $this->setSurname($array['surname'] ?? null);
        $this->setEmail($array['email'] ?? null);
        $this->setPassword($array['password'] ?? null);


        if (isset($array['tel'])) {
            $this->setTel($array['tel']);
        } else {
            $this->data['tel'] = null;
        }


        if (isset($array['adress'])) {
            $this->setAdress($array['adress']);
        } else {
            $this->data['adress'] = null;
        }
    }


public
function getData()
{
    return [
        'id' => $this->getId(),
        'name' => $this->getName(),
        'surname' => $this->getSurname(),
        'email' => $this->getEmail(),
        'password' => $this->getPassword(),
        'tel' => $this->getTel(),
        'adress' => $this->getAdress()
    ];
}

public
function setId(int $id)
{
    $this->data['id'] = $id;
}

public
function getId()
{
    return $this->data['id'];
}


public
function setName(String $name)
{
    $this->data['name'] = $name;
}

public
function getName()
{
    return $this->data['name'];
}

public
function setSurname(String $surname)
{
    $this->data['surname'] = $surname;
}

public
function getSurname()
{
    return $this->data['surname'];
}

public
function setEmail(String $email)
{
    $this->data['email'] = $email;
}

public
function setPassword(String $password)
{
    $this->data['password'] = $password;
}

public
function getEmail()
{
    return $this->data['email'];
}

public
function getPassword()
{
    return $this->data['password'];
}

public
function setTel(String $tel)
{
    $this->data['tel'] = $tel;
}

public
function getTel()
{
    return $this->data['tel'];
}

public
function setAdress(String $adress)
{
    $this->data['adress'] = $adress;
}

public
function getAdress()
{
    return $this->data['adress'];
}

}