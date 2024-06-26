<?php

namespace AppBundle\Repository;

use AppBundle\Entity\OrdemServico;
use AppBundle\Entity\ValueObject\ParamDataTable;
use AppBundle\Infrastucture\Util;

/**
 * OrdemServicoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrdemServicoRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * Consulta a la base de datos para devolver los datos soliciados.
     * El parametro count sirve para contar la cantidad de el totalRecord del datatable.
     * @param $count
     * @param ParamDataTable $paramDataTable
     * @return array|mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function listOrdemServico($count, ParamDataTable $paramDataTable)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('COUNT(ordem_servico)')
            ->from(OrdemServico::class, 'ordem_servico')
            ->innerJoin('ordem_servico.medico', 'medico')
            ->innerJoin('ordem_servico.paciente', 'paciente')
            ->innerJoin('ordem_servico.convenio', 'convenio')
            ->innerJoin('ordem_servico.postoColecta', 'postoColecta');

        if ($paramDataTable->getSearch() != "")
            Util::bindSearch($qb, $paramDataTable->getSearch(), $paramDataTable->getColumns());

        if ($count) {
            $result = $qb->getQuery()->getSingleScalarResult();
            return $result;
        } else {
            $sortBy = $qb->getRootAlias() . '.fecha';
            $sortBy = $paramDataTable->getSort() == 'medico' ? 'medico.nome' : $sortBy;
            $sortBy = $paramDataTable->getSort() == 'paciente' ? 'paciente.nome' : $sortBy;
            $sortBy = $paramDataTable->getSort() == 'convenio' ? 'convenio.descricao' : $sortBy;
            $sortBy = $paramDataTable->getSort() == 'postoColecta' ? 'postoColecta.descricao' : $sortBy;

            $qb->select('ordem_servico');
            $qb->orderBy($sortBy, $paramDataTable->getOrder())
                ->setFirstResult($paramDataTable->getStart());
            if ($paramDataTable->getEnd() != -1)
                $qb->setMaxResults($paramDataTable->getEnd());
            return $qb->getQuery()->getResult();
        }
    }
}
