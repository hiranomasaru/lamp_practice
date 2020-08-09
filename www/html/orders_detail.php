<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'order.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

if(check_token() === false){
  redirect_to(LOGIN_URL);
  exit;
}

set_token();

iframe_prohibit();

$db = get_db_connect();
$user = get_login_user($db);
$order = get_post('order_id');

if(is_admin($user) === true){
  $orders_detail = get_admin_order_detail($db, $order);
}else{
  $orders_detail = get_user_order_detail($db, $user['user_id'], $order);
}

include_once VIEW_PATH . 'orders_detail_view.php';