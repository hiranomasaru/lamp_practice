CREATE TABLE 'orders'(
    'order_id' int(11)  NOT NULL AUTO_INCREMENT,
    'user_id'  int(11)  NOT NULL,
    `created`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY ('order_id')
);

CREATE TABLE 'orders_detail'(
    'order_id' int(11) NOT NULL,
    'item_id'  int(11) NOT NULL,
    'amount'   int(11) NOT NULL,
    'buy_price'    int(11) NOT NULL,
    `created`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

