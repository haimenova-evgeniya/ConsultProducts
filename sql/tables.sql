DROP TABLE IF EXISTS products;
CREATE TABLE products (
  id               smallint unsigned NOT NULL auto_increment,
  barcode		   varchar(255) NOT NULL,
  name		   	   varchar(255) NOT NULL,
  description 	   varchar(255),
  category		   text NOT NULL,
  purchase_price   decimal(20,2) NOT NULL,
  retail_price	   decimal(20,2) NOT NULL,
  amount	   	   smallint unsigned NOT NULL,
  PRIMARY KEY     (id)
);
