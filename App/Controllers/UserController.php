<?php
//namespace App\Controllers;
//use Core;

class UserController
{
    public function MainAction()
    {
        include "App/Views/main.php";
        //echo 'MainAction';
    }

    public function CreateAction()
    {
        include "App/Views/create.php";
    }

    public function ViewAction()
    {
        include "App/Views/view.php";
    }

    public function UpdateAction()
    {
        include "App/Views/update.php";
    }

    public function DeleteAction()
    {
        include "App/Views/delete.php";
    }


}

