<?php 
if (isset($mggg)!=null) {
?>

<div class="container" style="width: 400px;margin-top: 50px;">
<form action="<?php echo getUrl('updatepasssss')?>" method="POST">
  <div class="form-group">
    <label for="email">Mật Khẩu</label><br><br>
    <input type="password" class="form-control" id="email" name="pws" required>
  </div>
  <br>
  <div class="form-group">
    <label for="email">Nhập Lại Mật Khẩu</label><br><br>
    <input type="password" class="form-control" id="email" name="repws" required>
  </div>
  <br>
  <input type="hidden" name="email" value="<?=$mggg ?>">
  <button type="submit" class="btn btn-default">change Pass</button>
</form>


</div>





 <?php }else{
 	return $this->redirect('index');
 } ?>