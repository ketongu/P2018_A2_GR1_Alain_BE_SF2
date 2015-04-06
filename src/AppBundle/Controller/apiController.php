<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class apiController
 * @package AppBundle\Controller
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @route("/article/{id}",name="api_article", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function apiAction($id = null)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var ArticleRepository $repo */
        $repo = $em->getRepository('AppBundle:Article');

        $articles = $repo->findApi();
        //var_dump($id);die;
        return new JsonResponse($articles);
    }
}
