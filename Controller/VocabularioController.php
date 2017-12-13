<?php

namespace StudioVisual;

class Vocabulario extends BooglanController
{


    public function ordenarTexto()
    {
        usort($this->palavras, array($this,'ordenar'));

        $this->palavras = array_unique($this->palavras);

        return implode(' ', $this->palavras);
    }


    protected function ordenar($palavra1, $palavra2)
    {
        $size = $this->getTamanhoMenorPalavra($palavra1, $palavra2);

        for ($i=0; $i < $size; $i++) {
            $letra1 = $palavra1[$i];
            $letra2 = $palavra2[$i];

            if ($this->letraPeso[$letra1] > $this->letraPeso[$letra2]) {
                return 1;
            } elseif ($this->letraPeso[$letra1] < $this->letraPeso[$letra2]) {
                return -1;
            }
        }
        return (strlen($palavra1) - strlen($palavra2));
    }

   
    private function getTamanhoMenorPalavra($palavra1, $palavra2)
    {
        $tamanhoPalavra1 = strlen($palavra1);
        $tamanhoPalavra2 = strlen($palavra2);

        return ($tamanhoPalavra1 <= $tamanhoPalavra2) ? $tamanhoPalavra1 : $tamanhoPalavra2;
    }
}
