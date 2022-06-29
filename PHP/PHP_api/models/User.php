<?php

include_once "../validators/TokenGenerator.php";
include_once "../validators/validate.php";
class User
{
    private string $name, $password, $email, $token;

    function __construct(
        string $name,
        string $password,
        string $email

    ){
        $this->name = validate($name);
        $this->password= passwordValidate($password);
        $this->email= validate(checkEmail(($email)));
        $this->token = TokenGenerator::generate();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getToken(): string
    {
        return $this->token;
    }
    public function setToken(string $token): void
    {
        $this->token = $token;
    }


}
