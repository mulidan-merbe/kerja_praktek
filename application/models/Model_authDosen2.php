

<?php

use GuzzleHttp\Client;

class Model_authDosen2 extends CI_Model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://spota.untan.ac.id/steven/API/'
        ]);

    }

    public function getDosen($username, $password) {

        try {
   
            $response =  $this->_client->request('POST', 'login.php?dosen', [
                'form_params' => [
                    'username' => $username,
                    'password' => $password
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true); // data json berubah jadi array

            return $result;
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $response->getStatusCode(). $response->getReasonPhrase();
        }

    }

   


}
