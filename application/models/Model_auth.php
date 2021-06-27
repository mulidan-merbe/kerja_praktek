<?php

use GuzzleHttp\Client;

class Model_auth extends CI_Model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'localhost/service_kp/api/', //alamat Rest Service
            'auth' => ['admin', '1234'] // autentikasi
        ]);

    }

    public function getAdmin($username, $password) {

        try {
   
            $response =  $this->_client->request('GET', 'admin', [
                'query' => [
                    'X-API-KEY' => 'admin123',
                    'Username' => $username,
                    'Password' => $password
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true); // data json berubah jadi array

            return $result['data'][1];
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $response->getStatusCode(). $response->getReasonPhrase();
        }

    }

    public function getDosen($username, $password) {

        try {
            $response =  $this->_client->request('GET', 'dosen', [
                'query' => [
                    'X-API-KEY' => 'admin123',
                    'Username' => $username,
                    'Password' => $password
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);

            return $result['data'][0];
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $response->getStatusCode();
        }

       
    }

    public function getMahasiswa($Username, $password) {
        try {
            $response =  $this->_client->request('GET', 'mahasiswa', [
                'query' => [
                    'X-API-KEY' => 'admin123',
                    'Username' => $Username,
                    'Password' => $password
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);

            return $result['data'][0];
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $response->getStatusCode(). $response->getReasonPhrase();
        }

    }

     public function getbyMahasiswa($NIM, $Password) {
        try {
            $response =  $this->_client->request('GET', 'mahasiswa', [
                'query' => [
                    'X-API-KEY' => 'admin123',
                    'NIM' => $NIM,
                    'Password' => $Password
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);

            return $result['data'][0];
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $response->getStatusCode(). $response->getReasonPhrase();
        }

    }


}
