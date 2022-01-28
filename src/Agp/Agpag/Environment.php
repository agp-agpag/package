<?php

namespace Agp\Agpag;

class Environment
{
    const PRODUCTION = 'https://www.agpag.com.br/api/';
    const SANDBOX = 'http://local.agpag.com.br/api/';

    /**
     * Creates a environment with its base url and version
     *
     * @param string $baseUrl
     * @param string $version
     */
    private function __construct($baseUrl)
    {
        $this->endpoint = $baseUrl;
    }

    /**
     * @param string $service
     *
     * @return string Gets the environment endpoint
     */
    public function getEndpoint($service)
    {
        return $this->endpoint . $service;
    }

    public static function production()
    {
        return new Environment(self::PRODUCTION);
    }

    public static function sandbox()
    {
        return new Environment(self::SANDBOX);
    }
}
