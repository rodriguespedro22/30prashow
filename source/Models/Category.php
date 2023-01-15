<?php

namespace Source\Models;

use Source\Core\Connect;

class Category
{
    private $id;
    private $singer;

    /**
     * @param $id
     * @param $singer
     */
    public function __construct($id = null, $singer = null)
    {
        $this->id = $id;
        $this->singer = $singer;
    }

    public function selectAll()
    {
        $query = "SELECT * FROM categories";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

}