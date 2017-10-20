<?php

namespace MadeByTom\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NotificationController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('MadeByTomNotificationBundle:Default:index.html.twig');
    }

    public function getUnreadMessages($max = 3)
    {

    }
}
