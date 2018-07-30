-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wuyilvyou`
--

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_active`
--

CREATE TABLE IF NOT EXISTS `wuyi_active` (
  `active_id` int(11) NOT NULL AUTO_INCREMENT,
  `active_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` int(10) unsigned DEFAULT NULL,
  `end_time` int(10) unsigned DEFAULT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  `join_num` int(10) unsigned NOT NULL DEFAULT '0',
  `active_city` int(10) unsigned NOT NULL DEFAULT '0',
  `active_province` int(10) unsigned NOT NULL DEFAULT '0',
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '活动举行地址',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '活动简述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`active_id`),
  KEY `active_name` (`active_name`),
  KEY `active_name_2` (`active_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=167 ;

--
-- 转存表中的数据 `wuyi_active`
--

INSERT INTO `wuyi_active` (`active_id`, `active_name`, `uid`, `photo`, `start_time`, `end_time`, `addtime`, `join_num`, `active_city`, `active_province`, `address`, `state`, `description`, `type`) VALUES
(138, '川菜六大代表名菜 小伙伴们都爱吃', 61, '1387375600-69653.jpg', 1387375320, 1388239320, 1387375600, 3, 0, 0, NULL, 1, '有兴趣的小伙伴联系我哦，我请客，机会难得', 1),
(144, '爱吃海鲜的道友进进来', 61, '1387415286-96802.jpg', 1387415145, 1388192700, 1387415286, 5, 0, 0, NULL, 1, '喜欢海鲜的道友，一起来分享你们的海鲜美食吧！', 1),
(149, '那些年跟你一起吃路边摊的女孩', 58, '1387439388-96028.jpg', 1387439064, 1387628576, 1387439388, 4, 0, 0, '华容超市', 1, '曾经有一份真挚的爱摆在我面前我没有珍惜，当我失去之后才追悔莫及。如果上天能给我再来一次的机会，我会大声地对她说我爱你，如果非要在这份爱上加一份期限，那就是爱你一万年！！！', 1),
(135, '今夜到你家吃饭', 70, '1387373691-89120.jpg', 1387373654, 1387546440, 1387373692, 4, 0, 0, NULL, 1, '我去年买了表', 1),
(160, '有没有人一起去吃熏鹅?', 58, '1520232257-85682.jpg', 1520232230, 1521344634, 1520232258, 4, 0, 0, '市区横街头', 1, '我在市区发现了一家很好吃的熏鹅店,有没有一起的...“岚谷熏鹅”的历史太悠久了，远的不去说，改革开放前，“岚谷熏鹅”虽然在当地很有名气，但能吃上一块熏鹅肉，却不是常有的事，即使是逢年过节，百姓餐桌上也难见这道传统名菜呢。', 1),
(159, 'aaa', 58, '1512786933-69059.jpg', 1512527700, 1514428500, 1512786934, 1, 0, 0, NULL, 1, 'aaaa', 1),
(161, '来组团去三姑吃美食啦~', 58, '1521018147-75412.jpg', 1521017639, 1521344634, 1521018148, 1, 0, 0, '武夷学院后门', 1, '到武夷山旅游，基本都会选择在三姑旅游度假区内食宿，三姑成为认识武夷山的开始。三姑旅游度假区始建于年代，它位于武夷山核心景区的外围，大王峰的对面，与景区隔河相望，交通十分便利。经过近30的发展，三姑已逐渐从一个小村庄演变为一个旅游小镇，而且旅游开发还方兴未艾。', 1),
(164, '阿萨德阿萨德阿萨德', 59, '1521610733-68326.jpg', 1521608400, 1521608400, 1521610734, 2, 0, 0, '啊啊', 1, '阿萨德阿斯顿撒阿萨德阿萨德阿萨德', 2);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_active_details`
--

CREATE TABLE IF NOT EXISTS `wuyi_active_details` (
  `active_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `tags` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`active_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=167 ;

--
-- 转存表中的数据 `wuyi_active_details`
--

INSERT INTO `wuyi_active_details` (`active_id`, `content`, `tags`) VALUES
(160, '我在市区发现了一家很好吃的熏鹅店,有没有一起的...“岚谷熏鹅”的历史太悠久了，远的不去说，改革开放前，“岚谷熏鹅”虽然在当地很有名气，但能吃上一块熏鹅肉，却不是常有的事，即使是逢年过节，百姓餐桌上也难见这道传统名菜呢。', NULL),
(161, '到武夷山旅游，基本都会选择在三姑旅游度假区内食宿，三姑成为认识武夷山的开始。三姑旅游度假区始建于年代，它位于武夷山核心景区的外围，大王峰的对面，与景区隔河相望，交通十分便利。经过近30的发展，三姑已逐渐从一个小村庄演变为一个旅游小镇，而且旅游开发还方兴未艾。', NULL),
(164, '1111111111111111111111', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_active_post`
--

CREATE TABLE IF NOT EXISTS `wuyi_active_post` (
  `active_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL,
  `last_edit_time` int(10) unsigned DEFAULT NULL,
  `reply_num` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`active_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- 转存表中的数据 `wuyi_active_post`
--

INSERT INTO `wuyi_active_post` (`active_post_id`, `title`, `aid`, `addtime`, `uid`, `last_edit_time`, `reply_num`) VALUES
(63, '阿萨德发阿道夫阿达发', 143, 1387443701, 58, 1387443701, 2),
(62, '爱的说法豆腐是', 149, 1387442669, 59, 1387442669, 2),
(61, '我也去吃过，那个牛肉锅底太赞了，强烈推荐', 145, 1387434191, 61, 1387434191, 0),
(60, '我去了，我们都去了', 138, 1387418616, 61, 1387418616, 1),
(64, '111aasdasdas', 135, 1520234507, 58, 1520234507, 1),
(65, '啊啊啊等等', 149, 1521543010, 59, 1521543010, 0),
(66, '阿萨德阿萨德', 161, 1521605027, 59, 1521605027, 0),
(67, '阿达自行车自行车支持下', 161, 1521608234, 59, 1521608234, 0),
(68, '啊啊啊啊啊啊啊啊啊啊', 161, 1521608307, 59, 1521608307, 0),
(69, '自知则知之做做zzzz', 161, 1521609290, 59, 1521609290, 0),
(70, '参数的大时代sad', 161, 1521609300, 59, 1521609300, 0),
(71, '阿萨德阿达阿萨德', 161, 1521609310, 59, 1521609310, 0),
(72, '撒的撒的阿萨德', 161, 1521609444, 59, 1521609444, 0),
(73, '阿萨德阿萨德阿萨德', 161, 1521609620, 59, 1521609620, 0),
(74, '自行车想吃自行车这阿萨德', 161, 1521609687, 59, 1521609687, 0),
(75, '对对对啊啊', 161, 1521609748, 59, 1521609748, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_active_post_details`
--

CREATE TABLE IF NOT EXISTS `wuyi_active_post_details` (
  `active_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`active_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- 转存表中的数据 `wuyi_active_post_details`
--

INSERT INTO `wuyi_active_post_details` (`active_post_id`, `content`) VALUES
(63, '发到付啊阿达'),
(60, '我们吃的不亦乐乎，太好吃了'),
(61, '我也去吃过，那个牛肉锅底太赞了，强烈推荐'),
(62, '爱的色放撒的发爱疯撒的发'),
(64, 'aaaaasdada'),
(65, '对对对啊啊'),
(66, '阿萨德阿萨德阿萨德阿萨德'),
(67, '阿萨德阿萨德阿萨德阿萨德'),
(68, '22222222222222222222说啥事说说'),
(69, '自知则知之做做重中之重'),
(70, '萨顶顶阿萨德阿萨德'),
(71, '发阿萨德阿萨德阿萨德'),
(72, '撒打算阿萨德阿萨德阿萨德'),
(73, '自行车自行车这些从中长线'),
(74, '吃阿萨德阿萨德阿萨德阿萨德阿打算大时代'),
(75, '吃阿萨德阿萨德阿萨德阿萨德阿打算大时代');

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_active_reply`
--

CREATE TABLE IF NOT EXISTS `wuyi_active_reply` (
  `active_post_rid` int(11) NOT NULL AUTO_INCREMENT,
  `active_post_id` int(10) unsigned NOT NULL,
  `reply_time` int(10) unsigned DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL,
  `replyed_id` int(10) unsigned NOT NULL DEFAULT '0',
  `reply_content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`active_post_rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=126 ;

--
-- 转存表中的数据 `wuyi_active_reply`
--

INSERT INTO `wuyi_active_reply` (`active_post_rid`, `active_post_id`, `reply_time`, `uid`, `replyed_id`, `reply_content`) VALUES
(122, 64, 1520234531, 58, 0, 'aaa'),
(123, 62, 1521513007, 59, 0, '哈哈哈'),
(124, 62, 1521544136, 59, 0, '@郑建民阿萨德');

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_attention`
--

CREATE TABLE IF NOT EXISTS `wuyi_attention` (
  `auid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `wuyi_attention`
--

INSERT INTO `wuyi_attention` (`auid`, `uid`) VALUES
(74, 61),
(61, 70),
(61, 61),
(75, 74),
(75, 61),
(75, 70),
(75, 58),
(58, 74),
(58, NULL),
(58, NULL),
(58, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_city`
--

CREATE TABLE IF NOT EXISTS `wuyi_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_index` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=392 ;

--
-- 转存表中的数据 `wuyi_city`
--

INSERT INTO `wuyi_city` (`id`, `city_index`, `province_id`, `name`) VALUES
(1, 1, 1, '北京市'),
(2, 1, 2, '天津市'),
(3, 1, 3, '上海市'),
(4, 1, 4, '重庆市'),
(5, 1, 5, '石家庄市'),
(6, 2, 5, '唐山市'),
(7, 3, 5, '秦皇岛市'),
(8, 4, 5, '邯郸市'),
(9, 5, 5, '邢台市'),
(10, 6, 5, '保定市'),
(11, 7, 5, '张家口市'),
(12, 8, 5, '承德市'),
(13, 9, 5, '沧州市'),
(14, 10, 5, '廊坊市'),
(15, 11, 5, '衡水市'),
(16, 1, 6, '太原市'),
(17, 2, 6, '大同市'),
(18, 3, 6, '阳泉市'),
(19, 4, 6, '长治市'),
(20, 5, 6, '晋城市'),
(21, 6, 6, '朔州市'),
(22, 7, 6, '晋中市'),
(23, 8, 6, '运城市'),
(24, 9, 6, '忻州市'),
(25, 10, 6, '临汾市'),
(26, 11, 6, '吕梁市'),
(27, 1, 7, '台北市'),
(28, 2, 7, '高雄市'),
(29, 3, 7, '基隆市'),
(30, 4, 7, '台中市'),
(31, 5, 7, '台南市'),
(32, 6, 7, '新竹市'),
(33, 7, 7, '嘉义市'),
(34, 8, 7, '台北县'),
(35, 9, 7, '宜兰县'),
(36, 10, 7, '桃园县'),
(37, 11, 7, '新竹县'),
(38, 12, 7, '苗栗县'),
(39, 13, 7, '台中县'),
(40, 14, 7, '彰化县'),
(41, 15, 7, '南投县'),
(42, 16, 7, '云林县'),
(43, 17, 7, '嘉义县'),
(44, 18, 7, '台南县'),
(45, 19, 7, '高雄县'),
(46, 20, 7, '屏东县'),
(47, 21, 7, '澎湖县'),
(48, 22, 7, '台东县'),
(49, 23, 7, '花莲县'),
(50, 1, 8, '沈阳市'),
(51, 2, 8, '大连市'),
(52, 3, 8, '鞍山市'),
(53, 4, 8, '抚顺市'),
(54, 5, 8, '本溪市'),
(55, 6, 8, '丹东市'),
(56, 7, 8, '锦州市'),
(57, 8, 8, '营口市'),
(58, 9, 8, '阜新市'),
(59, 10, 8, '辽阳市'),
(60, 11, 8, '盘锦市'),
(61, 12, 8, '铁岭市'),
(62, 13, 8, '朝阳市'),
(63, 14, 8, '葫芦岛市'),
(64, 1, 9, '长春市'),
(65, 2, 9, '吉林市'),
(66, 3, 9, '四平市'),
(67, 4, 9, '辽源市'),
(68, 5, 9, '通化市'),
(69, 6, 9, '白山市'),
(70, 7, 9, '松原市'),
(71, 8, 9, '白城市'),
(72, 9, 9, '延边朝鲜族自治州'),
(73, 1, 10, '哈尔滨市'),
(74, 2, 10, '齐齐哈尔市'),
(75, 3, 10, '鹤岗市'),
(76, 4, 10, '双鸭山市'),
(77, 5, 10, '鸡西市'),
(78, 6, 10, '大庆市'),
(79, 7, 10, '伊春市'),
(80, 8, 10, '牡丹江市'),
(81, 9, 10, '佳木斯市'),
(82, 10, 10, '七台河市'),
(83, 11, 10, '黑河市'),
(84, 12, 10, '绥化市'),
(85, 13, 10, '大兴安岭地区'),
(86, 1, 11, '南京市'),
(87, 2, 11, '无锡市'),
(88, 3, 11, '徐州市'),
(89, 4, 11, '常州市'),
(90, 5, 11, '苏州市'),
(91, 6, 11, '南通市'),
(92, 7, 11, '连云港市'),
(93, 8, 11, '淮安市'),
(94, 9, 11, '盐城市'),
(95, 10, 11, '扬州市'),
(96, 11, 11, '镇江市'),
(97, 12, 11, '泰州市'),
(98, 13, 11, '宿迁市'),
(99, 1, 12, '杭州市'),
(100, 2, 12, '宁波市'),
(101, 3, 12, '温州市'),
(102, 4, 12, '嘉兴市'),
(103, 5, 12, '湖州市'),
(104, 6, 12, '绍兴市'),
(105, 7, 12, '金华市'),
(106, 8, 12, '衢州市'),
(107, 9, 12, '舟山市'),
(108, 10, 12, '台州市'),
(109, 11, 12, '丽水市'),
(110, 1, 13, '合肥市'),
(111, 2, 13, '芜湖市'),
(112, 3, 13, '蚌埠市'),
(113, 4, 13, '淮南市'),
(114, 5, 13, '马鞍山市'),
(115, 6, 13, '淮北市'),
(116, 7, 13, '铜陵市'),
(117, 8, 13, '安庆市'),
(118, 9, 13, '黄山市'),
(119, 10, 13, '滁州市'),
(120, 11, 13, '阜阳市'),
(121, 12, 13, '宿州市'),
(122, 13, 13, '巢湖市'),
(123, 14, 13, '六安市'),
(124, 15, 13, '亳州市'),
(125, 16, 13, '池州市'),
(126, 17, 13, '宣城市'),
(127, 1, 14, '福州市'),
(128, 2, 14, '厦门市'),
(129, 3, 14, '莆田市'),
(130, 4, 14, '三明市'),
(131, 5, 14, '泉州市'),
(132, 6, 14, '漳州市'),
(133, 7, 14, '南平市'),
(134, 8, 14, '龙岩市'),
(135, 9, 14, '宁德市'),
(136, 1, 15, '南昌市'),
(137, 2, 15, '景德镇市'),
(138, 3, 15, '萍乡市'),
(139, 4, 15, '九江市'),
(140, 5, 15, '新余市'),
(141, 6, 15, '鹰潭市'),
(142, 7, 15, '赣州市'),
(143, 8, 15, '吉安市'),
(144, 9, 15, '宜春市'),
(145, 10, 15, '抚州市'),
(146, 11, 15, '上饶市'),
(147, 1, 16, '济南市'),
(148, 2, 16, '青岛市'),
(149, 3, 16, '淄博市'),
(150, 4, 16, '枣庄市'),
(151, 5, 16, '东营市'),
(152, 6, 16, '烟台市'),
(153, 7, 16, '潍坊市'),
(154, 8, 16, '济宁市'),
(155, 9, 16, '泰安市'),
(156, 10, 16, '威海市'),
(157, 11, 16, '日照市'),
(158, 12, 16, '莱芜市'),
(159, 13, 16, '临沂市'),
(160, 14, 16, '德州市'),
(161, 15, 16, '聊城市'),
(162, 16, 16, '滨州市'),
(163, 17, 16, '菏泽市'),
(164, 1, 17, '郑州市'),
(165, 2, 17, '开封市'),
(166, 3, 17, '洛阳市'),
(167, 4, 17, '平顶山市'),
(168, 5, 17, '安阳市'),
(169, 6, 17, '鹤壁市'),
(170, 7, 17, '新乡市'),
(171, 8, 17, '焦作市'),
(172, 9, 17, '濮阳市'),
(173, 10, 17, '许昌市'),
(174, 11, 17, '漯河市'),
(175, 12, 17, '三门峡市'),
(176, 13, 17, '南阳市'),
(177, 14, 17, '商丘市'),
(178, 15, 17, '信阳市'),
(179, 16, 17, '周口市'),
(180, 17, 17, '驻马店市'),
(181, 18, 17, '济源市'),
(182, 1, 18, '武汉市'),
(183, 2, 18, '黄石市'),
(184, 3, 18, '十堰市'),
(185, 4, 18, '荆州市'),
(186, 5, 18, '宜昌市'),
(187, 6, 18, '襄樊市'),
(188, 7, 18, '鄂州市'),
(189, 8, 18, '荆门市'),
(190, 9, 18, '孝感市'),
(191, 10, 18, '黄冈市'),
(192, 11, 18, '咸宁市'),
(193, 12, 18, '随州市'),
(194, 13, 18, '仙桃市'),
(195, 14, 18, '天门市'),
(196, 15, 18, '潜江市'),
(197, 16, 18, '神农架林区'),
(198, 17, 18, '恩施土家族苗族自治州'),
(199, 1, 19, '长沙市'),
(200, 2, 19, '株洲市'),
(201, 3, 19, '湘潭市'),
(202, 4, 19, '衡阳市'),
(203, 5, 19, '邵阳市'),
(204, 6, 19, '岳阳市'),
(205, 7, 19, '常德市'),
(206, 8, 19, '张家界市'),
(207, 9, 19, '益阳市'),
(208, 10, 19, '郴州市'),
(209, 11, 19, '永州市'),
(210, 12, 19, '怀化市'),
(211, 13, 19, '娄底市'),
(212, 14, 19, '湘西土家族苗族自治州'),
(213, 1, 20, '广州市'),
(214, 2, 20, '深圳市'),
(215, 3, 20, '珠海市'),
(216, 4, 20, '汕头市'),
(217, 5, 20, '韶关市'),
(218, 6, 20, '佛山市'),
(219, 7, 20, '江门市'),
(220, 8, 20, '湛江市'),
(221, 9, 20, '茂名市'),
(222, 10, 20, '肇庆市'),
(223, 11, 20, '惠州市'),
(224, 12, 20, '梅州市'),
(225, 13, 20, '汕尾市'),
(226, 14, 20, '河源市'),
(227, 15, 20, '阳江市'),
(228, 16, 20, '清远市'),
(229, 17, 20, '东莞市'),
(230, 18, 20, '中山市'),
(231, 19, 20, '潮州市'),
(232, 20, 20, '揭阳市'),
(233, 21, 20, '云浮市'),
(234, 1, 21, '兰州市'),
(235, 2, 21, '金昌市'),
(236, 3, 21, '白银市'),
(237, 4, 21, '天水市'),
(238, 5, 21, '嘉峪关市'),
(239, 6, 21, '武威市'),
(240, 7, 21, '张掖市'),
(241, 8, 21, '平凉市'),
(242, 9, 21, '酒泉市'),
(243, 10, 21, '庆阳市'),
(244, 11, 21, '定西市'),
(245, 12, 21, '陇南市'),
(246, 13, 21, '临夏回族自治州'),
(247, 14, 21, '甘南藏族自治州'),
(248, 1, 22, '成都市'),
(249, 2, 22, '自贡市'),
(250, 3, 22, '攀枝花市'),
(251, 4, 22, '泸州市'),
(252, 5, 22, '德阳市'),
(253, 6, 22, '绵阳市'),
(254, 7, 22, '广元市'),
(255, 8, 22, '遂宁市'),
(256, 9, 22, '内江市'),
(257, 10, 22, '乐山市'),
(258, 11, 22, '南充市'),
(259, 12, 22, '眉山市'),
(260, 13, 22, '宜宾市'),
(261, 14, 22, '广安市'),
(262, 15, 22, '达州市'),
(263, 16, 22, '雅安市'),
(264, 17, 22, '巴中市'),
(265, 18, 22, '资阳市'),
(266, 19, 22, '阿坝藏族羌族自治州'),
(267, 20, 22, '甘孜藏族自治州'),
(268, 21, 22, '凉山彝族自治州'),
(269, 1, 23, '贵阳市'),
(270, 2, 23, '六盘水市'),
(271, 3, 23, '遵义市'),
(272, 4, 23, '安顺市'),
(273, 5, 23, '铜仁地区'),
(274, 6, 23, '毕节地区'),
(275, 7, 23, '黔西南布依族苗族自治州'),
(276, 8, 23, '黔东南苗族侗族自治州'),
(277, 9, 23, '黔南布依族苗族自治州'),
(278, 1, 24, '海口市'),
(279, 2, 24, '三亚市'),
(280, 3, 24, '五指山市'),
(281, 4, 24, '琼海市'),
(282, 5, 24, '儋州市'),
(283, 6, 24, '文昌市'),
(284, 7, 24, '万宁市'),
(285, 8, 24, '东方市'),
(286, 9, 24, '澄迈县'),
(287, 10, 24, '定安县'),
(288, 11, 24, '屯昌县'),
(289, 12, 24, '临高县'),
(290, 13, 24, '白沙黎族自治县'),
(291, 14, 24, '昌江黎族自治县'),
(292, 15, 24, '乐东黎族自治县'),
(293, 16, 24, '陵水黎族自治县'),
(294, 17, 24, '保亭黎族苗族自治县'),
(295, 18, 24, '琼中黎族苗族自治县'),
(296, 1, 25, '昆明市'),
(297, 2, 25, '曲靖市'),
(298, 3, 25, '玉溪市'),
(299, 4, 25, '保山市'),
(300, 5, 25, '昭通市'),
(301, 6, 25, '丽江市'),
(302, 7, 25, '思茅市'),
(303, 8, 25, '临沧市'),
(304, 9, 25, '文山壮族苗族自治州'),
(305, 10, 25, '红河哈尼族彝族自治州'),
(306, 11, 25, '西双版纳傣族自治州'),
(307, 12, 25, '楚雄彝族自治州'),
(308, 13, 25, '大理白族自治州'),
(309, 14, 25, '德宏傣族景颇族自治州'),
(310, 15, 25, '怒江傈傈族自治州'),
(311, 16, 25, '迪庆藏族自治州'),
(312, 1, 26, '西宁市'),
(313, 2, 26, '海东地区'),
(314, 3, 26, '海北藏族自治州'),
(315, 4, 26, '黄南藏族自治州'),
(316, 5, 26, '海南藏族自治州'),
(317, 6, 26, '果洛藏族自治州'),
(318, 7, 26, '玉树藏族自治州'),
(319, 8, 26, '海西蒙古族藏族自治州'),
(320, 1, 27, '西安市'),
(321, 2, 27, '铜川市'),
(322, 3, 27, '宝鸡市'),
(323, 4, 27, '咸阳市'),
(324, 5, 27, '渭南市'),
(325, 6, 27, '延安市'),
(326, 7, 27, '汉中市'),
(327, 8, 27, '榆林市'),
(328, 9, 27, '安康市'),
(329, 10, 27, '商洛市'),
(330, 1, 28, '南宁市'),
(331, 2, 28, '柳州市'),
(332, 3, 28, '桂林市'),
(333, 4, 28, '梧州市'),
(334, 5, 28, '北海市'),
(335, 6, 28, '防城港市'),
(336, 7, 28, '钦州市'),
(337, 8, 28, '贵港市'),
(338, 9, 28, '玉林市'),
(339, 10, 28, '百色市'),
(340, 11, 28, '贺州市'),
(341, 12, 28, '河池市'),
(342, 13, 28, '来宾市'),
(343, 14, 28, '崇左市'),
(344, 1, 29, '拉萨市'),
(345, 2, 29, '那曲地区'),
(346, 3, 29, '昌都地区'),
(347, 4, 29, '山南地区'),
(348, 5, 29, '日喀则地区'),
(349, 6, 29, '阿里地区'),
(350, 7, 29, '林芝地区'),
(351, 1, 30, '银川市'),
(352, 2, 30, '石嘴山市'),
(353, 3, 30, '吴忠市'),
(354, 4, 30, '固原市'),
(355, 5, 30, '中卫市'),
(356, 1, 31, '乌鲁木齐市'),
(357, 2, 31, '克拉玛依市'),
(358, 3, 31, '石河子市　'),
(359, 4, 31, '阿拉尔市'),
(360, 5, 31, '图木舒克市'),
(361, 6, 31, '五家渠市'),
(362, 7, 31, '吐鲁番市'),
(363, 8, 31, '阿克苏市'),
(364, 9, 31, '喀什市'),
(365, 10, 31, '哈密市'),
(366, 11, 31, '和田市'),
(367, 12, 31, '阿图什市'),
(368, 13, 31, '库尔勒市'),
(369, 14, 31, '昌吉市　'),
(370, 15, 31, '阜康市'),
(371, 16, 31, '米泉市'),
(372, 17, 31, '博乐市'),
(373, 18, 31, '伊宁市'),
(374, 19, 31, '奎屯市'),
(375, 20, 31, '塔城市'),
(376, 21, 31, '乌苏市'),
(377, 22, 31, '阿勒泰市'),
(378, 1, 32, '呼和浩特市'),
(379, 2, 32, '包头市'),
(380, 3, 32, '乌海市'),
(381, 4, 32, '赤峰市'),
(382, 5, 32, '通辽市'),
(383, 6, 32, '鄂尔多斯市'),
(384, 7, 32, '呼伦贝尔市'),
(385, 8, 32, '巴彦淖尔市'),
(386, 9, 32, '乌兰察布市'),
(387, 10, 32, '锡林郭勒盟'),
(388, 11, 32, '兴安盟'),
(389, 12, 32, '阿拉善盟'),
(390, 1, 33, '澳门特别行政区'),
(391, 1, 34, '香港特别行政区');

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_diary`
--

CREATE TABLE IF NOT EXISTS `wuyi_diary` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL,
  `last_edit_time` int(10) unsigned DEFAULT NULL,
  `like_num` int(10) unsigned NOT NULL DEFAULT '0',
  `click_num` int(10) unsigned NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(10) unsigned NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`did`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=126 ;

--
-- 转存表中的数据 `wuyi_diary`
--

INSERT INTO `wuyi_diary` (`did`, `title`, `addtime`, `uid`, `last_edit_time`, `like_num`, `click_num`, `picture`, `keywords`, `description`, `type`, `state`) VALUES
(125, '啊啊', 1521530410, 59, NULL, 0, 0, 'c77e2ca00b1236b80510b7cc2d636f23.jpg', NULL, NULL, 2, 1),
(97, '香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情', 1512434052, 74, NULL, 1, 0, '23b3aa6b759a6ec87bb34f6f231b7a9c.jpg', NULL, NULL, 1, 0),
(99, '吃过的朋友都要求还要吃', 1512434041, 74, NULL, 0, 0, '17a2c83f40f39436ae54717a627a2703.jpg', NULL, NULL, 2, 0),
(101, '鸡蛋清和鸡蛋黄', 1512434042, 74, NULL, 1, 0, 'a08cc4925e6109a034249b94abc50281.jpg', NULL, NULL, 2, 1),
(102, '超爽虾仁', 1512434023, 58, NULL, 0, 0, '56e93c906943da6d211d92c41335b9b6.jpg', NULL, NULL, 3, 1),
(94, '美味非同一般', 1512434031, 74, NULL, 1, 0, 'dc0d78e0c50fd610aa49532f781accd4.jpg', NULL, NULL, 2, 1),
(93, '一个鸡蛋的爱情', 1512434024, 61, NULL, 3, 0, '5deca1b3eadcf146e0ae8c5788ad9209.jpg', NULL, NULL, 2, 0),
(103, '好吃的', 1512434034, 76, NULL, 0, 0, '20b0b7f45cc0adf8c91a6a2a1514e42b.jpg', NULL, NULL, 3, 1),
(104, '士大夫是否', 1512434042, 76, NULL, 0, 0, '144cf720ac00fcd6e32f109c41c728fd.jpg', NULL, NULL, 2, 1),
(105, '的', 1512434034, 58, NULL, 0, 0, '8b96dd76755ebe76b1883383d4621ac6.jpg', NULL, NULL, 1, 1),
(106, '美食文化', 1512434024, 74, NULL, 1, 0, '09b08462f3764551ede553b36277fbe6.jpg', NULL, NULL, 3, 1),
(118, '美食', 1520826801, 58, NULL, 1, 0, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_diary_cate`
--

CREATE TABLE IF NOT EXISTS `wuyi_diary_cate` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '日记分类名称',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类名称',
  `upid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_diary_details`
--

CREATE TABLE IF NOT EXISTS `wuyi_diary_details` (
  `did` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `wuyi_diary_details`
--

INSERT INTO `wuyi_diary_details` (`did`, `content`, `tags`, `cid`) VALUES
(93, '一同走过了情人节中秋节圣诞节，所有可以让恋爱中的男女释放浪漫的节日都经历了，我却收获不到任何一份让我心旌荡漾的惊喜，如今七夕节又要到了，我终于不得不承认，自己选错了对象。当初怎么会听信了姐姐们的话，说什么愚钝就是憨实，木讷就是稳重，还说象他这样不浮不躁循规蹈矩的人将来肯定是好丈夫，现在好了，还别奢望什么七夕礼物，只谈了一年的恋爱，就让我有一种寡然无味毫无激情的感觉，实在不敢想象如若真的与他迈进婚姻的城堡将是怎样一种窒息的生活。真是悔恨当初，怎么会为了这样一个不解风情的男人而错失那份多少女孩子幻想拥有的浪漫爱情。', NULL, NULL),
(94, '云吞面是粤菜中非常经典的主食，一口云吞，一口细面，一勺汤，让人乐不思蜀，对，吃广东菜当然不思蜀了。不过这道主食制作非常麻烦，其实不适合在家中制作，最重要的高汤是家中无法做到的，大地鱼，虾子这些东西不是家里常备的，而且很多地方是买不到的，所以今天咱们做这个云吞面是一个仿制品，适合家里馄饨吃烦了就换个花样吃的那种，不敢说多好吃，只是一个调剂而已，面条也没有那么细，面皮也没有那么黄，因为外边的大部分在和面的时候要加色素和碱的，咱们为了家人健康就别放了，您说呢。', '2', NULL),
(97, '香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情香辣过瘾的潇湘风味下饭菜：三丝茄子_浓咖啡淡心情', NULL, NULL),
(119, 'test123', NULL, NULL),
(120, '阿萨德', NULL, NULL),
(125, '阿萨德阿萨的', NULL, NULL),
(99, '吃过的朋友都要求还要吃吃过的朋友都要求还要吃吃过的朋友都要求还要吃吃过的朋友都要求还要吃吃过的朋友都要求还要吃吃过的朋友都要求还要吃', NULL, NULL),
(100, '一口钟情，钟爱一生一口钟情，钟爱一生一口钟情，钟爱一生一口钟情，钟爱一生一口钟情，钟爱一生一口钟情，钟爱一生一口钟情，钟爱一生一口钟情，钟爱一生', NULL, NULL),
(101, '鸡蛋清和鸡蛋黄鸡蛋清和鸡蛋黄鸡蛋清和鸡蛋黄鸡蛋清和鸡蛋黄,鸡蛋清和鸡蛋黄鸡蛋清和鸡蛋黄鸡蛋清和鸡蛋黄', NULL, NULL),
(102, '大虾的美味无可抵挡大虾的美味无可抵挡大虾的美味无可抵挡,大虾的美味无可抵挡大虾的美味无可抵挡大虾的美味无可抵挡', NULL, NULL),
(103, '好吃的', NULL, NULL),
(104, '士大夫稍等', NULL, NULL),
(105, '飞稍等 ', NULL, NULL),
(106, '美食文化', NULL, NULL),
(107, 'aaaaa', NULL, NULL),
(108, 'jhkhk', NULL, NULL),
(109, 'aaaa', NULL, NULL),
(110, 'lll', NULL, NULL),
(118, '阿萨德', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_diary_like`
--

CREATE TABLE IF NOT EXISTS `wuyi_diary_like` (
  `uid` int(11) DEFAULT NULL,
  `drid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `wuyi_diary_like`
--

INSERT INTO `wuyi_diary_like` (`uid`, `drid`) VALUES
(75, 101),
(74, 97),
(74, 94),
(60, 93),
(73, 93),
(61, 93),
(74, 106),
(58, 118);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_diary_reply`
--

CREATE TABLE IF NOT EXISTS `wuyi_diary_reply` (
  `diary_reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `replyed_id` int(10) unsigned NOT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`diary_reply_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=228 ;

--
-- 转存表中的数据 `wuyi_diary_reply`
--

INSERT INTO `wuyi_diary_reply` (`diary_reply_id`, `did`, `uid`, `content`, `replyed_id`, `addtime`) VALUES
(217, 101, 76, '第三方士大夫', 0, 1447906281),
(218, 106, 74, '好 自己评论', 0, 1447908975),
(219, 107, 80, 'aaaaa', 0, 1512388693),
(226, 125, 59, 'aaa', 0, 1521613571),
(221, 118, 58, 'aaa', 0, 1521014336),
(222, 118, 58, 'sdasd', 0, 1521014353),
(223, 118, 58, 'ddd', 0, 1521014410),
(224, 118, 58, 'aadas', 0, 1521014731),
(225, 118, 58, 'dasa', 0, 1521014744);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_diary_tags`
--

CREATE TABLE IF NOT EXISTS `wuyi_diary_tags` (
  `diary_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`diary_tag_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_groups`
--

CREATE TABLE IF NOT EXISTS `wuyi_groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `grouper_num` int(10) unsigned NOT NULL DEFAULT '0',
  `group_intro` text COLLATE utf8_unicode_ci,
  `group_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  `cid` tinyint(3) unsigned DEFAULT NULL,
  `state` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`gid`),
  UNIQUE KEY `group_name` (`group_name`),
  UNIQUE KEY `group_name_2` (`group_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- 转存表中的数据 `wuyi_groups`
--

INSERT INTO `wuyi_groups` (`gid`, `group_name`, `uid`, `grouper_num`, `group_intro`, `group_pic`, `addtime`, `cid`, `state`) VALUES
(32, '蛋料理', 59, 5, '不管先有鸡还是先有蛋，这两都好吃。。。。。。', '138743238533679.jpg', 1387432385, NULL, 1),
(31, '老鼠爱大米', 59, 1, '', '138743227315093.jpg', 1387432273, NULL, 1),
(30, '有酒有菜', 59, 1, '无酒不成席，这箱酒，你先干了吧。。。。。。', '138743218716479.jpg', 1387432187, NULL, 1),
(29, '享受生活', 59, 1, '不要走，大吃到天亮！', '138743205162359.jpg', 1387432051, NULL, 1),
(28, '爱料理的人', 59, 0, '爱吃什么，是一种态度！', '138743194434512.jpg', 1387431944, NULL, 1),
(27, '吃菜不吃饭', 59, 2, '吃饭不吃菜，才叫懂美食！', '138742917233502.jpg', 1387429172, NULL, -1),
(33, '走到哪吃到哪', 61, 3, '地毯式的吃，吃货们，你们喜欢么', '138743250999554.jpg', 1387432509, NULL, 1),
(34, '西餐馆', 59, 1, '', '138743251989898.jpg', 1387432519, NULL, 1),
(35, '川菜', 59, 1, '麻、辣、鲜、香，川菜的特点', '138743567172680.jpg', 1387435671, NULL, 1),
(36, '小甜甜', 59, 1, '甜点，女生无法抵抗的诱惑！', '138743574347259.jpg', 1387435743, NULL, 1),
(37, '奇葩食物展', 59, 1, '苹果炒豆腐，这种奇葩菜只有大学食堂才能有，有木有！', '138743592884106.jpg', 1387435929, NULL, 1),
(38, '女儿红', 59, 1, '', '138743602579553.jpg', 1387436025, NULL, 1),
(39, '爱吃甜食的货', 60, 1, '有那么一群人，生来就喜欢吃甜食，而且怎么吃都不腻，如果你也是，就来加入我们吧。', '138743711650549.jpg', 1387437116, NULL, 1),
(40, '辣妹子', 60, 1, '辣妹子辣，辣妹子辣，辣妹子生来不怕辣！', '13874372525865.jpg', 1387437252, NULL, 1),
(41, '爱吃烧烤', 60, 1, '有没有喜欢吃烧烤的，簋街的烧烤那是相当好吃好，而且有很多选择！！！', '138743741176986.jpg', 1387437411, NULL, 1),
(42, '美食无处不在', 71, 1, '', '138744006434362.jpg', 1387440064, NULL, 1),
(43, '撒地方的所发生的', 59, 1, '撒地方的所发生的', '138744391591253.jpg', 1387443915, NULL, 1),
(44, 'aaa', 58, 0, 'aaaaa', '151243852988177.jpg', 1512438529, NULL, 1),
(46, '阿萨德', 58, 1, '阿萨德sad ', '151245935993887.jpg', 1512459359, NULL, 1),
(45, 'aaaa', 58, 0, 'aaaa', '151245562748248.jpg', 1512455627, NULL, 1),
(47, '啊', 59, 1, '阿萨德', '152153571066006.jpg', 1521535710, NULL, 1),
(48, 'test111', 59, 1, 'test111', '152161565937811.jpg', 1521615659, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_group_post`
--

CREATE TABLE IF NOT EXISTS `wuyi_group_post` (
  `group_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `post_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `like_num` int(10) unsigned NOT NULL DEFAULT '0',
  `keywords` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `click_num` int(10) unsigned NOT NULL DEFAULT '0',
  `pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `last_edit_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`group_post_id`),
  UNIQUE KEY `post_title_2` (`post_title`),
  KEY `post_title` (`post_title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `wuyi_group_post`
--

INSERT INTO `wuyi_group_post` (`group_post_id`, `gid`, `post_title`, `uid`, `like_num`, `keywords`, `descripition`, `click_num`, `pic`, `addtime`, `last_edit_time`) VALUES
(49, 33, '四川菜不错的', 61, 0, NULL, '有人有什么建议么？', 18, '', 1387441872, 0),
(32, 18, '我也喜欢这个', 61, 0, NULL, '果然是同道中人呀。', 3, '', 1387385325, 0),
(31, 15, '话题话题', 71, 0, NULL, '话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题', 0, '', 1387378617, 0),
(28, 14, '今天是个好日子', 70, 0, NULL, '中华人民共和国今天成立聊', 8, '', 1387373903, 0),
(30, 16, '我就喜欢吃', 61, 0, NULL, '喜欢吃的人来了，咱们一块吧', 3, '', 1387376798, 0),
(46, 32, '煮鸡蛋，吃过没', 73, 0, NULL, '煮鸡蛋很有营养', 7, '', 1387433462, 0),
(47, 32, '我也经常吃煮鸡蛋', 61, 0, NULL, '确实很有营养', 1, '', 1387433524, 0),
(51, 32, 'jjjjjkh', 80, 0, NULL, 'cfghfhgdgh', 9, '', 1512388889, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_group_post_details`
--

CREATE TABLE IF NOT EXISTS `wuyi_group_post_details` (
  `group_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`group_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `wuyi_group_post_details`
--

INSERT INTO `wuyi_group_post_details` (`group_post_id`, `content`) VALUES
(13, '话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题话题'),
(12, '喜欢吃的人来了，咱们一块吧'),
(11, '话题1'),
(10, '中华人民共和国今天成立聊'),
(14, '果然是同道中人呀。'),
(38, '南翔小笼馒头又叫南翔小笼包，是上海郊区南翔镇的传统名小吃，已有100多年历史。该品素以皮薄、馅多、卤重、味鲜而闻名，是深受国内外顾客欢迎的风味小吃之一。南翔小笼馒头的馅心是用夹心腿肉作成肉酱，不加葱蒜，仅撒少许姜末和肉皮冻、盐、酱油、糖和水调制而成。馒头的皮是用不发酵的精面粉作成的，50克面粉可包8个，100克一笼屉。蒸熟后的小笼馒头，小巧玲珑，形似宝塔，呈半透明壮，晶莹透黄，一咬一包汤，满口生津，滋味鲜美。如果吃时佐以姜丝、香醋、配上一碗蛋丝汤，其味更佳。南翔小笼馒头的馅心还可以随季节变化而变化。初夏加虾仁，秋季加蟹肉、蟹黄、蟹油。豫园商场内的南翔馒头，是豫园商场有名的风味小吃之一。 '),
(46, '煮鸡蛋很有营养'),
(47, '确实很有营养'),
(49, '有人有什么建议么？'),
(51, 'cfghfhgdgh'),
(54, 'test111');

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_group_post_like`
--

CREATE TABLE IF NOT EXISTS `wuyi_group_post_like` (
  `group_post_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wuyi_group_post_like`
--

INSERT INTO `wuyi_group_post_like` (`group_post_id`, `uid`) VALUES
(33, 59),
(42, 71),
(41, 71),
(40, 71),
(42, 59),
(43, 59),
(48, 58);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_group_post_reply`
--

CREATE TABLE IF NOT EXISTS `wuyi_group_post_reply` (
  `group_reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_post_id` int(10) unsigned NOT NULL,
  `reply_content` text COLLATE utf8_unicode_ci NOT NULL,
  `reply_time` int(10) unsigned DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL,
  `replyed_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_reply_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `wuyi_group_post_reply`
--

INSERT INTO `wuyi_group_post_reply` (`group_reply_id`, `group_post_id`, `reply_content`, `reply_time`, `uid`, `replyed_id`) VALUES
(7, 33, '这个要得', 1387431283, 59, 6),
(6, 33, '臭豆腐，闻着臭，吃着香。。。。。。', 1387431273, 59, 0),
(5, 0, '我也喜欢', 1387385395, 73, 0),
(8, 33, '@秦志明:是要得', 1387431288, 59, 6),
(9, 45, '我来抢个沙发', 1387439091, 59, 0),
(10, 45, '我也来抢个沙发', 1387439106, 59, 9),
(11, 45, '@秦志明:抢什么抢，打劫啊', 1387439118, 59, 9),
(12, 42, '烤鸭烤鸭，顶呱呱！', 1387439649, 71, 0),
(13, 49, '我带你去吃，联系我哦  联系方式*****************', 1387441921, 73, 0),
(14, 42, '风格的双方各得十分', 1387444016, 59, 0),
(15, 42, '阿打发士大夫', 1387444026, 59, 12),
(16, 42, '@秦志明:阿达夫妇的水电费 ', 1387444033, 59, 12),
(17, 51, 'aaa', 1512433209, 80, 0),
(18, 48, 'aaa', 1521013701, 58, 0),
(19, 48, 'saaa', 1521013749, 58, 0),
(20, 48, 'aaa', 1521015339, 58, 0),
(21, 0, '阿萨德', 1521529192, 59, 0),
(22, 54, 'test111', 1521615895, 59, 0),
(23, 54, 'test111', 1521615905, 59, 22);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_images`
--

CREATE TABLE IF NOT EXISTS `wuyi_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL COMMENT '图片名称',
  `table` char(30) NOT NULL COMMENT '属于哪个表',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '属于哪个帖子',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '属于哪个活动或小组',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=138 ;

--
-- 转存表中的数据 `wuyi_images`
--

INSERT INTO `wuyi_images` (`id`, `filename`, `table`, `pid`, `aid`) VALUES
(90, 'd1d2fd18ab34dede886a8bb7443cfbdc.jpg', 'diary', 97, 0),
(91, 'd1fe854a4bed59d01f430bab163ab962.jpg', 'diary', 98, 0),
(92, '87356c13f048566a07c965a0d367dc8e.jpg', 'diary', 98, 0),
(93, '17a2c83f40f39436ae54717a627a2703.jpg', 'diary', 99, 0),
(94, 'f14353bc28ff924bfe641c1da5155451.jpg', 'diary', 100, 0),
(95, 'a08cc4925e6109a034249b94abc50281.jpg', 'diary', 101, 0),
(96, '56e93c906943da6d211d92c41335b9b6.jpg', 'diary', 102, 0),
(97, '39c438d36bea6da2ba1cd8a1f1048735.jpg', 'active_post', 62, 149),
(98, '655e5b5fff25548e04a4ea3e62b158d1.jpg', 'active_post', 63, 143),
(99, '11959f92aa6c34dd06ebd9257022fe58.jpg', 'active_post', 63, 143),
(100, 'd60352bd8656e815cda3ac9444816a81.jpg', 'active_post', 63, 143),
(101, 'c97b1c95f4e207ac6c619289f2e373df.jpg', 'active_post', 63, 143),
(89, '5bbe8273ffe8ccb30397e0373eea7b39.jpg', 'diary', 97, 0),
(88, '23b3aa6b759a6ec87bb34f6f231b7a9c.jpg', 'diary', 97, 0),
(86, '655281e590e30bf756d3e6d3f8eabafc.jpg', 'diary', 96, 0),
(87, '69559f0ce679477d2590278b1e28b77f.jpg', 'diary', 96, 0),
(85, '0f8d156d60f52aae6126b56a7f647b1b.jpg', 'diary', 95, 0),
(84, '26651c944077916ecff9e31e119494f5.jpg', 'diary', 95, 0),
(47, '94d957db9e1650cb24582a6d6952563e.jpg', 'active_post', 43, 0),
(48, 'd0547cd7979d945c9d341e5a7b4c9201.jpg', 'active_post', 44, 0),
(49, 'fd3e552e08451e778abade99540cd94e.jpg', 'active_post', 45, 0),
(50, '1212b64b36c2ba8f1692e200260eb471.jpg', 'active_post', 46, 0),
(51, '9006d0d7f794c555b306c9613684911c.jpg', 'active_post', 47, 22),
(52, '72c95d7c1ee8915794f730b978f65cc8.jpg', 'diary', 89, 0),
(53, 'c870565e3943d8491878c39f51a15cf7.jpg', 'diary', 90, 0),
(54, '62ede5d444f4df0c784b8410c2c4ae0f.jpg', 'diary', 90, 0),
(55, '2108c200293b0b8615453281ceeee972.jpg', 'diary', 90, 0),
(56, '800ff9dc474902163664f690b0067aeb.jpg', 'diary', 90, 0),
(57, '08dd75fbdbe98b223336ba1fcb938c0b.jpg', 'diary', 90, 0),
(58, '2a1cb3d5fab1c656dd4ddf0a26e4d566.jpg', 'diary', 90, 0),
(59, '9691cde83cf3754da10f4a3701d20626.jpg', 'diary', 90, 0),
(83, 'e526073a34d6a1a5c24ea4409ce50c44.jpg', 'diary', 95, 0),
(82, 'ad1e0bfa55c89adf9997e34a2a1a6765.jpg', 'diary', 95, 0),
(81, '0b88fe0823ada65584f3cdc72603ecaa.jpg', 'diary', 94, 0),
(80, 'dc0d78e0c50fd610aa49532f781accd4.jpg', 'diary', 94, 0),
(79, '5868b79369c3b6cd2b90f697f8125446.jpg', 'active_post', 60, 138),
(78, 'fb0537803fddf6686059f7bc0c931ecf.jpg', 'active_post', 60, 138),
(77, '5deca1b3eadcf146e0ae8c5788ad9209.jpg', 'diary', 93, 0),
(76, '22bdf44fd1f749811834b29f3e86de2c.jpg', 'diary', 92, 0),
(75, 'c3308233d0484588ab9076c28885f2a2.jpg', 'diary', 92, 0),
(74, '8b045061cf0909f85d231617a8281e97.jpg', 'diary', 92, 0),
(73, '2e174d6ec4d88884f0b2be8832aeda97.jpg', 'diary', 92, 0),
(72, 'd181e1347e3e91d10b97fe287589dba5.jpg', 'diary', 91, 0),
(102, '20b0b7f45cc0adf8c91a6a2a1514e42b.jpg', 'diary', 103, 0),
(103, '144cf720ac00fcd6e32f109c41c728fd.jpg', 'diary', 104, 0),
(104, '8b96dd76755ebe76b1883383d4621ac6.jpg', 'diary', 105, 0),
(105, '09b08462f3764551ede553b36277fbe6.jpg', 'diary', 106, 0),
(106, '4f89f87d97f2523e773c84ac54945f92.jpg', 'diary', 107, 0),
(107, '322dc44996b60270f09acdaca7711e9d.jpg', 'diary', 108, 0),
(108, '00ccc45a9ddacce755aa06445cf0b9f0.jpg', 'diary', 109, 0),
(109, 'b23454663ca6de2f670acfe7b35937f9.jpg', 'diary', 110, 0),
(110, '7c8de1264610e94c8c5b462e98630f15.jpg', 'diary', 111, 0),
(111, 'f1032963096346290f26665a24b783c5.jpg', 'diary', 112, 0),
(112, '31b3a2c4b2376c01400004156fb7ab08.jpg', 'diary', 112, 0),
(113, 'ae0842dc66110468fefdc9209abbf11b.jpg', 'diary', 113, 0),
(114, 'e640a5c6751fcb54c0e02e85c33ba6e9.jpg', 'diary', 114, 0),
(115, '8d988e01a0efbe59f3eedb5f2fdaf748.jpg', 'diary', 114, 0),
(116, '7b4ea0df681a9c6e732ee0186847efc6.jpg', 'diary', 116, 0),
(117, 'e7dc4efdccbaea1a90740d0b461eb1c8.jpg', 'diary', 117, 0),
(118, '85d17bb53dcb0d7a8fc61a54fbfae642.jpg', 'diary', 119, 0),
(119, '81a4db5bc0b24564a1e9f840da641091.jpg', 'diary', 120, 0),
(120, '45c95d990f4aef004098019bc3b9d7fe.jpg', 'diary', 121, 0),
(121, '0157044b2bb492b627a0854711e5add4.jpg', 'diary', 122, 0),
(122, 'c2b435156d8d5eff7025e8462c956f62.jpg', 'diary', 123, 0),
(123, 'bfb00bc5a6087a264e3e8ae10ea80d83.jpg', 'diary', 124, 0),
(124, 'c77e2ca00b1236b80510b7cc2d636f23.jpg', 'diary', 125, 0),
(125, '2945b356f837862e6f73a70fdbd15ea4.jpg', 'active_post', 65, 149),
(126, '', 'active_post', 66, 161),
(127, 'b073ed1befb6ca4914b8c1a60f38aa30.jpg', 'active_post', 67, 161),
(128, '8c8aad9fc28be1b4fc56bb3059697416.jpg', 'active_post', 68, 161),
(129, '818bcb54b3a9cc4cb7ed5766c98c5384.jpg', 'active_post', 69, 161),
(130, '43769966e5a628a2420d9b5308806d68.jpg', 'active_post', 70, 161),
(131, '0d58de406a180344ffec6297990179f0.jpg', 'active_post', 71, 161),
(132, '0d4c5f7224849edf292224fd6cfae13f.jpg', 'active_post', 72, 161),
(133, '376d8555b3917eec157c9ed00100f2fd.jpg', 'active_post', 73, 161),
(134, '40b2f678944ffccdce530023857e0604.jpg', 'active_post', 74, 161),
(135, '12ad5a7171b6f63c2d35334d8a19ffba.jpg', 'active_post', 75, 161),
(136, '23a2cf46595a58965f164ed05f322dc1.jpg', 'active_post', 76, 165),
(137, '58f34abc4ae401a5b2ba18cc89429b61.jpg', 'active_post', 77, 165);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_province`
--

CREATE TABLE IF NOT EXISTS `wuyi_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `wuyi_province`
--

INSERT INTO `wuyi_province` (`id`, `name`) VALUES
(1, '北京'),
(2, '天津'),
(3, '上海'),
(4, '重庆'),
(5, '河北'),
(6, '山西'),
(7, '台湾'),
(8, '辽宁'),
(9, '吉林'),
(10, '黑龙江'),
(11, '江苏'),
(12, '浙江'),
(13, '安徽'),
(14, '福建'),
(15, '江西'),
(16, '山东'),
(17, '河南'),
(18, '湖北'),
(19, '湖南'),
(20, '广东'),
(21, '甘肃'),
(22, '四川'),
(23, '贵州'),
(24, '海南'),
(25, '云南'),
(26, '青海'),
(27, '陕西'),
(28, '广西'),
(29, '西藏'),
(30, '宁夏'),
(31, '新疆'),
(32, '内蒙古'),
(33, '澳门'),
(34, '香港');

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_users`
--

CREATE TABLE IF NOT EXISTS `wuyi_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(32) CHARACTER SET utf8 NOT NULL,
  `sex` tinyint(1) unsigned DEFAULT NULL,
  `age` tinyint(3) unsigned DEFAULT NULL,
  `phone` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(32) CHARACTER SET utf8 NOT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '1',
  `city` int(10) unsigned DEFAULT NULL COMMENT '非空',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` int(10) unsigned NOT NULL,
  `ip` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `uname` (`phone`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=334 ;

--
-- 转存表中的数据 `wuyi_users`
--

INSERT INTO `wuyi_users` (`uid`, `name`, `pass`, `sex`, `age`, `phone`, `email`, `score`, `photo`, `level`, `city`, `address`, `state`, `addtime`, `ip`) VALUES
(75, 'admin1', '21232f297a57a5a743894a0e4a801fc3', NULL, 20, NULL, 'aa@qq.com', 0, '1387435233.jpg', 127, 23, NULL, 2, 1512434043, NULL),
(74, 'sa', '21232f297a57a5a743894a0e4a801fc3', 1, 20, NULL, 'zhangsan@163.com', 0, '1387432162.GIF', 1, 164, NULL, 2, 1512434044, NULL),
(73, 'mnmnwq', '022052a2a16588403e71d659d88ddf58', 1, 20, NULL, 'mnmnwq@163.com', 0, '1387419173.jpg', 1, 1, NULL, 2, 1512434011, NULL),
(71, 'uu7890', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'abc@163.com', 100, NULL, 1, 0, NULL, 2, 1512434043, NULL),
(69, '嘿嘿', '25d55ad283aa400af464c76d713c07ad', 1, NULL, NULL, 'mn2er123@173.com', 0, NULL, 1, NULL, NULL, 2, 1512434053, NULL),
(70, 'tesla', '0192023a7bbd73250516f069df18b500', NULL, NULL, '13889898989', 'godson@gmail.com', 100, '1387373604.jpg', 1, 1, NULL, 2, 1512434024, NULL),
(61, '白伟', '3e564264ffc1ca45468b9c5ee11a458d', 1, 24, '15319513943', 'mn2er123@163.com', 10000, '1387366198.jpg', 127, 2, NULL, 2, 1512434023, NULL),
(60, 'jim', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL, 'wuhaiyan@163.com', 10000, NULL, 127, 182, NULL, 2, 1512434012, NULL),
(59, '郑建民', '21232f297a57a5a743894a0e4a801fc3', 1, 20, NULL, 'zhengjim@163.com', 10000, '1387421283.jpg', 127, 133, NULL, 2, 1515466560, NULL),
(58, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 20, NULL, 'admin@qq.com', 10000, '1387434997.jpg', 127, 170, NULL, 2, 1515466560, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_users_active`
--

CREATE TABLE IF NOT EXISTS `wuyi_users_active` (
  `uid` int(10) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wuyi_users_active`
--

INSERT INTO `wuyi_users_active` (`uid`, `aid`) VALUES
(70, 135),
(59, 149),
(58, 160),
(61, 138),
(61, 135),
(61, 144),
(73, 138),
(60, 144),
(58, 149),
(58, 154),
(58, 155),
(58, 156),
(58, 157),
(58, 158),
(58, 159),
(58, 161),
(58, 162),
(58, 163),
(59, 166);

-- --------------------------------------------------------

--
-- 表的结构 `wuyi_user_group`
--

CREATE TABLE IF NOT EXISTS `wuyi_user_group` (
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wuyi_user_group`
--

INSERT INTO `wuyi_user_group` (`uid`, `gid`) VALUES
(73, 33),
(71, 42),
(71, 27),
(59, 43),
(59, 37),
(60, 41),
(71, 32),
(60, 40),
(60, 39),
(59, 32),
(59, 38),
(59, 33),
(61, 31),
(61, 32),
(73, 32),
(61, 33),
(61, 34),
(59, 35),
(59, 30),
(59, 29),
(59, 36),
(59, 27),
(80, 32),
(58, 46),
(59, 47),
(59, 48);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
