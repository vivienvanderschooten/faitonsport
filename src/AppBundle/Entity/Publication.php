<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PublicationRepository")
 */
class Publication
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
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserAdmin", inversedBy="publications", cascade={"persist"})
     */
    private $user;


    /**
     * @var Date
     * @ORM\Column(name="creation", type="datetime")
     */
    private $creation;

    /**
     * @return Date
     */
    public function getCreation()
    {
        return $this->creation;
    }

    /**
     * @param Date $creation
     */
    public function setCreation($creation)
    {
        $this->creation = $creation;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Publication
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\UserAdmin $user
     *
     * @return Publication
     */
    public function setUser(\AppBundle\Entity\UserAdmin $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\UserAdmin
     */
    public function getUser()
    {
        return $this->user;
    }
}
