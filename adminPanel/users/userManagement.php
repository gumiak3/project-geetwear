<?php
ob_start();
session_start();
if($_SESSION['login'] && $_SESSION['user-type']=='admin'){

}else{
    header("location:logowanie.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="#">
    <title>GEETWEAR ADMIN PANEL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css_bootstrap/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../../css_bootstrap/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../../css_bootstrap/style.css" />
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >GEETWEAR</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="../../index.php">Sklep</a></li>
                <li>
                  <a class="dropdown-item" href="#"><form method='POST' action='../../php/logout.php'>
                            <button name='log_out' type='submit' class='log-out'>Wyloguj się</button>
                            </form></a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar end -->
    <!-- Offcanvas START -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                GŁÓWNY
              </div>
            </li>
            <li>
              <a href="../DashBoard.php" class="dashboard nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                ZARZĄDZANIE
              </div>
            </li>
              <a href="../categories/categoriesManagement.php" class="categories nav-link px-3">
                <span class="me-2"><i class="bi bi-tag"></i></span>
                <span>Kategorie</span>
              </a>
              <a href="../products/productsManagement.php" class="orders nav-link px-3">
                <span class="me-2"><i class="bi bi-cart-dash"></i></span>
                <span>Produkty</span>
              </a>
              <a href="../pages/pageManagement.php" class="pages nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Strony</span>
              </a>
              <a href="../users/userManagement.php" class="users nav-link px-3">
                <span class="me-2"><i class="bi bi-people"></i></span>
                <span>Użytkownicy</span>
              </a>
              <a href="../orders/ordersManagement.php" class="orders nav-link px-3">
                <span class="me-2"><i class="bi bi-box-seam"></i></span>
                <span>Zamówienia</span>
              </a>
              
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- Offcanvas END -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div id='content'class="row">
        <div class='col-12'>
    <h2>Użytkownicy</h2>
</div>
<button class="add-btn" data-toggle="modal" data-target="#addMyModal"  class='edit_record' data-toggle="modal" data-target="mymodal" >DODAJ REKORD</button>
<table id="MyTable" class="table table-striped table-dark">
    <thead class="table-head">
        <tr>
        <th scope="col">EMAIL</th>
        <th scope="col">IMIĘ</th>
        <th scope="col">NAZWISKO</th>
        <th scope="col">TYP</th>
        <th scope="col">EDYCJA</th>
        <th scope="col">USUWANIE</th>        
        </tr>
    </thead>
    <tbody class="table-body">
<?php
include("../../php/load_database.php");
$get_users = $pdo->query("SELECT * FROM users");
foreach($get_users as $row_users)
{
    echo "<tr>";
    echo "<td>".$row_users['email']."</td>";
    echo "<td>".$row_users['firstname']."</td>";
    echo "<td>".$row_users['surname']."</td>";
    echo "<td>".$row_users['type']."</td>";
    ?>
    <td><button name='edit_send' class="edit_data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_subpages['id_subpage']?>" value="<?=$row_subpages['id_subpage']?>"><i class="bi bi-pencil"></i></button></td>
    <form method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rekord?');">
    <?php if($row_users['type']=="admin")
    {
        ?>
            <td><button type='submit' name='delete_send' class='delete_record' value="<?=$row_users['id_user']?>" disabled><i class="bi bi-trash"></i></button>
        <?php
    }
    else{
        ?>
            <td><button type='submit' name='delete_send' class='delete_record' value="<?=$row_users['id_user']?>"><i class="bi bi-trash"></i></button></td>
        <?php
    }
    ?>
      
    </form>
        
    <?php
    echo "</tr>";
}
?>
</tbody>
</table>


<?php
  if(isset($_POST['edit-submit']))
  {
    $id = $_POST['subpage_id'];
    $subpage_name = $_POST['subpage_name'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $edit_stmt = $pdo->prepare("UPDATE subpages set subpage_name='$subpage_name',additional_info=$content,status=$status where id_subpage=$id");
    $edit_stmt->execute();
    header("REFRESH:0");
  }
  if(isset($_POST['delete_send'])){
    $idToDelete = $_POST['delete_send'];
    $stmt_to_delete = $pdo->prepare("DELETE FROM users where id_user like :id_user");
    $stmt_to_delete->bindValue(':id_user',$idToDelete,PDO::PARAM_STR);
    $get_type = $pdo->query("SELECT type FROM users where id_user=$idToDelete");
    foreach($get_type as $row_type)
    {
        if($row_type['type']=="admin")
        {

        }else{
            $stmt_to_delete->execute();
            unset($_POST);
            header("Refresh:0");
        }
    }
  }
?>
<!-- EDIT RECORD MODAL--->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">EDYCJA</h4>
        </div>
        <form method="POST" enctype="multipart/form-data">
        <div id='modal-body'class="modal-body row">
            <div class='cotainer-row'>
              <input type='hidden' id='subpage_id'name='subpage_id'></input>
              <label class='col-12'>Nazwa podstrony</label>
              <input class='col-12' id='subpage_name'name='subpage_name' required></input>
              <label class='col-12'>Zawartość</label>
              <select name='content' id='subpage_content' required class='select-category'>
                <?php
                  $get_content = $pdo->query("SELECT * FROM categories");
                  foreach($get_content as $row_content)
                  {
                    echo "<option value=".$row_content['id_category'].">".$row_content['category_name']."</option>";
                  }
                ?>
              </select>
              <label class='col-12'>Status</label>
              <div class='div-status'>
                <input required class='input-radio' type='radio' id='active' name='status' value='1'></input>
                <label for='active'>aktywna</label><br>
                <input required class='input-radio' type='radio' id='inactive' name='status' value='0'></input>  
                <label for='inactive'>nieaktywna</label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
        <button class="btn-save" type='submit' name='edit-submit'>ZAPISZ</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<script>
  $(document).ready(function(){
    $('#MyTable').dataTable( {
        "searching": true,
        "info": false,
        "pageLength": 10,
        "bLengthChange": false
    } );
  })
        
    </script>
   <!-- ADD RECORD MODAL-->
   <div class="modal fade" id="addMyModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">DODAWANIE</h4>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
            <div class='cotainer-row'>
              <label class='col-12'>Nazwa podstrony</label>
              <input class='col-12' name='subpage_name' required></input>
              <label class='col-12'>Zawartość</label>
              <select name='content' required class='select-category'>
                <?php
                  $get_content = $pdo->query("SELECT * FROM categories");
                  foreach($get_content as $row_content)
                  {
                    echo "<option value=".$row_content['id_category'].">".$row_content['category_name']."</option>";
                  }
                ?>
              </select>
              <label class='col-12'>Status</label>
              <div class='div-status'>
                <input required class='input-radio' type='radio' id='active' name='status' value='1'></input>
                <label for='active'>aktywna</label><br>
                <input required class='input-radio' type='radio' id='inactive' name='status' value='0'></input>  
                <label for='inactive'>nieaktywna</label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn-save" type='submit' name='add-submit'>DODAJ</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
    </main>

   
  </body>
</html>
<?php
  if(isset($_POST['add-submit'])){
    
    header("REFRESH:0");
  }
?>

<!-- bootstrap links -->
<script src="../../js_bootstrap/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js'></script>

<script>
  $(document).ready(function(){
    $(".edit_data").click(function(){
        // edit record
    });
  });
</script>