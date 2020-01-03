<?php

namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {

        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('blog/home.html.twig', [
            'title' => "Bienvenue sur ce suuuper blog"
        ]);
    }

     /**
      * @route("/blog/new" , name="blog_create")
      */
      public function create()
      {
          $article = new Article();

          $form = $this->createFormBuilder($article)
                        ->add('title')
                        ->add('content')
                        ->add('image')
                        ->getForm();

        var_dump($article);
          
          
          
          return $this->render('blog/create.html.twig', [
              'formArticle' => $form->createView()
          ]);
      }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */

     public function show(Article $article)
     {
         
         return $this->render('blog/show.html.twig', [
             'article' => $article
         ]);
     }

    

}
