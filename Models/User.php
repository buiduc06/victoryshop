<?php require_once 'BaseModel.php'; 
/**
* 
*/
class User extends BaseModel
{
	
	public $tableName='users';
	public $columns= ['id','Ten','email','password','avatar','level','gender','active'];
}
function getsosp(){
		$getsoSp=TinTuc::sqlbullder(["SELECT COUNT(*) AS sobai FROM tintuc WHERE create_by=$this->id"]);
	return $getsoSp;
}


?>