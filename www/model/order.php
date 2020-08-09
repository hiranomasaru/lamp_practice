<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function insert_orders($db, $user_id){
  $sql = "
    INSERT INTO
      orders(
        user_id
      )
    VALUES(?)
  ";

  return execute_query($db, $sql, array($user_id));
}

function insert_orders_detail($db, $order_id, $item_id, $amount = 1, $price){
  $sql = "
    INSERT INTO
      orders_detail(
        order_id,
        item_id,
        amount,
        buy_price
      )
    VALUES(?, ?, ?, ?)
  ";

  return execute_query($db, $sql, array($order_id, $item_id, $amount, $price));
}

function get_user_orders($db, $user_id){
  $sql = "
    SELECT
      orders.created,
      orders.order_id,
      SUM(orders_detail.buy_price * orders_detail.amount ) AS sum
    FROM
      orders_detail
    JOIN
      orders
    ON
      orders_detail.order_id = orders.order_id
    WHERE
      orders.user_id = ?
    GROUP BY
      orders_detail.order_id
    ORDER BY
      orders.created DESC
  ";
  return fetch_all_query($db, $sql ,array($user_id));
}

function get_admin_orders($db){
  $sql = "
    SELECT
      orders.created,
      orders.order_id,
      SUM(orders_detail.buy_price * orders_detail.amount) AS sum
    FROM
      orders_detail
    JOIN
      orders
    ON
      orders_detail.order_id = orders.order_id
    GROUP BY
      orders_detail.order_id
    ORDER BY
      orders.created DESC
  ";
  return fetch_all_query($db, $sql);
}

function get_user_order_detail($db, $user_id, $order_id){
    $sql = "
      SELECT
        orders_detail.amount,
        orders_detail.buy_price,
        orders.created,
        orders.order_id,
        items.name,
        items.price
      FROM
        orders_detail
      JOIN
        orders
      ON
        orders_detail.order_id = orders.order_id
      JOIN
        items
      ON
        orders_detail.item_id = items.item_id
      JOIN
        users
      ON
        orders.user_id = users.user_id
      WHERE
        orders.user_id = ?
      AND
        orders.order_id = ?
    ";
  return fetch_all_query($db, $sql,array($user_id, $order_id));
}

function get_admin_order_detail($db, $order_id){
  $sql = "
    SELECT
      orders_detail.amount,
      orders_detail.buy_price,
      orders.created,
      orders.order_id,
      items.name,
      items.price
    FROM
      orders_detail
    JOIN
      orders
    ON
      orders_detail.order_id = orders.order_id
    JOIN
      items
    ON
      orders_detail.item_id = items.item_id
    JOIN
      users
    ON
      orders.user_id = users.user_id
    WHERE
      orders.order_id = ?
  ";
return fetch_all_query($db, $sql,array($order_id));
}

function sum_orders($orders){
  $total_price = 0;
  foreach($orders as $order){
    $total_price += $order['buy_price'] * $order['amount'];
  }
  return $total_price;
}