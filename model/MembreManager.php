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

    public function get($pseudo)
    {
        $req = $bdd->prepare('SELECT id, pass FROM membre WHERE pseudo = :pseudo');
        $req->execute([
        'pseudo' => $pseudo
        ]); 
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return new Member($data);
    }
    
}