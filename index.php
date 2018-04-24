<?php
session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');
$url = isset($_GET['url']) == true ? $_GET['url'] : "/";

// lấy ra url gốc của project
// function getUrl($path = ""){
// 	$currentUrlpath = $GLOBALS['url'];


// 	$absoluteUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// 	$absoluteUrl = explode('?', $absoluteUrl, 2);
// 	if($currentUrlpath != "/"){
// 		$absoluteUrl = str_replace("$currentUrlpath", "", $absoluteUrl);
// 	}
// 	$absoluteUrl = "http://localhost/www/HaBeo/";
// 	return $absoluteUrl.$path;
// }
function getUrl($path = ""){
	$currentUrlpath = $GLOBALS['url'];

	$absoluteUrl = strtok("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",'?');

	if($currentUrlpath != "/"){
		$absoluteUrl = str_replace("$currentUrlpath", "", $absoluteUrl);
	}

	return $path == "/" ? $absoluteUrl : $absoluteUrl.$path;
}



require_once 'controllers/HomeController.php';
require_once 'controllers/AdminController.php';

require_once 'controllers/DeleteController.php';
require_once 'controllers/MemberController.php';



switch ($url) {
	case "index":
	$ctl = new HomeController();
	echo $ctl->Index();
	break;
	case "/":
	$ctl = new HomeController();
	echo $ctl->Index();
	break;

	case "about":
	$ctl = new HomeController();
	echo $ctl->About();
	break;

	case "contact":
	$ctl = new HomeController();
	echo $ctl->Contact();
	break;

	case "category":
	$ctl = new HomeController();
	echo $ctl->category();
	break;

	case "login":
	$ctl = new HomeController();
	echo $ctl->Login();
	break;

	case "signup":
	$ctl = new HomeController();
	echo $ctl->SignUp();
	break;
	case "signup-submit":
	$ctl = new HomeController();
	echo $ctl->SignUpSubmit();
	break;

	case "login-submit":
	$ctl = new HomeController();
	echo $ctl->LoginSubmit();
	break;
	case "logout":
	require_once 'views/logout.php';
	break;

	case "chitietdanhmuc":
	$ctl = new HomeController();
	echo $ctl->showcategory();
	break;

	case "chitietsp":
	$ctl = new HomeController();
	echo $ctl->showProduct();
	break;


// admin
// 
	case "admin":
	$ctl = new AdminController();
	echo $ctl->index();
	break;
	case "admin/":
	$ctl = new AdminController();
	echo $ctl->index();
	break;
	case "admin/admin":
	$ctl = new AdminController();
	echo $ctl->index();
	break;
	case "admin/index":
	$ctl = new AdminController();
	echo $ctl->index();
	break;

	case "admin/show-oder":
	$ctl = new AdminController();
	echo $ctl->ShowOder();
	break;

	case "admin/category":
	$ctl = new AdminController();
	echo $ctl->Category();
	break;

	case "admin/show-member":
	$ctl = new AdminController();
	echo $ctl->ShowMember();
	break;

	case "admin/category_create":
	$ctl = new AdminController();
	echo $ctl->CreateCategory();
	break;
	case "admin/update_category":
	$ctl = new AdminController();
	echo $ctl->UpdateCategory();
	break;

	case "admin/create_category_submit":
	$ctl = new AdminController();
	echo $ctl->CreateCategorySubmit();
	break;

	case "admin/category_edit":
	$ctl = new AdminController();
	echo $ctl->UpdateCategory();
	break;

	case "admin/category_delete":
	$ctl = new DeleteController();
	echo $ctl->Deletecategory();
	break;

	case "admin/create_product":
	$ctl = new AdminController();
	echo $ctl->CreateProduct();
	break;

	case "admin/create_product_submit":
	$ctl = new AdminController();
	echo $ctl->CreateProductSubmit();
	break;
	case "admin/update_Product_form":
	$ctl = new AdminController();
	echo $ctl->UpdateFormProduct();
	break;
	case "admin/Delete_product":
	$ctl = new DeleteController();
	echo $ctl->Deleteproduct();
	break;

	case "admin/users_delete":
	$ctl = new DeleteController();
	echo $ctl->DeleteUsers();
	break;

	case "admin/security":
	$ctl = new AdminController();
	echo $ctl->Security();
	break;

	case "admin/blockUser":
	$ctl = new AdminController();
	echo $ctl->blockUser();
	break;

	case "admin/adduser":
	$ctl = new AdminController();
	echo $ctl->addUser();
	break;

	case "admin/CapQuyen":
	$ctl = new AdminController();
	echo $ctl->CapQuyenuse();
	break;

	case "sendmail":
	require_once 'Controllers/sendmail.php';
	break;

	case "ResetPassword":
	$ctl = new AdminController();
	echo $ctl->ResetPassword();
	break;

	case "resetpw-submit":
	$ctl = new AdminController();
	echo $ctl->ResetPwSubmit();
	break;
	
	case "ChangePW":
	$ctl = new AdminController();
	echo $ctl->ChangePW();
	break;

	case "updatepasssss":
	$ctl = new AdminController();
	echo $ctl->updatepasssss();
	break;

	case "member":
	$ctl = new MemberController();
	echo $ctl->index();
	break;

	case "member/index":
	$ctl = new MemberController();
	echo $ctl->index();
	break;

	case "member/info":
	$ctl = new MemberController();
	echo $ctl->Info();
	break;


	case "add-to-cart":
	$ctl = new HomeController();
	echo $ctl->AddToCard();
	break;




	

	default:
	$msg = "Trang bạn tìm kiếm không có thật. Vui lòng liên hệ với ban quản trị.";
	require_once 'views/not-found.php';
	break;
}


?>


