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

    /**
     * @param $id
     * @param $day
     * @param $name
     * @param $local
     * @param $image
     * @param $idCategory
     */
    public function __construct(
        int $id = null,
        string $day = null,
        string $name = null,
        string $local = null,
        string $image = null,
        int $idCategory = null)
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
}