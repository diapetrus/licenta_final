<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 4/5/2019
 * Time: 8:32 AM
 */

namespace Controllers;


use Models\HistoryModel;
use Models\PizzaModel;

class CartController extends BasicController
{
    public function addToCart()
    {
        $pizzaModel = new PizzaModel();
        $pizza = $pizzaModel->getPizzaById($_POST['pizza']);
        if ($_SESSION['user']->idu) {
            $_SESSION['user']->cart[] = [
                'pizza' => $pizza,
                'quantity' => $_POST['quantity']
            ];
            redirect('/');
        }
        else
            redirect('/login');
    }


    public function removeFromCart($idp)
    {

        foreach ($_SESSION['user']->cart as $key => $item) {
            if ($item['pizza']->getIdp() === $idp) {
                unset($_SESSION['user']->cart[$key]);
            }
        }
        redirect('/cart');
    }

    public function history()
    {
        $historyModel = new HistoryModel();
        $history = $historyModel->saveToHistory();
        redirect('/');
    }

    public function showCart()
    {
        $this->title = "Cosul meu";
        //$this->checkPromotions();
        $this->content = $this->render('/views/cart/cart.php');
        $this->get();
    }


    /*
    public function checkPromotions() {
        if($this->pizzamediapro())
            $promotie = $this->
    }
    */
}
