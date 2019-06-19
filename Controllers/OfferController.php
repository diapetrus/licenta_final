<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 6:11 AM
 */


namespace Controllers;

use Models\PizzaModel;

class OfferController extends BasicController
{
    public $pizzaModel;

    public $oferte = [
        0 => [
            'pizza' => [10,12],
            'free' => 11
        ],
        1 => [
            'pizza' => [19, 13],
            'free' => 7
        ],
        2 => [
            'pizza' => [4, 5, 6],
            'free' => 35
        ],
        3 => [
            'pizza' => [35, 34],
            'free' => 7
        ],
        4 => [
            'pizza' => [35, 19],
            'free' => 1
        ],
        5 => [
            'pizza' => [30, 22],
            'free' => 8
        ]
    ];

    public function __construct()
    {
        parent::__construct();
        $this->title = "Oferte";
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

        $this->content = $this->render('/views/offer/offer_box.php', array('data' => $data));

        $this->renderLayout('/views/layouts/basic.php', array('content' => $this->content));
    }

    public function addToCartAction() {
        $ofertaId = $_POST['oferta_id'];

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
        redirect('/');
    }
}
