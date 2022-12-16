<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;
use Source\Models\Show;

class Adm
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(CONF_VIEW_ADMIN,'php');
    }

    public function home() : void
    {
        $show = new Show();
        $shows = $show->selectAll();

        echo $this->view->render("home",
            [
                // "categories" => $this->categories,
                "shows" => $shows
            ]
        );
    }

}