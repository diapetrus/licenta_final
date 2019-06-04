<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 6:10 AM
 */

namespace Controllers;

class BasicController
{
    public $title;
    public $css;
    public $content;
    public $scriptElements;
    public $messages;
    public $userStateClass;

    public function __construct()
    {
        global $user;
        $this->title = '';
        $this->css = '';
        $this->content = '';
        $this->scriptElement = '';
        $this->messages = '';
        get_session_user();
        if($user) {
            $this->userStateClass = 'user-logged-in';
        } else {
            $this->userStateClass = 'user-logged-out';
        }
        $this->addScript("/js/generic.js");
    }

    public function get()
    {
        $this->renderLayout('/views/layouts/basic.php');
    }

    function render($template, $vars = array())
    {
        return pizza_render_template($template, $vars);
    }

    public function getLayoutVars()
    {
        return array(
            'title' => $this->title,
            'css' => $this->css,
            'content' => $this->content,
            'scriptElements' => $this->scriptElements,
            'userStateClass' => $this->userStateClass,
            'messages' => $this->messages,
        );
    }

    function renderLayout($layout, $customVars = array())
    {
        $vars = $customVars + $this->getLayoutVars();
        echo $this->render($layout, $vars);
    }

    public function addScript($scriptFile)
    {
        $this->scriptElements .= "<script src='" . $scriptFile . "'></script>";
    }
}