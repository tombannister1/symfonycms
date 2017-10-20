<?php

namespace MadeByTom\DashboardBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/dashboard", name="dashboard_home")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="dashboard_home")
     */
    public function indexAction()
    {
        return $this->render('MadeByTomDashboardBundle:overview:dashboard.html.twig');
    }
}
