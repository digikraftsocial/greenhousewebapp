<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ProfileController extends BaseController
{
    
    // private $session = '' ;
    // public function __construct(){
      
    //     $this->session = session();  

    // }
            

    public function index()
    {
        echo "Hello : ".$this->session->get('name');
    }
}

?>