<?php

namespace ChamiloLMS\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CAttendance
 *
 * @ORM\Table(name="c_attendance", uniqueConstraints={@ORM\UniqueConstraint(name="c_id", columns={"c_id", "id"})}, indexes={@ORM\Index(name="session_id", columns={"session_id"}), @ORM\Index(name="active", columns={"active"})})
 * @ORM\Entity
 */
class CAttendance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $iid;

    /**
     * @var integer
     *
     * @ORM\Column(name="c_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $cId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="attendance_qualify_title", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $attendanceQualifyTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="attendance_qualify_max", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $attendanceQualifyMax;

    /**
     * @var float
     *
     * @ORM\Column(name="attendance_weight", type="float", precision=10, scale=0, nullable=false, unique=false)
     */
    private $attendanceWeight;

    /**
     * @var integer
     *
     * @ORM\Column(name="session_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $sessionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="locked", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $locked;


    /**
     * Get iid
     *
     * @return integer
     */
    public function getIid()
    {
        return $this->iid;
    }

    /**
     * Set cId
     *
     * @param integer $cId
     * @return CAttendance
     */
    public function setCId($cId)
    {
        $this->cId = $cId;

        return $this;
    }

    /**
     * Get cId
     *
     * @return integer
     */
    public function getCId()
    {
        return $this->cId;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return CAttendance
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set name
     *
     * @param string $name
     * @return CAttendance
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CAttendance
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return CAttendance
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set attendanceQualifyTitle
     *
     * @param string $attendanceQualifyTitle
     * @return CAttendance
     */
    public function setAttendanceQualifyTitle($attendanceQualifyTitle)
    {
        $this->attendanceQualifyTitle = $attendanceQualifyTitle;

        return $this;
    }

    /**
     * Get attendanceQualifyTitle
     *
     * @return string
     */
    public function getAttendanceQualifyTitle()
    {
        return $this->attendanceQualifyTitle;
    }

    /**
     * Set attendanceQualifyMax
     *
     * @param integer $attendanceQualifyMax
     * @return CAttendance
     */
    public function setAttendanceQualifyMax($attendanceQualifyMax)
    {
        $this->attendanceQualifyMax = $attendanceQualifyMax;

        return $this;
    }

    /**
     * Get attendanceQualifyMax
     *
     * @return integer
     */
    public function getAttendanceQualifyMax()
    {
        return $this->attendanceQualifyMax;
    }

    /**
     * Set attendanceWeight
     *
     * @param float $attendanceWeight
     * @return CAttendance
     */
    public function setAttendanceWeight($attendanceWeight)
    {
        $this->attendanceWeight = $attendanceWeight;

        return $this;
    }

    /**
     * Get attendanceWeight
     *
     * @return float
     */
    public function getAttendanceWeight()
    {
        return $this->attendanceWeight;
    }

    /**
     * Set sessionId
     *
     * @param integer $sessionId
     * @return CAttendance
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return integer
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set locked
     *
     * @param integer $locked
     * @return CAttendance
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return integer
     */
    public function getLocked()
    {
        return $this->locked;
    }
}
