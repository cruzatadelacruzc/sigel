<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exame
 *
 * @ORM\Table(name="exame")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExameRepository")
 */
class Exame
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
     * @var string
     *
     * @ORM\Column(name="MaterialBiologico", type="string", length=255)
     */
    private $materialBiologico;

    /**
     * @var int
     *
     * @ORM\Column(name="prazo", type="integer")
     */
    private $prazo;

    /**
     * @var Sector
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Sector")
     * @ORM\JoinColumn(name="sector_id", referencedColumnName="id")
     */
    private $sector;

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
     * @return Exame
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
     * Set materialBiologico
     *
     * @param string $materialBiologico
     *
     * @return Exame
     */
    public function setMaterialBiologico($materialBiologico)
    {
        $this->materialBiologico = $materialBiologico;

        return $this;
    }

    /**
     * Get materialBiologico
     *
     * @return string
     */
    public function getMaterialBiologico()
    {
        return $this->materialBiologico;
    }

    /**
     * Set prazo
     *
     * @param integer $prazo
     *
     * @return Exame
     */
    public function setPrazo($prazo)
    {
        $this->prazo = $prazo;

        return $this;
    }

    /**
     * Get prazo
     *
     * @return int
     */
    public function getPrazo()
    {
        return $this->prazo;
    }


    /**
     * @return Sector
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * @param Sector $sector
     */
    public function setSector($sector)
    {
        $this->sector = $sector;
    }
}

