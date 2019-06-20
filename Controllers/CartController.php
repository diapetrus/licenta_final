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
use Models\SauceModel;

class CartController extends BasicController
{
    public function addToCart()
    {
        $pizzaModel = new PizzaModel();
        $sauceModel = new SauceModel();
        $pizza = $pizzaModel->getPizzaById($_POST['pizza']);
        $sauce = $sauceModel->getSauceById($_POST['sauce']);
        if ($_SESSION['user']->idu) {
            if ($pizza) {
                $_SESSION['user']->cart[] = [
                    'pizza' => $pizza,
                    'quantity' => $_POST['quantity']
                ];
            } else {
                if ($sauce) {
                    $_SESSION['user']->cart[] = [
                        'sauce' => $sauce,
                        'quantity' => $_POST['quantity']];
                }
            }
            redirect('/');
        } else
            redirect('/login');
    }


    public function removeFromCart($idp)
    {
        foreach ($_SESSION['user']->cart as $key => $item) {
            if (isset($item['pizza'])) {
                if ($item['pizza']->getIdp() === $idp) {
                    unset($_SESSION['user']->cart[$key]);
                }
            } else
                if (isset($item['sauce'])) {
                    if ($item['sauce']->getIds() === $idp) {
                        unset($_SESSION['user']->cart[$key]);
                    }
                }
                else
                    if(isset($item['pizzaof'])){
                        if ($item['idof'] === $idp) {
                            unset($_SESSION['user']->cart[$key]);
                        }
                    }
        }
        redirect('/cart');
    }

    public function removeOfferFromCart($offerKey) {
        unset($_SESSION['user']->cart['offer'][$offerKey]);
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
        $this->content = $this->render('/views/cart/cart.php');
        $this->get();
    }

}
