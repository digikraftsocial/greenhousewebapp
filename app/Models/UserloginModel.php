<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserloginModel extends Model{
    protected $table = 'tbl_userpermission';

	protected $primaryKey = 'col_userpermid';

	protected $returnType = 'array';
    
    protected $allowedFields = ['col_userpermid','col_statusflag','col_createddatetime','col_usertype','col_username','col_userpass','col_name','col_number'];
}

?>