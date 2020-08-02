<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

//セッションスタート
session_start();

//ログインの有無の確認　未ログインはログイン画面へ
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

//DBに接続
$db = get_db_connect();

//user情報の取得
$user = get_login_user($db);

//ユーザがadminでない場合、ログイン画面へ
if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}

//ポスト送信のitem_idを変数に代入
$item_id = get_post('item_id');
//ポスト送信のchange_toを変数に代入
$changes_to = get_post('changes_to');

//公開情報別に場合わけ
if($changes_to === 'open'){
  //ステータス情報の更新
  update_item_status($db, $item_id, ITEM_STATUS_OPEN);
  //セッション配列に代入
  set_message('ステータスを変更しました。');
}else if($changes_to === 'close'){
  update_item_status($db, $item_id, ITEM_STATUS_CLOSE);
  set_message('ステータスを変更しました。');
}else {
  set_error('不正なリクエストです。');
}


redirect_to(ADMIN_URL);