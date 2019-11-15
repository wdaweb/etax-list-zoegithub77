<?php
// $dsn = "mysql:host=localhost;charset=utf8;dbname=lottery";
// $pdo = new PDO($dsn, 'root', 'F225228477');

// $year = 2019;
// $monthGroup = "9-10";

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateRewardNumber(), $year, $monthGroup, 'super special']);    

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateRewardNumber(), $year, $monthGroup, 'special']);    

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateRewardNumber(), $year, $monthGroup, 'grand']);    

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateRewardNumber(), $year, $monthGroup, 'grand']);    

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateRewardNumber(), $year, $monthGroup, 'grand']);    

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateRewardNumber(), $year, $monthGroup, 'grand']);    

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateMiniRewardNumber(), $year, $monthGroup, 'other']);    

// $statement = $pdo->prepare("INSERT INTO `reward` (`number`, `year`, `month_group`, `type`) VALUES (?,?,?,?)");
// $statement->execute([generateMiniRewardNumber(), $year, $monthGroup, 'other']);    

/***************************************************
 * 會員註冊行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.建立所需的SQL語法
 * 4.將表單資料以變數形式填入SQL語法中
 * 5.執行資料庫連線並送出SQL語法
 * 6.判斷SQL語法是否執行成功，執行下一步
 ***************************************************/
include_once "base.php";


$data['year']=$_POST['year'];
$data['month_group']=$_POST['month_group'];
$data['superSpecial']=$_POST['superSpecial'];
$data['special']=$_POST['special'];
$data['grand']=$_POST['grand'];
$data['grand1']=$_POST['grand1'];
$data['grand2']=$_POST['grand2'];
$data['other']=$_POST['other'];
$data['other1']=$_POST['other1'];
//判斷是否新增成功;
if(insert("reward",$data)){
    echo "新增資料成功";
    echo "<a href='../reward_numbers.html'>回輸入頁</a>";
 //  header("location:reward_numbers.html");
}else{
    echo "新增失敗,請洽資料庫管理人員";
//    header("location:reg.php?s=2");
}

?>