<?php

namespace Models;


class Users extends Model
{
    protected $table = "users";

    public function createUsers($usersData)
    {
        extract($usersData);

        $sql = $this->pdo->prepare("INSERT INTO users (idUsers, nom, prenom, mail, pseudo, pwd, status) VALUES
                (DEFAULT ,:nom, :prenom, :mail, :pseudo, :mdp, DEFAULT) ");
        $sql->execute(["nom" => $userNom, "prenom" => $userPrenom, "mail" => $userMail, "pseudo" => $userPseudo, "mdp" => $hash]);
    }
}
