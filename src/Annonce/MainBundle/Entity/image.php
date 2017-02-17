<?php

namespace Annonce\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="Annonce\MainBundle\Repository\imageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class image
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
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    public $path;

    /**
     * @ORM\ManyToOne(targetEntity="Annonce\MainBundle\Entity\Annonce" ,inversedBy="images")
     * @ORM\JoinColumn(name="Annonce_id", referencedColumnName="id")
     */
    private $annonce;

    /**
     * @return mixed
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * @param mixed $annonce
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;
    }

    public function __construct(Annonce $Annonce = null)
    {
        if ($Annonce !== null) {
            $this->setAnnonce($Annonce);
        }
    }


    /**
     * @Assert\File(
     *     maxSize = "6092k",
     *     mimeTypesMessage = "Taille d image depasse 3Mo"
     * )
     */
    public $file;
    private $tempFile;
    private $oldFile;

    public function getUploadRootDir()
    {
        return __dir__.'/../../../../web/uploads/images';
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getAssetPath()
    {
        return 'uploads/images/'.$this->path;
    }

    /**
     * @ORM\Prepersist()
     * @ORM\Preupdate()
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        $this->updateAt = new \DateTime();

        if (null !== $this->file)
            $this->path = sha1(uniqid(mt_rand(),true)).'.'.$this->getFile()->guessExtension();

        $this->path=$this->getAssetPath();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null !== $this->file) {
            $this->getFile()->move($this->getUploadRootDir(),$this->path);
            unset($this->file);

            if ($this->oldFile != null) unlink($this->tempFile);
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFile)) unlink($this->tempFile);
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
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getPath()
    {
        return $this->path;
    }

}

