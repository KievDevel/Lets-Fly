<?php

    return array(
        'stock' => array(
            'Stock' => 'Stock+',
            'Stock plugin for Monstra' => 'Small Gallery and slider plugin for Monstra',
            'Stock template' => 'Stock+ template',
            'Save' => 'Save',
            'Resize' => 'Resize',
            'Settings' => 'Settings',
            'Upload photo' => 'Upload photo',
            'Upload' => 'Upload',
            'Width thumbnails (px)' => 'Width thumbnails (px)', 
            'Height thumbnails (px)' => 'Height thumbnails (px)', 
            'Resize way' => 'Resize way',
            'Respect to the width' => 'Respect to the width',
            'Respect to the height' => 'Respect to the height',
            'Similarly, cutting unnecessary' => 'Similarly, cutting unnecessary',
            'Similarly with the expansion' => 'Similarly with the expansion',
            'Original width (px, max)' => 'Original width (px, max)',
            'Original height (px, max)' => 'Original height (px, max)',
            'sure' => 'sure',
            'Resize content' => 'To change the size of all the photos, press the button and wait ...', 
            'Resize start' => 'Resize start', 
            'Resize success!' => 'Resize success!', 
            'Add' => 'Add',
            'Edit' => 'Edit',
            'Enter name album' => 'Enter the name',
            'The default settings' => 'The default settings',
            'Add album' => 'Add album',
            'Albums' => 'Albums',
            'Album' => 'Album',
            'Delete' => 'Delete', 
            'The album title' => 'The album title',
            'No title' => 'No title', 
            'Show' => 'Show', 
            'Actions' => 'Actions', 
            'Size' => 'Size',
            'Photos' => 'Photos', 
            'sure album' => 'Sure you want to delete this album with all the pictures?',
            'Delete album' => 'Delete album',
			'Title' => 'Title and description image ',
			'Stock t-manual' => 'Stock+ description',
			'Stock t-needs' =>  'Needs and errors',
			'Stock t-lightbox' => 'Light Box 2',
			'Stock t-mslider' => 'Mobily Slider',
			'Stock t-czoom' => 'Cloud Zoom',
			'Stock t-lipag' => 'liPaginate',
			'lihp' => 'liPaginate photo count',
			
			'Stock b-manual' => '<p>Плагин автоматического ресайза и открытия изображения и группы изображений в LightBox2(всплывающее изображение). <br><br> И в виде MobilySlider (слайдшоу, слайдер). <br><br>А так же с CloudZoom эффектом  (увеличение изображения, зум эффект).<br><br>Альбомы c liPaginate, jQuery пагинация (разбивка на страницы) и "title".</p><p>
			<b>Фотосток+ плагин v1.3.2 для Monstra CMS</b>
			<ul>
			<li>Использует jQuery v1.7.2</li>
			<li>Тестировалось на Monstra CMS v2.2.0</li>
			</ul>
			<b>Базируется на исходниках:</b>
			<ul>
			<li>LightBox - jQuery виджет открытия изображений в Модальном окне</li>
			<li>MobilySlider - jQuery виджет CлайдШоу изображений</li>
			<li>CloudZoom - jQuery виджет увеличения изображений</li>
			<li>Плагин Фотосток v1.0.0 для Monstra CMS</li>
			<li>liPaginate  - jQuery виджет разбивки на страницы</li>
			</ul>
			</p>',
			
			'Stock b-needs' =>  '<p>
			<h3>Требования</h3>
			Убедитесь что в Вашем шаблоне присутствуют:
			<ul>
			<li><i>"Stylesheet::load();"</i></li>
			<li><i>"Javascript::load();"</i></li>
			<li><i>"Action::run();"</i> с параметрами <i>"theme_footer"</i> и <i>"theme_header"</i></li>
			</ul></p>
			<p><i>При смене используемой темы после установки плагина либо переустановите его (созданные пункты будут утеряны), или скопируйте стили(css папку) и скрипты(js папку) из папки плагина(stock) в соответствующую папку новой темы.</i></p>
			<p><b>Дополнительные сведения</b></p>
			<p>Плагин подключает jQuery. Возможен конфликт, если вы подключали jQuery вручную или используете другие плагины подключающие jQuery. При проблемах отключите одну из подключаемых jQuery. Если <i>Закомментировать</i> или <i>Удалить</i> строку 39 (49 для кофликтов с jQuery easing) в "plugins/stock/stock.plugin.php", jQuery подключаемое этим плагином будет отключено.</p> <p><b>!ВАЖНО</b>Плагин не работает с jQuery 1.9, но если подключена версия 1.9 и собственная версия, то конфликтов не возникает и плагин работает.</p><br><br>
			<p><b>Изображения закрытия и загрузки ЛайтБокс</b></p>
			<p>Если вы устанавливаете систему в подпапку сервера, а не в основной директории то в файле "lightbox-stock.js" в теме Вашего сайта измените значения "/plugins/stock/img/close.png" и "/plugins/stock/img/loading.gif" т.е. добавьте /название_вашей_папки перед /plugins а в точности будет выглядеть так <br><br>"/название_вашей_папки/plugins/stock/img/close.png"<br>"/название_вашей_папки/plugins/stock/img/loading.gif"</p>
			',
			
			'Stock b-lightbox' => '<p><b>Открытие в модальных окнах</b></p><ul><li><p>Вставляйте получаемы <i>shortcode</i> изображения или альбома на страницы или в блоки Вашего сайта.<br>Пример:<br><br> {stock album="3"} <br>или <br>{stock album="2" img="Ks9zGLMhxn.jpg"}<br><br>Сохранитесь. Все должно работать.</p></li></ul><p>Если плагин установлен можно установить Лайтбокс и изображениям вне Фотостока+. Добавляя атрибут rel="lightbox"  ссылке на изображение и  rel="lightbox[albumx]" каждой ссылке при создании группы изображений. Так-же при таком выводе можно добавить title="name-text" который отобразится на всплывающем изображении.</p><p><b>Описание изображения</b><br>Описания (title) выводится во всплывающем окне полного изображения, работает только с альбомами изображений. Подбирайте заполнение Тайтлов соответственно расположению уже загруженных изображений, по порядку сверху вниз.</p><p>CSS, jQuery и js скрипты плагина появляются при инсталляции, в скриптах и стилях темы Вашего сайта. </p><br><p><b>Заголовки в ЛайтБокс</b></p>
			<p>Вывод заголовков предусматривает вывод только текста, ссылки в заголовке "ломают" плагин.  Предусмотренно только до 41 заголовка для 41 изображения каждого альбома.</p>',
			
			'Stock b-mslider' => '<p><b>Вывод в виде слайдера</b>
			<ul>
			<li>Вставляйте получаемы <i>shortcode</i> <b>альбома</b> с приставкой "m" на страницы или в блоки Вашего сайта.<br>Пример:<br><br> {mstock album="7"}</li><br>Сохранитесь. Все должно работать.<br><br>
			<li>Заложен старт альбомов с id(порядковым номером) до 20, редактировать в "int-mobilyslider-stock.js", стили слайдера в "mobilyslider-stock.css"</li>
			<li>Размер слайдера подстраивается под размеры миниатюр альбома</li>
			</ul></p><p>CSS, jQuery и js скрипты плагина появляются при инсталляции, в скриптах и стилях темы Вашего сайта. </p>',
			
			'Stock b-czoom' => '<p><b>Вывод с Зум эффектом</b>
			<ul>
			<li>Вставляйте получаемы <i>shortcode</i> <b>изображений</b> с приставкой "z" на страницы или в блоки Вашего сайта.<br>Пример: <br><br>{zstock album="2" img="Ks9zGLMhxn.jpg"}</li><br>Сохранитесь. Все должно работать.<br><br>
			<li>Размеры и позиции, эффекты окна увеличения можно редактировать в "zoom-stock.js", в самом конце скрипта. Например изменить значение position на top (окно увеличения будет всплывать сверху.)</li>
			</ul></p><p>Если плагин установлен можно установить CloudZoom и изображениям вне Фотостока+. Добавляя атрибуты class="cloud-zoom"  и пустой rel="" ссылке на изображение, внутри которой находится привью изображения.</p><p>CSS, jQuery и js скрипты плагина появляются при инсталляции, в скриптах и стилях темы Вашего сайта. </p>',
			
			'Stock b-lipag' => '<p><b>Вывод с пагинацией</b></p>
			<p>Вставляйте получаемы <i>shortcode</i> <b>альбомов</b> с приставкой "p" на страницы или в блоки Вашего сайта. Пример: <br><br>{pstock album="2" img="Ks9zGLMhxn.jpg"}<br><br>Сохранитесь. Все должно работать. Но требуется настройка.<br></p>
			<br>
			<p><b>Настройка</b></p>
			<p>В файле «int-paginate-stock.js» в темах вашего сайта установите требуемое значение высоты блока с пагинацией - «pageHeight». Пример:</p><br>
			<p>pageHeight:450</p><br>
			<p>Далее рассчитайте требуемое Вам количество изображений в зависимости от высоты миниатюр в альбоме и установленной высоты  блока - «pageHeight»</p>
			<p>Например при высоте 100 и pageHeight:450, трех изображений в ряд на одной странице пагинатора будет 12 изображений. Укажите это в настройках альбома.</p> <p>!Учитывайте ширину рабочей области контента.</p><br>

			<p>! Примечание: при выводе с пагинацией первое изображение альбома не выводится.</p>

			<p>Пагинация редактируется в стилях "paginate-stock.css". CSS, jQuery и js скрипты плагина появляются при инсталляции, в скриптах и стилях темы Вашего сайта. </p>',
					)
				);