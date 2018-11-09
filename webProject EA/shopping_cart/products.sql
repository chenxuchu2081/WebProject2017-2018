-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 18, 2018 at 08:02 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cart`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `products`
-- 

INSERT INTO `products` VALUES (11, 'Macan', 'Macan.jpg', 3.03);
INSERT INTO `products` VALUES (10, 'Levante', 'Levante.jpg', 4.58);
INSERT INTO `products` VALUES (9, 'granturismo', 'granturismo.jpg', 7.64);
INSERT INTO `products` VALUES (7, 'ghost', 'ghost.jpg', 19.08);
INSERT INTO `products` VALUES (8, 'grancabrio', 'grancabrio.jpg', 8.87);
INSERT INTO `products` VALUES (5, '599', '599.jpg', 23);
INSERT INTO `products` VALUES (6, 'dawn', 'dawn.jpg', 23.88);
INSERT INTO `products` VALUES (4, '488 pista', '488 pista.jpg', 13.45);
INSERT INTO `products` VALUES (3, '458 italia', '458 italia.jpg', 13.45);
INSERT INTO `products` VALUES (2, 'DB11', 'DB11.jpg', 52.04);
INSERT INTO `products` VALUES (1, 'DB9', 'DB9.jpg', 11.59);
INSERT INTO `products` VALUES (12, 'murcielago', 'murcielago.jpg', 22.4);
INSERT INTO `products` VALUES (13, 'phantom', 'phantom.jpg', 19.08);
INSERT INTO `products` VALUES (14, 'Porsche Panamera 4S', 'Porsche Panamera 4S.jpg', 7.55);
INSERT INTO `products` VALUES (15, 'Rapide', 'Rapide.jpg', 13.8);
INSERT INTO `products` VALUES (16, 'Reventon', 'Reventon.jpg', 15);
