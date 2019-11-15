<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>各期中獎號碼清單_查詢</title>
</head>
<body>
<?php
include_once ("./api/base.php");

if(!empty($_POST['year'])) {
    $year=$_POST['year'];
} else {
    $year=date("Y");
}
if(isset($_POST['submit'])) {
    $month=$_POST['submit'];
} else {
    $month="月";
}
function showList($year,$month) {
    global $pdo;
    $sql="SELECT * FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
    // echo $sql;
    $rewardNum=$pdo->query($sql)->fetch();
    return $rewardNum;
}
if(isset($_POST['submit'])) {
    $month=["1-2月", "3-4月", "5-6月", "7-8月", "9-10月", "11-12月"];
    if($_POST['submit']==$month[0]) {
        $rewardNum=showList($year,"1-2月");
    }
    if($_POST['submit']==$month[1]) {
        $rewardNum=showList($year,"3-4月");
    }
    if($_POST['submit']==$month[2]) {
        $rewardNum=showList($year,"5-6月");
    }
    if($_POST['submit']==$month[3]) {
        $rewardNum=showList($year,"7-8月");
    }
    if($_POST['submit']==$month[4]) {
        $rewardNum=showList($year,"9-10月");
    }
    if($_POST['submit']==$month[5]) {
        $rewardNum=showList($year,"11-12月");
    }
} else {
    $_POST['submit']="月";
    $rewardNum=["", "", "", "", "", "", "", "", "", "", ""];
}
?>

<form action="query_reward.php" method="post">
    <table>
        <tr>
            <td><input type="submit" name="submit" value="1-2月"></td>
            <td><input type="submit" name="submit" value="3-4月"></td>
            <td><input type="submit" name="submit" value="5-6月"></td>
            <td><input type="submit" name="submit" value="7-8月"></td>
            <td><input type="submit" name="submit" value="9-10月"></td>
            <td><input type="submit" name="submit" value="11-12月"></td>
        </tr>
        <tr>
            <td colspan="2"><a href="index.html">回首頁</a></td>
            <td colspan="3"><?=$year."年&emsp;".$_POST['submit'];?></td>
            <td>
                <input type="button" name="button" value="兌獎" onclick="location.href='lottery.php?year=<?=$year;?>&month=<?=$rewardNum[2];?>'">
            </td>
        </tr>
        <tr>
            <td>特別獎</td>
            <td colspan="4" >
                <?=$rewardNum[3];?>
            </td>
            <td>1000萬</td>
        </tr>
        <tr>
            <td>特獎</td>
            <td colspan="4" >
                <?=$rewardNum[4];?>
            </td>
            <td>200萬</td>
        </tr>
        <tr>
            <td>頭獎</td>
            <td colspan="4" >
                <?=$rewardNum[5]."<br>";?><?=$rewardNum[6]."<br>";?><?=$rewardNum[7];?>
            </td>
            <td>20萬</td>
        </tr>
        <tr>
            <td>二獎</td>
            <td colspan="4">末7位數號碼與頭獎末7位數相同</td>
            <td>4萬元</td>
        </tr>
        <tr>
            <td>三獎</td>
            <td colspan="4">末6位數號碼與頭獎末6位數相同</td>
            <td>1萬元</td>
        </tr>
        <tr>
            <td>四獎</td>
            <td colspan="4">末5位數號碼與頭獎末5位數相同</td>
            <td>4千元</td>
        </tr>
        <tr>
            <td>五獎</td>
            <td colspan="4">末4位數號碼與頭獎末4位數相同</td>
            <td>1千元</td>
        </tr>
        <tr>
            <td>六獎</td>
            <td colspan="4">末3位數號碼與頭獎末3位數相同</td>
            <td>2百元</td>
        </tr>
        <tr>
            <td>增開六獎</td>
            <td colspan="4" class="prizeNum">
                <?=$rewardNum[8]."<br>";?><?=$rewardNum[9]."<br>";?>
            </td>
            <td>2百元</td>
        </tr>
    </table>
</form>
</body>
</html>