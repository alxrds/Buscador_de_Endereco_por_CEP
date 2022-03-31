<?php

    /*
        Foi escolhido o SQLite para facilitar
        a execução do script proposto.
    */
   
    try{

        $conn = new PDO('sqlite:assets/db/ConsultaCep.db3');
        $query = $conn->prepare(
            'create table if not exists tbl_cep(id integer primary key autoincrement, cep text, logradouro text, bairro text, localidade text, uf text)'
        );
        $query->execute();

    }catch(PDOException $e){

        echo $e->getMessage();

    }

