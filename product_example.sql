CREATE DATABASE assignment1;
use assignment1;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) unsigned DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `subcategory` varchar(20) DEFAULT NULL,
  `img_path` varchar(20) DEFAULT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=latin1

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1000, 'Fish Fingers', 2.55, '500 gram', 1500, 'Frozen', 'Meat and Seafood', "fish_fingers.jpg");
INSERT INTO `products` VALUES (1001, 'Fish Fingers', 5.00, '1000 gram', 750, 'Frozen', 'Meat and Seafood', "fish_fingers.jpg");
INSERT INTO `products` VALUES (1002, 'Hamburger Patties', 2.35, 'Pack 10', 1200, 'Frozen', 'Meat and Seafood', 'hamburger_patties.jpg');
INSERT INTO `products` VALUES (1003, 'Shelled Prawns', 6.90, '250 gram', 300, 'Frozen', 'Meat and Seafood', 'prawns.jpg');
INSERT INTO `products` VALUES (1004, 'Tub Ice Cream', 1.80, '1 Litre', 800, 'Frozen', 'Dessert', 'ice_cream.jpg');
INSERT INTO `products` VALUES (1005, 'Tub Ice Cream', 3.40, '2 Litre', 1200, 'Frozen', 'Dessert', 'ice_cream.jpg');
INSERT INTO `products` VALUES (2000, 'Panadol', 3.00, 'Pack 24', 2000, 'Health and Hygiene', 'Medicine','panadol.jpg');
INSERT INTO `products` VALUES (2001, 'Panadol', 5.50, 'Bottle 50', 1000, 'Health and Hygiene', 'Medicine','panadol.jpg');
INSERT INTO `products` VALUES (2002, 'Bath Soap', 2.60, 'Pack 6', 500, 'Health and Hygiene', 'Soap','soap.jpg');
INSERT INTO `products` VALUES (2003, 'Garbage Bags Small', 1.50, 'Pack 10', 500, 'Health and Hygiene', 'Garbage','garbage.jpg');
INSERT INTO `products` VALUES (2004, 'Garbage Bags Large', 5.00, 'Pack 50', 300, 'Health and Hygiene', 'Garbage','garbage.jpg');
INSERT INTO `products` VALUES (2005, 'Washing Powder', 4.00, '1000 gram', 800, 'Health and Hygiene', 'Cleaning','washing_powder.jpg');
INSERT INTO `products` VALUES (2006, 'Laundry Bleach', 3.55, '2 Litre Bottle', 500, 'Health and Hygiene', 'Cleaning','bleach.jpg');
INSERT INTO `products` VALUES (3000, 'Cheddar Cheese', 8.00, '500 gram', 1000, 'Chilled', 'Dairy','cheddar.jpg');
INSERT INTO `products` VALUES (3001, 'Cheddar Cheese', 15.00, '1000 gram', 1000, 'Chilled', 'Dairy','cheddar.jpg');
INSERT INTO `products` VALUES (3002, 'T Bone Steak', 7.00, '1000 gram', 200, 'Chilled', 'Meat and Seafood','steak.jpg');
INSERT INTO `products` VALUES (3003, 'Navel Oranges', 3.99, 'Bag 20', 200, 'Produce', 'Fruit','orange.jpg');
INSERT INTO `products` VALUES (3004, 'Bananas', 1.49, 'Kilo', 400, 'Produce', 'Fruit','banana.jpg');
INSERT INTO `products` VALUES (3005, 'Peaches', 2.99, 'Kilo', 500, 'Produce', 'Fruit','peach.jpg');
INSERT INTO `products` VALUES (3006, 'Grapes', 3.50, 'Kilo', 200, 'Produce', 'Fruit','grapes.jpg');
INSERT INTO `products` VALUES (3007, 'Apples', 1.99, 'Kilo', 500, 'Produce', 'Fruit','apple.jpg');
INSERT INTO `products` VALUES (3008, 'Lettuce', 2.99, 'Kilo', 500, 'Produce', 'Veg','lettuce.jpg');
INSERT INTO `products` VALUES (3009, 'Chicken Mince', 4.00, '500 gram', 200, 'Chilled', 'Meat and Seafood','chicken_mince.jpg');
INSERT INTO `products` VALUES (3010, 'Beef Mince', 5.00, '500 gram', 200, 'Chilled', 'Meat and Seafood','chicken_mince.jpg');
INSERT INTO `products` VALUES (3011, 'Baby Spinach', 1.00, '200 gram', 500, 'Produce', 'Veg','spinach.jpg');
INSERT INTO `products` VALUES (3011, 'Potato', 5.99, 'Kilo', 45, 'Produce', 'Veg','potato.jpg'); 
INSERT INTO `products` VALUES (4000, 'Earl Grey Tea Bags', 2.49, 'Pack 25', 1200, 'Drinks', 'Tea and Coffee','earl_grey_tea.jpg');
INSERT INTO `products` VALUES (4001, 'Earl Grey Tea Bags', 7.25, 'Pack 100', 1200, 'Drinks', 'Tea and Coffee','earl_grey_tea.jpg');
INSERT INTO `products` VALUES (4002, 'Earl Grey Tea Bags', 13.00, 'Pack 200', 800, 'Drinks', 'Tea and Coffee','earl_grey_tea.jpg');
INSERT INTO `products` VALUES (4003, 'Instant Coffee', 2.89, '200 gram', 500, 'Drinks', 'Tea and Coffee','coffee.jpg');
INSERT INTO `products` VALUES (4004, 'Instant Coffee', 5.10, '500 gram', 500, 'Drinks', 'Tea and Coffee','coffee.jpg');
INSERT INTO `products` VALUES (4005, 'Dark Chocolate Bar', 2.50, '500 gram', 300, 'Candies', 'Chocolate','chocolate.jpg');
INSERT INTO `products` VALUES (4006, 'Milk', 5.00, '1 Litre', 0, 'Drinks', 'Milk','milk.jpg');
INSERT INTO `products` VALUES (4007, 'Almond Milk', 6.00, '1 Litre', 500, 'Drinks', 'Milk','almong_milk.jpg');
INSERT INTO `products` VALUES (4008, 'Oat Milk', 6.00, '1 Litre', 500, 'Drinks', 'Milk','oat_milk.pnmg');
INSERT INTO `products` VALUES (4009, 'Milk Chocolate Bar', 3.50, '500 gram', 300, 'Candies', 'Chocolate','chocolate.jpg');
INSERT INTO `products` VALUES (4010, 'Chewing Gum', 1.50, '100 gram', 300, 'Candies', 'Gum','gum.jpg');
INSERT INTO `products` VALUES (4011, 'M&Ms', 1.50, '100 gram', 300, 'Candies', 'Chocolate','mnms.jpg');
INSERT INTO `products` VALUES (4012, 'Matcha', 5.50, '100 gram', 20, 'Drinks', 'Tea and Coffee','matcha.jpg');
INSERT INTO `products` VALUES (5000, 'Dry Dog Food', 5.95, '5 kg Pack', 400, 'Pets', 'Pet Food','dog_food.jpg');
INSERT INTO `products` VALUES (5001, 'Dry Dog Food', 1.95, '1 kg Pack', 400, 'Pets', 'Pet Food','dog_food.jpg');
INSERT INTO `products` VALUES (5002, 'Bird Food', 3.99, '500g packet', 200, 'Pets', 'Pet Food','bird_food.jpg');
INSERT INTO `products` VALUES (5003, 'Cat Food', 2.00, '500g tin', 200, 'Pets', 'Pet Food','cat_food.png');
INSERT INTO `products` VALUES (5004, 'Fish Food', 3.00, '500g packet', 200, 'Pets', 'Pet Food','ifsh_food.jpg');
INSERT INTO `products` VALUES (5005, 'Dog Leash', 10.00, '1 Piece', 5, 'Pets', 'Pet Accessories','leash.jpg');
COMMIT;
