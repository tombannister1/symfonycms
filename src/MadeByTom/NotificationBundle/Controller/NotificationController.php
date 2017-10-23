<?php

namespace MadeByTom\NotificationBundle\Controller;

use MadeByTom\NotificationBundle\Entity\Message;
use MadeByTom\NotificationBundle\Form\CreateNotificationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/dashboard/messages", name="dashboard_home")
 * @Security("is_granted('ROLE_ADMIN')")
 */
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
    public function getUnreadMessagesAction($max = 3)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $unreadMessages = $this->getDoctrine()
                               ->getRepository(Message::class)
                               ->findBy(array('readStatus' => 0, 'recipientId' => $user->getID(), 'active' => 0));

        return $this->render(
            '@MadeByTomCore/partials/navbar.html.twig',
            array('unreadMessages' => $unreadMessages)
        );

    }

    /**
     * @Route("/view", name="view_all_messages")
     */
    public function allMessageAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $allMessages = $this->getDoctrine()
            ->getRepository(Message::class)
            ->findBy(array('recipientId' => $user->getID(), 'active' => 0));

        return $this->render('MadeByTomNotificationBundle:overview:dashboard.html.twig', array('allMessages' => $allMessages));
    }

    /**
     * @Route("/view/{id}", name="view_message_by_id")
     */
    public function readMessageAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $message = $em->getRepository(Message::class)->find($id);

        if(!$message)
        {
            throw new Exception('No Message Found');
        }

        return $this->render('MadeByTomNotificationBundle:view:index.html.twig', array('message' => $message));
    }

    /**
     * @Route("/delete/{id}", name="delete_message")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $message = $em->getRepository(Message::class)->find($id);

        if(!$message)
        {
            throw new Exception('No Message Found');
        }

        $message->setActive(1);
        $em->persist($message);
        $em->flush();

        return $this->generateUrl('view_all_messages');
    }

    /**
     * @Route("/new", name="create_message")
     */
    public function createMessageAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $form = $this->createForm(CreateNotificationType::class, array('id' =>$user->getID()));
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->get('security.token_storage')->getToken()->getUser();
            $message = $form->getData();

            $newMessage = new Message();
            $newMessage->setSender($user);
            $newMessage->setSenderId($user->getID());
            $newMessage->setMessageContent($message['message']);
            $newMessage->setSenderId($user->getID());
            $newMessage->setRecipientId($message['recipient']->getID());
            $newMessage->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
            $newMessage->setReadAt(null);
            $newMessage->setActive(false);
            $newMessage->setRead(false);

            $em->persist($newMessage);
            $em->flush();

            return $this->generateUrl('view_all_messages');
        }

        return $this->render('MadeByTomNotificationBundle:create:index.html.twig', array('form' => $form->createView()));
    }

}