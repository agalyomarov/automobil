<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');
ini_set("max_execution_time", "900");
ini_set('allow_url_fopen', 1);
ini_set('memory_limit', '1000M');
require "vendor/autoload.php";
require_once('db.php');

use PHPHtmlParser\Dom;


$links = json_decode(file_get_contents('test.json'));
foreach ($links as $key => $link) {
   $path = explode("/", $link);
   if (!is_dir('images/' . $path[1]) || !file_exists('images/' . $path[1])) {
      mkdir("images/" . $path[1], 0777);
   }
   if (!is_dir('images/' . $path[1] . '/' . $path[2]) || !file_exists('images/' . $path[1] . '/' . $path[2])) {
      mkdir("images/" . $path[1] . '/' . $path[2], 0777);
   }

   $content = file_get_contents("https://xn----8sbeclb6ai7aqz.xn--p1ai/" . $link);
   $dom = new Dom;
   $blocks = new Dom;
   $dom->loadStr($content);
   $price_block = $dom->find('#app main.page-main section.page-main__car .car__buy-options .car__buy-wrap div div');
   $h1 = explode(' ', $dom->find('.heading.heading--h1')->text);
   $cart = $dom->find('#app main.page-main section.page-main__car .car__detail-block-wrap div div div');
   $sliders = $dom->find('#app main.page-main section .car__block div div div');

   unset($dom);

   $marka = $h1[0];
   $model = $h1[1];

   $blocks->loadStr(strip_tags($cart->innerHTML, ['li', 'div']));
   $pokoleniye = $blocks->find('li div')[1]->text;
   $god_vykuska = $blocks->find('li div')[3]->text;
   $probeg = $blocks->find('li div')[5]->text;
   $tip_kuzova = $blocks->find('li div')[7]->text;
   $dvigatel = $blocks->find('li div')[9]->text;
   $kpp = $blocks->find('li div')[11]->text;
   $schvet = $blocks->find('li div')[13]->text;
   $privod = $blocks->find('li div')[15]->text;
   $vladelos = $blocks->find('li div')[17]->text;

   $blocks->loadStr($price_block->innerHTML);
   $price = $blocks->find('div')[0]->text;
   $price_old = $blocks->find('div')[1]->text;
   $credit = $blocks->find('div')[2]->text;

   $get_marka = $con->query("SELECT * FROM `marks` WHERE `title` = '$marka'")->fetch_assoc();
   $marka_id = $get_marka['id'];
   if (!$get_model = $con->query("SELECT * FROM `models` WHERE `marka_id` = '$marka_id' and  `model` = '$model'")->fetch_assoc()) {
      $con->query("INSERT INTO `models`(`id`,`marka_id`, `model`) VALUES(NULL,'$marka_id','$model')");
      $get_model = $con->query("SELECT * FROM `models` WHERE `marka_id` = '$marka_id' and  `model` = '$model'")->fetch_assoc();
   }

   $model_id = $get_model['id'];

   $mobil_id = $con->query("INSERT INTO `mobils`(`id`,`marka_id`, `model_id`,`price`,`price_old`,`credit`,`pokolenie`,`god_vypuska`,`probeg`,`tip_kuzova`,`dvigatel`,`kpp`,`svet`,`privot`,`valadelschov`) 
   VALUES(NULL,'$marka_id','$model_id','$price','$price_old','$credit','$pokoleniye','$god_vykuska','$probeg','$tip_kuzova','$dvigatel','$kpp','$schvet','$privod','$vladelos')");


   $mobil_id = $con->query("SELECT LAST_INSERT_ID() as id FROM `mobils`")->fetch_assoc()['id'];

   // if ($war = mysqli_error($con)) {
   //    echo $war;
   //    echo $pokoleniye;
   //    exit($war);
   // }
   // print_r($mobil_id);
   // exit();
   $model = mb_strtolower($model);
   $marka = mb_strtolower($marka);
   foreach ($sliders as $key => $slider) {
      if ($slider->find('a') !== NULL && filter_var($slider->find('a')->getAttribute('href'), FILTER_VALIDATE_URL) !== FALSE) {
         if (!is_dir('images/' . $marka) || !file_exists('images/' . $marka)) {
            mkdir("images/" . $marka, 0777);
         }
         if (!is_dir('images/' . $marka . '/' . $model) || !file_exists('images/' . $marka . '/' . $model)) {
            mkdir("images/" . $marka . '/' . $model, 0777);
         }

         if (!is_dir('images/' . $marka . '/' . $model . '/' . $mobil_id) || !file_exists('images/' . $marka . '/' . $model . '/' . $mobil_id)) {
            mkdir("images/" . $marka . '/' . $model . '/' . $mobil_id, 0777);
         }
         $image_path = 'images/' . $marka . '/' . $model . '/' . $mobil_id . '/' . rand(1111111111, 9999999999) . md5(microtime()) . '.jpg';
         file_put_contents($image_path, file_get_contents($slider->find('a')->getAttribute('href')));
         $image = 'image_' . $key;
         $con->query("UPDATE `mobils` SET `$image` = '$image_path'");
      }
   }
   exit;
}
