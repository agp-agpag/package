<?php

namespace Agp\Agpag;

class Store
{
    /**
     * @var string
     */
    protected static $_token;


    /**
     * Which environment will this store used for?
     * @var Environment
     */
    protected static $_environment;

    /**
     * Creates a store.
     *
     * @param string $filiation
     * @param string $token
     * @param Environment|null $environment if none provided, production will be used.
     */
    public function __construct($token, Environment $environment = null)
    {
        $environment = $environment != null ? $environment : Environment::production();

        $this->setClientSecret($token);
        $this->setEnvironment($environment);
    }

    /**
     * @return Environment
     */
    public static function getEnvironment()
    {
        return self::$_environment;
    }

    /**
     * @param Environment $environment
     *
     * @return Store
     */
    public function setEnvironment(Environment $environment)
    {
        self::$_environment = $environment;
        return $this;
    }


    public static function setClientSecret($client_secret){
        self::$_token = $client_secret;
    }

    public static function getClientSecret(){
        return  self::$_token;
    }
}
