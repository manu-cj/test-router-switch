<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Article;
use DateTime;

class ArticleManager
{


    public function findAll(): array
    {
        $articles = [];
        $query = DB::getPDO()->query("SELECT * FROM article");
        if($query) {
            $userManager = new UserManager();
            $format = 'Y-m-d H:i:s';

            foreach($query->fetchAll() as $articleData) {
                $articles[] = (new Article())
                    ->setId($articleData['id'])
                    ->setAuthor($userManager->getUserById($articleData['user_fk']))
                    ->setContent($articleData['content'])
                    ->setDateAdd(DateTime::createFromFormat($format, $articleData['date_add']))
                    ->setDateUpdate(DateTime::createFromFormat($format, $articleData['date_update']))
                    ->setTitle($articleData['title'])
                ;
            }
        }

        return $articles;
    }

    public static function addArticleDb($title, $content) {
       $add = DB::getPDO()->prepare("INSERT INTO article (name, text, date, user_fk, category_fk) 
                                                VALUE (?, ?, ?, ?, ?)");

        $add->execute([$title,$content,20220308, 1, 2]);

    }
}