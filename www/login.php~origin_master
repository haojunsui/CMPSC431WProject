<?php
session_start();
$m = new MongoClient();
$db = $m->selectDB("biglegcarry");
$user_col = new MongoCollection($db, "user");
$username = $firstname = $lastname = $email = $gender = $income = $password = $dob = $phone = $user = "";
$SUCCESS = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["password"])){
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $cursor = $user_col->find(array("username" => $username));
    if($cursor["password"] == $password){
        $_SESSION["valid"] = true;
        $_SESSION["timeout"] = time();
        $_SESSION["username"] = $username;
    }
}
?>
