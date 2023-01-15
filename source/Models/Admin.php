<?php

namespace Source\Models;
use Source\Core\Connect;

class Admin
{
    private $id;
    private $name;
    private $email;
    private $password;

    /**
     * @param $id
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($id = null, $name = null, $email = null, $password = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function validate (string $email, string $password) : bool
    {
        $query = "SELECT * FROM admin WHERE email LIKE :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        }else {
            $adm = $stmt->fetch();
            if(!password_verify($password, $adm->password)){
                return false;
            }
        }

        $this->id = $adm->id;
        $this->name = $adm->name;
        $this->email = $adm->email;

        $arrayAdmin = [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
        ];

        $_SESSION["admin"] = $arrayAdmin;
        return true;
    }


    /**
     * @return bool
     */
    public function findById() : bool
    {
        $query = "SELECT * FROM admin WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            $adm = $stmt->fetch();
            $this->name = $adm->name;
            $this->email = $adm->email;
            return true;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}