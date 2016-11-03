-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2016 年 11 月 03 日 15:32
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `sinadata`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `money`
-- 

DROP TABLE IF EXISTS `money`;
CREATE TABLE IF NOT EXISTS `money` (
  `id` int(11) NOT NULL auto_increment,
  `moneycode` int(11) default NULL,
  `xmlData` varchar(500) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `money`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `moneycode`
-- 

DROP TABLE IF EXISTS `moneycode`;
CREATE TABLE IF NOT EXISTS `moneycode` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(20) default NULL,
  `name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `moneycode`
-- 

INSERT INTO `moneycode` VALUES (1, 'USDCNY', '美元人民币');
