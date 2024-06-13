<?php
// Heading
$_['heading_title']       = 'Авторизация через соц.сети (ВКонтакте, Одноклассники, Facebook, Twitter) - версия 2.0 ';
/* start 0207 */
$_['text_hideifhas'] = 'Отключить при повторном доборе и повторной регистрации на тот же e-mail';

/* start 2507 */
$_['entry_confirm_newsletter'] = 'Подписка на рассылку';
$_['entry_default_country'] = 'Страна по-умолчанию';
$_['entry_default_country_notice'] = 'присваивается при регистрации пользователя если не удалось получить страну из данных соц.сети';
$_['text_no_country'] = '--- Нет ---';
/* end 2507 */

$_['col_domain'] = 'Домен';
$_['text_default_domain'] = 'Все домены (кроме указанных в строках ниже)';
$_['button_add'] = 'Добавить';

$_['tab_instagram'] = 'Instagram';
$_['entry_instagram_status'] = 'Авторизация через Instagram:';
$_['entry_instagram_agent'] =  'Авторизация проходит через:'; 
$_['entry_instagram_agent_loginza'] = 'сайт loginza.ru';
$_['entry_instagram_agent_notice'] = '';
$_['entry_instagram_customer_group_id']		= 'Группа в которую будет добавлен созданный пользователь';
$_['entry_instagram_client_id'] = 'Client ID';
$_['entry_instagram_client_secret'] = 'Client Secret';

$_['entry_instagram_agent_extension'] = 'приложение Instagram напрямую';
 
/* end 1505 */
/* start 1505 */

$_['entry_design_notice'] = 'СПРАВКА:';
$_['entry_design_notice_text'] = 'Иконки должны появиться на страницах авторизации, регистрации и оформления заказа - при выполнении трех условий:<br>
- в Дополнения->Модификаторы установлен OCMOD-файл <br>
- модуль включен во вкладке Общие <br>
- подключена хотя бы одна соц.сеть. <br> <br>

Если иконки не появились - обратитесь к разработчику модуля или разработчику поддерживающему Ваш сайт';


$_['tab_design_popup'] 	 = 'PopUp';
$_['tab_design_widget'] 	 = 'Виджет авторизации';
$_['tab_design_general'] = 'Общее';
$_['tab_design_icons'] = 'Тэг {icons}';
$_['tab_design_account'] = 'Страница авторизации';
$_['tab_design_checkout'] = 'Оформление заказа';
$_['tab_design_reg'] = 'Страница регистрации';
$_['entry_design_html'] = 'Итоговый шаблон';
$_['text_recomendation_code'] = 'Рекомендуемый шаблон';

$_['entry_design_widget_header'] = 'Текст рядом с иконками:';
$_['entry_design_widget_name'] = 'Заголовок виджета:';
$_['entry_widget_notice'] = 'СПРАВКА:';
$_['entry_design_widget_format'] = 'Формат расположения иконок';
$_['entry_widget_notice_text'] = 'Виджет авторизации будет отображаться если включить его в Дизайн-> Макеты -> нужный макет<br>
Предполагается что он будет встроен в правую или левую колонку.<br><br>Шаблон виджета лежит в файле:<br>
<b>catalog\view\theme\default\template\module\socnetauth2.tpl</b><br>
<br>Языковые файлы:<br>
<b>catalog\language\ЯЗЫК\module\socnetauth2.php</b>';
$_['entry_design_widget_css'] = 'CSS-код виджета:';

$_['entry_design_widget_header'] = 'Текст рядом с иконками:';
$_['entry_popup_notice'] = 'СПРАВКА:';
$_['entry_popup_notice_text'] = 'Модальное окно (PopUp) с иконками авторизации будет 
отображаться если выполнены следующие условия: 
<br>- установлен и включен модуль "Авторизация через соц.сети (ВКонтакте, Одноклассники, Facebook, Twitter) 2.0 <b>- всплывающее окно</b>"<br>
- модуль добавлен в Дизайн-> Макеты -> нужный макет<br>
<br>Шаблон виджета лежит в файле:<br>
<b>catalog\view\theme\default\template\module\socnetauth2_popup.tpl</b><br>
<br>Языковые файлы:<br>
<b>catalog\language\ЯЗЫК\module\socnetauth2.php</b>';

$_['entry_mobile_control'] = 'Не отображать PopUp для мобильных устройств:';

$_['entry_widget_notice'] = 'СПРАВКА:';

$_['entry_design_css'] = 'CSS-код (тэг {style})';
$_['entry_design_header'] = 'Текст рядом с иконками (тэг {header})';
$_['entry_design_format'] = 'Схема расположения иконок (тэг {icons})';
$_['entry_design_html_tags'] = 'Тэги: <br>
{style} - CSS-код <br>
{header} - текст <br>
{icons} - блок с иконками';
$_['default_header_name'] = 'Авторизация через соц.сети:';

$_['entry_design_general_css'] = 'Общий для всех страниц CSS: (добавляется в тэг {style})';
$_['text_count_icons_notice'] = 'Тэг {icons} заменяется на один из следующих шаблонов, 
в зависимости от кол-ва подключенных соц.сетей (<b>переключатель выше</b>) и от схемы (	"Квадрат с крупными значаками" или "Линия с крупными значками" или "Линия с маленькими значками")';

$_['text_current_count_icons'] = ' иконок. <br>В данный момент подключено соц.сетей: ';


$_['text_count_icons'] = 'Отобразить шаблоны для:';
$_['entry_lline_html'] = 'Линия с маленькими иконками <br>(кол-во иконок: {count})';
$_['entry_bline_html'] = 'Линия с крупными иконками <br>(кол-во иконок: {count})';
$_['entry_kvadrat_html'] = 'Квадрат с крупными иконками <br>(кол-во иконок: {count})';
/* end 1505 */

/* start 1404 */
$_['entry_vkontakte_agent'] = 'Авторизация проходит через:';
$_['entry_vkontakte_agent_extension'] = 'приложение ВК напрямую';
$_['entry_vkontakte_agent_loginza'] = 'сайт loginza.ru';
$_['entry_vkontakte_agent_notice'] = '';

$_['entry_facebook_agent'] = 'Авторизация проходит через:';
$_['entry_facebook_agent_extension'] = 'приложение Facebook напрямую';
$_['entry_facebook_agent_loginza'] = 'сайт loginza.ru';
$_['entry_facebook_agent_notice'] = 'Внимание! Для авторизации через приложение Facebook - сайт должен быть под SSL-сертификатом (адрес должен начинаться с https://)';

$_['entry_twitter_agent'] = 'Авторизация проходит через:';
$_['entry_twitter_agent_extension'] = 'приложение twitter напрямую';
$_['entry_twitter_agent_loginza'] = 'сайт loginza.ru';
$_['entry_twitter_agent_notice'] = 'Внимание! авторизация через Twitter не работает для кирилических доменов';

$_['entry_odnoklassniki_agent'] = 'Авторизация проходит через:';
$_['entry_odnoklassniki_agent_extension'] = 'приложение Одноклассники напрямую';
$_['entry_odnoklassniki_agent_loginza'] = 'сайт loginza.ru';
$_['entry_odnoklassniki_agent_notice'] = 'Внимание! Для авторизации через приложение Одноклассники - сайт должен быть под SSL-сертификатом (адрес должен начинаться с https://)';

$_['entry_gmail_agent'] = 'Авторизация проходит через:';
$_['entry_gmail_agent_extension'] = 'приложение Google напрямую';
$_['entry_gmail_agent_loginza'] = 'сайт loginza.ru';
$_['entry_gmail_agent_notice'] = '';

$_['entry_mailru_agent'] = 'Авторизация проходит через:';
$_['entry_mailru_agent_extension'] = 'приложение Mail.ru напрямую';
$_['entry_mailru_agent_loginza'] = 'сайт loginza.ru';
$_['entry_mailru_agent_notice'] = '';

$_['entry_yandex_agent'] = 'Авторизация проходит через:';
$_['entry_yandex_agent_extension'] = 'приложение Яндекса напрямую';
$_['entry_yandex_agent_loginza'] = 'сайт loginza.ru';
$_['entry_yandex_agent_notice'] = '';

$_['entry_steam_agent'] = 'Авторизация проходит через:';
$_['entry_steam_agent_extension'] = 'приложение Steam напрямую';
$_['entry_steam_agent_loginza'] = 'сайт loginza.ru';
$_['entry_steam_agent_notice'] = '';

/* end 1404 */


/* start 1303 */
$_['entry_agree'] = 'Соглашение о регистрации';
$_['entry_agree_no'] = '-- Нет --';
/* end 1303 */

/* start 0902 */
$_['entry_addpass'] = 'Генерировать пароль в момент регистрации пользователя и отправлять email/пароль в письме об успешной регистрации';

$_['entry_addpass_notice'] = '';
/* end 0902 */

/* start 0102 */
$_['entry_confirm_group']			= 'Добор поля "Группа клиентов"';
/* end 0102 */

/* start 1811 */

$_['tab_yandex']			= 'Яндекс';
$_['entry_yandex_status']	= 'Авторизация через Яндекс:';
$_['entry_yandex']			= 'Яндекс';
$_['entry_yandex_client_id']		= 'ID (приложения):';
$_['entry_yandex_client_secret']		= 'Пароль (приложения):';
$_['entry_yandex_customer_group_id']		= 'Группа в которую будет добавлен созданный пользователь';

$_['entry_yandex_rights']	= 'Права приложения:';
$_['entry_yandex_rights_email']	= 'Доступ к адресу электронной почты';
$_['entry_yandex_rights_info']	= 'Доступ к логину, имени и фамилии, полу';

$_['tab_steam']			= 'Steam';
$_['entry_steam_status']	= 'Авторизация через Steam:';
$_['entry_steam']			= 'Steam';
$_['entry_steam_api_key']		= 'API KEY:';
$_['entry_steam_link']		= 'Ссылка:';
$_['entry_steam_customer_group_id']		= 'Группа в которую будет добавлен созданный пользователь';

/* end 1811 */
/* start 1409 */
$_['entry_is_close_disabled'] = 'Отображать крестик для закрытия окна добора ТОЛЬКО когда пользователь завершит регистрацию';
$_['entry_telephone_mask'] = 'Маска поля Телефон';
$_['entry_telephone_mask_notice'] = 'Для России: +7 (999) 999-99-99<br>
Для Украины: +380 (99) 99-99-99<br>
Для Беларуси: +375 (99) 99-99-99<br>
Для Казахстана: +996 (99) 99-99-99<br>
Для Армении: +374 (99) 99-99-99<br>
(чтобы отключить маску - оставьте поле пустым)';


/* start 1212 */
$_['text_debug_notice']         = '<b><font color=red>Внимание!</font></b> Если режим отладки включен - авторизация не работает. Вместо авторизации пользватель видит отладочные сообщения';
/* end 1212 */

/* end 1409 */
/* start metka-606 */
$_['entry_protokol']         = 'Протокол используемый на сайте (http или https)';

$_['entry_protokol_detect']         = 'Во фронте несколько сайтов, у разных сайтов - по-разному';

/* end metka-606 */
/* kin insert metka: r2 */
$_['entry_debug'] = 'Режим отладки';
/* end insert metka: r2 */
// Text
$_['text_module']         = 'Модули';
$_['text_success']        = 'Настройки модуля обновлены!';
$_['text_content_top']    = 'Содержание шапки';
$_['text_content_bottom'] = 'Содержание подвала';
$_['text_column_left']    = 'Левая колонка';
$_['text_column_right']   = 'Правая колонка';

$_['text_showtype_notice']	= 'Модальное окно не открывается на странице /index.php?route=checkout/checkout';

$_['entry_save_to_addr']	= 'Сохранять данные соц.сетей';
$_['text_customer_addr']	= 'В данные пользователя и в адрес пользователя';
$_['text_customer_only']	= 'Только в данные пользователя';

$_['entry_shop_folder']		= 'Директория магазина из домена:<br><span class="help">
Если в домене Вашего магазина есть директория, например: http://site.ru/shop/ то укажите название директории ( "shop" ) в этом поле.
Впишите значение без знаков слэш ("/"). Если же в домене вашего магазина нет директории, например htttp://site.ru - то оставьте это поле пустым.
</span>';


$_['entry_version'] = 'Версия модуля:';

/* start update: n1 */
$_['entry_vkontakte_customer_group_id']	= 'Группа в которую будет добавлен созданный пользователь';
$_['entry_facebook_customer_group_id']	= 'Группа в которую будет добавлен созданный пользователь';
$_['entry_odnoklassniki_customer_group_id']	= 'Группа в которую будет добавлен созданный пользователь';

$_['entry_gmail_customer_group_id']	= 'Группа в которую будет добавлен созданный пользователь';
$_['entry_mailru_customer_group_id']	= 'Группа в которую будет добавлен созданный пользователь';
$_['entry_twitter_customer_group_id']	= 'Группа в которую будет добавлен созданный пользователь';
/* end update: n1 */


/* kin insert metka: f1 */
$_['entry_mobile_control'] = 'Не отображать окно для мобильных устройств ширина экрана которых меньше 520px';
/* end kin metka: f1 */

/* kin insert metka: r1 */
$_['text_download_link'] = 'Скачать';
$_['entry_vkontakte_retargeting'] = 'Список ретаргетинга ВКонтакте';
$_['entry_facebook_retargeting'] = 'Список ретаргетинга FaceBook';

/* end kin metka: r1 */

/* start metka: a1 */
$_['tab_gmail'] = 'Gmail.com';
$_['entry_gmail_status'] = 'Авторизация через Gmail.com:';
$_['entry_gmail_client_id'] = 'Client ID';
$_['entry_gmail_client_secret'] = 'Client secret';

$_['tab_mailru'] = 'Mail.ru';
$_['entry_mailru_status'] = 'Авторизация через Mail.ru:';
$_['entry_mailru_id'] = 'ID';
$_['entry_mailru_private'] = 'Приватный ключ:';
$_['entry_mailru_secret'] = 'Секретный ключ:';
$_['entry_email_auth'] = 'Что делать если через соц.сеть авторизовался пользователь 
						  и в доборе данных указал e-mail уже существующего аккаунта:';
$_['entry_email_auth_none'] = 'Регистрировать нового пользователя';
$_['entry_email_auth_confirm'] = 'Отправлять на почту e-mail с кодом, который нужно будет ввести в форму чтобы подтверждать принадлежность e-mail пользователю, а затем привязывать аккаунт к существующему пользователю';
$_['entry_email_auth_noconfirm'] = 'Привязывать аккаунт к существующему пользователю без подтверждения по e-mail (Внимание! в этом случае мошенник может получить доступ к чужому аккаунту)';
/* end metka: a1 */


$_['text_format_account_page']	= 'Страница авторизации в аккаунте';
$_['text_format_checkout_page']	= 'Стандартая страница оформления заказа';
$_['text_format_simple_page']	= 'Страница оформления заказа Simple';
$_['text_format_simplereg_page']	= 'Страница региистрации Simple';
$_['text_format_reg_page'] = 'Стандартная страница регистрации';
		

$_['entry_dobortype']	= 'Когда делать добор данных';
$_['entry_dobortype_one']	= 'Только при первой авторизации';
$_['entry_dobortype_every']	= 'При каждой авторизации';


$_['entry_popup_name'] = 'Заголовок всплывающиго окна';
$_['text_popup_notice'] = 'Окно всплывает поверх страницы. Если пользователь закрывает Окно, 
то оно больше не появляется';
$_['tab_popup']	     = 'Окно';
$_['socnetauth2_popup_name_default'] = 'Авторизация через соц.сети';
		
		
		

/* start update: a1 */ 
$_['entry_confirm_data']	     = 'Добор данных после авторизации';
$_['entry_confirm_data_notice']	 = 'После авторизации пользователь увидит модальное окно с 
формой где он должен будет ввести данные. Если добор для всех полей отключен, то модальное окно не появится и пользователь будет авторизован сразу.';
$_['entry_confirm_firstname'] 	 = 'Добор поля "Имя":';
$_['entry_confirm_lastname'] 	 = 'Добор поля "Фамилия":';
$_['entry_confirm_email'] 		 = 'Добор поля "E-mail":';
$_['entry_confirm_phone'] 		 = 'Добор поля "Телефон":';
$_['text_confirm_disable'] 		 = 'Отключить добор';
$_['text_confirm_none'] 		 = 'Включить добор если данные не получены';
$_['text_confirm_allways'] 		 = 'Включить добор даже если данные получены (полученные данные будут введены в поле по умолчанию)';
/* end update: a1 */ 

$_['entry_widget_after']     = 'После авторизации:';
$_['text_widget_after_show'] = 'Отображать ссылки аккаунта';
$_['text_widget_after_hide'] = 'Скрывать виджет';

/* start update: c1 */ 

$_['socnetauth2_widget_name_default'] = 'Авторизация через соц.сети';

$_['entry_widget_name']	  = 'Заголовок виджета';
$_['entry_confirm_company'] 	 = 'Добор поля "Компания":';
$_['entry_confirm_address_1'] 	 = 'Добор поля "Адрес":';
$_['entry_confirm_postcode'] 	 = 'Добор поля "Почтовый индекс":';
$_['entry_confirm_city'] 	 	 = 'Добор поля "Город":';
$_['entry_confirm_zone'] 		 = 'Добор поля "Регион":';
$_['entry_confirm_country'] 	 = 'Добор поля "Страна":';
$_['text_required'] 	 		 = 'Обязательное поле';

$_['entry_showtype']      = 'После нажатия на иконку:';
$_['entry_widget_showtype']    = 'После нажатия на иконку:';
$_['text_showtype_window'] = 'Открывать модальное окно';
$_['text_showtype_redirect'] = 'Перенаправлять на сайт логинзы';

/* end update: c1 */

// Entry
$_['entry_admin']         = 'Только администраторы:';
$_['entry_layout']        = 'Схема:';
$_['entry_position']      = 'Расположение:';
$_['entry_status']        = 'Статус:';
$_['entry_sort_order']    = 'Порядок сортировки:';


$_['entry_format']		  = 'Отображать значки соц.сетей в формате:';
$_['text_format_kvadrat'] = 'Квадрат с крупными значаками';
$_['text_format_bline']  = 'Линия с крупными значками';
$_['text_format_lline']   = 'Линия с маленькими значками';

$_['entry_label']	      = 'Заголовок перед иконками';

$_['entry_show_standart_auth'] = 'Отображать в виджете стандартную авторизацию';
$_['entry_widget_format'] = 'Отображать значки в формате:';


$_['button_save_and_go']  = 'Сохранить и выйти';
$_['button_save_and_stay']  = 'Сохранить и остаться';




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
			<p>Робокасса 20 методов<br>
<a href="http://opencartforum.ru/files/file/305-robokassa-20-sposobov-oplaty/" target="blank">http://opencartforum.ru/files/file/305-robokassa-20-sposobov-oplaty/</a></p>


<p>EMS Почта России<br>
<a href="http://opencartforum.ru/files/file/306-ems-pochta-rossii/" target="blank">http://opencartforum.ru/files/file/306-ems-pochta-rossii/" target="blank</a></p>

<p>Меню категорий разворачивающееся с эффектом скольжения<br>
<a href="http://opencartforum.ru/files/file/472-meniu-kategorii-razvorachivaiuscheesia-s-effektom-s/" target="blank">http://opencartforum.ru/files/file/472-meniu-kategorii-razvorachivaiuscheesia-s-effektom-s/</a></p>
			';

$_['text_country'] 		 = 'Страна';
$_['text_regions'] 		 = 'Регионы РФ';

$_['entry_widget_layout']        = 'Страница:';
$_['entry_widget_position']      = 'Расположение:';
$_['entry_widget_status']        = 'Статус:';
$_['entry_widget_sort_order']    = 'Порядок сортировки:';

$_['tab_general'] 	 = 'Общие';
$_['tab_dobor'] 	 = 'Добор данных';
$_['tab_socseti'] 	 = 'Провайдеры авторизации';
$_['tab_widget'] 	 = 'Виджеты';
$_['tab_design']     = 'Дизайн';

$_['tab_support'] 	 = 'Тех.поддержка';


$_['entry_vkontakte_status']	= 'Авторизация через ВКонтакте:';
$_['entry_vkontakte']			= 'ВКонтакте';
$_['entry_vkontakte_appid']		= 'ID приложения:';
$_['entry_vkontakte_appsecret']	= 'Защищенный ключ:';

$_['entry_twitter_status']		= 'Авторизация через Twitter:';
$_['entry_twitter']				= 'Twitter';
$_['entry_twitter_consumer_key']= 'Consumer key:';
$_['entry_twitter_consumer_secret']	= 'Consumer secret:';
$_['entry_twitter_callback']	= 'Callback URL:';
$_['entry_twitter_website']		= 'Website:';

$_['entry_facebook_status']		= 'Авторизация через FaceBook:';
$_['entry_facebook']			= 'FaceBook';
$_['entry_facebook_appid']		= 'App ID/API Key:';
$_['entry_facebook_appsecret']	= 'App Secret:';
$_['entry_facebook_link']		= 'Ссылка:';

$_['entry_odnoklassniki_status']	= 'Авторизация через Одноклассники:';
$_['entry_odnoklassniki']			= 'Одноклассники';
$_['entry_odnoklassniki_application_id'] = 'Application ID:';
$_['entry_odnoklassniki_public_key']	= 'Публичный ключ приложения:';
$_['entry_odnoklassniki_secret_key']	= 'Секретный ключ приложения:';








$_['entry_admin_header'] 	 = 'Отображать информацию о способе авторизации в АДМИНКЕ';
$_['entry_admin_customer']	 = 'В карточке покупателя';
$_['entry_admin_customer_list']	 = 'В списке покупателей (колонка "Провайдер")';
$_['entry_admin_order']	 	 = 'В карточке заказа';
$_['entry_admin_order_list'] = 'В списке заказов (колонка Провайдер)';


$_['tab_vkontakte'] 	 = 'ВКонтакте';
$_['tab_facebook'] 	 = 'Facebook';
$_['tab_twitter'] 	 = 'Twitter';
$_['tab_odnoklassniki'] 	 = 'Одноклассники';

$_['text_design_notice2'] = 'Далее перечислены файлы в которых лежит дизайн разных элементов модуля';

	  $_['text_design_col_element'] = "Элемент дизайна";
	  $_['text_design_col_file'] = "Адрес файла";
	  $_['text_design_col_comment'] = "Комментарий";
	  $_['text_design_row_socnetauth2_account'] = "Виджет соц.сетей на странице авторизации";
	  $_['text_design_notice'] = "<b><font color=red>Внимание!</font></b> после изменения данного файла нажмите &quot;Сохранить&quot; в настройках модуля. В этот момент данные файла сохраняются в базу и при отображении пользователю - берутся уже из базы, а не из файла.";
	  $_['text_design_row_socnetauth2_checkout'] = "Виджет соц.сетей на странице стандартного оформления заказа";
	  $_['text_design_row_socnetauth2_simple'] = "Виджет соц.сетей на странице оформления заказа через модуль Simple";
	  $_['text_design_row_socnetauth2_simplereg'] = "Виджет соц.сетей на странице регистрации через модуль Simple";
	  $_['text_design_row_socnetauth2_simplereg'] = "Виджет соц.сетей на странице стандартной регистрации";
	  $_['text_design_row_socnetauth2_popup'] = "Всплывающее окно авторизации (настраивается из вкладки &quot;Всплывающее окно&quot;)";
	  $_['text_design_row_socnetauth2_confirm'] = "Всплывающее окно добора данных (внешняя часть)";
	  $_['text_design_row_socnetauth2_frame'] = "Форма отображаемая в окне добора ";
	  $_['text_design_row_socnetauth2_frame_success'] = "Страница с сообщением об успешной регистрации в окне добора";
	  $_['text_design_row_module_socnetauth2'] = "Виджет авторизации через соц.сети (настраивается из вкладки &quot;Виджеты&quot;)";
	  
// Error
$_['error_permission']    = 'У Вас нет прав для управления этим модулем!';
?>