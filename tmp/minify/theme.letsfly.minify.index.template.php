<?php
/**
* Created by: Svyatoslav Svitlychnyi <kiev.devel@gmail.com>
* Date: 14.07.14
* Time: 19:14
*/
?>
<!doctype html>
<html lang="RU-ru">
<head>
<meta charset="utf-8">
<title><?php echo Site::name() . ' - ' . Site::title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo Site::description(); ?>">
<meta name="keywords" content="<?php echo Site::keywords(); ?>">
<meta name="robots" content="<?php echo Page::robots(); ?>">
<?php Action::run('theme_meta'); ?>
<meta property="og:site_name" content="<?php echo Site::name(); ?>">
<meta property="og:url" content="<?php echo Url::current(); ?>">
<meta property="og:title" content="<?php echo Site::title(); ?> | <?php echo Site::name(); ?>">
<meta itemprop="url" content="<?php echo Url::current(); ?>">
<meta itemprop="name" content="<?php echo Site::title(); ?> | <?php echo Site::name(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" type="text/css" href="public/themes/letsfly/css/reset.css">
<link rel="stylesheet" type="text/css" href="public/themes/letsfly/css/style.css">
<link rel="stylesheet" type="text/css" href="public/themes/letsfly/css/flipclock.css">
<script type="text/javascript" src="public/themes/letsfly/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="public/themes/letsfly/js/slider.js"></script>
<script type="text/javascript" src="public/themes/letsfly/js/flipclock.min.js"></script>
<script type="text/javascript" src="public/themes/letsfly/js/angular.min.js"></script>
<script type="text/javascript" src="public/themes/letsfly/js/main.js"></script>
<!--[if lt IE 9]>
<script src="public/themes/letsfly/js/html5shiv.min.js"></script>
<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
.gradient {
filter: none;
}
</style>
<![endif]-->
</head>
<body ng-app="plane">
<div id="date"><?php echo Block::get("timer-date"); ?></div>
<div id="popup" class="popup">
<div class="popupForm" ng-controller="formController">
<img src="public/themes/letsfly/img/logo.png">
<form name="popupForm" action="public/themes/letsfly/mail.php" method="post" ng-submit='popupForm.$valid && !isPhoneInvalid() && you()' novalidate>
<input type="text" name='name' ng-model="user.name" placeholder="Ваше имя">
<input type="number" minlength="5" maxlength="11" name='phone' ng-class="isPhoneInvalid() && invalidNumber" ng-model="user.phone" placeholder="Ваш телефон" required>
<input type="text" name='time' ng-model="user.time" placeholder="Время звонка">
<div class="button-wrapper">
<button  id="popupButton" class="button gradient green">Заказать звонок</button>
</div>
</form>
</div>
</div>
<header>
<div class="section-inner">
<a href="#"><img class="logo" src="public/themes/letsfly/img/logo.png"></a>
<div class="callback">
<span class="number"><?php echo Block::get("pnone-number"); ?></span>
<a class="gradient button green" href="javascript:showPopup(false);">Закажи звонок</a>
</div>
</div>
</header>
<section class="gray first">
<div class="section-inner">
<h1 class="blue">Подари себе небо</h1>
<h4><?php echo Block::get("message"); ?></h4>
<div class="video"><?php echo Block::get("video"); ?></div>
<aside class="form-wrapper">
<div class="form" ng-controller="formController">
<h5 class="blue"><?php echo Block::get("form-message"); ?></h5>
<h5>До конца акции осталось:</h5>
<div class="timer"></div>
<form name="order" action="public/themes/letsfly/mail.php" method="post" ng-submit='order.$valid && !isPhoneInvalid() && you()' novalidate>
<input type="text" name='name' ng-model="user.name" placeholder="Ваше имя">
<input type="number" minlength="5" maxlength="11" name='phone' ng-class="isPhoneInvalid() && invalidNumber" ng-model="user.phone" placeholder="Ваш телефон" required>
<div class="button-wrapper">
<button class="gradient button purple" ng-click="isPhoneInvalid()" type="submit">Получить бесплатный трансфер</button>
</div>
</form>
</div>
</aside>
</div>
</section>
<section class="white">
<div class="section-inner">
<h2 class="blue plane">Наши услуги</h2>
<h4><?php echo Block::get("service-message"); ?></h4>
<div class="clocks clearfix">
<div class="clock" id="clock10"></div>
<div class="clock" id="clock20"></div>
<div class="clock" id="clock30"></div>
</div>
<?php echo Block::get("service-list"); ?>
</div>
</section>
<section class="gray">
<div class="section-inner">
<h2 class="blue">Пакеты услуг</h2>
<div class="packages">
<div class="package" id="base">Базовый</div>
<div class="package" id='standart'>Стандарт</div>
<div class="package" id='cool'>Полный улет!</div>
</div>
<div class="button-wrapper">
<button  onclick='showPopup(true)' class="gradient purple button" type="submit">Полетели!</button>
</div>
</div>
</section>
<section class="white">
<div class="section-inner">
<div class="slider-wrapper">
<div id="slider-group1341994720" class="slider slider slider_count_5">
<input name="imagetape" id="imagetape1" class="slider__radio" type="radio">
<input name="imagetape" id="imagetape2" class="slider__radio" type="radio">
<input name="imagetape" id="imagetape3" class="slider__radio" type="radio">
<input name="imagetape" id="imagetape4" class="slider__radio" type="radio">
<input name="imagetape" id="imagetape5" class="slider__radio" type="radio">
<div class="slider__item">
<h3>Теперь дорога - наша забота</h3>
<img src="public/uploads/slider-image-1.png" alt="road" class="slider__img">
</div>
<div class="slider__item">
<h3>Надежная сисема безопасности</h3>
<img src="public/uploads/slider-image-2.png" alt="security system" class="slider__img">
</div>
<div class="slider__item">
<h3>С нами работают только опытные пилоты</h3>
<img src="public/uploads/slider-image-3.png" alt="pilots" class="slider__img">
</div>
<div class="slider__item">
<h3>Все полеты только при оптимальных погодных условиях</h3>
<img src="public/uploads/slider-image-4.png" alt="weather" class="slider__img">
</div>
<div class="slider__item">
<h3>Работаем круглый год!</h3>
<img src="public/uploads/slider-image-5.png" alt="full year" class="slider__img">
</div>
<div class="slider__number-list">
<label onclick="javascript:ami_gadget_image_tape_setSlideInIE(this);" data-ami-number="1" class="slider__number" for="imagetape1">
<p class="slider__number-after"></p>
</label>
<label onclick="javascript:ami_gadget_image_tape_setSlideInIE(this);" data-ami-number="2" class="slider__number" for="imagetape2">
<p class="slider__number-after"></p>
</label>
<label onclick="javascript:ami_gadget_image_tape_setSlideInIE(this);" data-ami-number="3" class="slider__number" for="imagetape3">
<p class="slider__number-after"></p>
</label>
<label onclick="javascript:ami_gadget_image_tape_setSlideInIE(this);" data-ami-number="4" class="slider__number" for="imagetape4">
<p class="slider__number-after"></p>
</label>
<label onclick="javascript:ami_gadget_image_tape_setSlideInIE(this);" data-ami-number="5" class="slider__number" for="imagetape5">
<p class="slider__number-after"></p>
</label>
</div>
</div>
</div>
</div>
</section>
<section class="gray">
<div class="section-inner">
<h2 class="blue upper plane">Отзывы наших клиентов</h2>
<div class="feedbacks">
<div class="feedback" id="feedback-1">
<div class="circle"><img alt="photo" src="public/themes/letsfly/img/poc-1.png"></div>
<h6 class="name upper">Андрей Гаврилов</h6>
<p class="upper"><?php echo Block::get("feedback1"); ?>
</p>
</div>
<div class="feedback" id="feedback-2">
<div class="circle"><img alt="photo" src="public/themes/letsfly/img/poc-2.png"></div>
<h6 class="name upper">Леонид Ашанин</h6>
<p class="upper"><?php echo Block::get("feedback2"); ?>
</p>
</div>
<div class="feedback" id="feedback-3">
<div class="circle"><img alt="photo" src="public/themes/letsfly/img/baba.png"></div>
<h6 class="name upper">Евгения Ежова</h6>
<p class="upper"><?php echo Block::get("feedback3"); ?>
</p>
</div>
<div class="clearfix"></div>
</div>
</div>
</section>
<section class="last">
<aside class="form-wrapper">
<div class="form" ng-controller="formController">
<h5 class="blue"><?php echo Block::get("form-message"); ?></h5>
<h5>До конца акции осталось:</h5>
<div class="timer"></div>
<form id="botForm" name="order" method="post" action="public/themes/letsfly/mail.php" ng-submit='order.$valid && !isPhoneInvalid() && you()' novalidate >
<input type="text" name='name' ng-model="user.name" placeholder="Ваше имя" required>
<input type="number" minlength="5" maxlength="11" name='phone' ng-class="isPhoneInvalid() && invalidNumber" ng-model="user.phone" placeholder="Ваш телефон" required>
<div class="button-wrapper">
<button  class="gradient purple button" type="submit">Получить бесплатный трансфер</button>
</div>
</form>
</div>
</aside>
</section>
<a href="https://metrika.yandex.ru/stat/?id=25572332&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/25572332/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:25572332,lang:'ru'});return false}catch(e){}"/></a>
<script type="text/javascript">
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter25572332 = new Ya.Metrika({id:25572332,
webvisor:true,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true});
} catch(e) { }
});
var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25572332" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-52840606-1', 'auto');
ga('send', 'pageview');
</script>
</body>
</html>