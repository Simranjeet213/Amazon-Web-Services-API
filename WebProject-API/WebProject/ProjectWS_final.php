<?php
error_reporting(0);   //error handling JSON response
header("Access-Control-Allow-Origin: ".$_SERVER['HTTP_ORIGIN']);
if (isset($_GET['first_num']) && isset($_GET['second_num']) && isset($_GET['operator'])) {
    $first_num = $_GET['first_num'];
    // $connection = new mysqli('localhost','root','','');
   // $first_num= strip_tags(mysqli_real_escape_string($connection, $_GET['first_num']));    // Prevention from SQL Injection and XSS
    $second_num = $_GET['second_num'];
   // $second_num = strip_tags(mysqli_real_escape_string($connection, $_GET['second_num'])); // Prevention from SQL Injection and XSS
    $operator = $_GET['operator'];
   // $operator = strip_tags(mysqli_real_escape_string($connection, $_GET['operator']));     // Prevention from SQL Injection and XSS
    $result = '';
    switch ($operator) {
        case "Add":
           $result = $first_num + $second_num;
            break;
        case "Subtract":
           $result = $first_num - $second_num;
            break;
        case "Multiply":
            $result = $first_num * $second_num;
            break;
        case "Divide":
            $result = $first_num / $second_num;
            break;
        case "Factorial":
             $num = $first_num;
            $factorial = 1;
            for ($x=$num; $x>=1; $x--)
             {
            $factorial = $factorial * $x;
             }
             $result=$factorial;
            break;
        case "Power":
            $result= 1;
            
           for ($i = $second_num; $i > 0; $i--) {
            $result *= $first_num;
             }
            break;
        case "Modulus":
            $result= $first_num % $second_num;
    }
    $json =  array(
    "first_num" => $first_num,
    "second_num" => $second_num,
    "operator" => $operator,
    "result" => $result
); 
    
    echo json_encode($json); // Converting the object to JSON format
}
else
{
echo json_encode(array("ErrorCode"=>1001, "Error Description"=>"apiKey or userName parameter missing"));
}
?>