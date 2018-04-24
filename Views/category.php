
<div class="container" style="background: #eee;height: 700px;">
  <div class="tit-boxmain">
    <h3 style="margin-left: 300px;margin-top: 30px"><span>VUI LÒNG LỰA CHỌN THƯƠNG HIỆU SẢN PHẨM BẠN MUỐN MUA</span></h3>
  </div>
  <br>
  <br>
  <br>
  <br>
  <div>
    <?php foreach ($allCate as $allCate ) {
   ?>
  <a href='<?php echo getUrl("chitietdanhmuc?id=$allCate->id") ?>' ><div class="logo1"><p><?= $allCate->Ten?></p><img src="public/images/<?= $allCate->Hinh?>" alt=""></div></a>
<?php } ?>
</div>
</div>




<br>
<br>
<br>
<br>
<br>

