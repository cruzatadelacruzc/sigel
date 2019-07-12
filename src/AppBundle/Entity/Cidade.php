<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cidade
 *
 * @ORM\Table(name="cidade")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CidadeRepository")
 */
class Cidade
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
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bairro", mappedBy="cidade", cascade={"persist","remove"})
     */
    private $bairros;
    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Paciente", mappedBy="cidade", cascade={"persist","remove"})
     */
    private $paciente;

    /**
     * Cidade constructor.
     */
    public function __construct()
    {
        $this->bairros = new ArrayCollection();
        $this->paciente = new ArrayCollection();
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
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Cidade
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return ArrayCollection
     */
    public function getBairros()
    {
        return $this->bairros;
    }

    /**
     * @return ArrayCollection
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

}

