<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 6:11 AM
 */


namespace Controllers;

use Models\PizzaModel;

class HomeController extends BasicController
{

    public function __construct()
    {
        parent::__construct();
        $this->title = "Homepage";
    }

    public function homePageAction()
    {
        $pizzaModel = new PizzaModel();
        $pizza = $pizzaModel->getPizza();
        if ($_GET['q'] === '/search') {
            $this->title = "Search";
            redirect('/search');
        }
        $homePage = pizza_generate($pizza);
        $recomandari = $pizzaModel->getRocomandari();
        //print_r($recomandari);die;
        $this->content = $this->render('/views/home/home_content.php', array('homePage' => $homePage));
        $sidebar = $this->render('/views/forms/home_search_form.php', array(
            'searchFields' => $_GET,
            'messages' => render_messages(get_messages()),
            'recomandari' => $recomandari
        ));
        $this->renderLayout('/views/layouts/sidebar_page.php', array('sidebar' => $sidebar));
    }
}
