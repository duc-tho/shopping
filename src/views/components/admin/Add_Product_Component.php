<h1 class="display-4 text-center text-primary">Thêm sản phẩm</h1>

<?php if ($data['status'] != "") { ?>
     <div class="alert alert-danger" role="alert">
          <?php echo $data['status']; ?>
     </div>
<?php } ?>

<form onsubmit="getDescriptionData();" action="/admin/product/add" method="post" class="w-100 py-4" enctype="multipart/form-data">
     <div class="form-group">
          <label for="name">Product Name</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
     </div>
     <div class="form-group">
          <label for="cateId">CateID</label>
          <select name="cateId" class="form-control" id="cateId">
               <option value="null" selected>Chọn loại sản phẩm</option>
               <?php foreach ($data["category"] as $item) { ?>
                    <option value="<?php echo $item["CateID"] ?>"><?php echo $item["CategoryName"] ?></option>
               <?php } ?>
          </select>
     </div>
     <div class="form-group">
          <label for="quantily">Quantily</label>
          <input name="quantily" type="number" min="0" class="form-control" id="quantily" placeholder="Nhập định lượng">
     </div>
     <div class="form-group">
          <label for="editor">Description</label>
          <div id="editor"></div>
          <input type="text" id="description" name="description" class="d-none">
     </div>
     <div class="form-group">
          <label for="price">Price</label>
          <input name="price" type="number" min="0" class="form-control" id="price" placeholder="Nhập giá sản phẩm"></input>
     </div>
     <div class="form-group">
          <label for="discount">Discount</label>
          <input name="discount" type="number" min="0" max="100" class="form-control" id="discount" placeholder="Nhập phần trăm giảm giá cho sản phẩm"></input>
     </div>
     <div class="form-group">
          <label for="picture">Picture</label>
          <div class="custom-file">
               <input name="picture" type="file" class="custom-file-input" id="picture" style="cursor: pointer;" accept="image/*">
               <label class="custom-file-label" for="customFile">Click vào để tải lên ảnh sản phẩm</label>
          </div>
     </div>
     <div class="form-group">
          <label for="rating">Rating</label>
          <input name="rating" type="number" min="0" max="5" step="0.1" class="form-control" id="rating" placeholder="Chọn đánh giá sản phẩm"></input>
     </div>
     <button name="submit" type="submit" class=" w-100 btn btn-primary">Thêm</button>
</form>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="/public/js/quill-option.js"></script>
<script src="/public/js/admin-product.js"></script>