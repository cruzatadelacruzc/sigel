<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * OrdemServico
 *
 * @ORM\Table(name="ordem_servico")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdemServicoRepository")
 */
class OrdemServico
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="fecha", type="date")
     * @Assert\NotNull(message="validations.not_null")
     */
    private $fecha;

    /**
     * @var Paciente
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paciente")
     * @ORM\JoinColumn(name="paciente_id", referencedColumnName="id")
     * @Assert\NotNull(message="validations.not_null")
     */
    private $paciente;

    /**
     * @var Convenio
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Convenio")
     * @ORM\JoinColumn(name="convenio_id", referencedColumnName="id")
     * @Assert\NotNull(message="validations.not_null")
     */
    private $convenio;

    /**
     * @var PostoColecta
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PostoColecta")
     * @ORM\JoinColumn(name="posto_colecta_id", referencedColumnName="id")
     * @Assert\NotNull(message="validations.not_null")
     */
    private $postoColecta;

    /**
     * @var Medico
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Medico")
     * @ORM\JoinColumn(name="medico_id", referencedColumnName="id")
     * @Assert\NotNull(message="validations.not_null")
     */
    private $medico;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrdemServicioExame", mappedBy="ordemServico", cascade={"persist","remove"})
     * @Assert\NotNull(message="validations.not_null")
     */
    private $ordemServicoExames;

    /**
     * OrdemServico constructor.
     */
    public function __construct()
    {
        $this->ordemServicoExames = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }/**
 * @return \DateTime
 */
public function getFecha()
{
    return $this->fecha;
}/**
 * @param \DateTime $fecha
 */
public function setFecha($fecha)
{
    $this->fecha = $fecha;
}



    /**
     * @return ArrayCollection
     */
    public function getOrdemServicoExames()
    {
        return $this->ordemServicoExames;
    }

    /**
     * @param ArrayCollection $ordemServicoExames
     */
    public function setOrdemServicoExames($ordemServicoExames)
    {
        $this->ordemServicoExames = $ordemServicoExames;
    }

    /**
     * @return Paciente
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * @param Paciente $paciente
     */
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;
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
     * @return PostoColecta
     */
    public function getPostoColecta()
    {
        return $this->postoColecta;
    }

    /**
     * @param PostoColecta $postoColecta
     */
    public function setPostoColecta($postoColecta)
    {
        $this->postoColecta = $postoColecta;
    }

    /**
     * @return Medico
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * @param Medico $medico
     */
    public function setMedico($medico)
    {
        $this->medico = $medico;
    }
}

