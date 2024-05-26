<?php
$module_name = "teachers";

require_once("../../inc/includes.php");
require_once("../../vendor/autoload.php");

function handleAction($module_name, $action, $id = null) {
    global $$module_name;
    $module_object = $$module_name;
    $result = false;
    $message = '';

    switch ($action) {
        case 'login':
        $getCustomer = $customers->get('112');
        die($_REQUEST['id']);
        if($getCustomer){
            $_SESSION['id_customer'] = $getCustomer->id;
            $_SESSION['name_customer_name'] = $getCustomer->name;
            $_SESSION['email_customer'] = $getCustomer->email;
            redirect($base_url.'/panel', 'Login successful, welcome!', 'success');
        }else{
            redirect("/admin/{$module_name}/edit/{$_REQUEST['id']}", "User not found", "error");
        }

    }

}

$action = $_POST['action'] ?? $_GET['action'] ?? null;
$id = $_POST['id'] ?? $_GET['id'] ?? null;

if ($action) {
    handleAction($module_name, $action, $id);
}
?>
