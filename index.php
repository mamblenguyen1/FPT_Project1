<!-- test sang -->
<?php
session_start();
require_once './config/pdo.php';
require_once './Admin/resources/category/CategoryFunction.php';
require_once './Admin/resources/user/UserFunction.php';
require_once './Admin/resources/product/ProductFunction.php';
require_once './Admin/resources/Type/TypeFunction.php';
require_once './Admin/resources/comment/commentFunction.php';
require_once './mail/forgot.php';
require_once './Admin/resources/order/Order_Function.php';
require_once './Admin/resources/promotioncodes/CodeFunction.php';
require_once './Admin/resources/contact/ContactFunction.php';
require_once './componant/TimeFunction.php';
require_once 'dbConfig.php';

$db = new connect();
$user = new UserFunction();
$category = new Categories();
$product = new ProductFunction();
$comment = new comment();
$type = new Type();
$mail = new Mailer();
$order = new ORDER();
$code = new Promotioncode();
$contact = new ContactFunction();
$timecount = new Time();

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
                        case 'productList':
                            include './admin/resources/product/ProductList.php';
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
                        case 'commentReply':
                            include './Admin/resources/comment/CommentReply.php';
                            break;
                            // detail
                        case 'productDetail':
                            include './Admin/resources/product/productDetail.php';

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
                        case 'OrderDetailList':
                            include './Admin/resources/order/OrderDetailList.php';
                            break;
                            case 'OrderHidden':
                                include './Admin/resources/order/OrderHidden.php';
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
                        case 'ProductAdd':
                            include './Admin/resources/product/ProductAdd.php';
                            break;
                            // ProductEdit
                        case 'ProductEdit':
                            include './Admin/resources/product/ProductEdit.php';
                            break;
                            //danh sách ẩn danh mục
                        case 'CategoryHidden':
                            include './Admin/resources/category/CategoryHidden.php';
                            break;
                            //danh sách ẩn danh mục con
                        case 'TypeHidden':
                            include './Admin/resources/type/TypeHidden.php';
                            break;
                            //danh sách ẩn sản phẩm
                        case 'ProductHidden':
                            include './Admin/resources/product/ProductHidden.php';
                            break;
                            //danh sách ẩn bình luận
                        case 'CommentHidden':
                            include './Admin/resources/comment/CommentHidden.php';
                            break;
                            //danh sách ẩn tài khoản
                        case 'UserHidden':
                            include './Admin/resources/user/UserHidden.php';
                            break;
                        case 'Contact':
                            include './Admin/resources/contact/Contact.php';
                            break;
                        case 'ContactDetail':
                            include './Admin/resources/contact/ContactDetail.php';
                            break;
                        case 'ContactSpam':
                            include './Admin/resources/contact/ContactSpam.php';
                            break;
                        case 'ContactReply':
                            include './Admin/resources/contact/ContactReply.php';
                            break;
                            //danh sách đơn hàng đã hủy
                        case 'OrderHidden':
                            include './Admin/resources/category/CategoryHidden.php';
                            break;
                            // promotion code
                        case 'CodeList':
                            include './Admin/resources/promotioncodes/CodeList.php';
                            break;
                        case 'CodeAdd':
                            include './Admin/resources/promotioncodes/CodeAdd.php';
                            break;
                        case 'CodeEdit':
                            include './Admin/resources/promotioncodes/CodeEdit.php';
                            break;
                        case 'CodeNull':
                            include './Admin/resources/promotioncodes/CodeNull.php';
                            break;
                        case 'CodeRestore':
                            include './Admin/resources/promotioncodes/RestoreCode.php';
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
                    //policy
                case 'policy':
                    include './User/resources/policy.php';
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
                case 'thanks':
                    include './User/resources/thanks.php';
                    break;

                case 'history':
                    include './User/resources/history.php';
                    break;
                case 'order':
                    include './User/resources/order.php';
                    break;
                    //checkout
                case 'checkout':
                    include './User/resources/checkout.php';
                    break;
                case 'changepassword':
                    include './User/resources/changepassword.php';
                    break;
                case "logout":
                    setcookie("viewCount", '', time() + 1, "/");
                    setcookie("role", '', time() + 1, "/");
                    setcookie("userID", '', time() + 1, "/");
                    setcookie("Oauth", '', time() + 1, "/");
                    header("location: index.php?pages=user&action=home");
                    break;
                case "forget":
                    include './User/resources/forgotPass.php';
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
};

?>