<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExamePreco
 *
 * @ORM\Table(name="exame_preco")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExamePrecoRepository")
 */
class ExamePreco
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
     * @ORM\Column(name="preco", type="decimal", precision=2, scale=2)
     */
    private $preco;

    /**
     * @var Convenio
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Convenio")
     * @ORM\JoinColumn(name="convenio_id", referencedColumnName="id")
     */
    private $convenio;

    /**
     * @var Exame
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Exame")
     * @ORM\JoinColumn(name="exame_id", referencedColumnName="id")
     */
    private $exame;


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
     * Set preco
     *
     * @param string $preco
     *
     * @return ExamePreco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get preco
     *
     * @return string
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @return Convenio
     */
    public function getConvenio()
    {
        return $this->convenio;
    }

    /**
     * @param Convenio $convenio
     */
    public function setConvenio($convenio)
    {
        $this->convenio = $convenio;
    }

    /**
     * @return Exame
     */
    public function getExame()
    {
        return $this->exame;
    }

    /**
     * @param Exame $exame
     */
    public function setExame($exame)
    {
        $this->exame = $exame;
    }
}

