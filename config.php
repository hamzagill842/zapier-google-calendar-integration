<?php 

//database connect

$host = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
global $conn;

const GOOGLE_Client_ID = "456046807463-jqed90d72efocnd3756q1gtj353temi7.apps.googleusercontent.com";
const GOOGLE_Client_SERECT = "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";
const GOOGLE_REDIRECT_URI= "https://7f89-2400-adc5-15d-da00-1546-cc9e-7b6e-a58d.ngrok-free.app";

const PLAY_LIST_ID = 'PLpt6gOTzg233RKs3x7ner8ShF15j2enQ8';

?>
