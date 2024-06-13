<?php /* robokassa metka */
// Heading
$_['heading_title']      = 'RoboKassa 20 methods';

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
$_['text_success']       = 'Success: You have modified RoboKassa account details!';
$_['text_robokassa']	 = '<a onclick="window.open(\'http://robokassa.ru/en/\');"
><img src="view/image/payment/robokassa.png" 
alt="Robokassa 20 methods" 
title="Robokassa 20 methods" style="border: 1px solid #EEEEEE;" /></a>';
      
// Entry
$_['entry_geo_zone']     = 'Geo Zone:';
$_['entry_status']       = 'Status:';
$_['entry_sort_order']   = 'Sort Order:';

$_['entry_clear_order']   = 'Обнулять корзину в момент перехода пользователя на страницу оплаты из оформления заказа';
$_['entry_clear_order_notice']   = 'по-умолчанию корзина обнуляется в момент перехода пользователя на страницу где он видит текст о том что заказ был успешно размещен';
$_['entry_clear_order_yes'] = 'Да';
$_['entry_clear_order_no'] = 'Нет';
$_['entry_algoritm'] 	 = 'Алгоритм расчета хеша:';
$_['entry_version'] = 'Module version:';
$_['tab_general'] 		 = 'General';
$_['tab_support'] 		 = 'Support';
$_['tab_instruction'] 	 = 'Instruction';
/* kin insert metka: g1 */
$_['entry_hide_noname']   		= 'Скрывать способ оплаты если нет названия';
/* end kin insert metka: g1 */

/* kin insert metka: u1 */
$_['tab_generation']   			= 'Payment link Generator';
$_['entry_generate_order_id']   = 'Order #';
$_['entry_generate_sum']   		= 'Total price';
$_['entry_generate_store']   	= 'Store';
$_['text_default_store']   		= 'Default';
$_['entry_generate_email']   	= 'Customer E-mail';
$_['entry_generate_currency']   = 'Currency';
$_['entry_generate_culture']   	= 'Language';
$_['entry_generate_culture_ru'] = 'Russian';
$_['entry_generate_culture_en'] = 'English';
$_['button_generate']   		= 'Generate Link';


$_['error_generate_order_id']   		= 'Empty Order #';
$_['error_generate_sum']   		= 'Empty Total price';
$_['error_generate_email']   		= 'Empty e-mail';
$_['error_order_id']   		= 'Error Order #';
/* end kin metka */

$_['entry_dopcost'] 		 = 'Additional Fee to order:
<br><span class="help">If you want to set Discount - enter the minus sign before number <br>
Dont forget Install and Enable Total Extension in "Extensions" => "Order totals" => "Robokassa 20 methods".</span>';
$_['text_dopcost_int'] 		 = 'Fixed cost';
$_['text_dopcost_percent'] 	 = 'Percent of the order';
$_['text_dopcost_comission'] = 'Robokassa Comission';
$_['entry_dopcostname'] 	 = 'Order Total header';

$_['text_password_notice'] = '';
$_['text_info'] = '';

$_['entry_premod_success_page_type'] = 'Success page';
$_['text_premod_success_page_type_common'] = 'Show standart page (checkout/success)';
$_['text_premod_success_page_type_custom'] = 'Show custom page';
$_['entry_premod_success_page_header'] = 'Success Page Title';
$_['entry_premod_success_page_text'] = 'Success Page Body text';

$_['default_premod_success_page_header'] = 'Order was successfully completed!';
$_['default_premod_success_page_text'] = 'Thank you for your order! Our manager will contact you soon.';
$_['entry_premod_success_page_notice'] = '';




$_['entry_paynotify']   = 'Notify admin when order was paid:';
$_['entry_paynotify_email']   = 'Admin E-mail for notification:';

$_['entry_interface_language'] = 'Robokassa page language:';
$_['entry_interface_language_ru'] = 'Russian';
$_['entry_interface_language_en'] = 'English';
$_['entry_interface_language_detect'] = 'Site language';
$_['entry_interface_language_notice'] = 'Language of the page, where the user makes a payment order';

$_['entry_sms_status'] 	 = 'SMS notification about Robokassa payment';
$_['entry_sms_instruction'] = 'SMS notification works only if installed module 
<a href="http://opencartforum.ru/files/file/1103-sms-%D0%BE%D0%BF%D0%BE%D0%B2%D0%B5%D1%89%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BA%D0%BB%D0%B8%D0%B5%D0%BD%D1%82%D1%83-%D0%BF%D1%80%D0%B8-%D1%81%D0%BC%D0%B5%D0%BD%D0%B5-%D1%81%D1%82%D0%B0%D1%82%D1%83%D1%81%D0%B0-%D0%B8-%D0%BD%D0%BE%D0%B2%D0%BE%D0%BC-%D0%B7/" 
target=_blank>SMS оповещения клиенту при смене статуса и новом заказе</a> 
and if options on "System" => "Settings" => "SMS" tab => "SMS Gateway" is entered';
$_['entry_sms_phone'] 	 = 'Phone for SMS-notification
<br><i>Format: 7926xxxxxxx</i>';
$_['text_login_notice']  = '';
$_['entry_sms_message'] 	 = 'SMS message<br><br>
Available Tags:<br>
{ID} - order ID<br>
{DATE} - order date<br>
{TIME} - order time<br>
{SUM} - order total<br>
{FIRSTNAME} - Customer firstname<br>
{LASTNAME} - Customer lastname<br>
{PRODUCTS} - order products list<br>
{PHONE} - Customer phone';

$_['entry_sms_message_default'] = 'Order #{ID} was paid - {SUM}. Products: {PRODUCTS} . Customer: {FIRSTNAME} {LASTNAME} {PHONE}';
 

/* kin insert metka: d1 */
$_['entry_robokassa_desc'] = 'Order description (will appear on robokassa.ru after checkout 
<a href="../image/data/robokassa_desc.gif" target="_blank">Example</a>)<br><br>{number} - Order ID<br>
{siteurl} - site URL<br>
{name} - Customer Name';
$_['entry_robokassa_desc_default'] = 'Order #{number} in {siteurl} from {name}';
/* end kin metka: d1 */


$_['entry_script']  = 'Script of checkout:';

$_['entry_script_before']  = '<b>Before payment</b><br>Orders appear in the "Sales" => "orders" when a customer clicks on the "Confirm" button and BEFORE payment'; 

$_['entry_script_after']  = '<b>After payment</b><br>Order will appear in "Sales" => "Orders" when customer pay his order in robokassa.ru'; 

$_['entry_script_premod'] = '<b>Pre-moderation</b><br>Orders appear in the "Sales" => "orders" when a customer clicks on the "Confirm" button, but the customer will be able to pay for the order only after the admin will check it.'; 



$_['entry_hide_order_comment'] = 'Hidden comment for order history. You can copy-paste it to customer notify message:';

$_['entry_order_comment'] = 'Order mail comment:';
$_['entry_order_comment_notice']  = 'Tags:<br>
{link} - link for robokassa payment.';
$_['text_order_comment_default'] = 'Link for robokassa payment <a href="{link}">Go to payment</a> (if you dont make payment before)';
$_['text_premod_order_comment_default'] = 'Thank you for your order! Our manager will contact you soon.';

$_['text_premod_hide_order_comment_default'] = 'HIDDEN COMMENT: We have checked your order. To pay for your order, please go to {link}';


$_['entry_commission'] = 'Who will be pay Robokassa commission? <br><i>(option is actual only if you have individual (not corporate) account in Robokassa)</i>';
$_['text_commission_shop'] = 'Seller (this mean - you)';
$_['text_commission_customer'] = 'Customer (will be paid Order price + Robokassa commission)';
$_['text_commission_j'] = 'I have Robokassa corporate account';

$_['text_frame']	  = 'Информация ниже отображается во фрэйме. Список вопросов периодически пополняется, так же здесь могут появляться объявления.';
$_['text_contact']	  = '<p>Если Вы не нашли ответов на возникшие у Вас вопросы - свяжитесь с разработчиком модуля:</p>
			<p>Скайп: kin154</p>
			<p>E-mail: internetstartru@gmail.com</p>			
			<p>Я бываю на работе как правило с 12 до 20 по мск, по будням. По выходным - иногда тоже бываю на связи.</p>
			<p>---------------<br>
			С уважением,<br>
			программист Константин Петров.</p>
			<p>Приятной работы!</p>';
$_['entry_default_language'] = 'Robokassa page language, if the language is not English and Russian (ROBOKASSA supports only these two languages​​)';
$_['entry_default_language_ru'] = 'Russian';
$_['entry_default_language_en'] = 'English';
$_['entry_default_language_notice'] = 'This option sets the language of the page Robokassa for situations where the user has used a language other than English and Russian.';

$_['entry_preorder_status'] = 'Order Status after confirmation:';
$_['entry_order_status'] = 'Order Status after payment:';

$_['entry_shop_login']   = 'Shop Login (your login in robokassa.ru):';
$_['entry_order_status2'] = 'Order status which the buyer refused to pay:';

$_['entry_test_mode'] 	 = 'Test Mode:';
$_['entry_password1'] 	 = 'Password #1:';
$_['entry_password2'] 	 = 'Password #2:';

/* kin insert metka: a4 */
$_['entry_currency'] 	 = 'Robokassa order Currency:';
$_['text_currency_notice'] 	 = '';
/* end kin metka: a4 */

$_['text_default']           = 'Default';
$_['text_image_manager']     = 'Image Manager';
$_['text_browse']            = 'Browse Files';
/* start update: a3 */
$this->data['text_robokassa_method'] = 'ROBOKASSA (all methods)';
/* end update: a3 */

/* start update: a1 */
$_['text_saved'] 	 = '<b><font color=green>Password is saved</font></b>';
$_['entry_icons'] 	 = 'Show icons';
$_['text_mode_notice'] 	 = '';
/* end update: a1 */

$_['text_img_notice'] 	   = 'Note: <i>payment icons are located in image/robokassa_icons directory</i>';
/* start 0105 */
$_['notice'] 	 		 = 'Инструкция по интеграции модуля с Робокассой <a
 href="https://softpodkluch.ru/robokassa20#link-tab-options" 
target=_blank>по ссылке</a>';
/* end 0105 */
/* start update: a2 */
$this->data['entry_other_methods_status'] = 'Show general method<br>
<i>(user will be redirected to page where he can choose one payment method from list methods)</i>';

$this->data['entry_other_methods'] = 'Name of General method';
/* end update: a2 */

$_['entry_result_url']	  = 'Result URL:';
$_['entry_result_method'] = "Result URL Method:";

$_['text_clear']             = 'Clear';
$_['entry_success_url']    = "Success URL:";
$_['entry_success_method'] = "Success URL Method:";

$_['entry_fail_url']    = "Fail URL:";
$_['entry_fail_method'] = "Fail URL Method:";

$_['select_currency']	  = 'Choose currency';
$_['entry_no_robokass_methods']	  = 'To Shop Login you chose no method of payment. Perhaps you entered an incorrect Login';

$_['methods_col1'] = 'Displayed payment method';
$_['methods_col2'] = 'Currency by default after redirect to robokassa <br>(The customer will be able to change currency)';
$_['methods_col3'] = 'Minimum allowed price';
$_['methods_col4'] = 'Maximum allowed price';
$_['methods_col5'] = 'Icon';

$_['text_payment'] = 'Modules'; 
// Error

$_['entry_log'] = 'Debug Mode';

$_['entry_confirm_status']  = 'When the order is confirmed:';
$_['entry_confirm_status_notice'] = 'At the time of confirmation, the order appears in the admin section "Sales" -> "Orders", and the buyer receives the confirm e-mail.';

$_['entry_confirm_status_before'] = 'When buyer click to button "Confirm Order" in the last page of Checkout';
$_['entry_confirm_status_after']  = 'When the buyer pays order';

$_['entry_confirm_notify']  = 'Send a notify email to the buyer when the order will be paid';
$_['entry_confirm_comment'] = 'Comment for notify email';
$_['text_confirm_comment_default'] = 'Order was successfully paid. Our manager will contact you.';

$_['error_robokassa_password_symbols'] = 'The password must consist of Latin characters or/and numbers only';


$_['error_permission']   = 'Warning: You do not have permission to modify payment RoboKassa!';
$_['error_robokassa_shop_login'] = 'Please specify Shop Login';
$_['error_robokassa_password1']	  = 'Please enter Password1';
$_['error_robokassa_password2']	  = 'Please enter Password2';
$_['error_rub']	  = 'Ruble currency must be added to the list in System => Localisation => Currencies. Currency Code must be a RUB or RUR';
$_['button_save_and_go']	  = 'Save and go';
$_['button_save_and_stay']	  = 'Save and stay';

$_['entry_no_methods']	  = 'Methods will appear after you enter Shop Login';
$_['entry_methods']	  = 'Displayed payment methods';

?>