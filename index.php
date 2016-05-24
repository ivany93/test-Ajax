<?php
/**
 * Created by PhpStorm.
 * User: Ivany
 * Date: 22.05.2016
 * Time: 14:33
 */


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <script src="//code.jquery.com/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script  src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">
          <h2>запрос (имя/возраст) и ответ на него </h2>
            <br>
           <b> <p id="button1" style="cursor: pointer" align="center"> <span class="glyphicon glyphicon-hand-right"></span>  тык!</p></b>
        </div>
        <div class="col-md-6">
          <h2 > проверка на наличие логина</h2>
            <p>Заняты "admin" и "user"</p>
            <input id="login" type="text" placeholder="введите логин">  <button id="loginSend">send</button>
        </div>
    </div>
    <br>
    <br>
    <div align="center">
    <p>Результат запроса!
        <span class="glyphicon glyphicon-hand-down"></span>
    </p>
        <br>
<div id="result" ></div>
    </div>
    <br><br><br>
    <div class="col-md-12" align="center">
        <h3>Выбор страны и подгрузка определённых городов</h3>
        <br>
        <label>
            Выберите страну
        </label>
        <select name="country">
            <option value="0">Выберите страну</option>
            <option value="1">Украина</option>
            <option value="2">Белорусь</option>
            <option value="3">Россия</option>
        </select>
        <select name="city">
            <option value="0"></option>
        </select>
    </div>
    </div>
<script type="text/javascript">

    function  functBefore(){
        $('#result').text("получение данных...");
    }

    function  functSuccess(data){

            $('#result').text(data);
    }

    $(document).ready(function(){
        $("#button1").bind("click", function(){

            $.ajax({
                 url:"action.php",
                 type: "POST",
                 data:({name: 'Vasya', age: 25}),
                dataType: 'html',
                beforeSend: functBefore,
                success: functSuccess
            });
        });
        $("#loginSend").bind("click", function(){
            $.ajax({
                url:"action.php",
                type: "POST",
                data:({login: $("#login").val()}),
                dataType: "html",
                beforeSend:functBefore,
                success: function(data){
                    if (data == 'false'){
                        alert("логин занят!");
                        $("#result").text('Ошибка, логин занят!');
                    }else{
                        $("#result").text('Ваш логин '+data);
                    }
                }

            });
        });
        $("select[name='country']").bind("change", function (){
            $("select[name='city']").empty();
            $.get("action.php",
                {country: $("select[name='country']").val()},
                function(data){
                    data = JSON.parse(data);
                    for(var id in data){
                    $("select[name='city']").append($("<option value='"+id +"'>"+data[id]+" </option>"));
                    }
                }
            );

        });

    });
</script>
</body>
</html>
