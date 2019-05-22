<?php 

class MemberManager
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

    public function add(Member $user)
    {
        $req = $this->db->prepare('INSERT INTO membre(pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
        $req->execute([
            'pseudo' => $user->pseudo(),
            'pass' => $user->pass(), 
            'email' => $user->email() 
        ]);
    }

    public function get($pseudo, $pass)
    {
        $req = $this->db->prepare('SELECT id, pseudo, pass FROM membre WHERE pseudo = :pseudo AND pass = :pass');
        $req->execute([
            'pseudo' => $pseudo,
            'pass' => $pass
        ]); 
        if($data = $req->fetch(PDO::FETCH_ASSOC)){   
            
            header('location: index.php?action=creation');
        }else{
            echo "<script>alert(\"Mauvais identifiant ou mot de pass!\")</script>";
        }
    }   
}