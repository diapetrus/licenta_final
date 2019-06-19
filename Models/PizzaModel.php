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
                        "type" => $res['type'],
                        "size" => $res['size'],
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
                    "type" => $result['type'],
                    "size" => $result['size'],
                )
            );
        }
        return $pizza;
    }

    public function getPizzaByIds($ids) {
        $query = $this->dsql_connection->dsql();
        $data = $query->table('pizza')->where('idp', 'in', $ids)->get();

        $pizza = [];
        if ($data) {
            foreach($data as $result) {
                $pizza[] = new PizzaEntity(array(
                        "idp" => $result['idp'],
                        "titlep" => $result['titlep'],
                        "describep" => $result['describep'],
                        "imagep" => $result['imagep'],
                        "pricep" => $result['pricep'],
                        "size" => $result['size']
                    )
                );
            }
        }
        return $pizza;
    }

    public function findByTitle($titlep)
    {
        $query = $this->dsql_connection->dsql();
        $data = $query
            ->table('pizza')
            ->where('titlep', "like", '%'.$titlep.'%')
            ->get();
        $pizza = [];
        if ($data) {
            foreach($data as $result) {
                $pizza[] = new PizzaEntity(array(
                        "idp" => $result['idp'],
                        "titlep" => $result['titlep'],
                        "describep" => $result['describep'],
                        "imagep" => $result['imagep'],
                        "pricep" => $result['pricep'],
                        "size" => $result['size']
                    )
                );
            }
        }
        return $pizza;
    }

    public function addPizza($params, $image)
    {
        $target_dir = "images/";
        $target_file = $target_dir . basename($image["name"]);
        @move_uploaded_file($image["tmp_name"], $target_file);
        $query = $this->dsql_connection->dsql();
        $query->table('pizza')
            ->set('titlep', $params["titlep"])
            ->set('describep', $params["describep"])
            ->set('pricep', $params["pricep"])
            ->set('imagep', '/'.$target_file)
            ->set('type', $params["type"])
            ->set('size', $params["size"])
            ->insert();
    }

    public function updatePizza($idp, $params, $image)
    {
        $target_dir = "images/";
        $target_file = $target_dir . basename($image["name"]);

        @move_uploaded_file($image["tmp_name"], $target_file);
        $query = $this->dsql_connection->dsql();
        $query->table('pizza')
            ->set('describep', $params["describep"])
            ->set('pricep', $params["pricep"])
            ->set('imagep', '/'.$target_file)
            ->set('type', $params["type"])
            ->set('size', $params["size"]);
        $query->where("idp", "=", $idp)->update();
    }

    public function deletePizza($idp)
    {
        $query = $this->dsql_connection->dsql();
        $query->table('pizza')
            ->where('idp', "=", $idp)
            ->delete();
    }

    public function getRecommendation() {
        $query = $this->dsql_connection->dsql();
        $counts = [];
        $recommendation = [];
        if(isset($_SESSION['user'])) {
            $result = $query
                ->field('p.*')
                ->field('hp.quantity')
                ->table('history', 'h')
                ->join('history_products hp', new Expression("h.idh=hp.idh"), "inner")
                ->join('pizza p', new Expression("p.idp=hp.idp"), "inner")
                ->where('h.idu', '=', $_SESSION['user']->idu)
                ->get();
            foreach ($result as $res) {
                if (!isset($counts[$res['idp']])) {
                    $counts[$res['idp']] = 0;
                }

                $counts[$res['idp']] += $res['quantity'];
            }
            arsort($counts);
            foreach ($counts as $key => $c) {
                $key = array_search($key, array_column($result, 'idp'));
                $recommendation[] = $result[$key];
            }
        }
        return $recommendation;
    }

    public function getHistory() {
        $query = $this->dsql_connection->dsql();
        try {
            $result = $query
                ->field('p.*')
                ->field('s.*')
                ->field('u.address')
                ->field('h.date')
                ->field('h.totalprice, h.idh')
                ->field('u.email')
                ->field('hp.quantity')
                ->table('history', 'h')
                ->join('history_products hp', new Expression("h.idh=hp.idh"), "left")
                ->join('pizza p', new Expression("p.idp=hp.idp"), "left")
                ->join('users u', new Expression("u.idu=h.idu"), "left")
                ->join('sauce s', new Expression("s.ids=hp.ids"), "left")
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

    public function filter($params) {
        $query = $this->dsql_connection->dsql();
        $q = $query->table('pizza');

        if(isset($params['type']) && $params['type'] !== '') {
            $q->where('type', '=', $params['type']);
        }

        if(isset($params['size']) && $params['size'] !== '') {
            $q->where('size', '=', $params['size']);
        }

        if(isset($params['min_price']) && $params['min_price'] > 0) {
            $q->where('pricep', '>', $params['min_price']);
        }

        if(isset($params['max_price']) && $params['max_price'] > 0) {
            $q->where('pricep', '<', $params['max_price']);
        }

        $data = $q->get();

        $pizza = [];
        if ($data) {
            foreach($data as $result) {
                $pizza[] = new PizzaEntity(array(
                        "idp" => $result['idp'],
                        "titlep" => $result['titlep'],
                        "describep" => $result['describep'],
                        "imagep" => $result['imagep'],
                        "pricep" => $result['pricep'],
                        "size" => $result['size']
                    )
                );
            }
        }
        return $pizza;

    }
}
