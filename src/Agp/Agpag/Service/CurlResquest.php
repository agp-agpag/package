<?php


namespace Agp\Agpag\Service;

use Agp\Agpag\Model\Entity;
use Agp\Agpag\Store;
use RuntimeException;

trait CurlResquest
{
    /**
     * @var resource
     */
    private $curl;

    /**
     * @param string $url
     * @param string $body
     * @param string $method
     *
     * @return mixed
     * @throws RuntimeException
     */
    protected function sendRequest($url = "", $method = 'GET', $body = '')
    {
        if (is_resource($this->curl)) {
            curl_close($this->curl);
        }

        $token = Store::getClientSecret();

        if(!$token)
            throw new RuntimeException('O Client Secret é obrigatório');

        $headers = [];
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer '. $token;
        $headers[] = 'Content-Type: application/json';

        $this->curl = curl_init(Store::getEnvironment()->getEndpoint($url));

        switch ($method) {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($this->curl, CURLOPT_POST, true);
                break;
            default:
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
        }

        if (!empty($body))
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $body);

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($this->curl);
        $httpInfo = curl_getinfo($this->curl);

        if (curl_errno($this->curl)) {
            throw new RuntimeException(sprintf('Curl error[%s]: %s', curl_errno($this->curl), curl_error($this->curl)));
        }

        curl_close($this->curl);

        $this->curl = null;

        return json_decode($response);
    }


}
