<?php 
require_once 'lib/PHPMailer/src/Exception.php';
require_once 'lib/PHPMailer/src/PHPMailer.php';
require_once 'lib/PHPMailer/src/SMTP.php';
require_once 'BaseController.php';
require_once 'Models/BaseModel.php';
require_once 'Models/ForgetPassword.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_GET['token'])) {
	$token=$_GET['token'];
$checktoken1=ForgetPassword::where(['token',"$token"]);
if (!empty($checktoken1)) {
foreach ($checktoken1 as $checktoken ) {
}
    // phần config mail
		$tkkk=$token;
		$toemail1=$checktoken->email;
		$token="http://localhost/www/habeo/ChangePW?token=$tkkk";


		$mail = new PHPMailer(true);
$email = "buiduc1998@gmail.com"; // email nhan 
$name = "DUC POLY"; // ten ng nhan

$email_from = 'buiduc1998@gmail.com'; // email gui va nhan reply
$name_from = 'duc dz';
//Send mail using gmail
// if($send_using_gmail){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "ducpoly10@gmail.com"; // GMAIL username
    $mail->Password = "11556677"; // GMAIL password
// }

//Typical mail data
    $mail->isHTML(true);
    $mail->AddAddress('ducbnph05034@fpt.edu.vn','ducdzzz');
    $mail->SetFrom($email_from, $name_from);
    $mail->Subject = 'cai dat lai mat khau tai khoan htshop';
    $mail->Body = "

    <!DOCTYPE html>
    <html>
    <head>
    <title></title>

    <style type='text/css'>
		#wpp{
    margin: auto;
    width: 576px;
    height: 302px;
    border: 2px double #F3821F;
}
		#wpp p{
text-align: left;
color: black;
font-family: Arial;
font-size: 16px;
margin: 1em;
text-align: justify;
}
		#wpp button{
font-size: 14px;
width: 120px;
height: 40px;
background: #F3821F;
border: none;
border-radius: 5px;
margin-left: 210px;


}
		#wpp button a{
color: white;
text-decoration: none;
}
</style>
</head>
<body>

<table>
<div id='wpp'>
<p>
HTSHOP xin thông báo, để cài đặt lại mật khẩu cho tài khoản HTshop, Quý khách vui lòng ấn vào nút dưới đây. Nếu quý khách không yêu cầu cài đặt lại mật khẩu, vui lòng bỏ qua bước này.</p>
<br>
<button type='submit'><a href='$token' >Tạo Mật Khẩu</a></button>
<br><br>
<p>xin lưu ý Token chỉ tồn tại trong vòng 24h</p>
<p>Cảm ơn Quý khách đã tham gia cùng TinTuc24h</p>
<p style='float: right;'>Trân trọng !</p>
</div>
</table>

</body>
</html>

";
// $mail->addAttachment('./uploads/img1.jpg'); 

try{
	$mail->Send();
	header('location: index?sendmail=successs');
} catch(Exception $e){
    //Something went bad
	header('location: index?sendmail=successs');
}
}else{
	header("location: index?sendmail=2");

}
}else{
	header("location: sendmail?token=1");
}

?>