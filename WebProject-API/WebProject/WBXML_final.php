<?php
error_reporting(0);   //error handling JSON response
header("Access-Control-Allow-Origin: ".$_SERVER['HTTP_ORIGIN']);
 $dom = new DOMDocument('1.0','UTF-8');
 $dom->formatOutput = true;

 $root = $dom->createElement('calculation');
 $dom->appendChild($root);

 $result = $dom->createElement('result');
 $root->appendChild($result);
 


if (isset($_GET['first_num']) && isset($_GET['second_num']) && isset($_GET['operator'])) {
    $first_num = $_GET['first_num'];
     // $connection = new mysqli('localhost','root','','');
   // $first_num= strip_tags(mysqli_real_escape_string($connection, $_GET['first_num']));    // Prevention from SQL Injection and XSS
    $second_num = $_GET['second_num'];
     // $second_num = strip_tags(mysqli_real_escape_string($connection, $_GET['second_num'])); // Prevention from SQL Injection and XSS
    $operator = $_GET['operator'];
     // $operator = strip_tags(mysqli_real_escape_string($connection, $_GET['operator']));     // Prevention from SQL Injection and XSS
    $output = '';
    switch ($operator) {
        case "Add":
           $output = $first_num + $second_num;
            break;
        case "Subtract":
           $output = $first_num - $second_num;
            break;
        case "Multiply":
            $output = $first_num * $second_num;
            break;
        case "Divide":
            $output = $first_num / $second_num;
            break;
        case "Factorial":
             $num = $first_num;
            $factorial = 1;
            for ($x=$num; $x>=1; $x--)
             {
            $factorial = $factorial * $x;
             }
             $output=$factorial;
            break;
        case "Power":
            $output= 1;
            
           for ($i = $second_num; $i > 0; $i--) {
            $output *= $first_num;
             }
            break;
        case "Modulus":
            $output= $first_num % $second_num;
    }
}
  
  
  $num1 = $dom->createElement('num1', $first_num);
  $num2 = $dom->createElement('num2', $second_num);
  $outputfinal = $dom->createElement('outputfinal', $output);
  $result->appendChild($num1);
  $result->appendChild($num2);
  $result->appendChild($outputfinal);
  
 
  echo $dom->saveXML();
?>