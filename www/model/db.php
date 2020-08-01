<?php

//DB接続用
function get_db_connect(){
  // MySQL用のDSN文字列
  $dsn = 'mysql:dbname='. DB_NAME .';host='. DB_HOST .';charset='.DB_CHARSET;
 
  try {
    // データベースに接続
    $dbh = new PDO($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
    //各設定(返り値はbool)
    //例外を投げる
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //エミュレートを無効
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //fetchの設定　カラム名をキーとする連想配列で取得
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //エラーをcatch
  } catch (PDOException $e) {
    //エラーメッセージを返す
    exit('接続できませんでした。理由：'.$e->getMessage() );
  }
  return $dbh;
}

//結果をfetchを使ってデータを格納
function fetch_query($db, $sql, $params = array()){
  try{
    //sql実行の準備　返り値はプリペアステートメントのクラス
    $statement = $db->prepare($sql);
    //sqlの実行
    $statement->execute($params);
    //値を配列に入れていく処理
    return $statement->fetch();
  }catch(PDOException $e){
    set_error('データ取得に失敗しました。');
  }
  return false;
}

//結果をfetch_allを使ってデータを格納
function fetch_all_query($db, $sql, $params = array()){
  try{
    $statement = $db->prepare($sql);
    $statement->execute($params);
    //値をカラム名をキーとして、二次元配列として処理
    return $statement->fetchAll();
  }catch(PDOException $e){
    set_error('データ取得に失敗しました。');
  }
  return false;
}

//クエリの実行のみ
function execute_query($db, $sql, $params = array()){
  try{
    $statement = $db->prepare($sql);
    return $statement->execute($params);
  }catch(PDOException $e){
    set_error('更新に失敗しました。');
  }
  return false;
}