<?php
//定数の定義

//ドキュメントルートの設定

//modelパス設定
define('MODEL_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../model/');
//viewパス設定
define('VIEW_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../view/');
//$_SERVER['DOCUMENT_ROOT']でデータのある場所のvar/www/htmlを指定し、..で１つ上の階層に移動

//画像パス設定
define('IMAGE_PATH', '/assets/images/');
//cssパス設定
define('STYLESHEET_PATH', '/assets/css/');
//画像保存パス設定
define('IMAGE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' );
//html内のパスは$_SERVER[]が不要

//DB接続用のデータ設定
define('DB_HOST', 'mysql');
define('DB_NAME', 'sample');
define('DB_USER', 'testuser');
define('DB_PASS', 'password');
define('DB_CHARSET', 'utf8');

//各ファイル設定
define('SIGNUP_URL', '/signup.php');
define('LOGIN_URL', '/login.php');
define('LOGOUT_URL', '/logout.php');
define('HOME_URL', '/index.php');
define('CART_URL', '/cart.php');
define('FINISH_URL', '/finish.php');
define('ADMIN_URL', '/admin.php');

//バリデーション設定
define('REGEXP_ALPHANUMERIC', '/\A[0-9a-zA-Z]+\z/');
define('REGEXP_POSITIVE_INTEGER', '/\A([1-9][0-9]*|0)\z/');

//ユーザ名・パスワード文字数判別用
define('USER_NAME_LENGTH_MIN', 6);
define('USER_NAME_LENGTH_MAX', 100);
define('USER_PASSWORD_LENGTH_MIN', 6);
define('USER_PASSWORD_LENGTH_MAX', 100);

//ログインユーザの判別用
define('USER_TYPE_ADMIN', 1);
define('USER_TYPE_NORMAL', 2);

//商品数判別用
define('ITEM_NAME_LENGTH_MIN', 1);
define('ITEM_NAME_LENGTH_MAX', 100);

//ステータス判別用
define('ITEM_STATUS_OPEN', 1);
define('ITEM_STATUS_CLOSE', 0);

//ステータス判別用
define('PERMITTED_ITEM_STATUSES', array(
  'open' => 1,
  'close' => 0,
));

//拡張子判別用
define('PERMITTED_IMAGE_TYPES', array(
  IMAGETYPE_JPEG => 'jpg',
  IMAGETYPE_PNG => 'png',
));