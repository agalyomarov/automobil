<?php

$con = mysqli_connect('localhost', 'agaly', '1122', 'mobil');
if (mysqli_connect_error()) {
   echo 'Mysqli not working';
   exit();
}

$create_table = "CREATE TABLE IF NOT EXISTS `mobils`
(
   `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   `marka_id` INT(11) DEFAULT NULL,
   `model_id` INT(11) DEFAULT NULL,
   `price` VARCHAR(30) DEFAULT NULL,
   `price_old` VARCHAR(30) DEFAULT NULL,
   `credit` VARCHAR(30) DEFAULT NULL,
   `pokolenie` VARCHAR(30) DEFAULT NULL,
   `god_vypuska` VARCHAR(30) DEFAULT NULL,
   `probeg` VARCHAR(30) DEFAULT NULL,
   `tip_kuzova` VARCHAR(30) DEFAULT NULL,
   `dvigatel` VARCHAR(30) DEFAULT NULL,
   `kpp` VARCHAR(30) DEFAULT NULL,
   `svet` VARCHAR(30) DEFAULT NULL,
   `privot` VARCHAR(30) DEFAULT NULL,
   `valadelschov` VARCHAR(30) DEFAULT NULL,
   `image_0` VARCHAR(200) DEFAULT NULL,
   `image_1` VARCHAR(200) DEFAULT NULL,
   `image_2` VARCHAR(200) DEFAULT NULL,
   `image_3` VARCHAR(200) DEFAULT NULL,
   `image_4` VARCHAR(200) DEFAULT NULL,
   `image_5` VARCHAR(200) DEFAULT NULL,
   `image_6` VARCHAR(200) DEFAULT NULL,
   `image_7` VARCHAR(200) DEFAULT NULL,
   `image_8` VARCHAR(200) DEFAULT NULL,
   `image_9` VARCHAR(200) DEFAULT NULL,
   `image_10` VARCHAR(200) DEFAULT NULL,
   `image_11` VARCHAR(200) DEFAULT NULL,
   `image_12` VARCHAR(200) DEFAULT NULL,
   `image_13` VARCHAR(200) DEFAULT NULL,
   `image_14` VARCHAR(200) DEFAULT NULL,
   `image_15` VARCHAR(200) DEFAULT NULL,
   `image_16` VARCHAR(200) DEFAULT NULL,
   `image_17` VARCHAR(200) DEFAULT NULL,
   `image_18` VARCHAR(200) DEFAULT NULL,
   `image_19` VARCHAR(200) DEFAULT NULL,
   `image_20` VARCHAR(200) DEFAULT NULL,
   `image_21` VARCHAR(200) DEFAULT NULL,
   `image_22` VARCHAR(200) DEFAULT NULL,
   `image_23` VARCHAR(200) DEFAULT NULL,
   `image_24` VARCHAR(200) DEFAULT NULL,
   `image_25` VARCHAR(200) DEFAULT NULL,
   `image_26` VARCHAR(200) DEFAULT NULL,
   `image_27` VARCHAR(200) DEFAULT NULL,
   `image_28` VARCHAR(200) DEFAULT NULL,
   `image_29` VARCHAR(200) DEFAULT NULL,
   `image_30` VARCHAR(200) DEFAULT NULL,
   `image_41` VARCHAR(200) DEFAULT NULL,
   `image_42` VARCHAR(200) DEFAULT NULL,
   `image_43` VARCHAR(200) DEFAULT NULL,
   `image_44` VARCHAR(200) DEFAULT NULL,
   `image_45` VARCHAR(200) DEFAULT NULL,
   `image_46` VARCHAR(200) DEFAULT NULL,
   `image_47` VARCHAR(200) DEFAULT NULL,
   `image_48` VARCHAR(200) DEFAULT NULL,
   `image_49` VARCHAR(200) DEFAULT NULL,
   `image_40` VARCHAR(200) DEFAULT NULL,
   `image_51` VARCHAR(200) DEFAULT NULL,
   `image_52` VARCHAR(200) DEFAULT NULL,
   `image_53` VARCHAR(200) DEFAULT NULL,
   `image_54` VARCHAR(200) DEFAULT NULL,
   `image_55` VARCHAR(200) DEFAULT NULL,
   `image_56` VARCHAR(200) DEFAULT NULL,
   `image_57` VARCHAR(200) DEFAULT NULL,
   `image_58` VARCHAR(200) DEFAULT NULL,
   `image_59` VARCHAR(200) DEFAULT NULL,
   `image_60` VARCHAR(200) DEFAULT NULL
   )";

$create_tbl = mysqli_query($con, $create_table);
if ($war = mysqli_error($con)) {
   echo $war;
   exit($war);
}
