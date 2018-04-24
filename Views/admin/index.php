


<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<h2>DANH SÁCH SẢN PHẨM</h2>

<table class="table table-striped" id="example" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>#</th>
      <a style="background-image: none;"><th>Tên Sản Phẩm</th></a>
      <th>Hình</th>
      <th>Mô Tả</th>
      <th>giá</th>
      <!--         <th>list_price</th> -->
      <th>Người Tạo</th>
      <th><a href="<?php echo getUrl('admin/create_product') ?>">Thêm Sản Phẩm </a></th>
    </tr>
  </thead>

  <tbody>
    <?php $idd=1; foreach ($product as $product1 ) { ?>
    <tr>
      <td><?= $idd++; ?></td>
      <td><a href="chitietbaiviet.php?id=<?=$product1->id ?>" ><?= $product1->Ten ?></a></td>
      <td><a href="chitietbaiviet.php?id=<?=$product1->id ?>" ><img src='<?php echo getUrl("public/images/$product1->Hinh") ?>' class="img-thumbnail" alt="Cinque Terre" width="104" height="36"></a></td>
      <td><?= $product1->NoiDung ?></td>
      <td><?= $product1->gia ?></td>
      <!--         <td><?= $product1->list_price ?></td> -->
      <td><?= $product1->LayTacGia()->Ten?></td>
      <td><a href='<?php echo getUrl("admin/update_Product_form?id=$product1->id") ?>'>sửa</a>
       <a href='<?php echo getUrl("admin/Delete_product?id=$product1->id") ?>' onclick="return confirm_delete()">Xóa</a></td>
     </tr>
     <?php } ?>
   </tbody>
 </table>



