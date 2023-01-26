<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mandatech";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
            CREATE TABLE IF NOT EXISTS products(
              id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR (200) NOT NULL,
              type VARCHAR (100),
              dsc TEXT NOT NULL,
              quantity VARCHAR (11),
              price DECIMAL (7,2),
              img TEXT NOT NULL
            );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
