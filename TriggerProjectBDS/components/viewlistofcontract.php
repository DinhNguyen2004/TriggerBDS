<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

  <header>
    <nav>
      <ul>
        <li><img src="https://scontent.fsgn5-2.fna.fbcdn.net/v/t39.30808-6/404419380_3663727797245166_1829159453842213638_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=-w6qzcSxM0sAX_C9R0f&_nc_ht=scontent.fsgn5-2.fna&oh=00_AfA5jwF51kUlOWx6wLqU094zUwF5SAUpA0nqMWkUgbRoLA&oe=6564E6B1" alt=""></a></li>
        <li><a href="#">TRANG CHỦ</a></li>
        <li><a href="#">NHÀ ĐẤT</a></li>
        <li><a href="#">PHÂN TÍCH ĐÁNH GIÁ</a></li>
        <li><a href="#" class="text-primary">HỢP ĐỒNG</a></li>
        <li><a href="#"><p class="login">2S GROUP</p></a></li>
        <li><a href="#"><p class="dangtin">ĐĂNG TIN</p></a></li>
      </ul>
    </nav>

    <nav>
        <!-- Your existing navigation goes here -->
  
        <!-- Additional elements below header -->
        <div class="btn-container">
          <button class="custom-btn bg-info text-white">BÁN</button>
          <button class="custom-btn">THUÊ</button>
        </div>
  
        <div class="search-container">
          <input type="text" class="search-box" placeholder="Search...">
        </div>
  
        <div class="select-container">
          <select class="custom-select">
            <option value="1">Loại nhà đất</option>           
          </select>
          <select class="custom-select">
            <!-- Additional select dropdowns go here -->
            <option value="2">Khu vực</option>
          </select>
          <select class="custom-select">
            <!-- Additional select dropdowns go here -->
            <option value="3">Loại nhà đất</option>
          </select>
          <select class="custom-select">
            <!-- Additional select dropdowns go here -->
            <option value="4">Diện tích</option>
          </select>
          <select class="custom-select">
            <!-- Additional select dropdowns go here -->
            <option value="5">Mức giá</option>
          </select>
        </div>
      </nav>
  </header>

  <div class="content">
    <div class="ct1" style="display:flex;">
        <p id="1" class="text-primary">Perfect Property</p><p> > Danh sách hợp đồng > Loại thanh toán 1 lần</p>
    </div>
    <div class="ct2" style="font-weight: bold;"><p>Danh sách hợp đồng nhà đất Việt Nam năm 2023</p></div>
    <div class="ct3" style="display: flex;"><p style="font-weight: bold;">
        Khu vực miền nam
    </p> <div class="btn4">
        <button>Tìm kiếm hợp đồng</button>
        <button><a href="./addfullcontract.php" style="text-decoration:none; color:white">Thêm hợp đồng</a>
        </button>
        <button>In hợp đồng</button>
        <button>Cập nhật hợp đồng</button></div></div>
  </div>

  <?php
$serverName = "DESKTOP-ES22IQC";
$connectionOptions = array(
    "Database" => "QUANLYBDS_TEAMSS",
    "Uid" => "sa",
    "PWD" => "123456"
);

// $conn = sqlsrv_connect($serverName, $connectionOptions);

// if ($conn) {
//     echo "Kết nối đến SQL Server thành công!";
//     sqlsrv_close($conn); // Đóng kết nối sau khi kiểm tra
// } else {
//     echo "Lỗi kết nối đến SQL Server: " . sqlsrv_errors();
// }

$conn = sqlsrv_connect($serverName, $connectionOptions);
$query = "SELECT * FROM Full_Contract";
$result = sqlsrv_query($conn, $query);
?>


<table>
    <tr>
        <th>STT</th>
        <th>MÃ HỢP ĐỒNG</th>       
        <th>THÔNG TIN KHÁC HÀNG</th>       
        <th>CHI TIẾT HỢP ĐỒNG</th>
        <th>TRẠNG THÁI</th>    
    </tr>
    <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Full_Contract_Code']; ?></td>
            <td><?php echo 'Họ và tên: '.$row['Customer_Name'].
                '<br>Ngày sinh:'.$row['Year_Of_Birth'].
                '<br> CCCD: '.$row['SSN'].               
                '<br> Địa chỉ: '.$row['Customer_Address'].
                '<br> Số địa thoại:'.$row['Mobile']; ?></td>
            <td><?php echo
                'Mã bất động sản: '.$row['Property_ID'].
                '<br> Hạn hợp đồng: '.$row['Date_Of_Contract']->format('Y-m-d').
                '<br> Giá cả: '.$row['Price'].
                '<br> Đầu tư: '.$row['Deposit'].
                '<br> Duy trì: '.$row['Remain']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <!-- Thêm các cột khác tương ứng -->
        </tr>
    <?php } ?>
</table>


<footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3" style="background-color: rgba(0,0,0 0.2);">
        <p>Công ty bất động sản Perfect Property</p>
        <p>@ 2023 Copyright by TeamSS</p>
    </div>
</footer>



  <!-- Your page content goes here -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
