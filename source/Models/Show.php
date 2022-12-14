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


    public function __construct(
        int $id = null,
        string $day = null,
        string $name = null,
        string $local = null,
        string $image = null,
        int $idCategory = null
        )
    {
        $this->id = $id;
        $this->day = $day;
        $this->name = $name;
        $this->local = $local;
        $this->image = $image;
        $this->idCategory = $idCategory;
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
    public function getJSON() : string
    {
        return json_encode(
            ["user" => [
                "day" => $this->getDay(),
                "name" => $this->getName(),
                "local" => $this->getLocal(),
                "image" => $this->getImage(),

                // private $day;
                // private $name;
                // private $local;
                // private $image;

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
}