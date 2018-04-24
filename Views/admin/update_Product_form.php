<?php foreach ($ShowProduct as $ShowProduct1 ) {
 ?>
 
<form action="<?php echo getUrl('admin/create_product_submit') ?>" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
  <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <div class="col-sm-5 col-md-8">
          <h2>Sửa sản phẩm</h2>
          <br>
          <br>
          <!-- form upload thông tin bảng product -->
          <input type="hidden" name="id" value="<?= $ShowProduct1->id ?>">
          <div class="form-group">
            <label class="control-label col-sm-2">Tên</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" value="<?= $ShowProduct1->Ten?>" name="Ten" required>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2">Mô Tả</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="comment" name="MoTa" required><?= $ShowProduct1->NoiDung ?></textarea>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2">Hình</label>
            <div class="col-sm-10">
              <img src='<?php echo getUrl("public/images/$ShowProduct1->Hinh") ?>' width="200px" height="200px">
              <input type="file" class="form-control" id="email" name="hinhanh" >
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2">giá</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="email" value="<?= $ShowProduct1->gia?>" name="gia" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Tác giả</label>
            <div class="col-sm-4">
              <?php $layuss=User::findOne($ShowProduct1->created_by) ?>
              <?php $layuss22=User::where(['id','!=',"$ShowProduct1->created_by"]) ?>
                 
              <select class="form-control" id="sel1" name="created_by">
              <option value="<?=$layuss->id ?>"><?= $layuss->Ten ?></option>
                <!-- vòng lặp lấy ra tác giả của product -->
<?php foreach ($layuss22 as $layuss23 ) {
?>

   <option value="<?=$layuss23->id ?>"><?= $layuss23->Ten ?></option>
                                          <?php } ?>    
              </select>
            </div>
          </div>

    
    <div class="form-group">
            <label class="control-label col-sm-2">Danh Mục</label>
            <div class="col-sm-4">
              <?php $laycatem=Category::findOne($ShowProduct1->idDanhMuc) ?>
              <?php $laycate2=Category::where(['id','!=',"$ShowProduct1->idDanhMuc"]) ?>
              <select class="form-control" id="sel1" name="DanhMuc">
              <option value="<?= $laycatem->id ?>"><?= $laycatem->Ten ?></option>
                <!-- vòng lặp lấy ra tác giả của product -->
                <?php foreach ($laycate2 as $laycate3) { ?>
                <option value="<?=$laycate3->id ?>"><?=$laycate3->Ten ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

            <div class="form-group">
            <label class="control-label col-sm-2">Tùy Chọn Hiển Thị</label>
            <div class="col-sm-6">
              <select class="form-control" id="sel1" name="ShowMain">
              
                <option value="1">sản phẩm mới</option>
                <option value="2">sản phẩm xem nhiều</option>
                <option value="3">sản phẩm Bán chạy</option>
                <option value="4">sản phẩm HOT</option>

       
              </select>
            </div>
          </div>

        <br>
      
      <div class="form-group">
        <label class="control-label col-sm-2"></label>
        <div class="col-sm-10">
          <button type="submit" class="btn btn-success" name="ok_upload">Submit</button>
        </div>
      </div>
</div>
</div>

    </div>

  </form>


  <?php 
  } ?>