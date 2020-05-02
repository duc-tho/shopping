<h1 class="display-4 text-center text-primary">Thêm sản phẩm</h1>
<?php if ($data["status"] == 1) { ?>
     <div class="alert alert-success" role="alert">
          Thêm sản phẩm thành công!
     </div>
<?php } ?>
<form action="/admin/addproduct" method="post" class="w-100">
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
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description" rows="3" placeholder="Nhập Mô tả sản phẩm"></textarea>
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
          <input name="picture" type="text" class="form-control" id="picture" placeholder="Nhập Link tới ảnh của sản phẩm"></input>
     </div>
     <div class="form-group">
          <label for="rating">Rating</label>
          <select name="rating" class="form-control" id="rating">
               <option value="null" selected>Chọn đánh giá sản phẩm</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
          </select>
     </div>
     <button name="submit" type="submit" class=" w-100 btn btn-primary">Thêm</button>
</form>