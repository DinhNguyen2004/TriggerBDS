<?php
// Connect to the database
$connectionOptions = array(
  "Database" => "QUANLYBDS_TEAMSS",
  "Uid" => "sa",
  "PWD" => "123456"
);

$connection = sqlsrv_connect("DESKTOP-ES22IQC", $connectionOptions);

// Check the connection
if ($connection == true) {

  //lấy dữ liệu từ form
  $customerName = $_POST['customerName'];
  $yearOfBirth = $_POST['yearOfBirth'];
  $ssn = $_POST['ssn'];
  $customerAddress = $_POST['customerAddress'];
  $mobile = $_POST['mobile'];
  $propertyID = $_POST['propertyID'];
  $dateOfContract = $_POST['dateOfContract'];
  $price = $_POST['price'];
  $deposit = $_POST['deposit'];
  $remain = $_POST['remain'];
  $status = $_POST['status'];

  // tạo truy vấn insert
   $sql = "INSERT INTO Full_Contract (Customer_Name, Year_Of_Birth, SSN, Customer_Address, Mobile, Property_ID, Date_Of_Contract, Price, Deposit, Remain, Status) VALUES ('$customerName', $yearOfBirth, '$ssn', '$customerAddress', '$mobile', $propertyID,
    '$dateOfContract', $price, $deposit, $remain, $status)";

  // Thực thi truy vấn
  $result = sqlsrv_query($connection, $sql);

  // Check the result
  if ($result) {
      // "Thêm dữ liệu thành công!"; chuyển hướng tới trang xem hợp đồng
      header("Location: viewlistofcontract.php");
  } else {
      echo "Thêm dữ liệu thất bại.";
  }
} else {
  echo "Lỗi kết nối với cơ sở dữ liệu.";
}

$errors = sqlsrv_errors();
if ($errors) {
  echo "Lỗi truy vấn SQL:";
  foreach ($errors as $error) {
    echo "- " . $error['message'] . "\n";
  }
  exit;
}

// Close the connection
sqlsrv_close($connection);


?>