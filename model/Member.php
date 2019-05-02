<?php


class Member 
{
    private $_id;
    private $_pseudo;
    private $_pass;
    private $_email;
    private $_date_inscription;

    public function __construct(Array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
       if(isset($data['id'])){
           $this->setId($data['id']);
       }
        if(isset($data['pseudo'])){
            $this->setPseudo($data['pseudo']);
        }
        if(isset($data['pass'])){
            $this->setPass($data['pass']);
        }
        if(isset($data['email'])){
            $this->setEmail($data['email']);
        }
        if(isset($data['date_inscription'])){
            $this->setDate_inscription($data['date_inscription']);
        }
    }

    
    public function id()
    {
        return $this->_id;
    }

    
    public function pseudo()
    {
        return $this->_pseudo;
    }

    public function pass()
    {
        return $this->_pass;
    }

    public function email()
    {
        return $this->_email;
    }

    public function date_inscription()
    {
        return $this->_date_inscription;
    }


    public function setId($id)
    {
        $this->_id = $id;

        return $this;
    }
    
    public function setPseudo($pseudo)
    {
        $this->_pseudo = $pseudo;

        return $this;
    }
      
    public function setPass($pass)
    {
        $this->_pass = $pass;

        return $this;
    }

    public function setEmail($email)
    {
        $this->_email = $email;

        return $this;
    }  
    
    public function setDate_inscription($date_inscription)
    {
        $this->_date_inscription = $date_inscription;

        return $this;
    }
}