<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 5/29/2019
 * Time: 12:34 PM
 */

namespace Models;


class HistoryModel extends BasicModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saveToHistory(){
        $query = $this->dsql_connection->dsql();
        $currentdata = date("Y-m-d");
        $total = 0;
        foreach($_SESSION['user']->cart as $item) {
            $total += $item['pizza']->getPricep() * $item['quantity'];
        }
        $idu = $_SESSION['user']->idu;
        $result =$query ->table('history')
            ->set('idu', $idu)
            ->set('totalprice',$total)
            ->set('date', $currentdata)
            ->insert();
        $query = $this->dsql_connection->dsql();
        $h = $query->table('history')->get();
        $lastInsertedId = end($h)['idh'];

        foreach($_SESSION['user']->cart as $item) {
            $query = $this->dsql_connection->dsql();
            $query->table('history_products')
                ->set('idp', $item['pizza']->getIdp())
                ->set('idh', $lastInsertedId)
                ->insert();
        }

        $_SESSION['user']->cart = [];
    }
}
