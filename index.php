<!-- test sang -->

<?php
require_once './config/pdo.php';
require_once './Admin/resources/category/CategoryFunction.php';
require_once './Admin/resources/user/UserFunction.php';
require_once './Admin/resources/product/ProductFunction.php';
require_once './Admin/resources/Type/TypeFunction.php';

$db = new connect();
$user = new UserFunction();
$category = new Categories();
$product = new ProductFunction();
$type = new Type();

//require('./admin/core/function.php');
//require('./client/core/FunctionClient.php');

if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {
        case 'login':
            include './admin/auth/login.admin.php';
            break;
        case 'register':
            include './admin/auth/register.admin.php';
            break;
        case 'admin':
            switch ($_GET['action']) {
                case 'Dashboard':
                    include './Admin/resources/admin/dashboard.php';
                    break;
                    // products
                case 'listpro':
                    include './admin/resources/product/ProductList.php';
                    break;
                case 'addpro':
                    include './admin/resources/product/ProductAdd.php';
                    break;
                case 'editpro':
                    include './admin/resources/product/ProductEdit.php';
                    break;
                    //category
                case 'listcate':
                    include './admin/resources/category/CategoryList.php';
                    break;
                case 'addcate':
                    include './admin/resources/category/CategoryAdd.php';
                    break;
                case 'editcate':
                    include './admin/resources/category/CategoryEdit.php';
                    break;
                    // comment
                case 'commentList':
                    include './Admin/resources/comment/CommentList.php';
                    break;
                case 'commentDetail':
                    include './Admin/resources/comment/CommentDetail.php'; 
                    break;
                    // detail
                case 'AccessoryDetail':
                    include './Admin/resources/product/ProductDetail/AccessoryDetail.php';
                    break;
                case 'LaptopDetail':
                    include './Admin/resources/product/ProductDetail/LaptopDetail.php';
                    break;
                case 'PhoneDetail':
                    include './Admin/resources/product/ProductDetail/PhoneDetail.php';
                    break;
                    // user 
                case 'UserList':
                    include './Admin/resources/user/UserList.php';
                    break;
                case 'UserAdd':
                    include './Admin/resources/user/UserAdd.php';
                    break;
                case 'UserEdit':
                    include './Admin/resources/user/UserEdit.php';
                    break;
                    // order
                case 'OrderList':
                    include './Admin/resources/order/OrderList.php';
                    break;
                case 'OrderDetail':
                    include './Admin/resources/order/OrderDetail.php';
                    break;
                    // type
                case 'TypeList':
                    include './Admin/resources/Type/TypeList.php';
                    break;
                case 'TypeAdd':
                    include './Admin/resources/Type/TypeAdd.php';
                    break;
                case 'TypeEdit':
                    include './Admin/resources/Type/TypeEdit.php';
                    break;
                case 'PhoneAdd':
                    include './Admin/resources/product/productAdd/phoneAdd.php';
                    break;
                case 'LaptopAdd':
                    include './Admin/resources/product/productAdd/laptopAdd.php';
                    break;
                case 'AccessoryAdd':
                    include './Admin/resources/product/productAdd/accessoryAdd.php';
                    break;
                default: 
                    include './admin/resources/admin/Dashboard.php';
                    break;
            }
            break;

        case 'user':
            switch ($_GET['action']) {
                case 'home':
                    include './User/index.php';
                    break;
                case 'products':
                    include './User/Product.php';
                    break;
                case 'contact':
                    include './User/contact.php';
                    break;
                case 'login':
                    include 'login.php';
                    break;
            }
            break;
    }
}

include 'js.php';
