<?php

namespace MadeByTom\NotificationBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MadeByTom\NotificationBundle\Repository\MessageRepository")
 * @ORM\Table(name="messages")
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="MadeByTom\CoreBundle\Entity\User", inversedBy="messages")
     */
    protected $sender;

    /**
     * @ORM\Column(type="integer")
     */
    protected $recipientId;

    /**
     * @ORM\Column(type="text")
     */
    protected $messageContent;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $readAt;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $active;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $readStatus;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * @param mixed $senderId
     */
    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;
    }

    /**
     * @return mixed
     */
    public function getRecipientId()
    {
        return $this->recipientId;
    }

    /**
     * @param mixed $recipientId
     */
    public function setRecipientId($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    /**
     * @return mixed
     */
    public function getMessageContent()
    {
        return $this->messageContent;
    }

    /**
     * @param mixed $messageContent
     */
    public function setMessageContent($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getReadAt()
    {
        return $this->readAt;
    }

    /**
     * @param mixed $readAt
     */
    public function setReadAt($readAt)
    {
        $this->readAt = $readAt;
    }

    /**
     * @return mixed
     */
    public function getReadStatus()
    {
        return $this->readStatus;
    }

    /**
     * @param mixed $read
     */
    public function setRead($readStatus)
    {
        $this->readStatus = $readStatus;
    }

    /**
     * @return user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param user $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }


}