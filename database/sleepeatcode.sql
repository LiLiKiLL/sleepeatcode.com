# 创建sleepeatcode数据库
CREATE DATABASE IF NOT EXISTS `sleepeatcode` CHARACTER SET utf8;

USE `sleepeatcode`;

# 创建用户表
CREATE TABLE IF NOT EXISTS `admin`(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
    `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '昵称',
    `email` varchar(64) NOT NULL DEFAULT '' COMMENT '邮件',
    `password` char(64) NOT NULL DEFAULT '' COMMENT '密码',
    `remember_token` char(16) NOT NULL DEFAULT '' COMMENT '记住我',
    PRIMARY KEY (`id`)
)ENGINE=InnoDB CHARSET=utf8 COMMENT '后台管理员表';

# 书签文件夹表
CREATE TABLE IF NOT EXISTS `bookmark_dir` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
    `name` varchar(16) NOT NULL DEFAULT '' COMMENT '文件夹名称',
    `level` tinyint unsigned NOT NULL DEFAULT 1 COMMENT '文件夹级别',
    PRIMARY KEY (`id`),
    INDEX `idx_name` (`name`)
)ENGINE=InnoDB CHARSET=utf8 COMMENT '书签文件夹表';

# 书签表
CREATE TABLE IF NOT EXISTS `bookmark` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
    `dir_id` int(11) unsigned NOT NULL COMMENT '书签文件夹ID',
    `name` varchar(128) NOT NULL DEFAULT '' COMMENT '文件夹名称',
    `url` varchar(256) NOT NULL DEFAULT '' COMMENT '链接地址',
    `icon` varchar(256) NOT NULL DEFAULT '' COMMENT '网站icon',
    PRIMARY KEY (`id`),
    INDEX `idx_name` (`name`)
)ENGINE=InnoDB CHARSET=utf8 COMMENT '书签分类表';