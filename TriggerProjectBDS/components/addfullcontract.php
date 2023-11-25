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
        <p id="1" class="text-primary">Perfect Property</p><p> > Danh sách hợp đồng > Thêm hợp đồng</p>
    </div>
    <div class="ct2" style="font-weight: bold;"><p>Thêm hợp đồng dự án</p></div>
    <div class="ct3" style="display: flex;"><p style="font-weight: bold;">
        Điền thông tin chi tiết
    </div>
  
    <div class="info">
    <form action="connect.php" method="post">
  <div class="info1 bg-light text-info">
    THÔNG TIN KHÁCH HÀNG
  </div>
      <label for="customerName">Họ và tên:</label> 
      <input type="text" name="customerName" id="customerName"> <br>
    
      <label for="yearOfBirth">Ngày sinh: </label>
      <input type="text" name="yearOfBirth" id="yearOfBirth"> <br>
    
      <label for="ssn">CCCD: </label>
      <input type="text" name="ssn" id="ssn"> <br>
   
      <label for="customerAddress">Địa chỉ: </label>
      <textarea name="customerAddress" id="customerAddress"></textarea> <br>
    
      <label for="sdt">Số điện thoại: </label>
      <input type="text" name="mobile" id="mobile"> <br>
  
  <div class="info2 bg-light text-info">
    CHI TIẾT HỢP ĐỒNG
  </div>

      
      <label for="mbds">Mã bất động sản: </label>
      <?php
        $connectionOptions = array(
          "Database" => "QUANLYBDS_TEAMSS",
          "Uid" => "sa",
          "PWD" => "123456"
        );
        
        $connection = sqlsrv_connect("DESKTOP-ES22IQC", $connectionOptions);
        
        // Lấy danh sách tất cả các giá trị Property_ID hiện có
        $query = "SELECT ID
        FROM Property";
        
        $result_pro = sqlsrv_query($connection, $query);
        // Tạo một danh sách các giá trị Property_ID
        $propertyID = array();
        while ($row = sqlsrv_fetch_array($result_pro, SQLSRV_FETCH_ASSOC)) {
          $propertyID[] = $row['ID'];
        }
      ?>
      <!-- Đọc mã bất động sản khi bạn muốn thêm hợp đồng cho bất động sản đó. Ví dụ ở dưới là BDS đầu tiên -->
      <input type="text" name="propertyID" id="propertyID" value="<?php echo $propertyID[0]; ?>" readonly> <br>

      <label for="hhd">Hạn hợp đồng: </label>
      <input type="text" name="dateOfContract" id="hhd"> <br>
    
      <label for="price">Giá cả: </label>
      <input type="number" name="price" id="price"> <br>
 
      <label for="invest">Đầu tư: </label>
      <input type="number" name="deposit" id="deposit"> <br>
   
      <label for="remain">Duy trì: </label>
      <input type="number" name="remain" id="remain"> <br>


  <div class="info3 bg-light text-info">
    TRẠNG THÁI
  </div>

 
    <label for="status">Trạng thái: </label>
    <input type="number" name="status" id="status"> <br>
    
    <input type="submit" name="insert" value="Xác nhận hợp đồng"> 
</form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>