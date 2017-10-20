<?php

namespace MadeByTom\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="messages")
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Entity(repositoryClass="MadeByTom\NotificationBundle\Repository\MessageRepository")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $senderId;

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
     * @ORM\Column(type="datetime")
     */
    protected $readAt;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $read;

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
    public function getRead()
    {
        return $this->read;
    }

    /**
     * @param mixed $read
     */
    public function setRead($read)
    {
        $this->read = $read;
    }

}