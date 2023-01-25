<?php
namespace Source\Models;

use Source\Core\Connect;

class Address{

    private $id;
    private $idShow;
    private $city;
    private $state;
    private $zipCode;

    public function __construct(
        int $id = NULL,
        int $idShow = NULL,
        string $city = NULL,
        string $state = NULL,
        string $zipCode = NULL
    )
    {
        $this->id = $id;
        $this->idShow = $idShow;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
    }

    public function selectAll()
    {
        $query = "SELECT * FROM addresses";
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
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getIdShow() {
		return $this->idShow;
	}

	/**
	 * @return mixed
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @return mixed
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @return mixed
	 */
	public function getZipCode() {
		return $this->zipCode;
	}

	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @param mixed $city 
	 * @return self
	 */
	public function setCity($city): self {
		$this->city = $city;
		return $this;
	}

	/**
	 * @param mixed $state 
	 * @return self
	 */
	public function setState($state): self {
		$this->state = $state;
		return $this;
	}
}