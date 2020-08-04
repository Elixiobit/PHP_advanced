<?php
namespace app\models;

class User extends Record
{
    public $id;
    public $login;
    public $password;
    public $email;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $password
     * @param $email
     */
    public function __construct($id, $login, $password, $email)
    {
        parent::__construct();
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }




    public static function getTableName(): string
    {
        return "users";
    }



}