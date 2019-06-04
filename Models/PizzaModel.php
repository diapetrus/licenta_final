<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 6:15 AM
 */

namespace Models;

namespace Models;

use Entities\PizzaEntity;

class PizzaModel extends BasicModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPizza()
    {
        $query = $this->dsql_connection->dsql();
        $result = $query->table('pizza')->get();
        $pizza = NULL;
        if ($result) {
            foreach ($result as $res) {
                $pizza[] = new PizzaEntity(array(
                        "idp" => $res['idp'],
                        "titlep" => $res['titlep'],
                        "describep" => $res['describep'],
                        "imagep" => $res['imagep'],
                        "pricep" => $res['pricep'],
                    )
                );
            }
        }
        return $pizza;
    }

    public function getPizzaById($idp)
    {
        $query = $this->dsql_connection->dsql();
        $result = $query->table('pizza')
            ->where('idp', '=', $idp)
            ->getRow();
        $pizza = NULL;
        if ($result) {
            $pizza = new PizzaEntity(array(
                    "idp" => $result['idp'],
                    "titlep" => $result['titlep'],
                    "describep" => $result['describep'],
                    "imagep" => $result['imagep'],
                    "pricep" => $result['pricep'],
                )
            );
        }
        return $pizza;
    }

    public function findByTitle($titlep)
    {
        $query = $this->dsql_connection->dsql();
        $result = $query
            ->table('pizza')
            ->where('titlep', "=", $titlep)
            ->getRow();
        $pizza = NULL;
        if ($result) {
            $pizza = new PizzaEntity(array(
                    "idp" => $result['idp'],
                    "titlep" => $result['titlep'],
                    "describep" => $result['describep'],
                    "imagep" => $result['imagep'],
                    "pricep" => $result['pricep'],
                )
            );
        }
        return $pizza;
    }

    public function addPizza($params)
    {
        $query = $this->dsql_connection->dsql();
        $query->table('pizza')
            ->set('titlep', $params["titlep"])
            ->set('describep', $params["describep"])
            ->set('pricep', $params["pricep"])
            ->set('imagep', $params["imagep"])
            ->insert();
    }

    public function updatePizza($idp, $params)
    {
        $query = $this->dsql_connection->dsql();
        $query->table('pizza')
            ->set('describep', $params["describep"])
            ->set('pricep', $params["pricep"])
            ->set('imagep', $params["imagep"]);
        $query->where("idp", "=", $idp)->update();
    }

    public function deletePizza($idp)
    {
        $query = $this->dsql_connection->dsql();
        $query->table('pizza')
            ->where('idp', "=", $idp)
            ->delete();
    }

}