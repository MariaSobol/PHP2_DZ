<?php
namespace app\models\records;

use app\services\Security;

class User extends Record
{
    protected $id = 0;
    protected $login;
    protected $password;
    protected $name;
    protected $email;
    protected $address;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $password
     * @param $name
     * @param $email
     * @param $address
     */
    public function __construct($login = null, $password = null, $name = null, $email = null, $address = null)
    {
        parent::__construct();
        $this->login = $login;
        $this->password = (new Security())->getHash($password);
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
    }


    public static function getTableName(): string
    {
        return "users";
    }

    public function getParamsForDb(): array
    {
        return ['login' => $this->login,
                'password' => $this->password,
                'name' => $this->name,
                'email' => $this->email,
                'address' => $this->address];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return mixed
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     * @return mixed
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return mixed
     */
    public function setPassword($password)
    {
        $this->password = (new Security())->getHash($password);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return mixed
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return mixed
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }


}