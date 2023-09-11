<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy dữ liệu từ biểu mẫu
  $productDescription = $_POST["product_description"];
  $listPrice = $_POST["list_price"];
  $discountPercent = $_POST["discount_percent"];

  // Kiểm tra và xử lý dữ liệu
  if (!empty($productDescription) && is_numeric($listPrice) && is_numeric($discountPercent)) {
    // Tính giá sau khi giảm giá
    $discountAmount = $listPrice * ($discountPercent / 100);
    $salePrice = $listPrice - $discountAmount;

    // Hiển thị kết quả
    echo "Mô tả sản phẩm: " . $productDescription . "<br>";
    echo "Giá niêm yết: " . number_format($listPrice) . " VND" . "<br>";
    echo "Tỷ lệ giảm giá: " . $discountPercent . "%" . "<br>";
    echo "Giá sau khi giảm giá: " . number_format($salePrice) . " VND" . "<br>";
  } else {
    echo "Vui lòng nhập đầy đủ thông tin và đúng định dạng.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Discount Calculator</title>
</head>
<body>
  <h1>Product Discount Calculator</h1>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="product_description">Mô tả sản phẩm:</label>
    <input type="text" name="product_description" id="product_description" required><br>

    <label for="list_price">Giá niêm yết:</label>
    <input type="number" name="list_price" id="list_price" required><br>

    <label for="discount_percent">Tỷ lệ giảm giá (%):</label>
    <input type="number" name="discount_percent" id="discount_percent" required><br>

    <input type="submit" value="Tính giảm giá">
  </form>
</body>
</html>