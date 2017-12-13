<?php

namespace StudioVisual;

class Verbo extends BooglanController
{

    const TIPO_VERBO_PRIMEIRA_PESSOA = 'primeira_pessoa';
    const TIPO_VERBO_TODOS = 'todos';

   
    public function countVerbos()
    {
        return $this->countVerbosPorTipo(self::TIPO_VERBO_TODOS);
    }

  
    public function countVerbosPrimeiraPessoa()
    {
        return $this->countVerbosPorTipo(self::TIPO_VERBO_PRIMEIRA_PESSOA);
    }

 
    private function countVerbosPorTipo($tipoVerbo)
    {

        $countVerbo = 0;

        foreach ($this->palavras as $palavra) {

            if (!$this->isVerbo($palavra)) {
                continue;
            }

            switch ($tipoVerbo) {
                case self::TIPO_VERBO_PRIMEIRA_PESSOA:
                    if (! $this->isVerboPrimeiraPessoa($palavra)) {
                        continue 2;
                    }

                    break;
            }

            $countVerbo++;
        }

        return $countVerbo;
    }

  
    private function isVerbo($palavra)
    {
        $ultimaLetra = substr($palavra, -1);

        return ( strlen($palavra) >= 8 && in_array($ultimaLetra, $this->bar) );
    }

    private function isVerboPrimeiraPessoa($palavra)
    {
        $primeiraLetra = substr($palavra, 0, 1);

        return (in_array($primeiraLetra, $this->bar)) ? false : true;
    }
}
