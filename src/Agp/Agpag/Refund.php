<?php

namespace Agp\Agpag;


use Agp\Agpag\Model\Entity;
use Agp\Agpag\Service\CurlResquest;

class Refund extends Entity
{
    use CurlResquest;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $metodo;

    /**
     * @var int
     */
    protected $data;


    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function save()
    {
        return $this->sendRequest("transacao/".$this->id."/refund", "POST", $this->toJson());
    }
}
