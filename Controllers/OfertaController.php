<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 6:11 AM
 */


namespace Controllers;

use Models\PizzaModel;

class OfertaController extends BasicController
{
    public $pizzaModel;

    public $oferte = [
        0 => [
            'pizza' => [1, 2, 3],
            'free' => 5
        ],
        1 => [
            'pizza' => [2, 4, 5],
            'free' => 1
        ]
    ];

    public function __construct()
    {
        parent::__construct();
        $this->title = "Oferta";
        $this->pizzaModel = new PizzaModel();
    }

    public function showAction()
    {
        $data = [];

        foreach($this->oferte as $key => $oferte) {
            $pizzas = $this->pizzaModel->getPizzaByIds($oferte['pizza']);
            $free = $this->pizzaModel->getPizzaById($oferte['free']);

            $data[] = ['id' => $key, 'pizza' => $pizzas, 'free' => $free];
        }

        $this->addToCartAction();
    }

    public function addToCartAction() {

        $_GET['oferta'] = 0;
        if(!isset($_GET['oferta']))
            return;

        $ofertaId = $_GET['oferta'];
        $_SESSION['user']->cart = [];

        foreach($this->oferte[$ofertaId]['pizza'] as $pizzaId) {
            $pizza = $this->pizzaModel->getPizzaById($pizzaId);
            $_SESSION['user']->cart[] = [
                'pizza' => $pizza,
                'quantity' => 1
            ];
        }

        $free = $this->pizzaModel->getPizzaById($this->oferte[$ofertaId]['free']);
        $free->setPricep(0);
        $_SESSION['user']->cart[] = [
            'pizza' => $free,
            'quantity' => 1
        ];

    }
}
