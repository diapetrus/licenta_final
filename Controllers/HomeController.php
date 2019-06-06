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
    public $pizzaModel;

    public function __construct()
    {
        parent::__construct();
        $this->title = "Homepage";
        $this->pizzaModel = new PizzaModel();
    }

    public function homePageAction()
    {
        $pizza = $this->pizzaModel->getPizza();
        if ($_GET['q'] === '/search') {
            $this->title = "Search";
            redirect('/search');
        }

        $this->generatePage($pizza);
    }

    public function filterAction() {
        $pizza = $this->pizzaModel->filter($_GET);
        $this->generatePage($pizza);
    }

    private function generatePage($pizza) {
        $filter = $this->render('/views/pizza/filter.php');
        $homePage = $filter.pizza_generate($pizza);
        $recomandari = $this->pizzaModel->getRocomandari();
        $this->content = $this->render('/views/home/home_content.php', array('homePage' => $homePage));
        $sidebar = $this->render('/views/forms/home_search_form.php', array(
            'searchFields' => $_GET,
            'messages' => render_messages(get_messages()),
            'recomandari' => $recomandari
        ));
        $this->renderLayout('/views/layouts/sidebar_page.php', array('sidebar' => $sidebar));
    }
}
