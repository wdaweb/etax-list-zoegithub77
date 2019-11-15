<?php

include_once "base.php";


$data['year']=$_POST['year'];
$data['month_group']=$_POST['month_group'];
$data['number']=$_POST['number'];
$data['money']=$_POST['money'];

//判斷是否新增成功;
if(insert("invoice" ,$data)){
    echo "新增資料成功";
    echo "<a href='../index.html'>回首頁</a>";
 //  header("location:reward_numbers.html");
}else{
    echo "新增失敗,請洽資料庫管理人員";
//    header("location:reg.php?s=2");
}

?>