<?php

class Commentaire
{
    private $_id,
            $_id_billet,
            $_auteur,
            $_comment,
            $_confirm,
            $_date_comment;

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data){

        if(isset($data['id'])){
            $this->setId($data['id']);
        }
        if(isset($data['id_billet'])){
            $this->setId_billet($data['id_billet']);
        }
        if(isset($data['auteur'])){
            $this->setAuteur($data['auteur']);
        }
        if(isset($data['comment'])){
            $this->setComment($data['comment']);
        }
        if(isset($data['confirm'])){
            $this->setConfirm($data['confirm']);
        }
        if(isset($data['date_comment'])){
            $this->setDate_comment($data['date_comment']);
        }
    }

//getter

    public function id(){
        return $this->_id;
    }

    public function id_billet(){
        return $this->_id_billet;
    } 

    public function auteur(){
        return $this->_auteur;
    }

    public function comment(){
        return $this->_comment;
    }

    public function confirm(){
        return $this->_confirm;
    }

    public function date_comment(){
        return $this->_date_comment;
    }

    // setter 

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setId_billet($id_billet)
    {
        $this->_id_billet = $id_billet;
    }

    public function setAuteur($auteur)
    {
        $this->_auteur = $auteur;
    }

    public function setComment($comment)
    {
        $this->_comment = $comment;
    }

    public function setConfirm($confirm)
    {
        $this->_confirm = $confirm;
        
    }

    public function setDate_comment($date_comment)
    {
        $this->_date_comment = $date_comment;
    }

}