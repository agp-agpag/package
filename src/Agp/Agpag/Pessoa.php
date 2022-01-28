<?php

namespace Agp\Agpag;


use Agp\Agpag\Model\Entity;

class Pessoa extends Entity
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $nome;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $doc;

}
