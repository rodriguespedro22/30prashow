<?php

namespace Source\Models;

use Source\Core\Connect;

class Buy{

    private $id;
    private $idClient;
    private $idShow;


public function insert() : bool
    {
        $query = "INSERT INTO buy_show (idClient, idShow) VALUES (:idClient, :idShow)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idClient", $this->idClient);
        $stmt->bindParam(":idShow", $this->idShow);
        $stmt->execute();
        $this->id = Connect::getInstance()->lastInsertId();
        return true;
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
	public function getidClient() {
		return $this->idClient;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdShow() {
		return $this->idShow;
	}
    public function __construct($id, $idClient, $idShow)
    {
        $this->id = $id;
        $this->idClient = $idClient;
        $this->idShow = $idShow;
    }

    
}