<?php

namespace Agp\Agpag;


use Agp\Agpag\Model\Entity;
use Agp\Agpag\Service\CurlResquest;

class TipoPagamento extends Entity
{
    use CurlResquest;

    //TODO - Adicionar os metodos

    public function get($id)
    {
        return $this->sendRequest("tipos-pagamentos");
    }
}
