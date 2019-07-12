<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostoColecta
 *
 * @ORM\Table(name="posto_colecta")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostoColectaRepository")
 */
class PostoColecta
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
     * @var Bairro
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Bairro")
     * @ORM\JoinColumn(name="bairro_id", referencedColumnName="id")
     */
    private $bairro;


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
     * @return PostoColecta
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
     * @return Bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param Bairro $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

}

