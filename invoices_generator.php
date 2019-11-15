<?php

// function randomMonth() {
//     return rand(9, 10);
// }
function randomMonthGroup() {
    $month = rand(1, 6) * 2;
    return ($month - 1) ."-". $month."月";
}

function randomMoney() {
    return rand(1, 20000);
}

function randomLetter($except = "") {
    
    do {
        $letter = chr(rand(65,90));
    } while($letter == $except);

    return $letter;
}

function generateReceiptNumber() {

    $firstLetter = randomLetter();
    $secondLetter = randomLetter($firstLetter);

    return 
        randomLetter() .
        randomLetter() .
        rand(0, 9) .
        rand(0, 9) .
        rand(0, 9) .
        rand(0, 9) .
        rand(0, 9) .
        rand(0, 9) .
        rand(0, 9) .
        rand(0, 9);
}

$dsn = "mysql:host=localhost;charset=utf8;dbname=lottery";
$pdo = new PDO($dsn, 'root', 'F225228477');

for($i = 0; $i < 100000; $i++) {

    $year = 2019;
    $month_group = randomMonthGroup();
    $money = randomMoney();
    $number =  generateReceiptNumber();

    $statement = $pdo->prepare("INSERT INTO `invoice` (`number`, `year`, `month_group`, `money`) VALUES (?,?,?,?)");
    $statement->execute([$number, $year, $month_group, $money]);    
}
