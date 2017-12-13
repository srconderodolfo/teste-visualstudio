<?php

namespace StudioVisual;

use InvalidArgumentException;

abstract class BooglanController
{
   
    protected $texto;

    protected $palavras;

    
    protected $foo = array('r', 't', 'c', 'd', 'b');

    protected $bar = array('h','n', 'f', 'x', 'm', 'j', 'k', 'w', 'g', 'z', 'q', 'l', 'v', 's', 'p') ;

    protected $letraPeso = array(
        't' => 0, 'w' => 1, 'h' => 2, 'z' => 3, 'k' => 4, 'd' => 5,
        'f' => 6, 'v' => 7, 'c' => 8, 'j' => 9, 'x' => 10, 'l' => 11,
        'r' => 12, 'n' => 13, 'q' => 14, 'm' => 15, 'g' => 16, 'p' => 17,
        's' => 18, 'b' => 19
    );

    public function __construct($texto = '')
    {
        if (!is_string($texto)) {
            throw new InvalidArgumentException('Não é um texto Válido');
        }

        $this->texto = $texto;
        $this->palavras = explode(' ', $texto);
    }
}
