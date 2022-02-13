<?php

use GuzzleHttp\Client;

class Model_Draft extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://informatika.untan.ac.id/API/public/dataKPbyNIM.php',
            // 'base_uri' => 'localhost/service_kp/api/', //alamat Rest Service
            // 'auth' => ['admin', '1234'] // autentikasi
        ]);
    }

    public function getMahasiswa($nim)
    {

        try {

            $response =  $this->_client->request('GET', 'dataKPbyNIM.php', [
                'query' => [
                    'key' => 'MfQE6ej2ffxEKgVx7YXVA3HbHg3d4hRhXyBnRnYgkjwuSaLNW2V5PxeVSKWySUsbbhVyEWVSs',
                    'nim' => $nim
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true); // data json berubah jadi array

            return $result;
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $response->getStatusCode() . $response->getReasonPhrase();
        }
    }
}
