<?php

require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';


session_start();

//セッション名が取得できない場合、ログイン画面に移動
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

//DBへの接続　返り値はPDO
$db = get_db_connect();

//ユーザIDを使用して、ユーザのデータをfetchで取得
$user = get_login_user($db);

//ユーザのタイプがadminでない場合、ログイン画面へ移動
if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}

 //公開ステータスの商品を取得
$items = get_all_items($db);
//adminの画面を表示
include_once VIEW_PATH . '/admin_view.php';
