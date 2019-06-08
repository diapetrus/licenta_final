<?php

global $user;

function pizza_render_template($template_file, $variables)
{
    // Extract the variables to a local namespace
    extract($variables, EXTR_SKIP);

    // Start output buffering
    ob_start();

    // Include the template file
    include SITE_ROOT . '/' . $template_file;

    // End buffering and return its contents
    return ob_get_clean();
}

function redirect($path, $http_code = 302)
{
    header('Location: ' . $path, TRUE, $http_code);
    exit;
}

function set_message($message, $type)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['messages'][$type][] = $message;
}

function set_error_messages($messages)
{
    foreach ($messages as $message) {
        set_message($message, 'error');
    }
}

function get_messages()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $messages = !empty($_SESSION['messages']) ? $_SESSION['messages'] : array();
    unset($_SESSION['messages']);
    return $messages;
}

function render_messages($messages)
{
    $output = '';
    if (!empty($messages)) {
        $classes = messages_bootstrap_classes();
        $output .= '<ul>';
        foreach ($messages as $type => $messages_list) {
            foreach ($messages_list as $message) {
                $output .= '<li class="' . (isset($classes[$type]) ? $classes[$type] : '') . '">' . $message . '</li>';
            }
        }
        $output .= '</ul>';
    }
    return $output;
}

function messages_bootstrap_classes()
{
    return array(
        'status' => 'alert alert-success',
        'error' => 'alert alert-warning',
    );
}

function get_session_user()
{
    global $user;
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    return !empty($user) ? $user : NULL;
}

function pizza_generate($pizzas)
{
    $homePage = '';
    if($pizzas!=NULL) {
        foreach ($pizzas as $pizza) {
            $homePage .= pizza_render_template('/views/pizza/pizza_box.php', array('pizza' => $pizza));
        }
    }
    else
        $homePage .= "NOT FOUND!!!";
    return $homePage;
}

function pizza_admin_generate($pizzas)
{
    $homePage = '';
    if($pizzas!=NULL){
        foreach ($pizzas as $pizza) {
            $homePage .= pizza_render_template('/views/pizza/pizza_table.php', array('pizza' => $pizza));
        }
    }
    return $homePage;
}

