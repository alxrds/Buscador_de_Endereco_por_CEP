<?php
    date_default_timezone_set('UTC');
    include 'conn.php';
    include 'viaCep.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisar Endereço ViaCep API | By Alexandre Rodrigues </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card p-4 mt-3">
                <h1>
                    <button class='btn btn-success pull-right' onclick="exportar()">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    </button>
                </h1>
                    <h3 class="heading mt-5 text-center">Pesquisar Endereço por CEP</h3>
                    <div class="d-flex justify-content-center px-5">
                        <form action="" method="post" id="formCep">
                            <div class="busca"> 
                                <input type="text" class="busca-input" placeholder="00000000" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="8" name="cep" id="cep" autocomplete="off" required> 
                                <button type="submit" class="busca-icon">
                                    <i class="fa fa-search"></i> 
                                </button> 
                            </div>
                        </form>
                    </div>
                    <div class="row mt-4 g-1 px-4 mb-5">

                        <?php 

                            if($_POST){ 

                                $cep = $_POST['cep'];

                                $stmt = $conn->prepare('SELECT * FROM `tbl_cep` WHERE cep = :cep');
                                $stmt->execute(['cep'=>str_replace("-", "",$cep)]);
                                $row = $stmt->fetch();

                                if($row){

                                    echo '
                                    <div class="container">
                                        <h2>Resultado da Pesquisa</h2>
                                        <p>
                                            <b>CEP: </b>  '.$row['cep'].'<br>
                                            <b>Logradouro: </b>  '.$row['logradouro'].' <br>
                                            <b>Bairro: </b>  '.$row['bairro'].'<br>
                                            <b>Localidade: </b>  '.$row['localidade'].' <br>
                                            <b>UF: </b> '.$row['uf'].' <br>
                                        </p>
                                    </div>

                                ';

                                }else{

                                    $endereco = getResultado($cep);

                                    $stmt = $conn->prepare('INSERT INTO `tbl_cep`(cep, logradouro, bairro, localidade, uf) VALUES (:cep, :logradouro, :bairro, :localidade, :uf)');
                                    $stmt->execute([
                                        'cep'=>str_replace("-", "",$endereco->cep), 
                                        'logradouro'=>$endereco->logradouro, 
                                        'bairro'=>$endereco->bairro, 
                                        'localidade'=>$endereco->localidade,
                                        'uf'=>$endereco->uf
                                    ]);

                                    if($stmt){
    
                                        echo '
                                            <div class="container">
                                                <h2>Resultado da Pesquisa</h2>
                                                <p>
                                                    <b>CEP: </b>  '.str_replace("-", "",$endereco->cep).'<br>
                                                    <b>Logradouro: </b>  '.$endereco->logradouro.' <br>
                                                    <b>Bairro: </b>  '.$endereco->bairro.'<br>
                                                    <b>Localidade: </b>  '.$endereco->localidade.' <br>
                                                    <b>UF: </b> '.$endereco->uf.' <br>
                                                </p>
                                            </div>
                                        ';
                                
                                    }

                                }
                                

                            }
                                    
                               
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>

</body>
</html>