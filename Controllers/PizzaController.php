<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 7:00 AM
 */

namespace Controllers;

use Models\PizzaModel;

class PizzaController extends BasicController
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "Pizza";
    }

    public function pizzaPageAction($id)
    {
        $pizzaModel = new PizzaModel();
        $pizza = $pizzaModel->getPizzaById($id);
        $this->content = $this->render('/views/pizza/individual_pizza_page.php', array('pizza' => $pizza));
        $this->renderLayout('/views/layouts/basic.php', array('content' => $this->content));
    }

    public function searchPageAction() {
        $pizzaModel = new PizzaModel();
        $pizza = $pizzaModel->findByTitle($_GET['titlep']);
        if ($_GET['q'] === '/search') {
            $this->title = "Cautare";
        }
        $homePage = pizza_generate($pizza);
        $recommendation = $pizzaModel->getRecommendation();
        $this->content = $this->render('/views/home/home_content.php', array("homePage" => $homePage));
        $sidebar = $this->render('/views/forms/home_search_form.php', array(
            'searchFields' => $_GET,
            'messages' => render_messages(get_messages()),
            'recommendation' => $recommendation
        ));
        $this->renderLayout('/views/layouts/sidebar_page.php', array('sidebar' => $sidebar));
    }

    public function adminPageAction()
    {
        $pizzaModel = new PizzaModel();
        $pizza = $pizzaModel->getPizza();
        $pizzaPage = pizza_admin_generate($pizza);
        $this->content = $this->render('/views/home/admin_content.php');
        $this->content .= $this->render('/views/home/home_content.php', array('homePage' => $pizzaPage));
        $this->get();
    }

    public function adminHistoryAction()
    {
        $pizzaModel = new PizzaModel();
        $history = $pizzaModel->getHistory();
        $homepage = $this->render('/views/home/history_content.php', array('history' => $history));
        $this->content .= $this->render('/views/home/home_content.php', array('homePage' => $homepage));
        $this->get();
    }

    public function addPizzaPage()
    {
        $pizzaModel = new PizzaModel();
        if (!empty($_POST)) {
            $pizzaModel->addPizza($_POST);
            redirect("/adminPage");
        } else {
            $this->content = $this->render('/views/pizza/add_pizza_page.php');
            $this->renderLayout('/views/layouts/basic.php');
        }
    }

    public function updatePizzaPage($idp)
    {
        $pizzaModel = new PizzaModel();
        if (!empty($_POST)) {
            $pizzaModel->updatePizza($idp, $_POST);
            redirect("/adminPage");
        } else {
            $pizza = $pizzaModel->getPizzaById($idp);
            $this->title = $pizza->getTitlep();
            $this->content = $this->render('/views/pizza/update_pizza_page.php', array('pizza' => $pizza));
            $this->renderLayout('/views/layouts/basic.php');
        }
    }

    public function deletePizzaPage($idp)
    {
        $pizzaModel = new PizzaModel();
        if (!empty($_POST)) {
            if ($_POST['confirm']=='Yes')
            {
                $pizzaModel->deletePizza($idp);
                redirect("/adminPage");
            }
            else
                redirect("/adminPage");
        }
        else {
            $pizza = $pizzaModel->getPizzaById($idp);
            $this->title = $pizza->getTitlep();
            $this->content = $this->render('/views/pizza/delete_pizza_page.php', array('pizza' => $pizza));
            $this->renderLayout('/views/layouts/basic.php');
        }
    }

}
