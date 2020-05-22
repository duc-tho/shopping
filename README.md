Mei Shop Website Project
========================
Librarys use in Front End
---------------------------
- Bootstrap
- Font Awsome
- Jquery
- Owl Carousel
- Pace
- Popper
- SweatAlert
- Animate
- ...

*lib Folder [https://drive.google.com/file/d/1EYC6iXvmsZGmtwoZ7cTiNchrOBhAM1BV/view?usp=sharing]

---------------------------
**Route**
---------------------------

- /
  + /home

- /product
  + /product/list
  + /product/list/<Page>
  + /product/detail/<ProductID>
  + /product/category/<CategoryID>
  + /product/category/<CategoryID>/<Page>

- /search/get <POST>

- REQUIRE LOGIN AND ACCESS PERMISSION
  + /admin   
  + /admin/home
  + /admin/product/add
  + /admin/product/edit/<id>
  + /admin/product/del/<id>

- COOKIE Hết hạn 4 tiếng sau khi đăng nhập
  + /auth
  + /auth/login  
  + /auth/logout
  + /auth/register

- SESSION Sẽ bị xóa khi đóng trình duyệt
  + /cart
  + /cart/get 
  + /cart/set [POST]
  + /cart/delete/<id> [POST]

- /search/get/<Keyword> [POST]

- --/user
- --/order


- Chưa hoàn thành
  + [Chi tiết sản phẩm] Đánh giá (Rating) và bình luận sản phẩm
  + [Danh sách sản phẩm] Chưa có bộ lọc
  + [Admin] quản lý Danh mục và User
  + [Thông tin User] 
  + [Đặt hàng]
