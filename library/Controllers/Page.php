<?php

namespace Controllers;


class Page extends Controller
{

    protected $modelName = \Models\Page::class;
    // ===================================================================================================
    // ===============================        index    ===========================================
    // ===================================================================================================

    public function index()
    {
        $articles = $this->model->showAll();

        $pageTitle = 'Accueil';
        ob_start();
        require_once('templates/articles/index.html.php');
        $pageContent = ob_get_clean();
        require_once('templates/layout.html.php');
        //  \Renderer::render('articles/index', compact('pageTitle', 'articles'));
    }
    // ===================================================================================================
    // ===============================        connexion    ===========================================
    // ===================================================================================================

    public function connexion()
    {
        $pageTitle = 'connexion';
        ob_start();
        require_once('templates/articles/connexion.html.php');
        $pageContent = ob_get_clean();
        require_once('templates/layout.html.php');
        //\Renderer::render('users/connexion', compact('pageTitle'));
    }
    // ===================================================================================================
    // ===============================        inscription    ===========================================
    // ===================================================================================================

    public function inscription()
    {
        $pageTitle = 'inscription';
        ob_start();
        require_once('templates/articles/inscription.html.php');
        $pageContent = ob_get_clean();
        require_once('templates/layout.html.php');
        //\Renderer::render('users/connexion', compact('pageTitle'));
    }

    // ===================================================================================================
    // ===============================        profil    ===========================================
    // ===================================================================================================
    public function profil()
    {
        $pageTitle = 'profil';
        ob_start();
        require_once('templates/articles/profil.html.php');
        $pageContent = ob_get_clean();
        require_once('templates/layout.html.php');
        //\Renderer::render('users/connexion', compact('pageTitle'));
    }


    // ===================================================================================================
    // ===============================        addArticle    ===========================================
    // ===================================================================================================
    public function addArticle()
    {
        $pageTitle = 'profil';
        ob_start();
        require_once('templates/articles/addArticle.html.php');
        $pageContent = ob_get_clean();
        require_once('templates/layout.html.php');
        //\Renderer::render('users/connexion', compact('pageTitle'));
    }
}
