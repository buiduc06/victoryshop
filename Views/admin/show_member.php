


<h2>DANH SÁCH USERS</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Tên</th>
         <th>Avatar</th>
        <th>email</th>
        <th>giới tính</th>
        <th>Cấp độ</th>
<!--         <th>list_price</th> -->
        <th><a href="<?php echo getUrl('admin/adduser')?>">Thêm Thành Viên</a></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $users1 ) { ?>
    <?php if ($users1->gender='1') {
      $users1->gender='Nam';
    }else{
      $users1->gender='nữ';
    } if ($users1->level=='1') {
      $users1->level='Quản Trị Viên';
    }else{
      $users1->level='Thành Viên';
    }?>
      <tr>
        <td><?= $users1->id ?></td>
        <td><a href="chitietbaiviet.php?id=<?=$users1->id ?>" ><?= $users1->Ten ?></a></td>
        <td><a href="chitietbaiviet.php?id=<?=$users1->id ?>" ><img src='<?php echo getUrl("public/images/$users1->avatar") ?>' class="img-thumbnail" alt="Cinque Terre" width="204" height="136"></a></td>
         <td><?= $users1->email ?></td>
        <td><?= $users1->gender ?></td>
<!--         <td><?= $users1->list_price ?></td> -->
        <td><?= $users1->level?></td>
        <td><!-- <a href='<?php echo getUrl("admin/update_users?id=$users1->id"); ?>'>sửa</a> -->
        	<a href='<?php echo getUrl("admin/users_delete?id=$users1->id"); ?>' onclick="return confirm_delete()">Xóa</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>



