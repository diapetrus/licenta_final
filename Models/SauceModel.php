<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 6/16/2019
 * Time: 6:13 AM
 */

namespace Models;

use Entities\SauceEntity;

class SauceModel extends BasicModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSauce()
    {
        $query = $this->dsql_connection->dsql();
        $result = $query->table('sauce')->get();
        $sauce = NULL;
        if ($result) {
            foreach ($result as $res) {
                $sauce[] = new SauceEntity(array(
                        "ids" => $res['ids'],
                        "names" => $res['names'],
                        "describes" => $res['describes'],
                        "images" => $res['images'],
                        "prices" => $res['prices'],
                    )
                );
            }
        }
        return $sauce;
    }

    public function getSauceById($ids)
    {
        $query = $this->dsql_connection->dsql();
        $result = $query->table('sauce')
            ->where('ids', '=', $ids)
            ->getRow();
        $sauce = NULL;
        if ($result) {
            $sauce = new SauceEntity(array(
                    "ids" => $result['ids'],
                    "names" => $result['names'],
                    "describes" => $result['describes'],
                    "images" => $result['images'],
                    "prices" => $result['prices'],
                )
            );
        }
        return $sauce;
    }

    public function findSauceByTitle($names)
    {
        $query = $this->dsql_connection->dsql();
        $data = $query
            ->table('sauce')
            ->where('names', "like", '%'.$names.'%')
            ->get();
        $sauce = [];
        if ($data) {
            foreach($data as $result) {
                $sauce[] = new SauceEntity(array(
                        "ids" => $result['ids'],
                        "names" => $result['names'],
                        "describes" => $result['describes'],
                        "images" => $result['images'],
                        "prices" => $result['prices'],
                    )
                );
            }
        }
        return $sauce;
    }

    public function addSauce($params)
    {
        $query = $this->dsql_connection->dsql();
        $query->table('sauce')
            ->set('names', $params["names"])
            ->set('describes', $params["describes"])
            ->set('images', $params["images"])
            ->set('prices', $params["prices"])
            ->insert();
    }

    public function updateSauce($ids, $params)
    {
        $query = $this->dsql_connection->dsql();
        $query->table('sauce')
            ->set('names', $params["names"])
            ->set('describes', $params["describes"])
            ->set('images', $params["images"])
            ->set('prices', $params["prices"]);
        $query->where("ids", "=", $ids)->update();
    }

    public function deleteSauce($ids)
    {
        $query = $this->dsql_connection->dsql();
        $query->table('sauce')
            ->where('ids', "=", $ids)
            ->delete();
    }

}