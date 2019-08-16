<?php
/**
 * Created by PhpStorm.
 * User: omar khaled
 * Date: 8/16/2019
 * Time: 10:01 PM
 */
include ("conn.php");
session_start();
switch ($_REQUEST["action"]){
    case "sendmassege":
        $query= $conn->prepare("INSERT INTO mss SET username=?,mss=?");
        $run=$query->execute([$_SESSION['user'] ,$_REQUEST['massege']]);
        if($run){
            echo 1;
        }
        break;
    case "getmassege":
       $query= $conn->prepare("SELECT * FROM mss");
       $run=$query->execute();
       $rs= $query->fetchAll(PDO::FETCH_OBJ);
       $chat ="";
       foreach ($rs as $r){
//           $chat .=$r->mss ."<br/>";
           $chat .='<div> <strong style="color: black;">'.$r->username.':</strong>'.$r->mss.'</div>'."<hr>";
       }
       echo $chat;

        break;
}
?>