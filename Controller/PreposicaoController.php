<?php

namespace StudioVisual;

class Preposicao extends BooglanController
{

    const LETRA_NAO_PREPOSICAO = 'l';

    public function countPreposicoes()
    {
        $countPreposicoes = 0;

        foreach ($this->palavras as $palavra) {
            if (! $this->isPreposicao($palavra)) {
                continue;
            }

            $countPreposicoes++;
        }

        return $countPreposicoes;
    }

    private function isPreposicao($palavra)
    {
        if (strlen($palavra) != 5 || (strpos($palavra, self::LETRA_NAO_PREPOSICAO)) !== false) {
            return false;
        }

        $ultimaLetra = (substr($palavra, -1));
        if (in_array($ultimaLetra, $this->bar)) {
            return false;
        }

        return true;
    }
}
