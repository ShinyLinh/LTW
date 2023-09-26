<?php
function get_categories() {
    // Kết nối đến cơ sở dữ liệu
    $db = new PDO('mysql:host=localhost;dbname=my_guitar_shop1', 'root', '');
    
    // Truy vấn danh sách các danh mục
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $categories = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    
    // Đóng kết nối và trả về kết quả
    $db = null;
    return $categories;
}

function get_category_name($category_id) {
    // Kết nối đến cơ sở dữ liệu
    $db = new PDO('mysql:host=localhost;dbname=my_guitar_shop1', 'root', '');
    
    // Truy vấn tên của danh mục có ID tương ứng
    $query = 'SELECT * FROM categories WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->execute(['category_id' => $category_id]);
    $category = $statement->fetch(PDO::FETCH_ASSOC);
    
    // Đóng kết nối và trả về kết quả
    $db = null;
    return $category['categoryName'];
}
?>