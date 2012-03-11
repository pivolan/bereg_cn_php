#SKD101|bereg|10|2009.08.06 02:58:15|96|2|5|29|8|5|19|7|19|2

DROP TABLE IF EXISTS `app_article`;
CREATE TABLE `app_article` (
  `id` int(11) NOT NULL auto_increment,
  `active` enum('on','off') /*!40101 collate utf8_unicode_ci */ default 'on',
  `date` int(11) default NULL,
  `login` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `name` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `icon` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `title` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `category` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `subcat` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `parent` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `app_article` VALUES
(11, 'on', 1248750000, 'Admin', 'Proizvodstvo_pelet', '', 'Производство пелет', 'Производство пелет', 'Drevesnye_othody', '', ''),
(12, 'on', 1249095600, 'Admin', 'Vsjаkajа_hren', '', 'проверка ересис', 'Всякая хрень', 'Trubogiby', '', '');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `active` enum('on','off') /*!40101 collate utf8_unicode_ci */ default 'on',
  `date` int(11) default NULL,
  `name` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `title` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `parent` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `category` VALUES
(1, 'on', 0, 'Metalloobrabotka_o', 'Обработка металла', 'Оборудование', 'Описание категории. Длинный текст'),
(3, 'on', 0, 'Pererabotka_plastmass_o', 'Переработка пластмасс', 'Оборудование', 'Описание категории. Длинный текст'),
(5, 'on', 0, 'Pererabotka_plastmass', 'Переработка пластмасс', 'Проекты', ''),
(6, 'on', 0, 'Pererabotka_othodov', 'Переработка отходов', 'Проекты', ''),
(7, 'on', 0, 'Proizvodstvo_stroitelnyh_materialov', 'Производство строительных материалов', 'Проекты', '');

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` tinyint(4) NOT NULL auto_increment,
  `title` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `date` int(10) NOT NULL,
  `fio` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `email` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `toid` tinyint(4) NOT NULL,
  `tologin` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `company` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `ip` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `fromid` tinyint(4) NOT NULL,
  `parent` int(10) NOT NULL,
  `adress` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `feedback` VALUES
(10, '', 'saljkdsagfjlreoi', 1247126857, 'Печеникни ИВ', 'pivo@vasya.ru', 1, 'admin', '', '127.0.0.1', 2, 0, ''),
(9, 'ждл', 'выфвфв', 1247126500, 'Печеникни ИВ', 'pivo@vasya.ru', 1, 'admin', '', '127.0.0.1', 2, 0, ''),
(8, 'просто так', 'Всякая ересь', 1247126381, 'Печеникни ИВ', 'pivo@vasya.ru', 1, 'admin', '', '127.0.0.1', 2, 0, ''),
(11, '', '', 1249048121, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', '', '192.168.81.251', 2, 0, ''),
(12, '', 'проверка', 1249137284, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(13, '', 'Всякая хрень\r\n', 1249137332, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(14, '', 'неарпа', 1249137432, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(15, '', 'Всякая хрень\r\n', 1249137442, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(16, '', 'боьрпорп', 1249137534, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(17, '', 'Всякая хрень\r\n', 1249137546, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(18, '', 'Всякая хрень\r\n', 1249137970, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(19, '', 'Вася поехал срать', 1249138305, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(20, '', 'Всякая хрень\r\n', 1249138374, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(21, '', 'Всякая хрень\r\n', 1249138395, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(22, 'Всякая хрень', 'Всякая хрень\r\n', 1249143804, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(23, 'Я хочу бутерброд', 'Хочу бутерброд', 1249144541, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(24, 'Всякая хрень', 'Всякая хрень\r\ndbdsfbdsf', 1249187146, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(25, 'Производство пелет', 'Производство пелет\r\nдлодлодлолдодло', 1249259096, 'жлддл', 'pi@wer.ri', 1, 'admin', '', '192.168.81.250', 0, 0, 'олоодлодло'),
(26, 'Производство пелет', 'Производство пелет\r\nkljhkljhkljhkjlh', 1249259125, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.250', 2, 0, 'ижевск'),
(27, 'Производство пелет1', 'Производство пелет\r\n', 1249725385, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(28, 'Всякая хрень', 'Всякая хрень\r\n', 1249423651, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(29, 'Всякая хрень', 'Всякая хрень\r\n', 1249423721, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(30, 'Всякая хрень', 'Всякая хрень\r\n', 1249424209, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(31, 'Всякая хрень', 'Всякая хрень\r\n', 1249424321, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(32, 'Всякая хрень', 'Всякая хрень\r\n', 1249424390, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(33, 'Всякая хрень', 'Всякая хрень\r\n', 1249425671, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(34, 'Всякая хрень', 'Всякая хрень\r\n', 1249425941, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(35, 'Всякая хрень', 'Всякая хрень\r\n', 1249427085, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.251', 2, 0, 'ижевск'),
(36, 'Всякая хрень', 'Всякая хрень\r\n', 1249458721, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '79.133.65.221', 2, 0, 'ижевск');

DROP TABLE IF EXISTS `linkleft`;
CREATE TABLE `linkleft` (
  `id` tinyint(4) NOT NULL auto_increment,
  `title` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `pageid` tinyint(4) NOT NULL,
  `url` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `active` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `name` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `number` int(10) default NULL,
  `position` enum('left','top') /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `linkleft` VALUES
(18, 'Обратная связь', 0, 'feedback.php', 'ON', '0', 403, 'left'),
(16, 'Форум', 0, 'forum/', 'ON', '0', 201, 'left'),
(15, 'Главная', 3, '', 'ON', 'main', 100, 'left'),
(19, 'Контакты', 5, '', 'ON', 'contacts', 504, 'left'),
(21, 'Услуги', 0, '', 'ON', 'services', 606, 'top'),
(22, 'Учеба', 0, '', 'ON', 'study', 909, 'top'),
(23, 'Оборудование', 0, 'equipment.php', 'ON', '0', 808, 'top'),
(24, 'Проекты', 0, 'projects.php', 'ON', '0', 809, 'top');

DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(4) NOT NULL auto_increment,
  `num` int(4) NOT NULL,
  `title` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `href` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `login` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(4) NOT NULL auto_increment,
  `date` int(10) NOT NULL,
  `title` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `login` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `news` VALUES
(12, 1286074800, 'Турист', '\r\nИдеальное время для поездок в Китай - поздняя весна, особенно май, или осень с сентября по октябрь, а на юге ноябрь-декабрь. ', 'Admin'),
(13, 1286074800, 'Абыр ваще', '\r\nЧасть территории Китая лежит в зоне умеренного климата, южная часть в тропиках и субтропиках, северные районы прилегают к зоне континентального климата. ', 'Admin'),
(11, 1286074800, 'Температура', '\r\nСредний уровень температуры и осадок, с сентября по октябрь, а на юге ноябрь-декабрь. ', 'Admin'),
(15, 1247011200, 'Страница с новостями', '\r\nС этого момента страница новостей работает исправно. Ура товарищи!', 'Admin'),
(16, 1248836400, 'Еще', 'еще много чего интересного\r\n					\r\n					', 'Admin');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL auto_increment,
  `title` char(255) /*!40101 collate utf8_unicode_ci */ default NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `parent` int(11) default '0',
  `userid` int(11) default NULL,
  `date` int(11) default NULL,
  `trace` enum('in','out') /*!40101 collate utf8_unicode_ci */ default 'out',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `orders` VALUES
(1, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249143804, 'out'),
(2, 'Я хочу бутерброд', 'Хочу бутерброд', 1, 2, 1249144541, 'in'),
(3, 'Я хочу бутерброд', 'Хочу быстрее запустить этот сайт\r\n', 2, 2, 1249146323, 'out'),
(4, 'Всякая хрень', 'Всякая хрень\r\ndbdsfbdsf', 0, 2, 1249187146, 'out'),
(5, 'Я хочу бутерброд', 'dsfbgf', 3, 2, 1249187164, 'out'),
(6, 'Производство пелет', 'Производство пелет\r\nkljhkljhkljhkjlh', 0, 2, 1249259125, 'out'),
(7, 'Производство пелет', 'k.jsdfkjdhs', 6, 2, 1249259135, 'out'),
(8, 'Производство пелет1', 'Производство пелет\r\n', 0, 2, 1249725385, 'out'),
(9, 'Я хочу бутерброд', 'dgfhdgf\r\n', 5, 2, 1249725411, 'out'),
(10, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249423651, 'out'),
(11, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249423721, 'out'),
(12, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249424209, 'out'),
(13, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249424321, 'out'),
(14, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249424390, 'out'),
(15, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249425671, 'out'),
(16, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249425941, 'out'),
(17, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249427085, 'out'),
(18, 'Всякая хрень', 'Всякая хрень\r\n', 0, 2, 1249458721, 'out'),
(19, 'Я хочу бутерброд', 'а вася дурак! ты знал?!', 9, 2, 1249458837, 'out');

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(4) NOT NULL auto_increment,
  `date` int(10) NOT NULL,
  `title` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `login` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `name` varchar(255) /*!40101 collate utf8_unicode_ci */ default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `pages` VALUES
(6, 1247626800, 'Главная', '<p>Наша компания работает с китаем с 2002 года и специализируется на поиске необходимой информации о предприятиях, производствах, оборудовании и товарах Китая. Мы поможем предпринимателям и компаниям, которые ведут дела с Китаем и планируют начать сотрудничество с Китайскими фабриками и заводами найти необходимую для работы информацию.</p>\r\n<p class=\"lined\">Мы предлагаем Вам надежные, взвешанные и проверенные системы успешного ведения бизнеса в Китае и поставки конкурентноспособной продукции с китайских заводов и фабрик, так же, у нас Вы можете узнать о предстоящих выставках проводимых в Китае и с нашей помощью принять участи в них.</p>\r\n<p>Мы готовы содействовать развитию Вашего бизнеса оказываея услуги поиска необходимых товаро и оборудования в Китае, предоставляя услуги переводчиков, предоставляя сведения о китайских предприятиях а также о товарах и оборудованиее, производимых в Китае. А так же мы поставляем китайское оборудование - термопласт-автоматы, экструдеры, испытательное оборудование; все это оборудование сегодня успешно работает на предприятиях наших заказчиков.</p>\r\n<p>В нашей компании работают только высококвалифицированные специалисты с многолетним опытом работы в Китае. Хорошее знание китайского рынка и постоянный его мониторинг позволяет нашим сотрудникам добиться наилучших результатов в процессе работы и таким образом экономить средства и время клиента. Сейчас мы имеем много надежных партнеров в Китае - грамотных профессионалов из числа переводчиков, инженеров и технологов. Мы уверены, что наши знания и сведения, которыми мы владеем, помогут российским и китайским предпринимателям в развитии успешного и взаимовыгодного сотрудничества между ними.</p>', 'Admin', 'main'),
(7, 1248404400, 'Услуги', '<p style=\"margin-bottom: 0cm;\"><strong><span style=\"font-size: 11pt;\"><em>ООО «БЕРЕГ» предоставляет для российских и китайских предпринимателей следующие виды услуг:</em></span></strong></p>\r\n<br><br>\r\n<p><a href=\"javascript:collapsElement(\'div11\')\" onfocus=\"this.blur()\"> <img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> поиск и поставка товаров из Китая; </a></p>\r\n<div id=\"div11\" class=\"service\">Поиск необходимых товаров в Китае – предоставление информации о товарах - фото товаров имеющитхся в базе, цены - бесплатно. В случае, если необходимых клиенту товаров в базе нет – согласовывается перечень необходимых работ – поездка на предпирятие, подготовка и высылка образцов, в течение 2-5 дней определяется стоимость данных работ и согласовывается с клиентом. В дальнейшем по отдельному контракту осуществляется поставка необходимых клиенту товаров.<br /></div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div12\')\" onfocus=\"this.blur()\"> <img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> поиск оборудования в Китае; </a></p>\r\n<div id=\"div12\" class=\"service\">По запросу клиента предоставляется информация (бесплатно, если данная информация имеется в базе) о необходимом ему оборудовании – фото оборудования, основные технические характеристики, стоимость оборудования (франко-завод). В случае, если необходимого клиенту оборудования в базе нет – согласовывается перечень необходимых работ – поездка на предприятие, высылка каталогов фото и видео материалов, в течение 2-5 дней определяется стоимость данных работ и согласовывается с клиентом. В дальнейшем по отдельному контракту осуществляется поставка необходимого клиенту оборудования.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div13\')\" onfocus=\"this.blur()\"><img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> подготовка контрактов на поставку товаров и оборудования на русском и китайском языках; </a></p>\r\n<div id=\"div13\" class=\"service\">Осуществляется подготовка контрактов на поставку необходимых заказчику товаров и оборудования на русском и китайском языках. Стоимость услуги – от 2 до 5% от стоимости контракта, но не менее 500 $.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div14\')\" onfocus=\"this.blur()\"> <img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> сопровождение контракта, прием груза в Ижевске, растомаживание грузов;</a></p>\r\n<div id=\"div14\" class=\"service\">Кроме подготовки контракта мы готовы осуществлять сопровождение груза, его прием, растомаживание в Ижевске. При необходимости можем осуществлять доставку растоможенного груза клиенту по отдельному договору. Стоимость услуги – согласовывается отдельно.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div15\')\" onfocus=\"this.blur()\"><img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> размещение информации на русских и китайских поисковых сайтах; </a></p>\r\n<div id=\"div15\" class=\"service\">Данная услуга предполагает размещение информации российских предприятий на китайских поисковых сайтах на китайском языке и китайских предпринимателей на русском языке на русских поисковых сайтах. Информация размещается на сайтах соответствующих профилю производства заказчика. Стоимость услуги – 100 $ - за размещение информации на 2-5 поисковых сайтах объемом информации – до 300 знаков на русском языке и до 60 знаков на китайском языке.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div16\')\" onfocus=\"this.blur()\"> <img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> перевод китайских сайтов на русский язык;</a></p>\r\n<div id=\"div16\" class=\"service\">Для китайских предпринимателей предлагается оформить их сайты (полностью или частично) на русском языке, что позволит получить им доступ к российским Интернет ресурсам – информация о вашем предприятии станет доступна всем российским пользователям Интернета. Стоимость услуги – от 300 $. Конкретная стоимость будет оговорена при согласовании объема конкретных работ.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div17\')\" onfocus=\"this.blur()\"> <img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> перевод китайских каталогов на русский  язык; </a></p>\r\n<div id=\"div17\" class=\"service\">Предлагается готовить для китайских предпринимателей каталоги выпускаемой ими продукции на русском языке. Стоимость услуги зависит от объема каталога, наличия готового макета.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div18\')\" onfocus=\"this.blur()\"> <img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> подготовка рекламных материалов (листовок, буклетов) на русском языке;</a></p>\r\n<div id=\"div18\" class=\"service\">Для китайских предприятий предлагается подготавливать рекламные материалы (листовки, буклеты) на русском языке. Стоимость оформления двухсторонней рекламной листовки формата A4 – 200 $.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div19\')\" onfocus=\"this.blur()\"> <img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> организация участия китайских предприятий в российских тематических выставках; </a></p>\r\n<div id=\"div19\" class=\"service\">Даная услуга предполагает организацию участия китайских предприятий (очное или заочное) в тематических российских региональных и международных выставках. Мы оказывает содействие китайским предпринимателям в расширении их продаж в России, представлении на тематических выставках их товаров и оборудования. Сбор информации, ее последующая обработка. Стоимость услуги оговаривается по каждой выставке отдельно.</div>\r\n\r\n<p><a href=\"javascript:collapsElement(\'div20\')\" onfocus=\"this.blur()\"><img src=\"content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" /> посещение выставок в Китае;</a></p>\r\n<div id=\"div20\" class=\"service\">По запросу российских клиентов мы можем обеспечить посещение тематических выставок в Китае, с предоставлением квалифицированного переводчика. Также возможно сбор необходимой для клиентов информации по определенной тематике – оборудованию, товарам на определенных выставок с получением этой информации в России. Стоимость услуги оговаривается по каждому конкретному случаю.</div>\r\n\r\n<p> </p>\r\n<p style=\"margin-bottom: 0cm; text-align: center;\"><span style=\"font-size: 12pt;\">Уважаемые господа!</span></p>\r\n<p style=\"margin-bottom: 0cm;\"><span style=\"font-size: 10pt;\"><br /></span></p>\r\n<p style=\"margin-bottom: 0cm;\"><span style=\"font-size: 10pt;\">Если среди предлагаемых услуг вы не нашли услуги, которая требуется Вам – просьба сообщите, чего вы бы хотели. Мы обязательно постараемся Вам помочь!</span></p>', 'Admin', 'services'),
(8, 1247702400, 'проверкалл', '<p><img src=\"../content/VV.jpg\" alt=\"\" width=\"20\" height=\"20\" />вася</p>', 'Admin', 'kulik'),
(4, 1286074800, 'Учеба', '<p><img src=\"content/img.jpg\" alt=\"\"></p>\r\n<p>					\r\nВуз был основан в 1941 году в городе Яньань на базе отделения русского языка в университете, созданном Мао Цзэдуном для обучения военных кадров в соответствии с нуждами антияпонской борьбы. В 1946 году вуз был перенесен в Харбин, где стал специализированным учреждением иностранных языков. С 1958 года переименован в Хэйлунцзянский университет – первый в провинции вуз с комплексным преподаванием наук. В последующие годы вплоть до 2004 года вуз объединялся с другими институтами и высшими школами с целью расширения круга специальностей. Сегодня Хэйлунцзянский университет с гордостью представляет 74 специальности бакалавриата – как гуманитарные, так и технические. Имеются магистратура по 109 специальностям и докторантура по 14 дисциплинам. Здесь готовят инженеров, бухгалтеров, переводчиков, менеджеров, ИТ-специалистов, кадровых работников и др. Вуз занимает территорию 1,92 млн кв.метров, расположен в живописном зеленом районе Харбина. На базе вуза имеются мультимедийные аудитории, лаборатории, библиотеки и спортивные залы, бассейн, просторные общежития со спутниковым телевидением, транслируются также и российские телепрограммы. В последние годы вуз активно совершенствует оборудование для научных исследований, улучшает оснащение лабораторий и условия учебного процесса. Преподавательский состав вуза насчитывает 1890 сотрудников, многие из них в разное время были удостоены премии «Лучший преподаватель вуза», становились победителями всекитайского конкурса «Выдающийся преподаватель», участвовали в проекте «Тысячи талантов нового века», в плановом проекте Министерства просвещения КНР по поддержке выдающихся талантов нового столетия и других. В Хэйлунцзянском университете расположен Центр русского языка, один из трех центров, организованных правительством РФ на территории Китая. Команда преподавателей университета создала «Большой русско-китайский подробный словарь», который получил первую премию третьего конкурса «Китайские словари», государственную библиотечную премию. Эта книга была преподнесена в качестве подарка Президенту РФ В.В.Путину во время его визита в Китай.\r\n					</p>\r\n					\r\n					', 'Admin', 'study'),
(5, 1247011200, 'Контакты', '<p style=\"text-align: center;\"><strong>ДИРЕКТОР</strong></p>\r\n<p style=\"text-align: center;\">Суздальцев Игорь Юрьевич<br />Тел. +7 (3412) 508-008<br />E-mail:</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>ЗАМЕСТИТЕЛЬ ДИРЕКТОРА</strong></p>\r\n<p style=\"text-align: center;\">Печеникин Владимир Тимофеевич<br />Тел. +7 (3412) 21-78-05<br />E-mail:</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a href=\"mailto:pvt@bereg-cn.ru\"></a></p>\r\n<p style=\"margin-bottom: 0cm; text-align: center;\">\r\n<script type=\"text/javascript\"><!--\r\n var prefix = \'&#109;a\' + \'i&#108;\' + \'&#116;o\';\r\n var path = \'hr\' + \'ef\' + \'=\';\r\n var addy99311 = \'pvt\' + \'&#64;\';\r\n addy99311 = addy99311 + \'b&#101;r&#101;g-cn\' + \'&#46;\' + \'r&#117;\';\r\n document.write( \'<a \' + path + \'\\\'\' + prefix + \':\' + addy99311 + \'\\\'>\' );\r\n document.write( addy99311 );\r\n document.write( \'<\\/a>\' );\r\n\r\n <! \r\n document.write( \'<span style=\"\\\" mce_style=\"\\\"\'display: none;\\\'>\' );\r\n// --></script>\r\n<span style=\"display: none;\">Этот e-mail адрес защищен от спам-ботов, для его просмотра у Вас должен быть включен Javascript\r\n<script type=\"text/javascript\"><!--\r\n document.write( \'</\' );\r\n document.write( \'span>\' );\r\n// --></script>\r\n</span></p>', 'Admin', 'contacts'),
(9, 1249095600, 'Ошибка авторизации', '<p>Логин или пароль указаны неверно.</p>\r\n<p>Пожалуйста попробуйте снова.</p>', 'Admin', 'error_auth'),
(10, 1249095600, 'Авторизация', '<p>Добро пожаловать.</p>\r\n<p>Вы успешно авторизовались.</p>', 'Admin', 'succ_auth');

DROP TABLE IF EXISTS `subcat`;
CREATE TABLE `subcat` (
  `id` int(11) NOT NULL auto_increment,
  `active` enum('on','off') /*!40101 collate utf8_unicode_ci */ default 'on',
  `date` int(11) default NULL,
  `name` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `title` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `parent` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `subcat` VALUES
(1, 'on', 0, 'vspenennogo_polistirola', 'Линия производства вспененного полистирола экструзионным методом', 'Pererabotka_plastmass', ''),
(8, 'on', 0, 'Termoplastavtomaty', 'Термопластавтоматы', 'Pererabotka_plastmass', ''),
(2, 'on', 0, 'Drevesnye_othody', 'Древесные отходы', 'Pererabotka_othodov', ''),
(3, 'on', 0, 'Proizvodstvo_listov_SML', 'Производство листов СМЛ', 'Proizvodstvo_stroitelnyh_materialov', ''),
(4, 'on', 0, 'Proizvodstvo_syеndvich_panelei', 'Производство сэндвич панелей', 'Proizvodstvo_stroitelnyh_materialov', ''),
(5, 'on', 0, 'Proizvodstvo_izdelii_vibropressovym_sposobom', 'Производство изделий вибропрессовым способом', 'Proizvodstvo_stroitelnyh_materialov', ''),
(6, 'on', 0, 'Proizvodstvo_Gipsokartona', 'Производство Гипсокартона', 'Proizvodstvo_stroitelnyh_materialov', ''),
(7, 'on', 0, 'Linijа_proizvodstva_DSP', 'Линия производства ДСП', 'Proizvodstvo_stroitelnyh_materialov', ''),
(9, 'on', 0, 'Yekstrudery_i_linii_yеkstruzionnye', 'Экструдеры и линии экструзионные', 'Pererabotka_plastmass', ''),
(10, 'on', 0, 'Inzhekcionno-vyduvnoe', 'Инжекционно-выдувное', 'Pererabotka_plastmass', ''),
(11, 'on', 0, 'Oborudovanie_dljа_proizvodstva_plenki', 'Оборудование для производства пленки', 'Pererabotka_plastmass', ''),
(12, 'on', 0, 'Proizvodstvo_grjаzeulavlivayushih_kovrov', 'Производство грязеулавливающих ковров', 'Pererabotka_plastmass', ''),
(13, 'on', 0, 'Linijа_proizvodstva_Sotovogo_polikarbonata', 'Линия производства Сотового поликарбоната', 'Pererabotka_plastmass', ''),
(14, 'on', 0, 'Instrument_dljа_plastmassy', 'Инструмент для пластмассы', 'Pererabotka_plastmass', ''),
(15, 'on', 0, 'Pererabotka_othodov', 'Переработка отходов', 'Pererabotka_plastmass', ''),
(16, '', 0, 'Svarochnoe_oborudovanie', 'Сварочное оборудование', 'Metalloobrabotka_o', ''),
(17, 'on', 0, 'Trubogiby', 'Трубогибы', 'Metalloobrabotka_o', ''),
(18, '', 0, 'Truborezy', 'Труборезы', 'Metalloobrabotka_o', ''),
(19, '', 0, 'Proverka', 'Проверка', 'Metalloobrabotka_o', '');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL auto_increment,
  `login` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `pass` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `fio` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `name` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `sername` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `lastname` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `status` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `email` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `date` int(10) NOT NULL,
  `birthdate` int(10) NOT NULL,
  `adress` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `company` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `tel` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=9 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `users` VALUES
(2, 'pivo', '202cb962ac59075b964b07152d234b70', 'Печеникин ИВ', 'Игорь', 'Владимирович', 'Печеникин', '', 'pivo@vasya.ru', 1246935600, 536817600, 'ижевск', 'домик в деревне', '321231'),
(8, 'vasya', '962012d09b8170d912f0669f6d7d9d07', 'вася петункин дебилович', 'петункин', 'дебилович', 'вася', 'registered', 'vasya', 1249149707, 0, '', '', '');

