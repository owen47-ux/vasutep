<?php
                    $host = "localhost"; 
                    $user = "root";
                    $pws = "chinnapat";
                    $db = "4114db";
                    $conn = mysqli_connect($host, $user, $pws, $db) or die ("Error: " . mysqli_connect_error());
                    
                    mysqli_query($conn, "SET NAMES utf8");
?>