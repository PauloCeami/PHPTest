<?php

/*

 * 5. Crie uma classe PHP chamada "MyDate". Crie um método estático nessa classe
  chamado "toAmerican" que recebe como parâmetro uma data em formato brasileiro
  (dd/mm/YYYY) e retorne essa data em formato americano (YYYY-mm-dd).



 *   6. Utilizando a classe "MyDate" criada anteriormente, crie um método estático chamado
  "toggle" que recebe como parâmetro uma data. Este método deverá detectar através
  de uma expressão regular (RegEx) se a data está em formato brasileiro e, caso
  esteja, retorne essa data em formato americano. Caso não esteja em formato
  brasileiro, o método deverá testar se a data está em formato americano, e caso
  esteja, deverá retorná-la em formato brasileiro. Caso tenha sido passado um formato
  diferente do formato americano ou brasileiro, deve-se lançar uma exceção com a
  mensagem "Formato de data inválido".
 * 
 * 
 * 
 */
include_once './MyDate.php';

$date1 = "2021-08-26";
echo $date1 . ' to  ' . MyDate::toggle($date1);

echo '<br>';
echo '<br>';

$date2 = "26/08/2021";
echo $date2 . ' to american ' . MyDate::toAmerican($date2);

