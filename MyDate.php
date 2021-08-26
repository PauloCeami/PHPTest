<?php

/*

 * 5. Crie uma classe PHP chamada "MyDate". Crie um método estático nessa classe
  chamado "toAmerican" que recebe como parâmetro uma data em formato brasileiro
  (dd/mm/YYYY) e retorne essa data em formato americano (YYYY-mm-dd).


  6. Utilizando a classe "MyDate" criada anteriormente, crie um método estático chamado
  "toggle" que recebe como parâmetro uma data. Este método deverá detectar através
  de uma expressão regular (RegEx) se a data está em formato brasileiro e, caso
  esteja, retorne essa data em formato americano. Caso não esteja em formato
  brasileiro, o método deverá testar se a data está em formato americano, e caso
  esteja, deverá retorná-la em formato brasileiro. Caso tenha sido passado um formato
  diferente do formato americano ou brasileiro, deve-se lançar uma exceção com a
  mensagem "Formato de data inválido".


  // o teste desse metodo está no arquivo index.php

 * 
 * 
 */

class MyDate {

     // o teste desse metodo está no arquivo index.php
    
    public static function toggle($date) {

        if (preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $date)) {
            return self::toAmerican($date);
        } else if (preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $date)) {
            return self::toBrasilian($date);
        } else {
            throw new Exception('data inválida');
        }
    }

    public static function toBrasilian($dateUsa) {
        return DateTime::createFromFormat('Y-m-d', $dateUsa)->format('d/m/Y');
    }

    public static function toAmerican($dateBR) {
        return DateTime::createFromFormat('d/m/Y', $dateBR)->format('Y-m-d');
    }

}
