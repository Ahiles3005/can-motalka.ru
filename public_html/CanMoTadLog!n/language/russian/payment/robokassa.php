<?php /* robokassa metka */
// Heading
$_['heading_title']      = 'Робокасса 20 методов';

/* start 1611 */
$_['text_copy_to_clipboard'] = 'Скопировать в буфер';
/* end 1611 */

/* start 1112 */
$_['entry_okrugl'] = 'Округленение цены';
$_['entry_okrugl_no'] = 'Отключено';
$_['entry_okrugl_round'] = 'Округлять до ближайшего целого, 1.5 = 2.0';
$_['entry_okrugl_ceil'] = 'Округлять вверх до целого, 1.01 = 2.00';
$_['entry_okrugl_floor'] = 'Округлять вниз до целого, 1.9 = 1.00';
$_['entry_okrugl_10ceil'] = 'Округлять вверх до 10 руб. - 11.0 = 20.0';


$_['entry_kkt_payment_method'] = 'Способ расчета';
$_['entry_kkt_payment_method_full_prepayment'] = 'Предоплата 100% до передачи предмета рассчета';
$_['entry_kkt_payment_method_prepayment'] = 'Частичная предоплата до передачи предмета рассчета';
$_['entry_kkt_payment_method_advance'] = 'Аванс';
$_['entry_kkt_payment_method_full_payment'] = 'Полный расчёт в момент передачи предмета расчёта';
$_['entry_kkt_payment_method_partial_payment'] = 'Частичный расчёт и кредит. Частичная оплата предмета расчёта в момент его передачи с последующей оплатой в кредит';
$_['entry_kkt_payment_method_credit'] = 'Передача в кредит. Передача предмета расчёта без его оплаты в момент его передачи с последующей оплатой в кредит';
$_['entry_kkt_payment_method_credit_payment'] = 'Оплата кредита. Оплата предмета расчёта после его передачи с оплатой в кредит (оплата кредита).';
		
$_['entry_kkt_payment_object'] = 'Объект расчета';
$_['entry_kkt_payment_object_different'] = 'Для разных товаров - разное';
$_['entry_kkt_payment_object_commodity'] = 'Товар (за исключением подакцизных товаров)';
$_['entry_kkt_payment_object_excise'] = 'Подакцизный товар';
$_['entry_kkt_payment_object_job'] = 'Работа'; 
$_['entry_kkt_payment_object_service'] = 'Услуга'; 
$_['entry_kkt_payment_object_gambling_bet'] = 'Cтавка азартной игры';
$_['entry_kkt_payment_object_gambling_prize'] = 'Выигрыш азартной игры';
$_['entry_kkt_payment_object_lottery'] = 'Лотерейный билет';
$_['entry_kkt_payment_object_lottery_prize'] = 'Выигрыш лотереи';
$_['entry_kkt_payment_object_intellectual_activity'] = 'Предоставление результатов интеллектуальной деятельности';
$_['entry_kkt_payment_object_payment'] = 'Платеж (аванс, задаток, предоплата, кредит, взнос в счет оплаты, пеня, штраф, вознаграждение, бонус)';
$_['entry_kkt_payment_object_agent_commission'] = 'Агентское вознаграждение';
$_['entry_kkt_payment_object_composite'] = 'Составной предмет расчета (в объекте есть признаки разных категорий объекта)';
$_['entry_kkt_payment_object_another'] = 'Другое';
$_['entry_kkt_payment_object_property_right'] = 'Имущественное право';
$_['entry_kkt_payment_object_non_operating_gain'] = 'Внереализационный доход';
$_['entry_kkt_payment_object_insurance_premium'] = 'Страховые взносы';
$_['entry_kkt_payment_object_sales_tax'] = 'Торговый сбор';
$_['entry_kkt_payment_object_resort_fee'] = 'Курортный сбор'; 
$_['entry_kkt_payment_object_notice'] = 'Подробнее по ссылке: <a href="https://docs.robokassa.ru/#6865" target=_blank>https://docs.robokassa.ru/#6865</a>';
		
$_['entry_kkt_default_payment_object'] = 'Объект рассчета по-умолчанию, применяется если товар не подходит под критерии ниже';
$_['entry_kkt_col_object'] = 'Объект';
$_['entry_kkt_col_status'] = 'Статус / Порядок сортировки';
$_['entry_kkt_col_name'] = 'Фильтр по названию товара и модели';
$_['entry_kkt_col_model'] = 'Фильтр по модели товара';
$_['entry_kkt_col_price'] = 'Фильтр по цене товара (RUB)'; 
$_['entry_kkt_col_category'] = 'Фильтр по категории товара';
$_['entry_kkt_col_manufacturer'] = 'Фильтр по производителю';
$_['text_name'] = 'Название';
$_['text_model'] = 'Модель';
$_['text_from'] = 'От';
$_['text_to'] = 'До';
$_['text_exact'] = 'Точное совпадение';
$_['text_include'] = 'Содержит текст';
$_['button_add'] = 'Добавить';
$_['button_remove'] = 'Удалить';
 
$_['text_any_category'] = 'Любая';
$_['text_any_manufacturer'] = 'Любой';
$_['entry_kkt_payment_object_notice2'] = '<b>Как работает присвоение объекта: </b><br>
1. Присвоение объекта сработает если все заданные условия в строке будут выполнены.<br>
2. Если товар подпадает под все условия в нескольких строках - то будет примено присвоние с меньшим порядком сортировки<br>
3. Если товар НЕ подпадает под все условия НИ В ОДНОЙ строке - то будет присвоен объект по-умолчанию<br>
4. В фильтре по категориям нужно указывать конечную категорию которая присвоена товару (а не родительскую категорию для конечной).
';
		
/* end 1112 */
/* start 0106 */
$_['entry_premod_paynotify'] = 'Уведомлять администратора о новом заказе';
$_['entry_premod_paynotify_subject'] = 'Заголовок письма администратору<br><br>Тэги:<br>
{order_id} - номер заказа';
$_['entry_premod_paynotify_message'] = 'Текст письма администратору<br><br>Тэги:<br>
{order_id} - номер заказа<br>
{out_summ} - сумма<br>
{pdate} - дата оплаты<br>
{cdate} - дата добавления заказа<br>
{customer_name} - клиент<br>
{products} - товары<br>
{order_link} - страница заказа в админке<br>
{pay_link} - ссылка на оплату заказа';

$_['default_premod_paynotify_subject'] = 'Заказ #{order_id} ожидает модерации';
$_['default_premod_paynotify_message'] = 'Номер заказа: #{order_id}
Сумма: {out_summ}
Дата оплаты: {pdate}
Дата добавления заказа: {cdate}
Клиент: {customer_name}
Ссылка на оплату: {pay_link}
Товары: 
{products}
<a href="{order_link}" target=_blank>Перейти на страницу заказа</a>';



$_['entry_paynotify_subject'] = 'Заголовок письма администратору<br><br>Тэги:<br>
{order_id} - номер заказа';

$_['entry_paynotify_message'] = 'Текст письма администратору<br><br>Тэги:<br>
{order_id} - номер заказа<br>
{out_summ} - сумма<br>
{pdate} - дата оплаты<br>
{cdate} - дата добавления заказа<br>
{customer_name} - клиент<br>
{products} - товары<br>
{order_link} - страница заказа в админке';

$_['default_paynotify_subject'] = 'Заказ #{order_id} был оплачен через Робокассу';
$_['default_paynotify_message'] = 'Номер заказа: #{order_id}
Сумма: {out_summ}
Дата оплаты: {pdate}
Дата добавления заказа: {cdate}
Клиент: {customer_name}
Товары: 
{products}
<a href="{order_link}" target=_blank>Перейти на страницу заказа</a>';
/* end 0106 */

/* start metka-2710 */
$_['entry_icons_format'] = 'Как выводить иконку';
$_['entry_icons_size'] = 'Размер иконки';
$_['entry_icons_format_inname'] = '<b>В названии как html-блок</b> (работает для стандартного оформления заказа и Simple)';
$_['entry_icons_format_inimage'] = '<b>Как отдельное поле image</b> (Работает для Quickcheckout, Ajax checkout)';

$_['entry_icons_html'] = 'HTML-шаблон поля title (иконка + название):<br><i>{image_url} - адрес картинки<br>
{title} - название способа оплаты</i>';

$_['default_icons_html'] = '<table style="width: 100%;"><tr><td 
style="vertical-align: middle; text-align: left; width: 70px; padding-right: 5px;"
><img src="{image_url}"></td><td style="vertical-align: middle; text-align: left; " valign=middle
	>{title}</td></tr></table>';
/* end metka-2710 */

/* start metka-kkt */
$_['header_kkt'] = 'Настройки связанные с выполнением закона 54 ФЗ о Контрольно-кассовой технике';

$_['entry_kkt_mode'] = 'Передавать фискальные данные для формирования кассового чека на стороне Робокассы';
$_['entry_kkt_mode_notice'] = 'Актуально для тех кто зарегистрировался в Робокассе как юридическое лицо и <a href="http://fiscal.robokassa.ru/#decision_block" target=_blank>выбрал Облачное решение Робокассы</a> для выполнения закона 54 ФЗ';

$_['entry_kkt_sno'] = 'Ваша система налогообложения';
$_['entry_kkt_sno_osn'] = 'Общая';
$_['entry_kkt_sno_usn_income'] = 'Упрощенная (доходы)';
$_['entry_kkt_sno_usn_income_outcome'] = 'Упрощенная (доходы минус расходы)';
$_['entry_kkt_sno_envd'] = 'ЕНВД';
$_['entry_kkt_sno_esn'] = 'Единый Сельскохозяйственный налог';
$_['entry_kkt_sno_patent'] = 'Патент';

$_['entry_kkt_tax'] = 'Информация о налоге в ККТ';
$_['entry_kkt_tax_none'] = 'без НДС';
$_['entry_kkt_tax_vat0'] = 'НДС по ставке 0%';
$_['entry_kkt_tax_vat10'] = 'НДС чека по ставке 10%';
$_['entry_kkt_tax_vat18'] = 'НДС чека по ставке 18%';
$_['entry_kkt_tax_vat110'] = 'НДС чека по расчетной ставке 10/110';
$_['entry_kkt_tax_vat118'] = 'НДС чека по расчетной ставке 18/118';
/* end metka-kkt */
// Text 
$_['text_success']       = 'Выполнено: Вы изменили настройки модуля RoboKassa!';
$_['text_robokassa']	 = '<a onclick="window.open(\'http://robokassa.ru/\');"
><img src="view/image/payment/robokassa.png" 
alt="Робокасса 20 методов" 
title="Робокасса 20 методов" style="border: 1px solid #EEEEEE;" /></a>';

// Entry
$_['entry_geo_zone']     = 'Географическая зона:';
$_['entry_status']       = 'Статус:';
$_['entry_sort_order']   = 'Порядок сортировки:';

$_['entry_clear_order']   = 'Обнулять корзину в момент перехода пользователя на страницу оплаты из оформления заказа';
$_['entry_clear_order_notice']   = 'по-умолчанию корзина обнуляется в момент перехода пользователя на страницу где он видит текст о том что заказ был успешно размещен';
$_['entry_clear_order_yes'] = 'Да';
$_['entry_clear_order_no'] = 'Нет';
$_['entry_version'] = 'Версия модуля:';

/* kin insert metka: u1 */
$_['tab_generation']   			= 'Сгенерировать ссылку';
$_['entry_generate_order_id']   = 'Номер заказа';
$_['entry_generate_sum']   		= 'Сумма заказа';
$_['entry_generate_store']   	= 'Магазин';
$_['text_default_store']   		= 'Default';
$_['entry_generate_email']   	= 'E-mail покупателя';
$_['entry_generate_currency']   = 'Способ оплаты';
$_['entry_generate_culture']   	= 'Язык интерфейса робокассы';
$_['entry_generate_culture_ru'] = 'Русский';
$_['entry_generate_culture_en'] = 'Английский';
$_['button_generate']   		= 'Сгенерировать ссылку';


$_['error_generate_order_id']   		= 'Не указан номер заказа';
$_['error_generate_sum']   		= 'Не указана сумма';
$_['error_generate_email']   		= 'Не указан e-mail';
$_['error_order_id']   		= 'Указан номер несуществующего заказа';
/* end kin metka */
/* kin insert metka: g1 */
$_['entry_hide_noname']   		= 'Скрывать способ оплаты если нет названия';
/* end kin insert metka: g1 */

$_['entry_paynotify']   = 'Уведомлять администратора об оплате заказа:';
$_['entry_paynotify_email']   = 'E-mail для уведомления администратора:';

$_['entry_robokassa_desc'] = 'Описание заказа (отображается на сайте Робокассы 
<a href="../image/data/robokassa_desc.gif" target="_blank">Пример</a>)<br><br>{number} - номер заказа<br>
{siteurl} - адрес сайта<br>
{name} - имя покупателя';

$_['entry_robokassa_desc_default'] = 'Заказ №{number} на {siteurl}, покупатель {name}';
 
$_['entry_commission'] = 'Кто оплачивает комиссию Робокассы<br>
(опция актуальна, только если Вы зарегистрированы в Робокассе как физ.лицо)';	

$_['text_commission_j'] = 'Я зарегистрировался в Робокассе как юр.лицо';

$_['text_commission_customer'] = 'Покупатель (то есть в заказе он видит одну сумму, а на сайте Робокассы придется платить кроме этой суммы еще и комиссию)';

$_['text_commission_shop'] = 'Продавец (покупатель оплачивает ту же сумму которую видит в заказе)';

$_['entry_order_comment'] = 'Комментарий в письме отправляемом после заказа';
$_['entry_order_comment_notice']  = 'Тэги:<br>
{link} - ссылка на оплату в Робокассе.';

$_['text_login_notice']  = '<br><font color=red><b>Внимание!</b></font> 
не путайте идентификатор магазина с логином под которым Вы авторизуетесь.<br>
Смотрите на скриншоты:<br>
<a target=_blank href="http://softpodkluch.ru/img/robokassa/ident1.gif">http://softpodkluch.ru/img/robokassa/ident1.gif</a><br>
<a target=_blank href="http://softpodkluch.ru/img/robokassa/ident2.gif">http://softpodkluch.ru/img/robokassa/ident2.gif</a>
';


$_['entry_premod_success_page_type'] = 'Что отображать на странице об успешном заказе';
$_['text_premod_success_page_type_common'] = 'Стандартную страницу checkout/success';
$_['text_premod_success_page_type_custom'] = 'Свою страницу';
$_['entry_premod_success_page_header'] = 'Заголовок страницы об успешном заказе<br>
Тэги:<br>
{number} - номер заказа';
$_['entry_premod_success_page_text'] = 'Текст страницы об успешном заказе<br>
Тэги:<br>
{number} - номер заказа';
$_['entry_premod_success_page_notice'] = '<font color=red><b>Внимание!</b></font> Для того чтобы "Cвоя страница" работала 
в поле Success URL в настройках магазина должно быть указано:<br>
ВАШ_САЙТ/index.php?route=checkout/robosuccess
- <a href="http://softpodkluch.ru/faq/img/robosuccess.gif" target=_blank>смотрите скриншот</a>
';

$_['default_premod_success_page_header'] = 'Заказ был успешно оформлен';
$_['default_premod_success_page_text'] = 'В ближайшее время наш менеджер проверит наличие товара на складе и свяжется с Вами';


$_['entry_hide_order_comment'] = 'Скрытый комментарий со ссылкой добавляемый в заказ после подтверждения его пользователем. (После проверки заказа Вы будете копипистить его в сообщение о смене статуса заказа)';
$_['entry_order_comment_notice']  = 'Тэги:<br>
{link} - ссылка на оплату в Робокассе.'; 




$_['text_order_comment_default'] = 'Ссылка для оплаты в Робокассе (на случай если при оформлении заказа оплата не удалась) <a href="{link}">Перейти к оплате</a>';

$_['text_premod_hide_order_comment_default'] = 'СКРЫТЙ КОММЕНТАРИЙ: Мы проверили Ваш заказ. Для оплаты заказа перейдите по ссылке {link}';


$_['text_premod_order_comment_default'] = 'В ближайшее время наш менеджер проверит наличие товара на складе и свяжется с Вами';


$_['tab_general'] 		 = 'Настройки';
$_['tab_support'] 		 = 'Тех.поддержка';
$_['tab_instruction'] 	 = 'Инструкция по подключению Робокассы';


$_['entry_dopcost'] 		 = 'Дополнительная надбавка/скидка к заказу:
<br><span class="help">Чтобы задать скидку - поставьте минус перед суммой. <br>
Для того чтобы надбавка/скидка работала <b>необходимо</b> включить её в разделе "Дополнения" => "Учитывать в заказе" => "Робокасса 20 методов".
<br>Не забудьте там указать в поле "Порядок сортировки" число меньшее чем порядок сортировки в приложении "Итого"</span>';
$_['text_dopcost_int'] 		 = 'Фиксированная сумма';
$_['text_dopcost_percent'] 	 = 'Процент от стоимости заказа';
$_['text_dopcost_comission'] = 'Процент который берет Робокасса';

$_['text_password_notice'] = '<b><font color=red>Внимание!</font></b> Не используйте в паролях следующие символы: & > < " (двойная кавычка).';

$_['entry_dopcostname'] 	 = 'Заголовок дополнительной надбавки <br><span class="help">Будет отображаться на странице оформления заказа и в письме</span>';


$_['entry_sms_status'] 	 = 'Уведомлять по SMS об оплате';
$_['entry_sms_instruction'] = 'Для того чтобы уведомление по SMS работало - Вы должны подключить модуль 
<a href="http://opencartforum.ru/files/file/1103-sms-%D0%BE%D0%BF%D0%BE%D0%B2%D0%B5%D1%89%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BA%D0%BB%D0%B8%D0%B5%D0%BD%D1%82%D1%83-%D0%BF%D1%80%D0%B8-%D1%81%D0%BC%D0%B5%D0%BD%D0%B5-%D1%81%D1%82%D0%B0%D1%82%D1%83%D1%81%D0%B0-%D0%B8-%D0%BD%D0%BE%D0%B2%D0%BE%D0%BC-%D0%B7/" 
target=_blank>SMS оповещения клиенту при смене статуса и новом заказе</a> 
и указать настройки SMS-шлюза в "Система" => "Настройки" => Вкладка "SMS" => раздел "SMS Gateway"';
$_['entry_sms_phone'] 	 = 'Телефон для уведомления по SMS
<br><i>В международном формате, только цифры 7926xxxxxxx</i>';

$_['entry_sms_message'] 	 = 'SMS сообщение<br><br>
Можно использовать теги:<br>
{ID} - номер заказа<br>
{DATE} - дата заказа<br>
{TIME} - время заказа<br>
{SUM} - сумма заказа<br>
{FIRSTNAME} - имя клиента<br>
{LASTNAME} - фамилия клиента<br>
{PRODUCTS} - список товаров<br>
{PHONE} - телефон клиента';

$_['entry_sms_message_default'] = 'Оплачен заказ #{ID} на {SUM}. Товары: {PRODUCTS} . Клиент: {FIRSTNAME} {LASTNAME} {PHONE}';


$_['entry_interface_language'] = 'Язык интерфейса робокассы:';
$_['entry_interface_language_ru'] = 'Русский';
$_['entry_interface_language_en'] = 'Английский';
$_['entry_interface_language_detect'] = 'Определять в зависимости от языка на котором пользователь просматривал сайт.';
$_['entry_interface_language_notice'] = 'Данная настройка определяет язык страницы оплаты заказа на сайте Робокассы, куда пользователь попадает после того как оформил заказ на Вашем сайте и нажал на кнопку "Подтверждение заказа"';

$_['entry_default_language'] = 'Язык интерфейса робокассы, если на сайте был выбран не русский и не английский язык:';
$_['entry_default_language_ru'] = 'Русский';
$_['entry_default_language_en'] = 'Английский';
$_['entry_default_language_notice'] = 'Данная настройка устанавливает язык страницы Робокассы для ситуаций когда пользователь использовал какой-то другой язык кроме русского и английского.';

$_['entry_preorder_status'] = 'Статус заказа после подтверждения но до оплаты:';
$_['entry_order_status'] = 'Статус заказа после оплаты:';

$_['entry_order_status2'] = 'Статус заказа от которого покупатель отказался:';
$_['entry_shop_login']   = '* Идентификатор магазина на http://robokassa.ru';

$_['entry_test_mode'] 	 = 'Тестовый режим:';

/* start 0105 */
$_['notice'] 	 		 = 'Инструкция по интеграции модуля с Робокассой <a
 href="https://softpodkluch.ru/robokassa20#link-tab-options" 
target=_blank>по ссылке</a>';
/* end 0105 */

/* kin insert metka: a4 */
$_['entry_currency'] 	   = 'Валюта заказа робокассы:';
$_['text_currency_notice'] = 'Это валюта в которой заказ передается в Робокассу. Пользователь видит её, сразу же, после перехода из магазина в Робокассу. В большинстве случаев - это рубль. Валюта заказа может быть другой, в том случае, если Вы регистрировались в Робокассе как физ.лицо и поставили в качестве валюты вывода средств, не WMR, а WMZ или какую-то другую валюту. Сейчас робокасса отменила это и оставили только WMR, но раньше так можно было.';
/* end kin metka: a4 */

$_['text_img_notice'] 	   = 'Примечания: <i>
<div>1. Если нет иконки для метода - попробуйте найти подходящую иконку в директории image/robokassa_icons</div>
<div>2. Если иконки нет в image/robokassa_icons или они Вам не нравятся - загрузите свои.</div>
<div>3. Иконки будут отображаться без изменений размера, с тем размером который Вы загрузите.</div></i>';

/* start update: a3 */
$this->data['text_robokassa_method'] = 'Робокасса (все методы)';
/* end update: a3 */

/* start update: a1 */
$_['text_saved'] 	 = '<b><font color=green>Пароль сохранен</font></b>';
$_['entry_icons'] 	 = 'Отображение иконок';
$_['text_mode_notice'] 	 = '<b><font color=red>Внимание! если Ваш магазин уже активирован - отключите тестовый режим. А если еще не активирован - наоборот включите. Иначе способы оплаты отображаться не будут.</font></b>';
/* end update: a1 */
$_['entry_algoritm'] 	 = 'Алгоритм расчета хеша:';

$_['entry_password1'] 	 = 'Пароль #1:';
$_['entry_password2'] 	 = 'Пароль #2:';


$_['entry_log'] = 'Режим отладки <br><i>(в файл <a target=_blank href="#url#">/system/logs/robokassa_log.txt будут добавляться метки</a>)</i>:';

$_['entry_script']  = 'Сценарий работы модуля:';

$_['entry_script_before']  = '<b>Заказ появляется в системе ДО его оплаты</b><br>
В момент когда покупатель нажимает на кнопку "Подтвердить заказ" происходят события:<br>
- Заказу присваивается статус и он начинает отображаться в админке в "Продажи" => "Заказы"<br>
- Покупатель пробрасывается на сайт Робокассы для оплаты заказа<br>
- Покупателю на e-mail приходит письмо о том что заказ создан (в письме отображается ссылка в Робокассу, по которой можно оплатить заказ, на тот случай если покупатель случайно закроет окно с оплатой Робокассы, не заплатив за заказ)<br><br>

В момент когда покупатель оплачивает заказ происходят события:
- статус заказа меняется
- покупателю приходит письмо о том что статус заказа изменился'; 


$_['entry_script_after']  = '<b>Заказ появляется в системе ПОСЛЕ его оплаты</b><br>
В момент когда покупатель нажимает на кнопку "Подтвердить заказ" происходят события:<br>
- Заказу НЕ присваивается статус и он отображается в админке в "Продажи" => "Заказы" ТОЛЬКО если задать в фильтре статус "Потерянные заказы"<br>
- Покупатель пробрасывается на сайт Робокассы для оплаты заказа<br>
- Покупателю НЕ приходит e-mail о том что заказ создан<br><br>

В момент когда покупатель оплачивает заказ происходят события:
- Заказу присваивается статус и он начинает отображаться в админке в "Продажи" => "Заказы"<br>
- Покупателю на e-mail приходит письмо о том что заказ создан';

$_['entry_script_premod']  = '<b>Покупатель сможет оплатить заказ только ПОСЛЕ его проверки администратором</b><br>
В момент когда покупатель нажимает на кнопку "Подтвердить заказ" происходят события:<br>
- Заказу присваивается статус и он отображается в админке в "Продажи" => "Заказы"<br>
- Покупатель пробрасывается на страницу сайта где он видит сообщение о том что заказ создан и что менеджеры свяжутся с ним после проверки заказа.<br>
- Покупателю приходит e-mail о том что заказ создан<br>
- в истории заказа создается комментарий, который покупатель не увидит. В этом комментарии задается ссылка в Робокассу на оплату заказа<br><br>

После этого администратор проверяет заказ и принимает решение дать пользователю возможность оплатить заказ.<br>
Администратор заходит в историю заказа, и копипастит из истории, скрытое от покупателя, сообщение со ссылкой на оплату в Робокассе.<br>
И создает новый комментарий к заказу с уведомлением пользователя о нём.<br>
После этого пользователю приходит письмо о том что статус заказа изменился и со ссылкой на оплату заказа.<br><br>

В момент когда покупатель оплачивает заказ происходят события:<br>
- статус заказа меняется<br>
- покупателю приходит письмо о том что статус заказа изменился';

$_['entry_confirm_status_notice'] = 'В момент присвоения статуса, заказ появляется в админке в разделе "Продажи" -> "Заказы", а пользователю отправляется письмо о том что заказ принят.';

$_['entry_confirm_status_before'] = 'Сразу после того как пользователь оформил заказ и нажал на кнопку "Подтверждение заказа"';
$_['entry_confirm_status_after']  = 'Только после оплаты заказа пользователем';

$_['entry_confirm_notify']  = 'Отправлять покупателю письмо о смене статуса заказа, после того как пройдет оплата';
$_['entry_confirm_comment'] = 'Комментарий в письме подтверждающем оплату';
$_['text_confirm_comment_default'] = 'Заказ был успешно оплачен, в ближайшее время наш менеджер свяжется с Вами.';


$_['entry_result_url']	 = 'Result URL';
$_['entry_result_method'] = "Метод отсылки данных по Result URL:";

$_['entry_success_url'] = "Success URL:";
$_['entry_success_method'] = "Метод отсылки данных по Success URL:";

$_['entry_fail_url'] = "Fail URL:";
$_['entry_fail_method'] = "Метод отсылки данных по Fail URL:";

$_['entry_no_methods']	  = 'Методы появятся после того как Вы укажите Логин';
$_['entry_methods']	  = 'Отображаемые методы оплаты';

$_['text_frame']	  = 'Информация ниже отображается во фрэйме. Список вопросов периодически пополняется, так же здесь могут появляться объявления.';

$_['text_contact']	  = '<p>Если Вы не нашли ответов на возникшие у Вас вопросы - свяжитесь с разработчиком модуля:</p>
			<p>Скайп: kin154</p>
			<p>E-mail: internetstartru@gmail.com</p>			
			<p>Я бываю на работе как правило с 12 до 20 по мск, по будням. По выходным - иногда тоже бываю на связи.</p>
			<p>---------------<br>
			С уважением,<br>
			программист Константин Петров.</p>
			<p>Приятной работы!</p>
			-------------------------------------------------
			<p><b>ДРУГИЕ МОДУЛИ АВТОРА:</b></p>
			<p>Логинза - авторизация через соц.сети (платный модуль)<br>
<a href="http://opencartforum.ru/files/file/806-loginza-avtorizatciia-cherez-sotcseti-platnyi-mod/"
 target="_blank">http://opencartforum.ru/files/file/806-loginza-avtorizatciia-cherez-sotcseti-platnyi-mod/</a></p>


<p>Авторизация через Вконтакте, Facebook, Одноклассники, Twitter<br>
<a href="http://opencartforum.ru/files/file/741-avtorizatciia-cherez-vkontakte-facebook-odnoklassniki-twitte/"  
 target="_blank">http://opencartforum.ru/files/file/741-avtorizatciia-cherez-vkontakte-facebook-odnoklassniki-twitte/</a></p>

<p>EMS Почта России<br>
<a href="http://opencartforum.ru/files/file/306-ems-pochta-rossii/" 
target="_blank">http://opencartforum.ru/files/file/306-ems-pochta-rossii</a></p>

<p>Меню категорий разворачивающееся с эффектом скольжения<br>
<a href="http://opencartforum.ru/files/file/472-meniu-kategorii-razvorachivaiuscheesia-s-effektom-s/" 
target="_blank">http://opencartforum.ru/files/file/472-meniu-kategorii-razvorachivaiuscheesia-s-effektom-s/</a></p>';

$_['entry_no_robokass_methods']	  = '<b><font color=red>Способы оплаты недоступны, это могло произойти по одной из следующих причин:</font></b>
<div>1. Ваш аккаунт в Робокассе <b>НЕактивен</b>, при этом в настройках модуля <b>отключен</b> "Тестовый режим".</div>
<div>2. Наоборот, Ваш аккаунт в Робокассе <b>активен</b>, при этом в настройках модуля <b>включен</b> "Тестовый режим".</div>
<div>3. Указан неправильный идентификатор. Убедитесь что указан идентификатор _МАГАЗИНА_, а не логин для авторизации (правильнось паролей в данном случае неважна).</div>
<div>4. Произошел сбой при соединении с Робокассой, попробуйте перезагрузить страницу.</div>
<div>5. Для данного логина в Робокассе не доступны методы оплаты.</div>
<div>6. Неправильно работает приложение. Чтобы проверить это, <br>
для НЕ активаного аккаунта, откройте ссылку:<br>
<a href="https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin={login}&Language=ru&IsTest=1" target=_blank>https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin={login}&Language=ru&IsTest=1</a>
<br>для активного аккаунта, откройте ссылку:<br>
<a href="https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin={login}&Language=ru" target=_blank>https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin={login}&Language=ru</a>
<br>
Если открыв ссылку в браузере Вы увидите список способов оплаты в формате XML, то значит модуль "Робокасса 20 методов" работает неправильно.<br>
<div>В этом случае свяжитесь с разработчиком модуля: Skype - kin154, e-mail - internetstartru@gmail.com</div></div>';

$_['methods_col1'] = 'Отображаемый платёжный метод';
$_['methods_col2'] = 'Валюта по-умолчанию после перехода на сайт robokassa.ru<br>(покупатель будет иметь возможность сменить валюту)';
$_['methods_col4'] = 'Максимально-допустимая цена заказа (для отключения фильтра оставьте поле пустым)';
$_['methods_col3'] = 'Минимально-допустимая цена заказа (для отключения фильтра оставьте поле пустым)';
$_['methods_col5'] = 'Изображение (отображается если изображения включены)';

$_['text_payment'] = 'Модули';
$_['select_currency']	  = 'Выбрать валюту';

$_['text_image_manager']     = 'Менеджер изображений';
$_['text_browse']            = 'Обзор';
$_['text_clear']             = 'Очистить';
// Error
$_['error_robokassa_password_symbols']	  = 'Пароль может состоять только из латинских букв (больших и маленьких) и/или цифр';

$_['error_permission']   = 'У Вас нет прав для управления модулем RoboKassa!';
$_['error_robokassa_shop_login'] = 'Пожалуйста укажите Ваш логин на сайте http://robokassa.ru';
$_['error_robokassa_password1']	  = 'Не указан Пароль #1';
$_['error_robokassa_password2']	  = 'Не указан Пароль #2';

$_['error_rub']	  = 'Для работы метода необходимо добавить рубль в список валют в разделе Система=> Локализация => Валюты. Код валюты должен быть RUB или RUR';

$_['button_save_and_go']	  = 'Сохранить и выйти';
$_['button_save_and_stay']	  = 'Сохранить и остаться';

?>