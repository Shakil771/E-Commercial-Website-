--Create Database
--CREATE DATABASE Ecommerce;


--Create TABLE User
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` ENUM('Male', 'Female', 'Other'),
  `status` ENUM('Active', 'Inactive') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--Create Table Product
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL UNIQUE,
  `brand` VARCHAR(100),
  `price` DECIMAL(10, 2) NOT NULL,
  `stock_quantity` INT,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `units_sold` INT DEFAULT 0,
  `category` varchar(255) NOT NULL,
  `rating` DECIMAL(3, 2) DEFAULT 0,
  `shipping` ENUM('Paid', 'Free') DEFAULT 'Paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table structure for table `productbuy`
--

CREATE TABLE IF NOT EXISTS `productbuy` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `card_number` varchar(20) DEFAULT NULL,
  `name_on_card` varchar(100) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  FOREIGN KEY (`product_id`) REFERENCES products(`id`),
  FOREIGN KEY (`customer_id`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS addToCart (
    `buy_id` INT AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT,
    `customer_id` INT,
    `quantity` INT,
    `total_price` DECIMAL(10, 2),
    `add_date` TIMESTAMP,
    FOREIGN KEY (`product_id`) REFERENCES products(`id`),
    FOREIGN KEY (`customer_id`) REFERENCES user(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table structure for table `contact_message`

CREATE TABLE IF NOT EXISTS contact_message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
