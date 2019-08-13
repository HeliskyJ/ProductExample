create database products;
use products;

CREATE TABLE product(
    id  INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    product_name VARCHAR(99) NOT NULL,
    pricce DECIMAL(12,2) NOT NULL,
    is_active BOOLEAN NOT NULL
);
