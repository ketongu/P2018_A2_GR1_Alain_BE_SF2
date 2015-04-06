<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Class articleController
 * @package AppBundle\Controller
 *
 * @Route("/")
 */
class ArticleController extends Controller
{
    /**
     * Lists all Article entities.
     *
     * @Route("/", name="article")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AppBundle:Article')->findAll();
        $category = $em->getRepository('AppBundle:Category')->findAll();
        return $this->render('AppBundle:Article:index.html.twig',[
            'article' => $article,
            'category' => $category,
        ]);
    }
//    /**
//     * Finds and displays a Article entity.
//     *
//     * @Route("/{id}", name="article_show")
//     * @Method("GET")
//     */
//    public function showAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $article = $em->getRepository('AppBundle:Article')->find($id);
//        return $this->render('AppBundle:Article:show.html.twig',[
//            'article' => $article,
//        ]);
//    }
}
