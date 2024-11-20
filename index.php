<?php
require_once 'models/role_model.php';
require_once 'models/item_model.php'; 

session_start();

if (isset($_GET['modul'])){
  $modul = $_GET['modul'];
}else {
  $modul = 'dasboard';
}

$objRole = new modelRole();
$objItem = new modelItem();
$fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
$role_id = isset($_GET['id']) ? $_GET['id'] : null;
$item_id = isset($_GET['id']) ? $_GET['id'] : null;

switch($modul){
  case 'dasboard':
    include 'views/kosong.php';
    break;
  case 'role':
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

  case 'item':
    switch($fitur){
        case 'add':
          $item_name = $_POST['item_name'];
          $price_Item = $_POST['price_item'];
          $price_Item = $_POST['amount_item'];
          $objItem->addItem($item_name, $price_Item, $price_Item);
          header('location: index.php?modul=item');
          break;

        default:
          $obj_item = $objItem->getAllItems();
          include 'views/manageItems.php';
          break;
    }
  }

?>