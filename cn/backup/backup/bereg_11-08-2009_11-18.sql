#SKD101|bereg|10|2009.08.11 11:18:34|103|3|5|30|8|5|21|7|21|3

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
  `subcat` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `parent` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `app_article` VALUES
(1, 'on', 1249880760, '', 'sml1', '', '<p>потребление электроэнергии --<strong> 50 киловатт/ч.</strong></p>\r\n<p>Производительность:<strong style=\"color: #f2360c;\"> 200 л. за час (2440*1220*8 мм) </strong></p>\r\n<p style=\"color: #f13b0d; padding-left: 150px;\"><strong>250 л. за час (2440*1220*6 мм)</strong></p>\r\n<p>Количество персонала - 15 - 16 человек</p>\r\n<p>Состав основного оборудования:</p>\r\n<p>Машина для обработки листа  Ролл  Машина для смешения сырья  Машина для древесных опилок  Автоматическая машина для резки  Пылесос и электрическая машина для отсева</p>\r\n<p>Завод бесплатно предлагает вам рецептуру сырья для производства СМЛ.</p>\r\n<p>Дополнительно необходимо приобретать формы для листа.</p>\r\n<p><strong>Фото </strong>оборудование ниже:</p>\r\n<p>электрическая машина для отсева:</p>\r\n<p><img src=\"content/sml/sml_html_m322384e1.jpg\" alt=\"машина для отсева\" width=\"250\" height=\"167\" /></p>\r\n<p>машина для смешения сырья:</p>\r\n<p><img src=\"content/sml/sml_html_m5dd8f77c.jpg\" alt=\"машина для смешивания сырья\" width=\"270\" height=\"259\" /><img src=\"content/sml/sml_html_m605d8c63.jpg\" alt=\"\" width=\"186\" height=\"187\" /></p>\r\n<p>машина для натягивания ленты:</p>\r\n<p><img src=\"content/sml/sml_html_665f22fb.jpg\" alt=\"натягивание\" width=\"250\" height=\"187\" /></p>\r\n<p>намотки:</p>\r\n<p><img src=\"content/sml/sml_html_m5aa2d240.jpg\" alt=\"\" width=\"166\" height=\"213\" /></p>\r\n<p>машина для резки кромки:</p>\r\n<p><img src=\"content/sml/sml_html_m47ecc05c.jpg\" alt=\"\" width=\"250\" height=\"161\" /></p>\r\n<p><img src=\"content/sml/sml_html_18438e2d.jpg\" alt=\"\" width=\"250\" height=\"145\" /></p>\r\n<p>машина для обработки листа:</p>\r\n<p><img src=\"content/sml/sml_html_42407b33.jpg\" alt=\"\" width=\"195\" height=\"439\" /></p>\r\n<p><img src=\"content/sml/sml_html_7a2a02b1.jpg\" alt=\"\" width=\"249\" height=\"417\" /></p>\r\n<p><img src=\"content/sml/sml_html_5741eff8.jpg\" alt=\"\" width=\"300\" height=\"175\" /></p>\r\n<p><img src=\"content/sml/sml_html_3207cc7c.jpg\" alt=\"\" width=\"300\" height=\"218\" /></p>\r\n<p>основная машина:</p>\r\n<p><img src=\"content/sml/sml_html_87ec358.jpg\" alt=\"\" width=\"250\" height=\"213\" /></p>\r\n<p>автоматическая машина для резки:</p>\r\n<p><img src=\"content/sml/sml_html_m691a0033.jpg\" alt=\"\" width=\"300\" height=\"174\" /></p>\r\n<p> </p>', 'Линия для производства стекломагниевого листа', 'Pererabotka_plastmass', 'Proizvodstvo_listov_SML', 'Проекты'),
(2, 'on', 1249909286, '', 'steklomag_lista', '', '<p style=\"margin-bottom: 0cm; line-height: 120%;\">Автоматизированная линия является современной линией для производства <strong>стекломагниевого листа.</strong></p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">Дополнительно, путем незначительных доработок, оборудование позволяет выпускать стекломагниевую черепицу (волнистый лист типа шифера) и сендвич панели. Сендвич панель представляет собой трехслойную конструкцию.  Два внешних слоя образованы плитами СМЛ, между ними плита пенополистирола типа ПСБ. Толщина панели может быть  до 200 мм, в зависимости от толщины слоя ПСБ.</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">Производительность линии -   <strong>1800 - 2000</strong> листов размером <strong>2440*1220* 8мм</strong> за 8 часов</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">Дополнительная функция - линия позволяет изготавливать волнистый лист типа шифера размером <strong>1,8 х 0,75 м</strong>. Производительность такая же &ndash; <strong>1800 &ndash; 2000 листов за 8 часов</strong>, и сендвич панели. Полистирол необходимой толщины и размеров приобретается у сторонних производителей.</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">Обслуживающий персонал &ndash; <strong>5-6 чел</strong> при работе в одну смену.</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">Список оборудования в таблице:</p>\r\n<p>\r\n<table border=\"1\" cellspacing=\"0\" cellpadding=\"7\" width=\"638\" bordercolor=\"black\">\r\n<tbody>\r\n<tr>\r\n<td width=\"73\" height=\"15\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\"><span style=\"font-family: Arial Black,sans-serif;\"><span style=\"font-size: small;\">Сер.№.</span></span></p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\"><span style=\"font-family: Arial Black,sans-serif;\"><span style=\"font-size: small;\">наименование</span></span></p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\"><span style=\"font-family: Arial Black,sans-serif;\"><span style=\"font-size: small;\">назначение</span></span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\"><span style=\"font-family: Arial Black,sans-serif;\"><span style=\"font-size: small;\">мощность</span></span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"14\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">1</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">загрузочный 				агрегат формовочной панели</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Загрузка 				формовочной панели</p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">0.2KW=1комп.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"41\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">2</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Агрегат 				обработки поверхности панели</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Формирование 				панели со шлифованной поверхностью 				по специальной технологии</p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">3.0KW=1комп.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"9\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">3</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Передающий 				механизм</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">1.5KW=1комп.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"8\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">4</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">вспениватель</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">2.2KW</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"17\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">5</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Механизм 				для жидких материалов</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm; margin-bottom: 0cm;\">1.1KW=1</p>\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">1.1KW=1комп.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"2\" width=\"73\" height=\"15\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">6</p>\r\n</td>\r\n<td rowspan=\"2\" width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Смесительный 				агрегат</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">протирочная 				машина</p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">1.5KW=2комп.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Смеситель</p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">4KW=2комп.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"14\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">7</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">формующая 				машина</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">3.3KW</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"13\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">8</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Единая 				транспортерная лента</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"13\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">9</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Система 				гидравлического подъема полученной 				панели</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">5.5KW</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"15\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">10</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Система 				удаления пыли</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">7.5KW</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"11\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">11</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Четырехголовочный 				обрезочный агрегат</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">18.2KW</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"14\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">12</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Механизм 				для укладки панелей</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">0.2KW=1комп.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"15\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">13</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Агрегат 				для очистки формовочной панели</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">1.5KW</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"14\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">14</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">кран-штабелер 				для формовочной панели</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">0.2KW</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"9\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">15</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Самоуправляемая 				часть электрического оборудования</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"16\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">16</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Область 				действия</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"44\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">17</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">10 Средства 				вертикального и горизонтального 				транспортирования</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Переносит 				раму и законченную панель в вертикальном 				и горизонтальном направлении</p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"17\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">18</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Сетчатый 				фильтр для опилок</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Для 				отсеивания опилок</p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"11\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">19</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Машина 				для нанесения клея, изготовления 				накладного стекла и сушки</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"73\" height=\"10\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\" align=\"CENTER\">20</p>\r\n</td>\r\n<td width=\"189\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\">Пневматический 				агрегат матирующего покрытия</p>\r\n</td>\r\n<td width=\"207\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n<td width=\"110\">\r\n<p style=\"margin-left: 0.1cm; margin-right: 0.1cm;\"><span style=\"font-family: Lucida Sans Unicode;\"> </span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">Для размещения оборудования необходимо помещение: <strong>длина 80 м, ширина 15 м и высотой 5 м</strong>. Помещение должно быть оборудовано кран-балкой. Особых требований к помещению не имеется. Зимой обеспечить температуру выше 0 градусов (для обеспечения технологии).</p>\r\n<p style=\"margin-bottom: 0cm; line-height: 120%;\">В процессе производства листов имеется стадия отверждения. Стадия <strong>отверждения </strong>продолжается примерно <strong>24 часа</strong>, для отверждения необходимо помещение с плюсовой температурой. Не рекомендуется отверждать на солнце, достаточно закрытое помещение, зимой обеспечить температуру выше нуля</p>\r\n<p>&nbsp;</p>', 'Автоматизированная линия производства стекломагниевого листа', 'Pererabotka_plastmass', 'sml', 'Проекты'),
(3, 'on', 1249897839, '', 'rtyu', '', '<p><img src=\"content/img.jpg\" alt=\"\" width=\"480\" height=\"302\" /></p>\r\n<p>hjkhk ghjdthrf</p>\r\n<p><strong>fghfghfg </strong>rfth</p>\r\n<p>&nbsp;</p>', 'ghjdthrf', '', '', 'Оборудование');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `active` enum('on','off') /*!40101 collate utf8_unicode_ci */ default 'on',
  `date` int(11) default NULL,
  `name` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `title` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `parent` char(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `text` text /*!40101 collate utf8_unicode_ci */ NOT NULL,
  `image` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `category` VALUES
(1, 'on', 0, 'Metalloobrabotka_o', 'Обработка металла', 'Оборудование', 'Описание категории. Длинный текст', ''),
(3, 'on', 0, 'Pererabotka_plastmass_o', 'Переработка пластмасс', 'Оборудование', 'Описание категории. Длинный текст', ''),
(5, 'on', 0, 'Pererabotka_plastmass', 'Переработка пластмасс', 'Проекты', '', ''),
(6, 'on', 0, 'Pererabotka_othodov', 'Переработка отходов', 'Проекты', '', ''),
(7, 'on', 0, 'Proizvodstvo_stroitelnyh_materialov', 'Производство строительных материалов', 'Проекты', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=38 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

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
(36, 'Всякая хрень', 'Всякая хрень\r\n', 1249458721, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '79.133.65.221', 2, 0, 'ижевск'),
(37, 'Всякая хреньjkjhk', 'Всякая хрень\r\n', 1249671377, 'Печеникин ИВ', 'pivo@vasya.ru', 1, 'admin', 'домик в деревне', '192.168.81.250', 2, 0, 'ижевск');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

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
(19, 'Я хочу бутерброд', 'а вася дурак! ты знал?!', 9, 2, 1249458837, 'out'),
(20, 'Всякая хреньjkjhk', 'Всякая хрень\r\n', 0, 2, 1249671377, 'out'),
(21, 'Всякая хреньjkjhk', ' вопром', 20, 2, 1249671390, 'out');

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
(4, 1249842205, 'Учеба', '<p style=\"text-align:left; margin-left:20px;\">\r\n<strong>Хэйлунцзянский университет</strong></p>\r\n<p><img src=\"content/img.jpg\" alt=\"Хэйлунцзянский университет\" /></p>\r\n<p>Вуз был основан в <strong>1941 </strong>году в городе Яньань на базе отделения русского языка в университете, созданном Мао Цзэдуном для обучения военных кадров в соответствии с нуждами антияпонской борьбы. В 1946 году вуз был перенесен в Харбин, где стал специализированным учреждением иностранных языков. С 1958 года переименован в Хэйлунцзянский университет – первый в провинции вуз с комплексным преподаванием наук. В последующие годы вплоть до 2004 года вуз объединялся с другими институтами и высшими школами с целью расширения круга специальностей. Сегодня Хэйлунцзянский университет с гордостью представляет 74 специальности бакалавриата – как гуманитарные, так и технические. Имеются магистратура по 109 специальностям и докторантура по 14 дисциплинам. Здесь готовят инженеров, бухгалтеров, переводчиков, менеджеров, ИТ-специалистов, кадровых работников и др. Вуз занимает территорию 1,92 млн кв.метров, расположен в живописном зеленом районе Харбина. На базе вуза имеются мультимедийные аудитории, лаборатории, библиотеки и спортивные залы, бассейн, просторные общежития со спутниковым телевидением, транслируются также и российские телепрограммы. В последние годы вуз активно совершенствует оборудование для научных исследований, улучшает оснащение лабораторий и условия учебного процесса. Преподавательский состав вуза насчитывает 1890 сотрудников, многие из них в разное время были удостоены премии «Лучший преподаватель вуза», становились победителями всекитайского конкурса «Выдающийся преподаватель», участвовали в проекте «Тысячи талантов нового века», в плановом проекте Министерства просвещения КНР по поддержке выдающихся талантов нового столетия и других. В Хэйлунцзянском университете расположен Центр русского языка, один из трех центров, организованных правительством РФ на территории Китая. Команда преподавателей университета создала «Большой русско-китайский подробный словарь», который получил первую премию третьего конкурса «Китайские словари», государственную библиотечную премию. Эта книга была преподнесена в качестве подарка Президенту РФ В.В.Путину во время его визита в Китай.</p>', 'Admin', 'study'),
(5, 1247011200, 'Контакты', '<p style=\"text-align: center;\"><strong>ДИРЕКТОР</strong></p>\r\n<p style=\"text-align: center;\">Суздальцев Игорь Юрьевич<br />Тел. +7 (3412) 508-008<br/>\r\n<span> E</span>-<span>mail</span>: \r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\n <!--\r\n var prefix = \'&#109;a\' + \'i&#108;\' + \'&#116;o\';\r\n var path = \'hr\' + \'ef\' + \'=\';\r\n var addy57435 = \'s&#105;y\' + \'&#64;\';\r\n addy57435 = addy57435 + \'b&#101;r&#101;g-cn\' + \'&#46;\' + \'r&#117;\';\r\n document.write( \'<a \' + path + \'\\\'\' + prefix + \':\' + addy57435 + \'\\\'>\' );\r\n document.write( addy57435 );\r\n document.write( \'<\\/a>\' );\r\n // --> \\n </script><script language=\"JavaScript\" type=\"text/javascript\">\r\n <!--\r\n document.write( \'<span style=\\\'display: none;\\\'>\' );\r\n // -->\r\n </script>Этот e-mail адрес защищен от спам-ботов, для его просмотра у Вас должен быть включен Javascript\r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\n <!--\r\n document.write( \'</\' );\r\n document.write( \'span>\' );\r\n // -->\r\n </script>\r\n\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>ЗАМЕСТИТЕЛЬ ДИРЕКТОРА</strong></p>\r\n<p style=\"text-align: center;\">Печеникин Владимир Тимофеевич<br />Тел. +7 (3412) 21-78-05<br />\r\nE-mail: \r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\n <!--\r\n var prefix = \'&#109;a\' + \'i&#108;\' + \'&#116;o\';\r\n var path = \'hr\' + \'ef\' + \'=\';\r\n var addy58248 = \'pvt\' + \'&#64;\';\r\n addy58248 = addy58248 + \'b&#101;r&#101;g-cn\' + \'&#46;\' + \'r&#117;\';\r\n document.write( \'<a \' + path + \'\\\'\' + prefix + \':\' + addy58248 + \'\\\'>\' );\r\n document.write( addy58248 );\r\n document.write( \'<\\/a>\' );\r\n //-->\\n </script>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n <!--\r\n document.write( \'<span style=\\\'display: none;\\\'>\' );\r\n //-->\r\n </script>Этот e-mail адрес защищен от спам-ботов, для его просмотра у Вас должен быть включен Javascript\r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\n <!--\r\n document.write( \'</\' );\r\n document.write( \'span>\' );\r\n //-->\r\n </script>', 'Admin', 'contacts'),
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
  `image` varchar(255) /*!40101 collate utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `subcat` VALUES
(21, 'on', 0, 'linivspen', 'Линия производства вспененного полистирола экструзионным методом', 'Pererabotka_plastmass', '', ''),
(8, 'on', 0, 'Termoplastavtomaty', 'Термопластавтоматы', 'Pererabotka_plastmass_o', '', ''),
(2, 'on', 0, 'Drevesnye_othody', 'Древесные отходы', 'Pererabotka_othodov', '', ''),
(3, 'on', 0, 'Proizvodstvo_listov_SML', 'Производство листов СМЛ', 'Proizvodstvo_stroitelnyh_materialov', '', ''),
(4, 'on', 0, 'Proizvodstvo_syеndvich_panelei', 'Производство сэндвич панелей', 'Proizvodstvo_stroitelnyh_materialov', '', ''),
(5, 'on', 0, 'Proizvodstvo_izdelii_vibropressovym_sposobom', 'Производство изделий вибропрессовым способом', 'Proizvodstvo_stroitelnyh_materialov', '', ''),
(6, 'on', 0, 'Proizvodstvo_Gipsokartona', 'Производство Гипсокартона', 'Proizvodstvo_stroitelnyh_materialov', '', ''),
(7, 'on', 0, 'Linijа_proizvodstva_DSP', 'Линия производства ДСП', 'Proizvodstvo_stroitelnyh_materialov', '', ''),
(9, 'on', 0, 'Yekstrudery_i_linii_yеkstruzionnye', 'Экструдеры и линии экструзионные', 'Pererabotka_plastmass_o', '', ''),
(10, 'on', 0, 'Inzhekcionno-vyduvnoe', 'Инжекционно-выдувное', 'Pererabotka_plastmass_o', '', ''),
(11, 'on', 0, 'Oborudovanie_dljа_proizvodstva_plenki', 'Оборудование для производства пленки', 'Pererabotka_plastmass_o', '', ''),
(12, 'on', 0, 'Proizvodstvo_grjаzeulavlivayushih_kovrov', 'Производство грязеулавливающих ковров', 'Pererabotka_plastmass_o', '', ''),
(13, 'on', 0, 'Linijа_proizvodstva_Sotovogo_polikarbonata', 'Линия производства Сотового поликарбоната', 'Pererabotka_plastmass_o', '', ''),
(14, 'on', 0, 'Instrument_dljа_plastmassy', 'Инструмент для пластмассы', 'Pererabotka_plastmass_o', '', ''),
(15, 'on', 0, 'Pererabotka_othodov', 'Переработка отходов', 'Pererabotka_plastmass_o', '', ''),
(16, 'on', 0, 'Svarochnoe_oborudovanie', 'Сварочное оборудование', 'Metalloobrabotka_o', '', 'images/ballony.jpg'),
(17, 'on', 0, 'Trubogiby', 'Трубогибы', 'Metalloobrabotka_o', '', ''),
(18, 'on', 0, 'Truborezy', 'Труборезы', 'Metalloobrabotka_o', '', ''),
(19, 'on', 0, 'Proverka', 'Проверка', 'Metalloobrabotka_o', '', ''),
(20, 'on', 0, 'sml', 'Линии СМЛ', 'Pererabotka_plastmass', '', ''),
(22, 'on', 0, 'mahine_sht_lit', 'Машины для штамповки и литья', 'Metalloobrabotka_o', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `users` VALUES
(2, 'pivo', '202cb962ac59075b964b07152d234b70', 'Печеникин ИВ', 'Игорь', 'Владимирович', 'Печеникин', 'admin', 'pivo@vasya.ru', 1246935600, 536875200, 'ижевск', 'домик в деревне', '3212310'),
(10, 'admin', 'c79687e5f169f8dd8f00dae23dd57f5e', 'Печеникин Игорь Владимирович', 'Игорь', 'Владимирович', 'Печеникин', 'admin', 'pivolan@gmail.com', 1249877341, -14400, '', '', ''),
(8, 'vasya', '962012d09b8170d912f0669f6d7d9d07', 'вася петункин дебилович', 'петункин', 'дебилович', 'вася', 'registered', 'vasya', 1249149707, 0, '', '', '');

