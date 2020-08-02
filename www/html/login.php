<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';

session_start();

//ログイン指定ればホーム画面へ移動
if(is_logined() === true){
  redirect_to(HOME_URL);
}

include_once VIEW_PATH . 'login_view.php';