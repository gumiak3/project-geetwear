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
              <a href="../DashBoard.php" class="dashboard nav-link px-3">
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
              <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
              >
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
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-layout-split"></i></span>
                      <span>Główna strona</span>
                    </a>
                    <a href="../pages/pageManagement.php" class="nav-link px-3 active">
                      <span class="me-2"><i class="bi bi-layout-split"></i></span>
                      <span>Podstrony</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
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
                    <a href="../users/employeesManagement.php" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-person-fill"></i></span>
                      <span>Pracownicy</span>
                    </a>
                    <?php
                      }
                    ?>
                    <a href="../users/clientsManagement.php" class="nav-link px-3 ">
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
    <h2>Zamówienia</h2>
</div>

<table id="MyTable" class="table table-striped table-dark">
    <thead class="table-head">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">DATA ZAMÓWIENIA</th>
        <th scope="col">DATA ZAKOŃCZENIA</th>
        <th scope="col">SZCZEGÓŁY</th> 
        <th scope="col">OPERACJE</th>       
        </tr>
    </thead>
    <tbody class="table-body">
<?php
include("../../php/load_database.php");
$get_orders = $pdo->query("SELECT * FROM orders ORDER BY id_order DESC");
foreach($get_orders as $row_orders)
{
  echo "<tr>";
  echo "<td>".$row_orders['id_order']."</td>";
  echo "<td>".$row_orders['order_date']."</td>";
  echo "<td>".$row_orders['shipment_date']."</td>";
  ?>
  <td><button class="edit_data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_orders['id_order']?>">SZCZEGÓŁY</button></td>
  <form method="POST"">
        <td><button type='submit' name='change-status' class='edit_record btn btn-info btn-lg' value="<?=$row_orders['id_order']?>"><?=$row_orders['status']?></button></td>
        </form>
  <?php
  echo "</tr>";
}


?>
</tbody>
</table>


<?php
  
  if(isset($_POST['change-status'])){
      $order_id = $_POST['change-status'];
      $status;
      $shipment_date='';
      $order_info = $pdo->query("SELECT * FROM orders where id_order=$order_id");
      foreach($order_info as $row_info)
      {
        $status = $row_info['status'];
      }
      if($status=='nadchodzace')
      {
        $status = 'w trakcie';
      }else if($status=='w trakcie'){
        $status = 'zrealizowano';
        $shipment_date = date("Y/m/d");
      }
      $update_status = $pdo->exec("UPDATE orders set status='$status' where id_order=$order_id");
      if($shipment_date!='')
      {
        $update_shipmentdate = $pdo->exec("UPDATE orders set shipment_date='$shipment_date' where id_order=$order_id");
      }
      unset($_POST);
      header("Refresh:0");
  }
?>
<!-- EDIT RECORD MODAL--->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">SZCZEGÓŁY ZAMÓWIENIA</h4>
        </div>
        <div class='container'>
          <div class='row'>
            <div class='col-12 row'>
            </div>
            <div class='contact-label col-12 row'>
                <label class='col-6'>Imię</label>
                <p class='col-6'id='firstname-id'></p>
            </div>
            <div class='contact-label col-12 row'>
                <label class='col-6'>Nazwisko</label>
                <p class='col-6'id='surname-id'>XD</p>
            </div>
            <div class='contact-label col-12 row'>
                <label class='col-6'>Miasto</label>
                <p class='col-6'id='city-id'>XD</p>
            </div>
            <div class='contact-label col-12 row'>
                <label class='col-6'>Ulica</label>
                <p class='col-6'id='street-id'>XD</p>
            </div>
            <div class='contact-label col-12 row'>
                <label class='col-6'>Kod pocztowy</label>
                <p class='col-6'id='zip-id'>XD</p>
            </div>
            <div class='contact-label col-12 row'>
                <label class='col-6'>Numer domu</label>
                <p class='col-6'id='housenumber-id'>XD</p>
            </div>
            <div class='contact-label col-12 row'>
                <label class='col-6'>Numer mieszkania</label>
                <p class='col-6'id='apartmentnumber-id'>XD</p>
            </div>
            <div id='ordered-products' class='products container-row'>
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        </div>
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


<!-- bootstrap links -->
<script src="../../js_bootstrap/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js'></script>

<script>
  $(document).ready(function(){
    $(".edit_data").click(function(){
        const order_id = $(this).attr("id");
        console.log(order_id);
        $.ajax({ 
            type: "POST",
            url:"order_details_user.php",
            data: {id: order_id},
            dataType:'JSON',
            success: function(data) {
              document.getElementById("firstname-id").innerHTML = data[0].firstname;
              document.getElementById("surname-id").innerHTML = data[0].surname;
              document.getElementById("city-id").innerHTML = data[0].city;
              document.getElementById("street-id").innerHTML = data[0].street;
              document.getElementById("zip-id").innerHTML = data[0].ZIP;
              document.getElementById("housenumber-id").innerHTML = data[0].house_number;
              document.getElementById("apartmentnumber-id").innerHTML = data[0].apartment_number;
            }
          });
          $.ajax({ 
            type: "POST",
            url:"order_details_products.php",
            data: {id: order_id},
            success: function(data) {
              console.log(data);
              document.getElementById("ordered-products").innerHTML = data;
            }
          });
    });
  });
</script>