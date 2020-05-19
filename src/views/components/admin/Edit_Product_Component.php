<h1 class="display-4 text-center text-primary">Sửa sản phẩm</h1>

<?php
$productItem = $data["productData"];
$name = $productItem["ProductName"];
$id = $productItem["ProductID"];
$cateId = $productItem["CateID"];
$price = $productItem["Price"];
$description = $productItem["Description"];
$picture = $productItem["Picture"];
$discount = $productItem["Discount"];
$quantily = $productItem["Quantily"];
$rating = $productItem["Rating"];
?>

<?php if ($data['status'] != "") { ?>
     <div class="alert alert-danger" role="alert">
          <?php echo $data['status']; ?>
     </div>
<?php } ?>

<form onsubmit="getDescriptionData();" action="/admin/product/edit/<?php echo $id; ?>" method="post" class="w-100 py-4" enctype="multipart/form-data">
     <div class="form-group">
          <label for="name">Product Name</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" value="<?php echo $name; ?>">
     </div>
     <div class="form-group">
          <label for="cateId">CateID</label>
          <select name="cateId" class="form-control" id="cateId">
               <option value="null" selected>Chọn loại sản phẩm</option>
               <?php foreach ($data["category"] as $item) { ?>
                    <option value="<?php echo $item["CateID"] ?>" <?php if ($item["CateID"] == $cateId) echo "selected"; ?>><?php echo $item["CategoryName"] ?></option>
               <?php } ?>
          </select>
     </div>
     <div class="form-group">
          <label for="quantily">Quantily</label>
          <input name="quantily" type="number" min="0" class="form-control" id="quantily" placeholder="Nhập định lượng" value="<?php echo $quantily ?>">
     </div>
     <div class="form-group">
          <label for="editor">Description</label>
          <div id="editor"></div>
          <input type="text" id="description" name="description" class="d-none">
     </div>
     <div class="form-group">
          <label for="price">Price</label>
          <input name="price" type="number" min="0" class="form-control" id="price" placeholder="Nhập giá sản phẩm" value="<?php echo $price ?>"></input>
     </div>
     <div class="form-group">
          <label for="discount">Discount</label>
          <input name="discount" type="number" min="0" max="100" class="form-control" id="discount" placeholder="Nhập phần trăm giảm giá cho sản phẩm" value="<?php echo $discount ?>"></input>
     </div>
     <div class="form-group">
          <label for="picture">Picture</label>
          <div>
               <img class="mb-3" src="<?php echo $picture ?>" alt="Ảnh mô tả sản phẩm <?php echo $name ?>" height="300px;">
          </div>
          <div class="custom-file">
               <input name="picture" type="file" class="custom-file-input" id="picture" style="cursor: pointer;" accept="image/*">
               <label class="custom-file-label" for="customFile">Click vào để tải lên ảnh mới cho sản phẩm</label>
          </div>
     </div>
     <div class="form-group">
          <label for="rating">Rating</label>
          <input name="rating" type="number" min="0" max="5" step="0.1" class="form-control" id="rating" placeholder="Chọn đánh giá sản phẩm" value="<?php echo $rating ?>"></input>
     </div>
     <button name="submit" type="submit" class=" w-100 btn btn-primary">Sửa</button>
</form>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="/public/js/quill-option.js"></script>
<script src="/public/js/admin-product.js"></script>
<script>
     editor.setContents(JSON.parse(`<?php echo str_replace("\\n", "\\\\n", $description) ?>`));
</script>