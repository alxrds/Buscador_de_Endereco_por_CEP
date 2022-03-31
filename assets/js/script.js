const formulario = document.querySelector("#formCep");


formulario.onsubmit = evento => {
    let cep = document.querySelector("#cep").value;
    if(cep === "" || cep.length < 8 || isNaN(cep)){
        evento.preventDefault();
        Swal.fire(
            "Formato Incorreto!",
            "O campo deve possuir 8 números sem pontos ou traços.",
            "question"
        );
    }
}

function exportar(){
    location.href="export.php";
}

