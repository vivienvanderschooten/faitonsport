<?php
/**
 * Created by PhpStorm.
 * User: vivienvanderschooten
 * Date: 09/11/2016
 * Time: 12:09
 */

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserAdmin
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class UserAdmin extends BaseUser
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\UserAdmin", cascade={"persist"})
     * @ORM\JoinTable(name="amis")
     */
    private $amis;

    /**
     * @return mixed
     */
    public function getAmis()
    {
        return $this->amis;
    }

    /**
     * @param mixed $amis
     */
    public function setAmis($amis)
    {
        $this->amis = $amis;
    }


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Publication", mappedBy="user", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $publications;
    

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add publication
     *
     * @param \AppBundle\Entity\Publication $publication
     *
     * @return UserAdmin
     */
    public function addPublication(\AppBundle\Entity\Publication $publication)
    {
        $this->publications[] = $publication;

        return $this;
    }

    /**
     * Remove publication
     *
     * @param \AppBundle\Entity\Publication $publication
     */
    public function removePublication(\AppBundle\Entity\Publication $publication)
    {
        $this->publications->removeElement($publication);
    }

    /**
     * Get publications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * Add ami
     *
     * @param \AppBundle\Entity\UserAdmin $ami
     *
     * @return UserAdmin
     */
    public function addAmi(\AppBundle\Entity\UserAdmin $ami)
    {
        $this->amis[] = $ami;

        return $this;
    }

    /**
     * Remove ami
     *
     * @param \AppBundle\Entity\UserAdmin $ami
     */
    public function removeAmi(\AppBundle\Entity\UserAdmin $ami)
    {
        $this->amis->removeElement($ami);
    }
}
