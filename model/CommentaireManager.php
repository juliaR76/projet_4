<?php

class CommentaireManager
{
    private $db;

    public function __construct()
    {
        try
        {
        $this->db = new PDO('mysql:host=localhost; dbname=projet_4;charset=utf8', 'root', '');
        }
        catch (exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function add(Commentaire $ajout)
    {
        $req = $this->db->prepare('INSERT INTO commentaire (id_billet, auteur,comment, confirm, date_comment) VALUES (:id_billet, :auteur, :comment, 0, NOW())');
        $req->execute([
        "id_billet" => $ajout->id_billet(),
        "auteur" => $ajout->auteur(),
        "comment" => $ajout->comment()
        ]);
    }

    public function get($id_billet)
    {
        $data = [];
        $req = $this->db->prepare('SELECT id, id_billet, auteur, comment, confirm, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\')
        AS date_comment FROM commentaire WHERE id_billet = :id_billet');
        $req->execute([
            "id_billet" => $id_billet
        ]);

            while($commentaire = $req->fetch())
            {
                $data[] = new Commentaire($commentaire);
            }
    
            return $data;
        
    }

    public function delete($id){
        $req = $this->db->prepare('DELETE FROM commentaire WHERE id = :id');
        $req->execute([
            "id" => $id
        ]);
    }

}