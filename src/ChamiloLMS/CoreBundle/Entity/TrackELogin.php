<?php

namespace ChamiloLMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrackELogin
 *
 * @ORM\Table(name="track_e_login", indexes={@ORM\Index(name="login_user_id", columns={"login_user_id"})})
 * @ORM\Entity
 */
class TrackELogin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="login_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $loginId;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_user_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $loginUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="login_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $loginDate;

    /**
     * @var string
     *
     * @ORM\Column(name="login_ip", type="string", length=39, precision=0, scale=0, nullable=false, unique=false)
     */
    private $loginIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logout_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $logoutDate;


    /**
     * Get loginId
     *
     * @return integer
     */
    public function getLoginId()
    {
        return $this->loginId;
    }

    /**
     * Set loginUserId
     *
     * @param integer $loginUserId
     * @return TrackELogin
     */
    public function setLoginUserId($loginUserId)
    {
        $this->loginUserId = $loginUserId;

        return $this;
    }

    /**
     * Get loginUserId
     *
     * @return integer
     */
    public function getLoginUserId()
    {
        return $this->loginUserId;
    }

    /**
     * Set loginDate
     *
     * @param \DateTime $loginDate
     * @return TrackELogin
     */
    public function setLoginDate($loginDate)
    {
        $this->loginDate = $loginDate;

        return $this;
    }

    /**
     * Get loginDate
     *
     * @return \DateTime
     */
    public function getLoginDate()
    {
        return $this->loginDate;
    }

    /**
     * Set loginIp
     *
     * @param string $loginIp
     * @return TrackELogin
     */
    public function setLoginIp($loginIp)
    {
        $this->loginIp = $loginIp;

        return $this;
    }

    /**
     * Get loginIp
     *
     * @return string
     */
    public function getLoginIp()
    {
        return $this->loginIp;
    }

    /**
     * Set logoutDate
     *
     * @param \DateTime $logoutDate
     * @return TrackELogin
     */
    public function setLogoutDate($logoutDate)
    {
        $this->logoutDate = $logoutDate;

        return $this;
    }

    /**
     * Get logoutDate
     *
     * @return \DateTime
     */
    public function getLogoutDate()
    {
        return $this->logoutDate;
    }
}
