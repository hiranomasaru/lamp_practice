<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細一覧</h1>
  <div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>
  <p>注文番号：<?php print($orders_detail[0]['order_id']);?>　購入日時：<?php print($orders_detail[0]['created']);?>　合計金額：<?php print(number_format(sum_orders($orders_detail)));?>円</p>
    <?php if(count($orders_detail) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($orders_detail as $order_detail){ ?>
          <?php 
            foreach($order_detail as $key => $value){
              if(is_numeric($value) === false){
                $order_detail[$key] = h($value);
              }
            }
          ?>
          <tr>
            <td><?php print($order_detail['name']); ?></td>
            <td><?php print(number_format($order_detail['buy_price'])); ?></td>
            <td><?php print(number_format($order_detail['amount'])); ?>個</td>
            <td><?php print(number_format($order_detail['buy_price'] * $order_detail['amount'])); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>購入履歴はありません。</p>
    <?php } ?> 
  </div>
  <script>
    $('.delete').on('click', () => confirm('本当に削除しますか？'))
  </script>
</body>
</html>