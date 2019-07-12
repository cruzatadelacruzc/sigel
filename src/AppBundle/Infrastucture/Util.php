<?php
/**
 * Created by PhpStorm.
 * User: Cesar
 * Date: 28 jun 2019
 * Time: 20:08
 */

namespace AppBundle\Infrastucture;

use Doctrine\ORM\QueryBuilder;
class Util
{

    /**
     * @param QueryBuilder $qb
     * @param $search
     * @param $columns
     * @return mixed
     */
    static function bindSearch($qb, $search, $columns)
    {
        foreach ($columns as $field) {
            if ($field['searchable'] === 'true') {
                if (self::isRelationship($field['data']))
                    $field = self::isRelationship($field['data']);
                else
                    $field = $qb->getRootAlias() . '.' . $field['data'];
                $qb->orWhere($qb->expr()->like("LOWER($field)", ":prmSearch"))
                    ->setParameter("prmSearch", "%" . $search . "%");
            }
        }
        return $qb;
    }



    public static function isRelationship($field)
    {
        $relationship  = [
            'medico' => 'medico.nome',
            'paciente' => 'paciente.nome',
            'convenio' => 'convenio.descricao',
            'postoColecta' => 'postoColecta.descricao'
        ];

        return array_key_exists($field, $relationship) ? $relationship[$field] : false;
    }
}