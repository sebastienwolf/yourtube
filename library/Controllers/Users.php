<?php

namespace Controllers;


class Users extends Controller
{
    protected $modelName = \Models\Users::class;

    public function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php?controller=article&task=index');
    }
    // connexion user
    public function connexion()
    {
        $mail = filter_input(INPUT_POST, 'mail');
        //-----------------------------------------
        $a = filter_input(INPUT_POST, 'password');
        //------------------------
        $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
        if ($mail && $password) {
            $userLog = $this->model->showAll("mail = '{$mail}'");

            $verifPassword = password_verify($password, $userLog[0]['pwd']);
            if ($verifPassword == true && ($mail == $userLog[0]['mail'])) // nom d'utilisateur et mot de passe correctes
            {
                session_start();
                $_SESSION['pseudo'] = $userLog[0]['pseudo'];
                $_SESSION['id'] = $userLog[0]['idUsers'];
                $_SESSION['nom'] = $userLog[0]['nom'];
                $_SESSION['prenom'] = $userLog[0]['prenom'];
                $_SESSION['mail'] = $userLog[0]['mail'];
                $_SESSION['userType'] = $userLog[0]['status'];

                echo json_encode("1");
            } else {
                echo json_encode("2");
            }
        } else {
            echo json_encode("3");
        }
    }


    // ===================================================================================================
    // ===============================        profil    ===========================================
    // ===================================================================================================
    public function profil()
    {
        $pageTitle = 'profil';
        // ob_start();
        // require_once('templates/articles/profil.html.php');
        // $pageContent = ob_get_clean();
        // require_once('templates/layout.html.php');
        \Renderer::render('articles/profil', compact('pageTitle'));
    }
    //============================================================================                 
    //============================================================================
    // inscription new user
    public function inscription()
    {

        $userNom = htmlspecialchars(filter_input(INPUT_POST, 'nom'));
        $userPrenom = htmlspecialchars(filter_input(INPUT_POST, 'prenom'));
        $userMail = filter_input(INPUT_POST, 'mail');
        $userPseudo = htmlspecialchars(filter_input(INPUT_POST, 'userPseudo'));
        $userPassword = htmlspecialchars(filter_input(INPUT_POST, 'password'));

        $option = ['cost' => 12,];
        $hash = password_hash($userPassword, PASSWORD_BCRYPT, $option);

        if ($userNom && $userPrenom && $userMail && $userPseudo && $hash) {
            $verifMail = $this->model->showAll("mail =" . "'{$userMail}'");

            if ($verifMail['0']['mail'] == $userMail) {
                echo json_encode(("2"));
            } else {
                $verifPseudo = $this->model->showAll("pseudo = " . "'{$userPseudo}'");

                if ($verifPseudo['0']['pseudo'] == $userPseudo) {
                    echo json_encode(("4"));
                } else {
                    $usersData = compact("userNom", "userPrenom", "userMail", "userPseudo", "hash");
                    $sql = $this->model->createUsers($usersData);
                    //$_SESSION['erreur'] = 1;
                    //header('location : index.php?controller=page&task=connexion');
                    echo json_encode(("1"));
                }
            }
        } else {
            echo json_encode(("3"));
        }
    }
    //    =================================================================
    // ====================================================================
    // modifier les donnée user

    public function modify()
    {
        if (!isset($_SESSION['userType'])) {
            header('Location: index.php?controller=article&task=index');
        } else {


            $userNom = htmlspecialchars(filter_input(INPUT_POST, 'nom'));
            $userPrenom = htmlspecialchars(filter_input(INPUT_POST, 'prenom'));
            $userMail = filter_input(INPUT_POST, 'mail');
            $userPseudo = htmlspecialchars(filter_input(INPUT_POST, 'userPseudo'));
            $userPassword = htmlspecialchars(filter_input(INPUT_POST, 'password'));
            $idUsers = $_SESSION['id'];
            //=======================================
            //Nom
            if ($userNom !== "") {
                $item = "nom = '{$userNom}'";
                $condition = "idUsers = '{$idUsers}'";
                $this->model->udapte($item, $condition);
                $_SESSION['nom'] = $userNom;
            }
            //=======================================
            //Prenom
            if ($userPrenom !== "") {
                $item = "prenom = '{$userPrenom}'";
                $condition = "idUsers = '{$idUsers}'";
                $this->model->udapte($item, $condition);
                $_SESSION['prenom'] = $userPrenom;
            }
            //=======================================
            //Mail
            if ($userMail !== "") {
                $item = "mail = '{$userMail}'";
                $condition = "idUsers = '{$idUsers}'";
                $this->model->udapte($item, $condition);
                $_SESSION['mail'] = $userMail;
            }
            //=======================================
            // Pseudo
            if ($userPseudo !== "") {
                $item = "pseudo = '{$userPseudo}'";
                $condition = "idUsers = '{$idUsers}'";
                $this->model->udapte($item, $condition);
                $_SESSION['pseudo'] = $userPseudo;
            }
            //=======================================
            // mot de passe
            if ($userPassword !== "") {
                $option = ['cost' => 12,];
                $hash = password_hash($userPassword, PASSWORD_BCRYPT, $option);

                $item = "pwd = '{$hash}'";
                $condition = "idUsers = '{$idUsers}'";
                $this->model->udapte($item, $condition);
            }
            //=======================================

            echo json_encode('1');
        }
    }
}
