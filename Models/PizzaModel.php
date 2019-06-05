<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 6:15 AM
 */

namespace Models;

namespace Models;

use atk4\core\Exception;
use Entities\PizzaEntity;
use atk4\dsql\Expression;

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

    public function getRocomandari() {
        $query = $this->dsql_connection->dsql();
        $counts = [];
        $recomandari = [];
        $result = $query
            ->field('p.*')
            ->field('hp.quantity')
            ->table('history', 'h')
            ->join('history_products hp', new Expression("h.idh=hp.idh"), "inner")
            ->join('pizza p', new Expression("p.idp=hp.idp"), "inner")
            ->get();
        foreach($result as $res) {
            if (!isset($counts[$res['idp']])) {
                $counts[$res['idp']] = 0;
            }

            $counts[$res['idp']] += $res['quantity'];
        }
        uksort($counts, function ($item1, $item2) {
            return $item1['price'] <= $item2['price'];
        });
        foreach($counts as $key => $c) {
            $key = array_search($key, array_column($result, 'idp'));
            $recomandari[] = $result[$key];
        }

        return $recomandari;
    }

    public function getHistory() {
        $query = $this->dsql_connection->dsql();
        try {
            $result = $query
                ->field('p.*')
                ->field('h.totalprice, h.idh')
                ->field('u.email')
                ->field('hp.quantity')
                ->table('history', 'h')
                ->join('history_products hp', new Expression("h.idh=hp.idh"), "inner")
                ->join('pizza p', new Expression("p.idp=hp.idp"), "inner")
                ->join('users u', new Expression("u.idu=h.idu"), "inner")
                ->get();
        }catch(Exception $e) {
            print_r($e);
        }

        return $this->_group_by($result, 'idh');
    }

    private function _group_by($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }
}
