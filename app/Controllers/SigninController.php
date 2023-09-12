<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserloginModel;
  
class SigninController extends BaseController
{
    
    private $userloginModel = '' ;
    // private $session = '' ;
    public function __construct(){
      
        // $this->session = session();  
        $this->userloginModel = new UserloginModel();  
            
    }

    public function index()
    {
        // helper(['form']);
        if (session()->get('isLoggedIn'))
        {
            return redirect()
                ->to('/profile');
                
        }
        else{
            return view('signin');
        }
    } 
  
    public function loginAuth()
    {
        // $session = session();
        // $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        // $data = $this->userloginModel->where('col_username', $email)->first();
        
        $data_array = array('col_username' => $email,'col_statusflag' => 1) ;
        $data = $this->userloginModel->where($data_array )->first();
        
        if($data){
            $pass = $data['col_userpass'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['col_userpermid'],
                    'name' => $data['col_name'],
                    'email' => $data['col_userpass'],
                    'isLoggedIn' => TRUE
                ];
                $this->session->set($ses_data);
                $this->session->set('emails', '');
                // return redirect()->to('/profile');
                return $this->response->redirect(base_url('/profile'));
            
            }else{
                $this->session->setFlashdata('msg', 'Password is incorrect.');
                // $session->setFlashdata('emails', $email);
                $this->session->set('emails', $email);
                // return redirect()->to('/signin');
                return $this->response->redirect(base_url('/signin'));
            }
        }else{
            $this->session->setFlashdata('msg', 'Email does not exist.');
            // $session->setFlashdata('emails', $email);
            $this->session->set('emails', '');
            // return redirect()->to('/signin');
            return $this->response->redirect(base_url('/signin'));
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return $this->response->redirect(base_url()); 
    }
}