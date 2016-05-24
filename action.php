<?php
/**
 * Created by PhpStorm.
 * User: Ivany
 * Date: 22.05.2016
 * Time: 21:33
 */

if(isset($_POST['name'])){
    echo 'Имя '. $_POST['name'];
}

if(isset($_POST['age'])){
    echo " Возраст ".$_POST['age'];
}

$nameList = ['admin','user'];

if(isset($_POST['login'])){
    if(in_array($_POST['login'],$nameList)){
        echo 'false';
    }else{
        echo $_POST['login'];
    }

}

if(isset($_GET['country'])){
    if($_GET['country']== 1){
        echo json_encode(array("1" =>"Киев","2" => "Винница", "3" => "Одесса"));
    }
    if($_GET['country']== 2){
        echo json_encode(array("1" =>"Брест","2" => "Минск","3" => "Дубровно"));
    }
    if($_GET['country']== 3){
        echo json_encode(array("1" =>"Москва","2" => "Владивосток","3" => "Омск"));
    }
    if($_GET['country']== 0){
        echo json_encode(array("1" =>""));
    }
}