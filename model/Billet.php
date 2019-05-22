<?php


class Billet
{
    private $_id,
            $_titre,
            $_auteur,
            $_contenu,
            $_date_ajout;

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
       if(isset($data['id'])){
           $this->setId($data['id']);
       }
        if(isset($data['titre'])){
            $this->setTitre($data['titre']);
        }
        if(isset($data['auteur'])){
            $this->setAuteur($data['auteur']);
        }
        if(isset($data['contenu'])){
            $this->setContenu($data['contenu']);
        }
        if(isset($data['date_ajout'])){
            $this->setDate_ajout($data['date_ajout']);
        }
    }  
    
    
    //getter
    
    public function id(){
        return $this->_id;
    }

    public function titre()
    {
        return $this->_titre;
    }

    public function auteur()
    {
        return $this->_auteur;
    }

    public function contenu()
    {
        return $this->_contenu;
    }

    public function date_ajout()
    {
        return $this->_date_ajout;
    }
    
    //setter
    
    public function setId($id)
    {
        $id = (int)$id;

        if($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setTitre($titre)
    {
        if(is_string($titre))
        {
            $this->_titre = $titre;
        }
    }

    public function setAuteur($auteur)
    {
        if(is_string($auteur))
        {
            $this->_auteur = $auteur;
        }
    }

    public function setContenu($contenu)
    {
        
        
            $this->_contenu = $contenu;
        
    }

    public function setDate_ajout($date_ajout)
    {
        if(date($date_ajout))
        {
            $this->_date_ajout = $date_ajout;
        }
    }

}

