<?php

namespace Models;

use Database;

// require_once('librari/database.php');

abstract class Model
{

    protected $pdo;
    protected $table;

    public function __construct()
    {

        $this->pdo = \Database::getPdo();
    }
    // ===================================================================================================
    // ===============================        showAll   ===================================
    // ===================================================================================================
    public function showAll($i)
    {
        if ($i == "categorie") {
            $table = $i;
            $requette = "SELECT * FROM $table";
        } else {
            $requette = "SELECT * FROM $this->table Where $i";
        }
        $sql = $this->pdo->prepare($requette);
        $sql->execute();
        $response = $sql->fetchAll();
        // $test = $sql->errorInfo();
        return $response;
    }

    // ===================================================================================================
    // ===============================        showAllTable   ===================================
    // ===================================================================================================
    public function showAllTable($where)
    {
        $requette = "SELECT articles.*, DATE_FORMAT(`udapteDate`, '%d/%m/%Y') as dateE, users.pseudo, categorie.theme 
        FROM articles 
        LEFT JOIN users ON users.idUsers = articles.idUsers 
        LEFT JOIN categorie ON categorie.idCategorie = articles.idCategorie 
        WHERE " . $where;
        $sql = $this->pdo->prepare($requette);
        // $sql->execute(array($where));
        $sql->execute();

        $response = $sql->fetchAll();
        // $test = $sql->errorInfo();
        return $response;
    }

    // ===================================================================================================
    // ===============================        udapte   ===================================
    // ===================================================================================================
    public function udapte($item, $id)
    {
        $requette = "UPDATE $this->table SET " . $item . " WHERE " . $id;
        $sql = $this->pdo->prepare($requette);
        $response = $sql->execute();
        //$response = $sql->fetchAll();
        // $test = $sql->errorInfo();
        return $response;
    }
    // ===================================================================================================
    // ===============================        a tester   ===================================
    // ===================================================================================================
    // faut que je test ça
    public function test($usersData)
    {
        extract($usersData);

        $sql = $this->pdo->prepare('INSERT INTO ($this->table) VALUES (?), (?), (?), (?), (?), (?), (?)');
        $sql->execute(["DEFAULT", $userNom, $userPrenom, $userMail, $userPseudo, $hash, "DEFAULT"]);
    }

    // ===================================================================================================
    // ===============================        delete   ===================================
    // ===================================================================================================
    public function delete($condition)
    {
        $requette = "DELETE FROM $this->table WHERE " . $condition;
        $sql = $this->pdo->prepare("$requette");
        $sql->execute();
    }
}
