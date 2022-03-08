<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\ArticleManager;

class ArticleController extends AbstractController
{

    public function index()
    {
        // mon commentaire qui m'a pris du temsp à écrire.
    }

    public function listAllArticles()
    {

    }

    public function addArticle()
    {
        if ($this->getpost()) {
            $title = $this->getForm('title');
            $content = $this->getForm('content');
            $title = filter_var($title, FILTER_SANITIZE_STRING);
            $content = filter_var($content, FILTER_SANITIZE_STRING);
            ArticleManager::addArticleDb($title, $content);
        }
        $this->render('article/add-article');
    }
}