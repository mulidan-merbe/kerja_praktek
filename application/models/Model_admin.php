<?php

use GuzzleHttp\Client;

class Model_admin extends CI_Model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'localhost/service_kp/api/', //alamat Rest Service
            'auth' => ['admin', '1234'] // autentikasi
        ]);

    }

    public function getAllMahasiswa() {
        $response =  $this->_client->request('GET', 'mahasiswa', [
            'query' => [
                'X-API-KEY' => 'admin123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }


}
