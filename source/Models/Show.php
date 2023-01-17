<?php

namespace Source\Models;

use Source\Core\Connect;

class Show
{
    private $id;
    private $day;
    private $name;
    private $local;
    private $image;
    private $idCategory;

    private $message;


    public function __construct(
        int $id = null,
        string $day = null,
        string $name = null,
        string $local = null,
        string $image = null,
        int $idCategory = null,
        string $message = null
        )
    {
        $this->id = $id;
        $this->day = $day;
        $this->name = $name;
        $this->local = $local;
        $this->image = $image;
        $this->idCategory = $idCategory;
        $this->message = $message;

    }

    public function selectAll()
    {
        $query = "SELECT * FROM shows";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function insert() : bool
    {
        $query = "INSERT INTO shows (day, name, local, image, idCategory) VALUES (:day, :name, :local, :image, :idCategory)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":day", $this->day);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":local", $this->local);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":idCategory", $this->idCategory);
        $stmt->execute();
        $this->id = Connect::getInstance()->lastInsertId(); // armazena o id do show incluido
        $this->message = "Show cadastrado!";
        // $_SESSION["work"] = $this->image;
        return true;
    }

    public function findByCategory(int $idCategory)
    {
        $query = "SELECT * FROM shows WHERE idCategory = :idCategory";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idCategory",$idCategory);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function findById() : bool
    {
        $query = "SELECT * FROM shows WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            $show = $stmt->fetch();
            $this->name = $show->name;
            $this->local = $show->local;
            $this->idCategory = $show->idCategory;
            return true;
        }
    }
    public function getById(?int $id)
    {
        $query = "SELECT * FROM shows WHERE id = :id";
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
    public function getJSON() : string
    {
        return json_encode(
            ["user" => [
                "day" => $this->getDay(),
                "name" => $this->getName(),
                "local" => $this->getLocal(),
                "image" => $this->getImage(),

            ]], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function getArrayShows() : array
    {
        return [
            "day" => $this->getDay(),
            "name" => $this->getName(),
            "local" => $this->getLocal(),
            "image" => $this->getImage()
        ];
    }

    public function delete()
    {
        $query = "DELETE FROM shows WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return true;
    }

    public function getAllShows (){
        $query = "SELECT * FROM shows";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
    
    public function updateShoww()
    {
        $query = "UPDATE shows SET day = :day, name = :name, local = :local, image = :image WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":day",$this->day);
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":local",$this->local);
        $stmt->bindParam(":image",$this->image);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        $arrayShow = [
            "id" => $this->id,
            "day" => $this->day,
            "name" => $this->name,
            "local" => $this->local,
            "image" => $this->image
        ];
        $this->message = "Show alterado!";
        // $_SESSION["show"] = $arrayShow;
        // echo "Usuário alterado com sucesso!";
    }
    
    // public function findByidUser(int $idUser)
    // {
    //     $query = "SELECT * 
    //               FROM shows
    //               JOIN write_shows ON shows.id = write_shows.idShow 
    //               JOIN categories ON projects.idCategory = categories.id
    //               WHERE write_projects.idUser = :idUser";
    //     $stmt = Connect::getInstance()->prepare($query);
    //     $stmt->bindParam(":idUser", $idUser);
    //     $stmt->execute();

    //     if($stmt->rowCount() == 0){
    //         return false;
    //     } else {
    //         return $stmt->fetchAll();
    //     }

    // }
    
	/**
	 * @return mixed
	 */
	public function getIdCategory() {
		return $this->idCategory;
	}
	
	/**
	 * @param mixed $idCategory 
	 * @return self
	 */
	public function setIdCategory($idCategory): self {
		$this->idCategory = $idCategory;
		return $this;
	}

    /**
	 * @return mixed
	 */
	public function getMessage() {
		return $this->message;
	}
	
	/**
	 * @param mixed $message 
	 * @return self
	 */
	public function setMessage($message): self {
		$this->message = $message;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 * @param mixed $image 
	 * @return self
	 */
	public function setImage($image): self {
		$this->image = $image;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLocal() {
		return $this->local;
	}
	
	/**
	 * @param mixed $local 
	 * @return self
	 */
	public function setLocal($local): self {
		$this->local = $local;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param mixed $name 
	 * @return self
	 */
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDay() {
		return $this->day;
	}
	
	/**
	 * @param mixed $day 
	 * @return self
	 */
	public function setDay($day): self {
		$this->day = $day;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
    /**
	 * @param mixed $id
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
}