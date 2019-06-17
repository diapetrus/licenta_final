<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 6/16/2019
 * Time: 6:10 AM
 */

namespace Entities;


class SauceEntity
{
    private $ids;
    private $names;
    private $describes;
    private $prices;

    public function __construct($param)
    {
        foreach ($param as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param mixed $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return mixed
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param mixed $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }

    /**
     * @return mixed
     */
    public function getDescribes()
    {
        return $this->describes;
    }

    /**
     * @param mixed $describes
     */
    public function setDescribes($describes)
    {
        $this->describes = $describes;
    }

    /**
     * @return mixed
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param mixed $priceps
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
    }
}