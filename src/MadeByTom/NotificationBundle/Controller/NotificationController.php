<?php

namespace MadeByTom\NotificationBundle\Controller;

use MadeByTom\NotificationBundle\Entity\Message;
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

    /**
     * @param int $max
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getUnreadMessages($max = 3)
    {

        $unreadMessages = $this->getDoctrine()
                               ->getRepository(Message::class)
                               ->findOneBy(array('read' => 0));

        return $this->render(
            '@MadeByTomCore/partials/navbar.html.twig',
            array('unreadMessages' => $unreadMessages)
        );

    }
}
