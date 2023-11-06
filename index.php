<!-- test sang -->
<?php
session_start();
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
// if(!isset($_COOKIE['userID'])){
//     header("location: index.php?pages=user&action=home");
// }

if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {
        case 'login':
            include './admin/auth/login.admin.php';
            break;
        case 'register':
            include './admin/auth/register.admin.php';
            break;
        case 'admin':
            include 'js.php';
            if (!isset($_COOKIE['role'])) {
                include './User/resources/home.php';
            } else {
                if ($_COOKIE['role'] == 1) {
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
                        case 'WiredDetail':
                            include './Admin/resources/product/ProductDetail/WiredDetail.php';
                            break;
                        case 'WirelessDetail':
                            include './Admin/resources/product/ProductDetail/WirelessDetail.php';
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
                            // ProductAdd
                        case 'PhoneAdd':
                            include './Admin/resources/product/productAdd/phoneAdd.php';
                            break;
                        case 'LaptopAdd':
                            include './Admin/resources/product/productAdd/laptopAdd.php';
                            break;
                        case 'WiredAdd':
                            include './Admin/resources/product/productAdd/accessoryAdd/wireless/wired.php';
                            break;
                        case 'WirelessAdd':
                            include './Admin/resources/product/productAdd/accessoryAdd/wireless/wireless.php';
                            break;
                        case 'wireless':
                            include './Admin/resources/product/productAdd/wirelessAdd.php';
                            break;
                            // ProductEdit
                        case 'LaptopEdit':
                            include './Admin/resources/product/ProductEdit/LaptopEdit.php';
                            break;
                        case 'PhoneEdit':
                            include './Admin/resources/product/ProductEdit/PhoneEdit.php';
                            break;
                        case 'WirelessEdit':
                            include './Admin/resources/product/ProductEdit/WirelessEdit.php';
                            break;
                        case 'WiredEdit':
                            include './Admin/resources/product/ProductEdit/WiredEdit.php';
                            break;
                        default:
                            include './admin/resources/admin/Dashboard.php';
                            break;
                    }
                    break;
                }
            }
        case 'user':
            include 'js.php';

            switch ($_GET['action']) {
                case 'home':
                    include './User/resources/home.php';
                    break;
                case 'products':
                    include './User/resources/products.php';
                    break;
                case 'productdetail':
                    include './User/resources/productdetail.php';
                    break;
                case 'contact':
                    include './User/resources/contact.php';
                    break;
                case 'introduce':
                    include './User/resources/introduce.php';
                    break;
                case 'cart':
                    include './User/resources/cart.php';
                    break;
                    //thong tin tk
                case 'updateuser':
                    include './User/resources/updateuser.php';
                    break;
                case 'informationuser':
                    include './User/resources/informationuser.php';
                    break;

                case 'history':
                    include './User/resources/history.php';
                    break;
                    //checkout
                case 'checkout':
                    include './User/resources/checkout.php';
                    break;
                case 'changepassword':
                    include './User/resources/changepassword.php';
                    break;
                case "logout":
                    setcookie("role", '', time() + 1, "/");
                    setcookie("userID", '', time() + 1, "/");
                    header("location: index.php?pages=user&action=home");
                    break;
                case 'login':
                    include 'login.php';
                    break;
                default:
                    include './User/resources/home.php';
                    break;
            }
            break;
    }
} else {
    include './User/resources/home.php';
}
