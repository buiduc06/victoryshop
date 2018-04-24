<?php 
require_once 'BaseModel.php'; 
require_once 'User.php'; 
/**
* 
*/
class Product extends BaseModel
{
	
	public $tableName='product';
	public $columns= ['Ten','NoiDung','gia','Hinh','idDanhMuc','ShowMain','created_by','created_at'];

	function LayTacGia(){
		$laytac=User::findOne($this->created_by);
		return $laytac;

	}
}


?>