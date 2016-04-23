<?php
$m = new MongoClient();
$db = $m->selectDB("biglegcarry");
$user_col = new MongoCollection($db, "user");
$usernameErr = $firstnameErr = $lastnameErr = $emailErr = $genderErr = $incomeErr = $passwordErr = $dobErr = $phoneErr = "";
$username = $firstname = $lastname = $email = $gender = $income = $password = $dob = $phone = $user = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //username
    if (empty($_POST["username"])) {
        $usernameErr = "username is required";
        //check if the username has been taken
        if(){

        }
    } else {
        $username = test_input($_POST["username"]);
    }

    //firstname
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Name is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
    }

    //lastname
    if (empty($_POST["lastname"])) {
        $lastnameErr = "Name is required";
    } else {
        $lastname = test_input($_POST["firstname"]);
    }

    //email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    //gender
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }

    //income
    if (empty($_POST["income"])) {
        $incomeErr = "Income is required";
    } else {
        $income = test_input($_POST["income"]);
    }

    //password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    //dob
    if (empty($_POST["dob"])) {
        $dobErr = "Date of birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    //phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
    }

    $user = array("username" = $username, "firstname" = $firstname, "lastname" = $lastname, "email" = $email, "gender" = $gender, "income" = $income,
        "password" = $password, "dob" = $dob, "phone" = $phone);
    $user_col->insert($user);
}


?>
