<?php

namespace Controllers;


use Framework\View\View;
use Models\User;

class UserController
{
    public function index() {
        $users = User::all();

        return View::render("user.tpl")->with("users", $users);
    }

    public function store() {
        $user = new User();
        $user->name = $_POST["name"];
        $user->email = $_POST["email"];
        $user->gender = $_POST["gender"];
        $user->save();

        $users = User::all();

        return View::render("user.tpl")->with("users", $users);
    }
}