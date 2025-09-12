<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    //collecting data to server
    $name = $_POST['username'];
    $mail = $_POST['email'];
    $age = $_POST['age'];
    //errors initializing
    $errors = [];
    //validating data
    if(empty($name)){
        $errors[] = "Username cannot be empty";
    }

    if(empty($mail)){
        $errors[]= "email needed";
    }elseif(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $errors[] = "Wrong email format";
    }

    if(empty($age)){
        $errors[]="Age is required";
    }elseif(!is_numeric($age)){
        $errors[] = "age should be number";
    }

    //handlind errors if found
    if(!empty($errors)){
        echo "<h1> Form Error pleae check</h2>";
        echo "<ul>";
        foreach($errors as $abc){
            echo "<li>$abc</li>";
        }
        echo "</ul>";
        echo "<a href='index.php'>GO BACK</a>";
    }else{
        echo "<h1>You have submitted the form Successfully</h1>";//Form Validation Success

    }

}else{
    echo "wrong request";
}
?>