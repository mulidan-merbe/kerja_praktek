<?php

// use GuzzleHttp\Client;

// class Model_Draft extends CI_Model {

//     private $_client;

//     public function __construct()
//     {
//         $this->_client = new Client([
//             'base_uri' => 'http://informatika.untan.ac.id/API/public/dataKP.php?' //alamat Rest Service
            
//         ]);

//     }

//     public function get() 
//     {

//         try {
   
//             $response =  $this->_client->request('GET', 'http://informatika.untan.ac.id/API/public/dataKP.php?',[
//                 'query' => [
//                   'key' => 'MfQE6ej2ffxEKgVx7YXVA3HbHg3d4hRhXyBnRnYgkjwuSaLNW2V5PxeVSKWySUsbbhVyEWVSs'
//                 ]
//             ]);

//             $result = json_decode($response->getBody()->getContents(), true); // data json berubah jadi array

//             return $result;
//         }
//         catch (GuzzleHttp\Exception\ClientException $e) {
//             $response = $e->getResponse();
//             return $response->getStatusCode(). $response->getReasonPhrase();
//         }

//     }



//     public function simpan($data_get) 
//     {
//     	$this->db->insert('tbl_draft', $data_get);
//     }

    


// }

/**
 * 

 */
class Model_Draft extends CI_Model
{
    
    // function __construct(argument)
    // {
    //     # code...
    // }

    public function get()
    {
        $Draft = file_get_contents('http://informatika.untan.ac.id/API/public/dataKP.php?MfQE6ej2ffxEKgVx7YXVA3HbHg3d4hRhXyBnRnYgkjwuSaLNW2V5PxeVSKWySUsbbhVyEWVSs');
        $data = json_decode($Draft, true);
    }
}
