<?php

namespace MadeByTom\DashboardBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/dashboard/", name="dashboard_home")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function indexAction()
    {
        return $this->render('MadeByTomDashboardBundle:overview:dashboard.html.twig');
    }
}
