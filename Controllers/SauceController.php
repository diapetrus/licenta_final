<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 6/17/2019
 * Time: 5:43 AM
 */

namespace Controllers;


use Models\SauceModel;

class SauceController extends BasicController
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "Sosuri";
    }

    public function homeSaucePageAction()
    {
        $sauceModel = new SauceModel();
        $sauce = $sauceModel->getSauce();
        $homePage = sauce_generate($sauce);
        $this->content = $this->render('/views/home/home_content.php', array('homePage' => $homePage));
        $sidebar = $this->render('/views/forms/home_search_form.php', array(
            'searchFields' => $_GET,
            'messages' => render_messages(get_messages()),
        ));
        $this->renderLayout('/views/layouts/sidebar_page.php', array('sidebar' => $sidebar));
    }

    public function saucePageAction($id)
    {
        $sauceModel = new SauceModel();
        $sauce = $sauceModel->getSauceById($id);
        $this->content = $this->render('/views/sauce/individual_sauce_page.php', array('sauce' => $sauce));
        $this->renderLayout('/views/layouts/basic.php', array('content' => $this->content));
    }

    public function adminSauceAction(){
        $sauceModel = new SauceModel();
        $sauce = $sauceModel->getSauce();
        $homePage = sauce_admin_generate($sauce);
        $this->content = $this->render('/views/home/admin_content2.php');
        $this->content .= $this->render('/views/home/home_content.php', array('homePage' => $homePage));
        $this->get();
    }


    public function addSaucePage()
    {
        $sauceModel = new SauceModel();
        if (!empty($_POST)) {
            $sauceModel->addSauce($_POST, $_FILES['images']);
            redirect("/adminPage");
        } else {
            $this->content = $this->render('/views/sauce/add_sauce_page.php');
            $this->renderLayout('/views/layouts/basic.php');
        }
    }

    public function updateSaucePage($ids)
    {
        $sauceModel = new SauceModel();
        if (!empty($_POST)) {
            $sauceModel->updateSauce($ids, $_POST, $_FILES['images']);
            redirect("/adminPage");
        } else {
            $sauce = $sauceModel->getSauceById($ids);
            $this->title = $sauce->getNames();
            $this->content = $this->render('/views/sauce/update_sauce_page.php', array('sauce' => $sauce));
            $this->renderLayout('/views/layouts/basic.php');
        }
    }

    public function deleteSaucePage($ids)
    {
        $sauceModel = new SauceModel();
        if (!empty($_POST)) {
            if ($_POST['confirm']=='Da')
            {
                $sauceModel->deleteSauce($ids);
                redirect("/adminPage");
            }
            else
                redirect("/adminPage/sauce");
        }
        else {
            $sauce = $sauceModel->getSauceById($ids);
            $this->title = $sauce->getNames();
            $this->content = $this->render('/views/sauce/delete_sauce_page.php', array('sauce' => $sauce));
            $this->renderLayout('/views/layouts/basic.php');
        }
    }


}