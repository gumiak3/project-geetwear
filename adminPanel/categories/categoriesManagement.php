<?php
ob_start();
session_start();
if($_SESSION['login'] && $_SESSION['user-type']=='admin' || $_SESSION['user-type']=='worker'){

}else{
    header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
              <a href="categoriesManagement.php" class="categories nav-link px-3">
                <span class="me-2"><i class="bi bi-tag"></i></span>
                <span>Kategorie</span>
              </a>
              <a href="../products/productsManagement.php" class="orders nav-link px-3">
                <span class="me-2"><i class="bi bi-cart-dash"></i></span>
                <span>Produkty</span>
              </a>
              <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts">
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Strony</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="../pages/mainPageManagement.php" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-layout-split"></i></span>
                      <span>Główna strona</span>
                    </a>
                    <a href="../pages/pageManagement.php" class="nav-link px-3 ">
                      <span class="me-2"><i class="bi bi-layout-split"></i></span>
                      <span>Podstrony</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts2">
                <span class="me-2"><i class="bi bi-people-fill"></i></span>
                <span>Użytkownicy</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts2">
                <ul class="navbar-nav ps-3">
                  <li>
                    <?php
                      if($_SESSION['user-type']=='admin'){

                    ?>
                    <a href="./users/employeesManagement.php" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-person-fill"></i></span>
                      <span>Pracownicy</span>
                    </a>
                    <?php
                      }
                    ?>
                    <a href="../users/clientsManagement.php" class="nav-link px-3 active">
                      <span class="me-2"><i class="bi bi-person-fill"></i></span>
                      <span>Klienci</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
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
    <h2>Kategorie</h2>
</div>
<button class="add-btn" data-toggle="modal" data-target="#addMyModal"  class='edit_record' data-toggle="modal" data-target="mymodal" >DODAJ REKORD</button>
<table id="MyTable" class="table table-striped table-dark">
    <thead class="table-head">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NAZWA</th>
        <th scope="col">EDYCJA</th>
        <th scope="col">USUWANIE</th>        
        </tr>
    </thead>
    <tbody class="table-body">
<?php
include("../../php/load_database.php");
$get_categories = $pdo->query("SELECT * FROM categories");
foreach($get_categories as $row_categories)
{
    echo"<tr>" ;
    echo "<td>".$row_categories['id_category']."</td>";
    echo "<td>".$row_categories['category_name']."</td>";
    ?>
    <td><button name='edit_send' class="edit_data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_categories['id_category']?>" value="<?=$row_categories['id_category']?>"><i class="bi bi-pencil"></i></button></td>
    <form method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rekord?');">
        <td><button type='submit' name='delete_send' class='delete_record' value="<?=$row_categories['id_category']?>"><i class="bi bi-trash"></i></button></td>
        </form>
        
    <?php
    echo "</tr>";
}
?>
</tbody>
</table>


<?php
    if(isset($_POST['edit_send'])){
      $idToEdit = $_POST['edit_send'];
      
    }
    if(isset($_POST['delete_send'])){
        $idToDelete = $_POST['delete_send'];
        $stmt_to_delete = $pdo->prepare("DELETE FROM categories where id_category like :id_category");
        $stmt_to_delete->bindValue(':id_category',$idToDelete,PDO::PARAM_STR);
        $stmt_to_delete->execute();
        unset($_POST);
        header("Refresh:0");
    }
?>
<!-- EDIT RECORD MODAL--->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">EDYCJA</h4>
        </div>
        <div class="modal-body">
            <form method="POST">
            <h3 id="category_id"></h3>
            <input type="hidden" id="id_category" name="category_id"></input>
            <label class="category-label">Nazwa kategorii</label>
            <input name="category_name" id="category_name" ></input><br>
            
          
        </div>
        <div class="modal-footer">
        <button class="btn-save" type='submit' name='edit-submit'>ZAPISZ</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- ADD RECORD MODAL-->
  <div class="modal fade" id="addMyModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">DODAWANIE</h4>
        </div>
        <div class="modal-body">
            <form method="POST">
            <h3 id="category_id"></h3>
            <input type="hidden" id="id_category" name="category_id"></input>
            <label class="category-label">Nazwa kategorii</label>
            <input name="category_name" id="category_name" ></input><br>
            
          
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
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
    <script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js'></script>
  </body>
</html>

<script>
    $(document).ready(function() {
        $(".edit_data").click(function(){
          var category = $(this).attr("id");
          $.ajax({
            type: "POST",
            url: "edit_category.php",
            data: {id: category},
            dataType:'JSON', 
            success: function(data) {
                document.getElementById("category_id").innerHTML=data.id_category;
                $("#category_name").val(data.category_name);
                $("#id_category").val(data.id_category);
                console.log(data);
            }
          })
          
        });
        $('#MyTable').dataTable( {
        "searching": true,
        "info": false,
        "pageLength": 5,
        "bLengthChange": false
    } );
} );
    </script>


<?php
  if(isset($_POST['edit-submit'])){
      $id = $_POST['category_id'];
      $name = $_POST['category_name'];
      $edit_stmt = $pdo->prepare("UPDATE categories set category_name=:category_name where id_category=$id");
      $edit_stmt->bindValue(":category_name",$name,PDO::PARAM_STR);
      $edit_stmt->execute();
      header("Refresh:0");
  }
  if(isset($_POST['add-submit'])){
    $name = $_POST['category_name'];
    $add_stmt = $pdo->prepare("INSERT INTO categories (category_name) values (:category_name)");
    $add_stmt->bindValue(":category_name",$name,PDO::PARAM_STR);
    $add_stmt->execute();
    header("Refresh:0");
  }
?>