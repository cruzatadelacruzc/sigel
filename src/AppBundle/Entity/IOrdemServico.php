<?php


namespace AppBundle\Entity;

use AppBundle\Entity\ValueObject\Graphics;
use AppBundle\Entity\ValueObject\ParamDataTable;
use AppBundle\Entity\ValueObject\ReportSetting;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\PersistentCollection;
use Doctrine\ORM\QueryBuilder;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


interface IOrdemServico
{

    /**
     * Crea una instancia si el id es nulo(null)
     * y si no es nulo lo trae de la base de datos.
     * @param $id
     * @return mixed
     */
    public function CreateEntity($id = null);

    /**
     * Devuelve el nombre de clase.
     * @return string
     */
    public function getClass();

    /**
     * Devuelve una entidad de la base de datos
     * @return ObjectRepository
     */
    public function getRepository();

    /**
     * Retorna los datos de la Indicacion necesarios para pintar en el datatable
     * @param ParamDataTable $paramDataTable
     * @return JsonResponse
     */
    public function findAllForDataTable(ParamDataTable $paramDataTable);

    /**
     * Almacenar el Objeto(Entidades) en la base de datos
     * @param $object
     * @return mixed
     * @throws \Exception
     */
    public function saveObject($object);

    /**
     * Remover el Objeto(Entidades) en la base de datos
     * @param integer $id
     * @return boolean
     */
    public function removeObject($id);

    /**
     * @param array $parameters
     * @return QueryBuilder
     */
    public function queryBuilder($parameters = array());


}