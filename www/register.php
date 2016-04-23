<?php
$m = new MongoClient();
$db = $m->selectDB("biglegcarry");
$user_col = new MongoCollection($db, "user");
$usernameErr = $firstnameErr = $lastnameErr = $emailErr = $genderErr = $incomeErr = $passwordErr = $dobErr = $phoneErr = "";
$username = $firstname = $lastname = $email = $gender = $income = $password = $dob = $phone = $user = "";
$SUCCESS = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //username
    if (empty($_POST["username"])) {
        $usernameErr = "username is required";
        $SUCCESS = 0;
    } else {
        $username = test_input($_POST["username"]);
        //check if the username has been taken
        if($user_col->find(array("username" => $username)) != NULL){
            $SUCCESS = 0;
            $usernameErr = "This name is already exists";
        }
    }

    //firstname
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Name is required";
        $SUCCESS = 0;
    } else {
        $firstname = test_input($_POST["firstname"]);
    }

    //lastname
    if (empty($_POST["lastname"])) {
        $lastnameErr = "Name is required";
        $SUCCESS = 0;
    } else {
        $lastname = test_input($_POST["firstname"]);
    }

    //email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $SUCCESS = 0;
    } else {
        $email = test_input($_POST["email"]);
    }

    //gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $SUCCESS = 0;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    //income
    if (empty($_POST["income"])) {
        $incomeErr = "Income is required";
        $SUCCESS = 0;
    } else {
        $income = test_input($_POST["income"]);
    }

    //password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $SUCCESS = 0;
    } else {
        $password = test_input($_POST["password"]);
    }

    //dob
    if (empty($_POST["dob"])) {
        $dobErr = "Date of birth is required";
        $SUCCESS = 0;
    } else {
        $dob = test_input($_POST["dob"]);
    }

    //phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $SUCCESS = 0;
    } else {
        $phone = test_input($_POST["phone"]);
    }

    if($SUCCESS == 1){
        $user = array("username" = $username, "firstname" = $firstname, "lastname" = $lastname, "email" = $email, "gender" = $gender, "income" = $income,
        "password" = $password, "dob" = $dob, "phone" = $phone);
        $user_col->insert($user);
    }
}

?>
