<?php 

	$id=$_SESSION['id'];
	$layinfo=User::findOne($id);
 ?>

<style type="text/css" media="screen">
	table tr td{
		font-size: 20px;
		padding-right: 20px;
		padding-top: 20px;
	}
</style>
 <div class="container" style="width: 600px;">
 	<center><h2>Thông Tin</h2></center>
 	<br><br>
 	<table>
 		
 	<tr>
 		<td><b>Tên Hiển Thị: </b></td>
 		<td><i><?=$layinfo->Ten ?></i></td>
 	</tr>

	<tr>
 		<td><b>ảnh Đại Diện </b></td>
 		<td><img src="../public/images/apple.PNG" alt=""></td>
 	</tr>
	
 	<tr>
 		<td><b>Địa chỉ email:</b></td>
 		<td><i><?= $layinfo->email ?></i></td>
 	</tr>


 	<tr>
 		<td><b>Số Điện thoại:</b></td>
 		<td><i>null</i></td>
 	</tr>

 	<tr>
 		<td><b>Địa Chỉ: </b></td>
 		<td><i>null</i></td>
 	</tr>

 	</table>



 </div>