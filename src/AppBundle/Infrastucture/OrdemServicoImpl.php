<?php


namespace AppBundle\Infrastucture;


use AppBundle\Entity\IOrdemServico;
use AppBundle\Entity\OrdemServico;
use AppBundle\Entity\ValueObject\ParamDataTable;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Translation\TranslatorInterface;

class OrdemServicoImpl implements IOrdemServico
{
    /** @var ObjectManager $objectManager*/
    protected $objectManager;

    /**@var string $class*/
    protected $class;
    
    /**@var TranslatorInterface $translator*/
    protected $translator;

    /**
     * OrdemServicoImpl constructor.
     * @param ObjectManager $objectManager
     * @param TranslatorInterface $translator
     */
    public function __construct(ObjectManager $objectManager, TranslatorInterface $translator)
    {
        $this->objectManager = $objectManager;
        $this->class = OrdemServico::class;
        $this->translator = $translator;
    }


    /**
     * @inheritdoc
     * @version 1.0
     */
    public function CreateEntity($id = null)
    {
        if (null === $id) {
            $class = $this->getClass();
            $entity = new $class();
        } else {
            $entity = $this->getRepository()->find($id);
        }
        return $entity;
    }

    /**
     * @inheritdoc
     * @version 1.0
     */
    public function getClass()
    {
        if (false !== strpos($this->class, ':')) {
            $metadata = $this->objectManager->getClassMetadata($this->class);
            $this->class = $metadata->getName();
        }
        return $this->class;
    }

    /**
     * @inheritdoc
     * @version 1.0
     */
    public function saveObject($object)
    {
        if (null !== $object) {
            $this->objectManager->persist($object);
            $this->objectManager->flush();
            return $object;
        } else {
            throw new \Exception($this->translator->trans('app.exception.null_obj'));
        }
    }

    /**
     * @inheritdoc
     * @version 1.0
     */
    public function removeObject($id)
    {
        if (null !== $id) {
            $object = $this->getRepository()->find($id);
            $this->objectManager->remove($object);
            $this->objectManager->flush();
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     * @version 1.0
     */
    public function queryBuilder($parameters = array())
    {
        return $this->getRepository()->queryBuilder($parameters);
    }


    /**
     * {@inheritdoc}
     * @version 1.0
     */
    public function getRepository()
    {
        return $this->objectManager->getRepository($this->getClass());
    }

    /**
     * @inheritdoc
     * @version 1.0
     */
    public function findAllForDataTable(ParamDataTable $paramDataTable)
    {
        $ordemServicos = $this->getRepository()->listOrdemServico(false, $paramDataTable);
        $totalRecord = $this->getRepository()->listOrdemServico(true, $paramDataTable);
        $results = array();
        /**@var OrdemServico $ordemServico */
        foreach ($ordemServicos as $ordemServico) {
            $results[] = array(
                'id' => $ordemServico->getId(),
                'medico' => $ordemServico->getMedico()->getNome(),
                'paciente' => $ordemServico->getPaciente()->getNome(),
                'convenio' => $ordemServico->getConvenio()->getDescricao(),
                'postoColecta' => $ordemServico->getPostoColecta()->getDescricao(),
                'fecha' => ($ordemServico->getFecha()) ? $ordemServico->getFecha()->format('d/m/Y'): '-'

            );
        }
        return new JsonResponse(array(
            'draw' => intval($paramDataTable->getDraw()),
            'recordsTotal' => intval($totalRecord),
            'recordsFiltered' => intval($totalRecord),
            'data' => $results
        ));
    }
}