<?php


    function getResultado($cep){

        $cep = $_POST['cep'];

        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/{$cep}/xml/";
        $xml = simplexml_load_file($url);
        if($xml){
            return $xml;
        }else{
            return null;
        }
        
    
    }





