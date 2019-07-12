<?php

namespace AppBundle\Entity\ValueObject;


use Symfony\Component\HttpFoundation\Request;

class ParamDataTable
{

    /**@var string $order */
    private $order;
    /**@var string $draw */
    private $draw;
    /**@var array $columns */
    private $columns;
    /**@var string $sort */
    private $sort;
    /**@var string $start */
    private $start;
    /**@var string $end */
    private $end;
    /**@var string $search */
    private $search;

    /**
     * ParamDataTable constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->order = $this->sort = $request->get('order');
        $this->draw = $request->get('draw');
        $this->columns = $request->get('columns');
        $this->sort = $this->sort[0]['column'];
        $this->sort = $this->columns[$this->sort]['data'];
        $this->start = intval($request->get('start'));
        $this->end = $length = intval($request->get('length'));
        $this->search = $request->get('search')['value'];
        $this->order= $this->order[0]['dir'];
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param string $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }



}