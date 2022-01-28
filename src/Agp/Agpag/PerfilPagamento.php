<?php

namespace Agp\Agpag;


use Agp\Agpag\Model\Entity;

class PerfilPagamento extends Entity
{
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
}
