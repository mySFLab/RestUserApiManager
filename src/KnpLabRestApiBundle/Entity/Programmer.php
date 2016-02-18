<?php

namespace KnpLabRestApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LabRestBundle\Entity\User;

/**
 * Programmer
 *
 * @ORM\Table(name="programmer")
 * @ORM\Entity(repositoryClass="KnpLabRestApiBundle\Repository\ProgrammerRepository")
 */
class Programmer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="avatarNumber", type="string", length=255, nullable=true)
     */
    private $avatarNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="tagLine", type="string", length=255, nullable=true)
     */
    private $tagLine;

    /**
     * @var string
     *
     * @ORM\Column(name="powerfulLevel", type="string", length=255, nullable=true)
     */
    private $powerfulLevel;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="LabRestBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @param $nickname
     * @param $avatarNumber
     */
    public function __construct($nickname = null, $avatarNumber = null) {
        $this->nickname = $nickname;
        $this->avatarNumber = $avatarNumber;
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
     * Set nickname
     *
     * @param string $nickname
     * @return Programmer
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set avatarNumber
     *
     * @param string $avatarNumber
     * @return Programmer
     */
    public function setAvatarNumber($avatarNumber)
    {
        $this->avatarNumber = $avatarNumber;

        return $this;
    }

    /**
     * Get avatarNumber
     *
     * @return string 
     */
    public function getAvatarNumber()
    {
        return $this->avatarNumber;
    }

    /**
     * Set tagLine
     *
     * @param string $tagLine
     * @return Programmer
     */
    public function setTagLine($tagLine)
    {
        $this->tagLine = $tagLine;

        return $this;
    }

    /**
     * Get tagLine
     *
     * @return string 
     */
    public function getTagLine()
    {
        return $this->tagLine;
    }

    /**
     * Set powerfulLevel
     *
     * @param string $powerfulLevel
     * @return Programmer
     */
    public function setPowerfulLevel($powerfulLevel)
    {
        $this->powerfulLevel = $powerfulLevel;

        return $this;
    }

    /**
     * Get powerfulLevel
     *
     * @return string 
     */
    public function getPowerfulLevel()
    {
        return $this->powerfulLevel;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Programmer
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }
}
