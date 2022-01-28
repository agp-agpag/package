<?php

namespace Agp\Agpag;


use Agp\Agpag\Model\Entity;
use Agp\Agpag\Service\CurlResquest;

class PerfilPagamento extends Entity
{
    use CurlResquest;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $tipo;

    /**
     * @var string
     */
    protected $numero;

    /**
     * @var string
     */
    protected $titular;

    /**
     * @var string
     */
    protected $validade;

    /**
     * @var string
     */
    protected $cvv;

    /**
     * @var string
     */
    protected $doc;

    /**
     * @var string
     */
    protected $vencimento;

    /**
     * @var boolean
     */
    protected $binary_mode;

    public function get($id)
    {
        return $this->sendRequest("pessoa/".$id."/perfil-pagamento");
    }
}
