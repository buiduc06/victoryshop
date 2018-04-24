<script>
  function confirm_chage() {
    if (confirm("bạn có chắc chắn muốn cấp quyền cho user này?")) {
      var x=document.getElementById('changeq').value;
      var n=document.getElementById('idcapq').value;
       window.location="<?php echo getUrl('admin/CapQuyen?idlv=') ?>"+x+"&id="+n;
      return true;

    } else {
      return false;
    }
  }
</script>

<h2>Settings</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Tên</th>

        <th>email</th>
        <th>Số sản phẩm</th>
        <th>Cấp độ</th>
        <th>Trạng Thái</th>
        <th>Phân Quyền</th>
        <th>Block/Active</th>
<!--         <th>list_price</th> -->
      </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $users1 ) { ?>
    <?php $demsobai=Product::sqlbullder(["SELECT count(*) As sobai From product where created_by=$users1->id "]) ?>
    <?php 
   if ($users1->level=='1') {
      $users1->name='Quản Trị Viên';
    }else{
      $users1->name='Thành Viên';
    }?>
      <tr>
        <td><?= $users1->id ?></td>
        <td><?= $users1->Ten ?></td>
        <?php foreach ($demsobai as $demsobai1) {
        } ?>
         <td><?= $users1->email ?></td>
        <td><?= $demsobai1->sobai?></td>
<!--         <td><?= $users1->list_price ?></td> -->
        <td><?= $users1->name?></td>
        <td>
        <?php if ($users1->active=='1'): ?>
          Đang Hoạt Động
        <?php else: ?>
          Đã Bị Khóa
        <?php endif ?>
        </td>
        <td>
       <?php if ($users1->level=='1'): ?>
        <form action="<?php echo getUrl('admin/CapQuyen') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $users1->id ?>">
            <input type="hidden" name="idaccess" value="2">
            <button type="submit" class="btn btn-danger btn-sm">Xóa Quyền Quản Trị</button>
        </form>
           <?php else: ?>
            <form action="<?php echo getUrl('admin/CapQuyen') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $users1->id ?>">
            <input type="hidden" name="idaccess" value="1">
             <button type="submit" class="btn btn-warning btn-sm">Cấp Quyền Quản Trị</button>
             </form>
           <?php endif ?>    

        </td>
        <td>
        <?php if ($users1->active=='1'): ?>
        <form action="<?php echo getUrl('admin/blockUser') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $users1->id ?>">
            <input type="hidden" name="idactive" value="0">
            <button type="submit" class="btn btn-danger btn-sm ">Khóa <span class="glyphicon glyphicon-lock"></span></button>
        </form>
           <?php else: ?>
            <form action="<?php echo getUrl('admin/blockUser') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $users1->id ?>">
            <input type="hidden" name="idactive" value="1">
             <button type="submit" class="btn btn-info btn-sm">Mỏ Khóa</button>
             </form>
           <?php endif ?>    


        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>


