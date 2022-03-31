# PHPtest

Teste de seleção para vaga PHP

Link do projeto em meu servidor
https://alexandrerodrigues.com/PHPtest/

Imagens
![Home](https://alexandrerodrigues.com/PHPtest/prints/1.png | width=200px)
![Resultado da Pesquisa](https://alexandrerodrigues.com/PHPtest/prints/2.png | width=200px)
![Relatório](https://alexandrerodrigues.com/PHPtest/prints/3.png | width=200px)

Foi usado SQLite para que não seja necessario nenhuma configuração adicional.
Como usar: 

Faça o clone "git clone https://github.com/alxrds/PHPtest.git"

Habilite o SQLite no seu php.ini no 
-linux sudo apt-get install php-sqlite3
-windows require o ";" da linha sqlite3

execute o comando php -S localhost:(umaPortaQualquer)

Abaixo as Instruções sobre o teste:

## Faça um fork desse projeto e siga as intruções a seguir utilizando esse projeto.

Construir uma aplicação web para buscar endereço. 
Aplicação deve fazer uma chamada na API via cep : https://viacep.com.br/.

Premissas:

  ● Usar PHP 5.6 ou superior.
  
  ● Usar Bootstrap.
  
  ● JavaScript (Não usar framework).
  
  ● Retorno deve ser em xml.
  
  ● Salvar os dados em uma base e antes de uma nova consulta verificar se o cep já foi consultado, 
  caso tenha sido, trazer informação da base e não deve efetuar uma nova consulta.
  
  ● Tratar o erro. Dar um retorno amigável para usuário leigo.
  
  
## PS: Valorizamos a criatividade no layout.

# Entrega: 
 * Disponibilizar um link do repositório no GitHub e encaminhar para developer@cd2.com.br
