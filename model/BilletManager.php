<?php



class BilletManager
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

    public function add(Billet $ajout)
    {
        $req = $this->db->prepare('INSERT INTO billet (titre, auteur, contenu, date_ajout)VALUES (:titre, :auteur, :contenu, NOW())');
        $req->execute([
            "titre" => $ajout->titre(),
            "auteur" => $ajout->auteur(),
            "contenu" => $ajout->contenu()
        ]);
    }
   

    public function get($id)
    {
        $req = $this->db->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin\') AS date_ajout FROM billet WHERE id = :id');
        $req->execute([
            "id" => $id
        ]);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return new Billet($data);

    }

    public function getDate()
    {
        $req = $this->db->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin\') AS date_ajout FROM billet ORDER BY date_ajout DESC');
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return new Billet($data);

    }

    public function getList()
    {
        $data = [];
        $req = $this->db->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin\') AS date_ajout_fr FROM billet ORDER BY date_ajout DESC');
        $req->execute();
        while($billet = $req->fetch())
        {
            $data[] = new Billet($billet);
        }

        return $data;
    }

    public function update(Billet $modif)
    {
        $req = $this->db->prepare('UPDATE billet SET titre = :titre, contenu = :contenu, date_ajout = NOW() WHERE id = :id');
        $req->execute([
            "id" => $modif->id(),
            "titre" => $modif->titre(),
            "contenu" => $modif->contenu()
        ]);

    }

    public function delete($id)
    {
        $req = $this->db->prepare('DELETE FROM billet WHERE id = :id');
        $req->execute([
            "id" => $id
        ]);

    }

}
