<?php
/**
* Study Of Religion - Религиоведение: лекции по религиоведению
*
* The MIT License (MIT)
* Copyright (c) 2017 Dmitry Fomin
*
* @package StudyOfReligion
* @author Dmitry Fomin
* @license The MIT License (MIT)
* @link https://studyofreligion.ru/ 
*/

/**
* class Head
* @author Dmitry Fomin
*/
class Head
{

  /**
   * static string get_head(string $content)
   * Функция вывода заголовка и мета-тэгов страницы
   * @global string $pagename
   * @global string $desc
   * @global string $keywords
   * @param string $content
   * @return string
   */
  public static function get_head($content)
  {
      global $pagename, $desc, $keywords;
      $cont = str_replace(array('%PAGE%', '%DESC%', '%KEYW%'), array($pagename, $desc, $keywords), $content);
      return $content;
  }

  /**
   * string set_description(string $mydesc)
   * Функция установки содержимого meta-атрибута description
   * @global string $desc
   * @param string $mydesc
   * @return string
   */
  public function set_description($mydesc)
  {
      global $desc;
      $desc = str_replace($desc, $mydesc, $desc);
      return $desc;
  }

  /**
   * string set_title(string $mypagename)
   * Функция установки заголовка страницы (<title></title>)
   * @global string $pagename
   * @param string $mypagename
   * @return string
   */
  public function set_title($mypagename)
  {
      global $pagename;
      $pagename = str_replace($pagename, $mypagename, $pagename);
      return $pagename;
  }

  /**
   * string set_keywords(string $mykeywords)
   * Функция установки содержимого meta-атрибута keywords
   * @global string $keywords
   * @param string $mykeywords
   * @return string
   */
  public function set_keywords($mykeywords)
  {
      global $keywords;
      $keywords = str_replace($keywords, $mykeywords, $keywords);
      return $keywords;
  }

}

# Default timezone for using function date()
date_default_timezone_set('Europe/Moscow');
setlocale(LC_TIME, "rus", "ru_RU.utf-8", "rus_RUS.utf-8", "ru_RU");

// Session settings
session_name('StudyOfReligionSessionID');
session_start();

// via HTTPS only
if (filter_input(INPUT_SERVER, 'HTTPS') != 'on' || filter_input(INPUT_SERVER, 'X_FORWARDED_FOR' != 'https'))
{
  die(header('Location: https://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . '/'));
}

ob_start('Head::get_head');

# Response HTTP-headers
header('Cache-Control: public, must-revalidate');
header('Expires: ' . date('r', time() + 600));
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="description" content="Религиоведение: видеолекции по религиоведению"/>
  <meta name="keywords" content="религиоведение лекции"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <title>Религиоведение: лекции по религиоведению</title>

  <!-- Fonts -->
  <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"/>

  <!-- Style -->
  <style>
  html, body {
    background-color: #fff;
    color: #63111;
    text-align: center;
    font-family: 'Raleway', sans-serif;
    /*font-weight: 100;*/
    height: 100vh;
    margin: 5;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 54px;
  }

  .copyright {
    padding-top: -20px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 15px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }
  </style>
</head>
<body>
  <div class="flex-center position-ref full-height">
    <div class="content">
      <a href="/"><img src="/images/logo.png" width="320px" height="240px" alt="Религиоведение"/></a><br/><br/><br/>
      <?php
      $pg = htmlspecialchars(filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
      switch ($pg):
        default:
        ?>
        <h1 class="title m-b-md">Религиоведение: лекции по религиоведению</h1>
        <div class="links">
          <a href="/youtube" target="_blank"><i class="fa fa-youtube-square fa-5x" style="color: #ef0000;"></i> канал</a> | <a href="/vk" target="_blank">Сообщество <i class="fa fa-vk fa-4x"></i></a> | <a href="/about_content">Дополнительно о контенте</a> | <a href="/letters">Обратная связь</a> | <a href="/donate">Помочь проекту</a>
        </div>
        <?php
        break;
        case 'about_content':?>
        <h1 class="title m-b-md">О контенте</h1>
        <p>Весь мультимедийный контент проекта studyofreligion.ru распространяется под свободной лицензией <span style="font-weight: bold;">CC-BY</span>, что даёт возможность повторного использования - редактировать/использовать/встраивать контент с обязательным указанием авторства</p>
        <h2>Исходный код проекта</h2>
        <p>Сайт studyofreligion.ru - проект с открытым исходным кодом под свободной лицензией Массачусетского технологического института <span style="font-weight: bold;">The MIT License</span>.</p>
        <p><i class="fa fa-github fa-5x"></i><a href="/source" target="_blank">Исходный код сайта на GitHub</a></p>
        <?php
        break;
        case 'donate':?>
        <h1 class="title m-b-md">Помочь проекту</h1>
        Если у вас есть желание помочь проекту, то это можно сделать двумя способами:
        <ul type="1">
          <li>Просто поделиться видео со своими знакомыми, которые интересуются религиоведением, либо оставить им ссылку на этот сайт, YouTube-канал или сообщество в ВК</li>
          <li>Оказать финансовую поддержку:</li>
        </ul>
        <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/quickpay/shop-widget?account=410014838319585&amp;quickpay=shop&amp;payment-type-choice=on&amp;mobile-payment-type-choice=on&amp;writer=buyer&amp;default-sum=100&amp;button-text=01&amp;fio=on&amp;mail=on&amp;successURL=http%3A%2F%2Fstudyofreligion.ru%2F" width="450" height="210"></iframe>
        <?php
        break;
        case 'letters':?>
        <h1 class="title m-b-md">Обратная связь</h1>
        <p><img src="/images/c.png" alt="picture"/></p>
        <?php
        break;
        case 'source': exit(header('Location: https://github.com/studyofreligion/StudyOfReligion')); break;
        case 'vk': exit(header('Location: https://vk.com/study_of_religion')); break;
        case 'youtube': exit(header('Location: https://www.youtube.com/channel/UCEqae2DjiQCj03P5C7V4bgQ')); break;
      endswitch;?>
    </div>
  </div>
  <div class="copyright">
    &copy; <?= date('Y');?> StudyOfReligion.Ru - Религиоведение: лекции по религиоведению
  </div>
</body>
</html>