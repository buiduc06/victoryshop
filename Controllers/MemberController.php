<?php 

/**
*
* 
*/
// class admin
require_once 'Models/Category.php';
require_once 'Models/Product.php';
require_once 'Models/User.php';
require_once 'Models/ForgetPassword.php';
require_once 'BaseController.php';
require_once 'Models/ShowInfo.php';
class MemberController extends BaseController
{

	function index(){
		return $this->render("views/member/index.php", [''], 'views/member/member.layout.php');
	}

	function Info(){

		return $this->render("views/member/info.php", [''], 'views/member/member.layout.php');
	}

}

?>