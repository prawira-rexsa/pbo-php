<?php
require_once 'models/role_model.php';
require_once 'models/item_model.php'; 
require_once 'models/user_model.php';
require_once 'models/transaksiModel.php';

session_start();

if (isset($_GET['modul'])){
  $modul = $_GET['modul'];
}else {
  $modul = 'dasboard';
}

$objRole = new modelRole();
$objItem = new modelItem();
$objUser = new userModel();
$objTrx = new transaksiModel();

switch($modul){
  case 'dasboard':
    include 'views/beranda.php';
    break;
  case 'role':
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    $role_id = isset($_GET['id']) ? $_GET['id'] : null;

    switch($fitur){
      case 'add':
          $role_name = $_POST['role_name'];
          $role_deskripsi = $_POST['role_description'];
          $role_status = $_POST['role_status'];
          $objRole->addRole($role_name, $role_deskripsi, $role_status);
          header('location: index.php?modul=role');
          break;
      
      case 'delete':
          $objRole->deleteRole($role_id);
          echo "<script type='text/javascript'>alert('Sukses Hapus Role ID {$role_id}');
                window.location.href = 'index.php?modul=role';
                </script>";
          break;

      case 'edit':
          $role = $objRole->getRoleById($role_id);
          include 'views/role_update.php';
        
          break;

      case 'update':
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $role_name = $_POST['role_name'];
          $role_deskripsi = $_POST['role_description'];
          $role_status = $_POST['role_status'];

          $objRole->updateRole($role_id, $role_name, $role_deskripsi, $role_status);
      
          header('location: index.php?modul=role'); 
        }else {
          include 'views/role_list.php';
        }
        break;

      default:   
          $obj_role = $objRole->getAllRoles();
          include 'views/role_list.php';
          break;
    }
    break;

  case 'item':
    $item_id = isset($_GET['id']) ? $_GET['id'] : null;
    $insert = isset($_GET['insert']) ? $_GET['insert'] : null;

    switch($insert){
        case 'add':
          $item_name = $_POST['item_name'];
          $price_item = $_POST['price_item'];
          $amount_item = $_POST['amount_item'];
          $objItem->addItem($item_name, $price_item, $amount_item);
          header('location: index.php?modul=item');
          break;
        
        case 'delete':
          $objItem->deleteItem($item_id);
          echo "<script type='text/javascript'>alert('Sukses Hapus Item ID {$item_id}');
                window.location.href = 'index.php?modul=item';
                </script>";
          break;

        case 'edit':
          $item = $objItem->getItemById($item_id);
          include 'views/manageUpdateItems.php';
          break;

        case 'update':
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $item_name = $_POST['item_name'];
            $price_item = $_POST['price_item'];
            $amount_item = $_POST['amount_item'];
  
            $objItem->updateItem($item_id, $item_name, $price_item, $amount_item);
        
            header('location: index.php?modul=item'); 
          }else {
            include 'views/manageItems.php';
          }
          break;

        default:
          $obj_item = $objItem->getAllItems();
          include 'views/manageItems.php';
          break;
    }
    break;

  case 'user':
    $user_id = isset($_GET['id']) ? $_GET['id'] : null;
    $employee = isset($_GET['employee']) ? $_GET['employee'] : null;

    switch($employee){
      case 'add':
        $username = $_POST['username'];
        $addressUser = $_POST['addressEmployee'];
        $jabatanUser = $_POST['positionUser'];
        $objUser->addUsers($username, $addressUser, $jabatanUser);
        header('location: index.php?modul=user');
        break;
      
      case 'delete':
        $objUser->deleteUser($user_id);
        echo "<script type='text/javascript'>alert('Sukses Hapus Item ID {$user_id}');
              window.location.href = 'index.php?modul=user';
              </script>";
        break;
    
      case 'edit':
        $user = $objUser->getUserById($user_id);
        include 'views/manageUpdateUser.php';
        break;
    
      case 'update':
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $username = $_POST['username'];
          $addressUser = $_POST['addressEmployee'];
          $jabatanUser = $_POST['positionUser'];

          $objUser->updateUser($user_id, $username, $addressUser, $jabatanUser);
      
          header('location: index.php?modul=user'); 
        }else {
          include 'views/manageUsers.php';
        }

      break;
      default:
      $objUser = $objUser->getAllUser();
      include 'views/manageUsers.php';
    }
    break;
  
  case 'insertTrx':
    $id_trx = isset($_GET['id']) ? $_GET['id'] : null;
    $trxdetails = isset($_GET['trxdetails']) ? $_GET['trxdetails'] : null;

    switch($trxdetails){
      case 'add':
        $name_trx = $_POST['nameTrx'];
        $amount_trx = $_POST['amountTrx'];
        $date_trx = $_POST['dateTrx'];
        $objTrx->addTrx($name_trx, $amount_trx, $date_trx);
        header('location: index.php?modul=insertrx');
        break;
    

      default:
      $objTrx = $objTrx->getAllTrx();
      include 'views/manageAddTransaksi.php';
    }
}


?>