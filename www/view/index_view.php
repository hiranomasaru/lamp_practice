<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <?php 
            foreach($item as $key => $value){
              if(is_numeric($value) === false){
                $item[$key] = h($value);
              }
            }
        ?> 
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print($item['name']); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(IMAGE_PATH . $item['image']); ?>">
              <figcaption>
                <?php print(number_format($item['price'])); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print($item['item_id']); ?>">
                    <input type="hidden" name="csrftoken" value="<?php print(get_session('csrftoken'));?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="rank3">
      <?php $i = 1;?>
      <?php foreach($rank3_items as $rank3_item){ ?>
        <?php 
          foreach($rank3_item as $key => $value){
            if(is_numeric($value) === false){
              $rank3_item[$key] = h($value);
            }
          }
        ?> 
      <p>人気ランキング<?php print($i++) ?>位</p>
      <p><?php print($rank3_item['name']);?></p>
      <img src="<?php print(IMAGE_PATH . $rank3_item['image']); ?>">
      <?php } ;?>
    </div>
  </div>
  
</body>
</html>