-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 20, 2018 at 11:52 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cart`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `register`
-- 

CREATE TABLE `register` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `register`
-- 

INSERT INTO `register` VALUES (1, 'xuchu', 'xuchu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `register` VALUES (2, 'xuchu1', 'gh@gmail.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `register` VALUES (3, 'hello', 'hello@gmail.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `register` VALUES (4, 'android', 'android@hh.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `register` VALUES (5, 'words', 'word@gmail.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `register` VALUES (6, 'words123', 'words123@gmail.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `register` VALUES (7, 'words12345', 'words12345@gmail.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `register` VALUES (8, 'hhe', 'hhe@gmai.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `register` VALUES (9, 'sdfsd', 'sdfs@gd', '202cb962ac59075b964b07152d234b70');
