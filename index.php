<?php
/**
 * Created by PhpStorm.
 * User: omar khaled
 * Date: 8/16/2019
 * Time: 9:34 PM
 */
session_start();
$_SESSION["user"]="omar";
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }

        body {
            background-image: linear-gradient(to right, #845EC2, #7159c1);
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .chat__container {
            height: 100%;
            width: 800px;
            background-color: rgba(0,0,0,0.4) !important;
            border-radius: 4px;
        }

        .chat__head {
            display: flex;
            align-items: center;
            width: 100%;
            height: 20%;
            padding: 8px;
        }

        .head--style {
            border-radius: 4px 4px 0px 0px;
            background-color: rgba(0,0,0,.03);}

        .chat__body {
            width: 100%;
            height: 60%;
            max-height: 60%;
            overflow: auto;
        }

        .d__flex {
            display: flex;
        }





        .chat__footer {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            height: 20%;

            padding: 10px;
        }

        .footer--style {
            border-radius: 0px 0px 4px 4px;
            background-color: rgba(0,0,0,.03);
        }

        input {
            width: 100%;
            background: none;
            border: none;
            outline: none;
            background-color: rgba(0,0,0,0.3) !important;
            height: 70%;
            border-radius: 10px;
            color: white;
            padding: 10px;
            font-size: 16px;
        }

        .btn__send {
            position: absolute;
            right: 0;
            right: 20px;

            background: transparent;
            border: none;

        i {
            color: white;
        }

        &:hover {
             cursor: pointer;
         }

        &:active {
        i {
            color: purple;
        }
        }

        &:visited, &:focus {
                        outline: none;
                    }
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<div class="container">
    <div class="chat__container">
        <div class="chat__head head--style">
            welcome to chat
        </div>
        <div class="chat__body">

        </div>
        <from method="post" class="chat__footer footer--style" id="frm">
            <input type="text" id="massge" />
            <button class="btn__send" id="send">
                <i class="fas fa-location-arrow fa-2x"></i>
            </button>
        </from>
    </div>
</div>

</body>
<script>
    loadchat()
    function loadchat(){
        $.post('mss.php?action=getmassege',function (data) {
            $('.chat__body').html(data);

        });
    }

    $("#send").on("click", function(){
       $('from').submit();
    });
    $('from').submit(function () {
        var massege= $('#massge').val();
        $.post('mss.php?action=sendmassege&massege='+massege,function (data) {
          if (data==1){
              loadchat()
               document.getElementById('frm').reset();
               $('#massge').HTML(" ");
          }
        });
        return false;
    });
</script>
</html>
