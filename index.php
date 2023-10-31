<?php
require_once './config/pdo.php';

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
                case 'listorder':
                    include './admin/resources/order/OrderList.php';
                    break;
                case 'commentList':
                    include './Admin/resources/comment/CommentList.php';
                    break;
                case 'commentDetail':
                    include './Admin/resources/comment/CommentDetail.php';
                    break;
                case 'AccessoryDetail':
                    include './Admin/resources/product/ProductDetail/AccessoryDetail.php';
                    break;
                case 'LaptopDetail':
                    include './Admin/resources/product/ProductDetail/LaptopDetail.php';
                    break;
                case 'PhoneDetail':
                    include './Admin/resources/product/ProductDetail/PhoneDetail.php';
                    break;
                case 'UserList':
                    include './Admin/resources/user/UserList.php';
                    break;
                case 'OrderList':
                    include './Admin/resources/order/OrderList.php';
                    break;
                    case 'OrderDetail':
                        include './Admin/resources/order/OrderDetail.php';
                        break;
                default:
                    include './admin/resources/admin/Dashboard.php';
                    break;
            }
            break;
        case 'client':
            switch ($_GET['action']) {
                case 'index':
                    include './client/index.php';
                    break;
            }
            break;
    }
}

include 'js.php';
