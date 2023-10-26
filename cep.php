<?php
    error_reporting(0);
    $find = " ";
    $replace = "";
    $cep = $_POST['cep'];
    $cep = str_replace($find, $replace, $cep);

    $url = "https://viacep.com.br/ws/$cep/json";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = json_decode(curl_exec($ch));
?>