<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴一覧</h1>
  <div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($orders) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>購入明細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($orders as $order){ ?>
          <?php 
            foreach($order as $key => $value){
              if(is_numeric($value) === false){
                $order[$key] = h($value);
              }
            }
          ?>
          <tr>
            <td><?php print($order['order_id']); ?></td>
            <td><?php print($order['created']); ?></td>
            <td><?php print(number_format($order['sum'])); ?>円</td>
            <td>
              <form method="post" action="orders_detail.php">
                <input type="submit" value="購入明細表示" class="btn btn-secondary">
                <input type="hidden" name="order_id" value="<?php print($order['order_id']); ?>">
                <input type="hidden" name="csrftoken" value="<?php print(get_session('csrftoken'));?>">
              </form>
            </td>
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