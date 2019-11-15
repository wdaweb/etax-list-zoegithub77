<?php
include_once ("./api/base.php");
$year=$_GET['year'];
$month=$_GET['month'];
// 六獎
$sql3num="SELECT substring(`grand`,6,3), substring(`grand2`,6,3), substring(`grand1`,6,3), `ohter1`, `other` 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$six=$pdo->query($sql3num)->fetch();
// 五獎
$sql4num="SELECT substring(`grand`,5,4), substring(`grand2`,5,4), substring(`grand1`,5,4) 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$five=$pdo->query($sql4num)->fetch();
// 四獎
$sql5num="SELECT substring(`grand`,4,5), substring(`grand2`,4,5), substring(`grand1`,4,5) 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$four=$pdo->query($sql5num)->fetch();
// 三獎
$sql6num="SELECT substring(`grand`,3,6), substring(`grand2`,3,6), substring(`grand1`,3,6) 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$three=$pdo->query($sql6num)->fetch();
// 二獎
$sql7num="SELECT substring(`grand`,2,7), substring(`grand2`,2,3), substring(`grand1`,2,7) 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$two=$pdo->query($sql7num)->fetch();
// 頭獎
$sqlOther="SELECT `grand1`, `grand2`, `grand` 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$one=$pdo->query($sqlOther)->fetch();
// 特獎
$sqlOther="SELECT `special` 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$grand=$pdo->query($sqlOther)->fetch();
// 特別獎
$sqlOther="SELECT `superSpecial` 
FROM `reward` WHERE `year`='$year' && `month_group`='$month'";
$special=$pdo->query($sqlOther)->fetch();
// 所有發票資料
$sqlRecpt="SELECT `number`, `money`, substring(`number`,2,7), substring(`number`,3,6), substring(`number`,4,5), substring(`number`,5,4), substring(`number`,6,3) 
FROM `invoice` WHERE `year`='$year' && `month_group`='$month'";
$data=$pdo->query($sqlRecpt)->fetchAll();
?>

<?php
if(!empty($year) && !empty($month)) {
    if($month=="") {
        echo "<br>你沒有選擇月分。";
    } else {
        $zero = 0;
        $s=0; $g=0; $f1=0; $s2=0; $t3=0; $f4=0; $f5=0; $s6=0;
        echo "中獎編號如下：<br><br>";
        foreach($data as $value) {
            if(in_array($value[0],$special)) {
                $s++;
                echo "特別獎：".$value[0]." | 獎金：1000萬元<br>";
            } elseif(in_array($value[0],$grand)) {
                $g++;
                echo "特獎：".$value[0]." | 獎金：200萬元<br>";
            } elseif(in_array($value[0],$one)) {
                $f1++;
                echo "頭獎：".$value[0]." | 獎金：20萬元<br>";
            } elseif(in_array($value[2],$two)) {
                $s2++;
                echo "二獎：".$value[0]." | 獎金：4萬元<br>";
            } elseif(in_array($value[3],$three)) {
                $t3++;
                echo "三獎：".$value[0]." | 獎金：1萬元<br>";
            } elseif(in_array($value[4],$four)) {
                $f4++;
                echo "四獎：".$value[0]." | 獎金：4千元<br>";
            } elseif(in_array($value[5],$five)) {
                $f5++;
                echo "五獎：".$value[0]." | 獎金：1千元<br>";
            } elseif(in_array($value[6],$six)) {
                $s6++;
                echo "六獎：".$value[0]." | 獎金：200元<br>";
            } else {
                $zero++;
            }
        }
        if(count($data)==$zero) {
            echo "沒有中獎...請再接再厲！";
        } else {
            echo "<br><br>恭喜中獎！";
            echo "<br>你一共獲得".intval(($s*10000000)+($g*2000000)+($f1*200000)+($s2*40000)+($t3*10000)+($f4*4000)+($f5*1000)+($s6*200))."元！";
        }
    } 
} else {
        echo "<br>你沒有輸入這一期的獎號。";
    }
?>