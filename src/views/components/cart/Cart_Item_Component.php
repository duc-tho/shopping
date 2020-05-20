<?php
$allProductTotal = 0;
?>

<div class="container-fluid my-4">
     <div class="row">
          <div class="col-12">
               <div class="table-responsive">
                    <table class="table table-striped">
                         <thead class="thead-dark">
                              <tr>
                                   <th scope="col" colspan="2">Tên sản phẩm</th>
                                   <th scope="col" class="text-center">Còn lại</th>
                                   <th scope="col" class="text-center" style="width: 100px;">Số lượng</th>
                                   <th scope="col" class="text-right">Đơn giá</th>
                                   <th scope="col" class="text-right">Thành tiền</th>
                                   <th style="width: 35px;"></th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($data['productList'] as $productItem) {
                                   $id = $productItem["ProductID"];
                                   $name = $productItem["ProductName"];
                                   $price = $productItem["Price"];
                                   $picture = $productItem["Picture"];
                                   $remain = $productItem["Quantily"];
                                   $discount = $productItem["Discount"];
                                   $quantily = $productItem["count"];
                                   $saleOff = $price - $price * ($discount / 100);
                                   $total = $saleOff * $quantily;
                                   $allProductTotal += $total;
                              ?>
                                   <tr>
                                        <td style="width: 50px;"><img height="100px" src="<?php echo $picture ?>" /> </td>
                                        <td style="width: 200px;"><a href="product/detail/<?php echo $id ?>"><?php echo $name ?></a></td>
                                        <td class="text-center"><?php echo $remain ?></td>
                                        <td><input disabled onKeyDown="return false" class="form-control" type="number" min="1" max="<?php echo $remain ?>" value="<?php echo $quantily ?>" /></td>
                                        <td class="text-right"><?php echo number_format($saleOff, 0, ",", ".") . " đ" ?></td>
                                        <td class="text-right"><?php echo number_format($total, 0, ",", ".") . " đ" ?></td>
                                        <td class="text-right">
                                             <button onclick="sendDelete();" id="btnDeleteFromCart" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                   </tr>
                              <?php } ?>
                              <tr class="bg-secondary text-light">
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td class="text-right font-weight-bold">Tổng cộng</td>
                                   <td class="text-right"><?php echo number_format($allProductTotal, 0, ",", ".") . " đ" ?></td>
                                   <td></td>
                              </tr>
                         </tbody>
                    </table>
               </div>
          </div>
          <div class="col mb-2">
               <div class="row">
                    <div class="col-sm-12 col-md-6">
                         <a href="/" class="btn btn-block btn-primary">Mua tiếp</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                         <a href="#" class="btn btn-block btn-success text-uppercase">Thanh toán</a>
                    </div>
               </div>
          </div>
     </div>
</div>