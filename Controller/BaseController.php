<?php

namespace StudioVisual;

class Base extends BooglanController
{
    const BASE = 20;
    const NUMERO_BONITO_MAIOR_IGUAL = 422224;
    const NUMERO_BONITO_DIVISIVEL = 3;

    public function base20($palavra)
    {
        $numero = 0.0;

        for ($i = 0; $i < strlen($palavra); $i++) {
            $letra = substr($palavra, $i, 1);

            $numero +=  pow(self::BASE, $i) * $this->letraPeso[$letra];
        }

        return doubleval($numero);
    }

    public function countNumerosBonito()
    {
        $numeroBonitoTotal = array();

        foreach ($this->palavras as $palavra) {

            $numero = $this->base20($palavra);
            if (! $this->isNumeroBonito($numero)) {
                continue;
            }

            $numeroBonitoTotal[$numero] = $numero;
        }

        return count($numeroBonitoTotal);
    }

    private function isNumeroBonito($numero)
    {
        $resto = (int) fmod($numero, self::NUMERO_BONITO_DIVISIVEL);

        return (($numero >= self::NUMERO_BONITO_MAIOR_IGUAL) && ($resto === 0));
    }
}
