<?php

namespace Agp\Agpag;

use Agp\Agpag\Model\Entity;
use Agp\Agpag\Service\CurlResquest;

class Transacao extends Entity
{
    use CurlResquest;

    /**
     * @var float
     */
    protected $valor;

    /**
     * @var int
     */
    protected $parcela;

    /**
     * @var string
     */
    protected $descricao;

    /**
     * @var boolean
     */
    protected $referencia = null;

    /**
     * @var Pessoa
     */
    protected $pessoa;

    /**
     * @var object
     */
    protected $settings;

    /**
     * @var PerfilPagamento
     */
    protected $profile;

    public function get($id)
    {
        return $this->sendRequest("transacao/".$id);
    }

    public function create()
    {
        return $this->sendRequest("transacao", "POST", $this->toJson());
    }
}
