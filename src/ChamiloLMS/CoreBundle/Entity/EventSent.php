<?php

namespace ChamiloLMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventSent
 *
 * @ORM\Table(name="event_sent", indexes={@ORM\Index(name="event_name_index", columns={"event_type_name"})})
 * @ORM\Entity
 */
class EventSent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_from", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $userFrom;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_to", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $userTo;

    /**
     * @var string
     *
     * @ORM\Column(name="event_type_name", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $eventTypeName;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userFrom
     *
     * @param integer $userFrom
     * @return EventSent
     */
    public function setUserFrom($userFrom)
    {
        $this->userFrom = $userFrom;

        return $this;
    }

    /**
     * Get userFrom
     *
     * @return integer
     */
    public function getUserFrom()
    {
        return $this->userFrom;
    }

    /**
     * Set userTo
     *
     * @param integer $userTo
     * @return EventSent
     */
    public function setUserTo($userTo)
    {
        $this->userTo = $userTo;

        return $this;
    }

    /**
     * Get userTo
     *
     * @return integer
     */
    public function getUserTo()
    {
        return $this->userTo;
    }

    /**
     * Set eventTypeName
     *
     * @param string $eventTypeName
     * @return EventSent
     */
    public function setEventTypeName($eventTypeName)
    {
        $this->eventTypeName = $eventTypeName;

        return $this;
    }

    /**
     * Get eventTypeName
     *
     * @return string
     */
    public function getEventTypeName()
    {
        return $this->eventTypeName;
    }
}
