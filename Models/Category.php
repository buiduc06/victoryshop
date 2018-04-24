<?php 
require_once 'BaseModel.php'; 
require_once 'User.php'; 
/**
* 
*/
class Category extends BaseModel
{
	
	public $tableName='category';
	public $columns= ['Ten','Hinh','created_by'];

function LayTacGia11(){
	$getnguoitao=User::findOne($this->created_by);
	return $getnguoitao;
}
}

?>