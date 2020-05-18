<?php
$productList = $data["product"];
?>

<div class="row">
  <div class="col-md-10">
    <h1 class="text-success font-weight-light my-4">Danh sách sản phẩm</h1>
  </div>
  <div class="col-md-2 d-flex justify-content-end align-items-center">
    <a href="/admin/product/add" class="btn btn-primary">Thêm sản phẩm</a>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th style="width: 20px;">ID</th>
        <th style="width: 200px;">Tên sản phẩm</th>
        <th>ID Danh Mục</th>
        <th>Số Lượng</th>
        <th>Giá</th>
        <th style="width: 150px;">Ảnh</th>
        <th>Đánh Giá</th>
        <th>Giảm Giá</th>
        <th style="width: 134px;"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($productList as $productItem) {
        $id = $productItem["ProductID"];
        $cateId = $productItem["CateID"];
        $name = $productItem["ProductName"];
        $price = $productItem["Price"];
        $description = $productItem["Description"];
        $picture = $productItem["Picture"];
        $discount = $productItem["Discount"];
        $quantily = $productItem["Quantily"];
        $rating = $productItem["Rating"];
      ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $cateId; ?></td>
          <td><?php echo $quantily; ?></td>
          <td><?php echo $price; ?></td>
          <td><img src="<?php echo $picture; ?>" height="100px"></td>
          <td><?php echo $rating; ?></td>
          <td><?php echo $discount; ?></td>
          <td>
            <a href="/admin/product/delete/<?php echo $id; ?>" class="my-1 text-light btn btn-danger">Xóa</a>
            <a href="/admin/product/edit/<?php echo $id; ?>" class="my-1 text-light btn btn-info">Sửa</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>