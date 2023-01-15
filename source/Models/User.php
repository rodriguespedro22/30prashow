<?php

namespace Source\Models;

use Source\Core\Connect;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $photo;
    private $type;
    private $message;
    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @param string|null $photo
     */
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }
    

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }


    public function __construct(
        int $id = NULL,
        string $name = NULL,
        string $email = NULL,
        string $password = NULL,
        string $photo = NULL,
        string $type = 'C'
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->photo = $photo;
        $this->type = $type;
    }

    /**
     * @return array|false
     */
    public function selectAll ()
    {
        $query = "SELECT * FROM users";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    /**
     * @return bool
     */
    public function findById() : bool
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetch();
            // $this->name = $user->name;
            // $this->email = $user->email;
            // $this->photo = $user->photo;
            // return true;
        }
    }
    public function getById(?int $id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $idQuery = "";
        if (empty($id)) {
            $idQuery = $this->id;
        } else {
            $idQuery = $id;
        }
        $stmt->bindParam(":id", $idQuery);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        }
        return $stmt->fetch();
    }
    /**
     * @param string $email
     * @return bool
     */
    public function findByEmail(string $email) : bool
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function validate (string $email, string $password) : bool
    {
        $query = "SELECT * FROM users WHERE email LIKE :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            $this->message = "Usuário e/ou Senha não cadastrados!";
            return false;
        } else {
            $user = $stmt->fetch();
            if(!password_verify($password, $user->password)){
                $this->message = "Usuário e/ou Senha não cadastrados!";
                return false;
            }
        }
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->photo = $user->photo;
        $this->message = "Usuário Autorizado, redirect to APP!";

        $arrayUser = [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "photo" => $this->photo
        ];

        $_SESSION["user"] = $arrayUser;
        setcookie("user","Logado",time()+60*60,"/");
        return true;
    }

    /**
     * @return bool
     */
    public function insert() : bool
    {
        $query = "INSERT INTO users (name, email, password, type) VALUES (:name, :email, :password, :type)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":type",$this->type);
        $stmt->bindValue(":password", password_hash($this->password,PASSWORD_DEFAULT));
        $stmt->execute();
        $this->id = Connect::getInstance()->lastInsertId();
        $this->message = "Usuário cadastrado com sucesso!";
        $_SESSION["user"] = $this;
        return true;
    }

    public function update()
    {
        $query = "UPDATE users SET name = :name, email = :email, photo = :photo WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":photo",$this->photo);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        $arrayUser = [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "photo" => $this->photo
        ];
        $_SESSION["user"] = $arrayUser;
        $this->message = "Usuário alterado com sucesso!";
    }


    public function getJSON() : string
    {
        return json_encode(
            ["user" => [
                "id" => $this->getId(),
                "name" => $this->getName(),
                "email" => $this->getEmail()
            ]], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function getArray() : array
    {
        return ["user" => [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "photo" => $this->getPhoto()
        ]];
    }

    

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}
	
	/**
	 * @param mixed $type 
	 * @return self
	 */
	public function setType($type): self {
		$this->type = $type;
		return $this;
	}
}