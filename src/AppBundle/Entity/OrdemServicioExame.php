<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdemServicioExame
 *
 * @ORM\Table(name="ordem_servicio_exame")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdemServicioExameRepository")
 */
class OrdemServicioExame
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
     * @var \DateTime
     *
     * @ORM\Column(name="entrega_resultado", type="datetime")
     */
    private $entregaResultado;

    /**
     * @var string
     *
     * @ORM\Column(name="preco", type="float")
     */
    private $preco;

    /**
     * @var Exame
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Exame")
     * @ORM\JoinColumn(name="exame_id", referencedColumnName="id")
     */
    private $exame;

    /**
     * @var OrdemServico
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OrdemServico", inversedBy="ordemServicoExames")
     * @ORM\JoinColumn(name="ordem_servico_id", referencedColumnName="id")
     */
    private $ordemServico;


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
     * Set entregaResultado
     *
     * @param \DateTime $entregaResultado
     *
     * @return OrdemServicioExame
     */
    public function setEntregaResultado($entregaResultado)
    {
        $this->entregaResultado = $entregaResultado;

        return $this;
    }

    /**
     * Get entregaResultado
     *
     * @return \DateTime
     */
    public function getEntregaResultado()
    {
        return $this->entregaResultado;
    }

    /**
     * Set preco
     *
     * @param string $preco
     *
     * @return OrdemServicioExame
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

    /**
     * @return OrdemServico
     */
    public function getOrdemServico()
    {
        return $this->ordemServico;
    }

    /**
     * @param OrdemServico $ordemServico
     */
    public function setOrdemServico($ordemServico)
    {
        $this->ordemServico = $ordemServico;
    }
}

