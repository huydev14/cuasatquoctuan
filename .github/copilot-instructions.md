follow this folder structure:

```
quoctuan-metal/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php      # Trang tổng quan Admin
│   │   │   │   ├── ProjectController.php        # CRUD dự án/công trình của ba
│   │   │   │   └── CategoryController.php       # Quản lý danh mục (Cửa sắt, lan can...)
│   │   │   └── Client/
│   │   │       ├── HomeController.php           # Trang chủ phía khách hàng xem
│   │   │       └── ContactController.php        # Xử lý khi khách gửi form yêu cầu
│   └── Models/
│       ├── Category.php                         # Model Danh mục
│       ├── Project.php                          # Model Dự án/Sản phẩm
│       └── Contact.php                          # Model Yêu cầu tư vấn
│
├── database/
│   └── seeders/
│       └── DatabaseSeeder.php                   # Tạo sẵn tài khoản Admin & danh mục mẫu
│
├── public/
│   └── assets/                                  # Chứa logo, icon hoặc ảnh tĩnh cố định
│
├── resources/
│   ├── css/
│   │   └── app.css                              # Cấu hình Tailwind CSS
│   ├── js/
│   │   └── app.js                               # Script khởi tạo Alpine.js (bộ lọc)
│   └── views/
│       ├── layouts/
│       │   ├── client.blade.php                 # Layout chung cho trang chủ của khách
│       │   └── admin.blade.php                  # Layout chung cho trang quản trị (Breeze)
│       │
│       ├── client/                              # Giao diện phía khách hàng
│       │   ├── home.blade.php                   # Trang chủ (Portfolio, Giới thiệu, Liên hệ)
│       │   └── components/
│       │       ├── project-card.blade.php       # Component hiển thị từng ô công trình
│       │       └── contact-form.blade.php       # Component form liên hệ
│       │
│       └── admin/                               # Giao diện quản trị của bạn
│           ├── dashboard.blade.php              # Thống kê nhanh (Số liên hệ mới)
│           ├── projects/
│           │   ├── index.blade.php              # Danh sách công trình của ba
│           │   ├── create.blade.php             # Form thêm công trình mới + upload ảnh
│           │   └── edit.blade.php               # Form sửa thông tin/ảnh
│           └── contacts/
│               └── index.blade.php              # Danh sách khách hàng gửi yêu cầu tư vấn
│
├── routes/
│   ├── web.php                                  # Định nghĩa các Route của hệ thống
│   └── auth.php                                 # Route login/logout của Admin (Breeze tự tạo)
│
└── storage/
    └── app/
        └── public/
            └── projects/                        # Thư mục lưu ảnh công trình ba chụp thực tế
```
