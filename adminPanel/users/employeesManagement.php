<?php
ob_start();
session_start();
if($_SESSION['login'] && $_SESSION['user-type']=='admin'){

}else{
    header("location:../DashBoard.php");
}
if($_SESSION)
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
                    <a href="../users/employeesManagement.php" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-person-fill"></i></span>
                      <span>Pracownicy</span>
                    </a>
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
    <h2>Pracownicy</h2>
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
$get_users = $pdo->query("SELECT * FROM users where type in ('worker','admin')");
foreach($get_users as $row_users)
{
    echo "<tr>";
    echo "<td>".$row_users['email']."</td>";
    echo "<td>".$row_users['firstname']."</td>";
    echo "<td>".$row_users['surname']."</td>";
    echo "<td>".$row_users['type']."</td>";
    ?>
    <td>
      <?php
      if($row_users['type']=='admin'){
      ?>
      <button name='edit_send' class="edit_data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" disabled class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_users['id_user']?>" value="<?=$row_users['id_user']?>"><i class="bi bi-pencil"></i></button>
    <?php
      }else{
        ?>
        <button name='edit_send' class="edit_data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_users['id_user']?>" value="<?=$row_users['id_user']?>"><i class="bi bi-pencil"></i></button>

        <?php
      }
    ?>
    </td>
    <form method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rekord?');">
    <?php if($row_users['type']=="admin")
    {
        ?>
            <td><button type='submit' name='delete_send' class='delete_record' value="<?=$row_users['id_user']?>" disabled><i class="bi bi-trash"></i></button>
        <?php
    }
    else{
        ?>
            <td><button type='submit' name='delete_send' class='delete_record'value="<?=$row_users['id_user']?>"><i class="bi bi-trash"></i></button></td>
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
    if($_POST['type']!='admin')
    {
      $id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $street = $_POST['street'];
    $house_number = $_POST['house_number'];
    $apartmentnumber = $_POST['apartment_number'];
    if($apartmentnumber==null)
    {
      $apartmentnumber=0;
    }
    $type = $_POST['type'];
    $password = $_POST['password'];
    $email_error = false;
    $password_error = false;
    if($password!="password")
    {
      $check_if_exists = $pdo->query("SELECT * FROM users where id_user not like $id");
      foreach($check_if_exists as $row_exists)
      {
        if(password_verify($password,$row_exists['password']))
        {
          $password_error= true;
        }
        if($email==$row_exists['email'])
        {
          $email_error = true;
        }
      }
    }
    if(!$email_error)
    {
      $update_stmt = $pdo->prepare("UPDATE users set firstname='$firstname',surname='$surname',email='$email',city='$city',street='$street',ZIP='$zipcode',house_number=$house_number, apartment_number=$apartmentnumber where id_user=$id");
      $update_stmt->execute();
    }
    if(!$password_error)
    {
      $password = password_hash($password,PASSWORD_DEFAULT);
      $update_password = $pdo->prepare("UPDATE users set password='$password' where id_user=$id");
      $update_password->execute();
    }
    unset($_POST['edit-submit']);
    header("REFRESH:0");
    }
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
        <div id='modal-body'class="modal-body container">
            <div class='col-12 row'>
              <div class='col-12'>
                <label class='col-12'>Imię</label>
                <input class='col-12' id='firstname-id'name='firstname' required></input>
              </div>
              <input type='hidden' id='user-id'name='user_id'></input>
              <div>
                <label class='col-12'>Nazwisko</label>
                <input class='col-12' id='surname-id'name='surname'required></input>
              </div>
              <div>
                <label class='col-12'>Email</label>
                <input class='col-12' id='email-id'name='email' required></input>
              </div>
              <div class='col-8'>
                <label class='col-12'>Miasto</label>
              </div>
              <div class='col-4'>
                <label class='col-12'>Kod pocztowy</label>
              </div>
              <div class='col-8'>
                <input class='col-12' id='city-id' name='city' ></input>
              </div>
              <div class='col-4'>
                <input class='col-12' id='zipcode-id'name='zipcode' ></input>
              </div>
              <div class='col-6'>
                <label class='col-12'>Ulica</label>
              </div>
              <div class='col-3'>
                <label class='col-12'>Numer domu</label>
              </div>
              <div class='col-3'>
                <label class='col-12'>Numer mieszkania</label>
              </div>
              <div class='col-6'>
              <input class='col-12' id='street-id'name='street' ></input>
              </div>
              <div class='col-3'>
                <input class='col-12' type='number' id='housenumber-id'name='house_number' ></input>               
              </div>
              <div class='col-3'>
                <input class='col-12' type='number' id='apartmentnumber-id'name='apartment_number' ></input>               
              </div>
              <div class='col-12'>
                <label>Hasło</label>
                <input class='col-12' value='password' type='password' id='password-id'name='password' ></input>               
              </div>
              <?php
                if($_SESSION['user-type']=='admin')
                {
              ?>
              <div class='col-12'> 
                <label>TYP KONTA</label>
                <select id='type-id' class='select-category col-12'name='type'>
                  <option value='1'>KLIENT</option>
                  <option value='2'>PRACOWNIK</option>
                </select>
              </div>
              <?php
                }
              ?>
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
        <form method="POST" enctype="multipart/form-data">
        <div id='modal-body'class="modal-body container">
            <div class='col-12 row'>
              <div class='col-12'>
                <label class='col-12'>Imię</label>
                <input class='col-12' type='text'id='firstname-id'name='firstname' required></input>
              </div>
              <input type='hidden' id='user-id'name='user_id'></input>
              <div>
                <label class='col-12'>Nazwisko</label>
                <input class='col-12' value="" type='text'id='surname-id'name='surname' required></input>
              </div>
              <div>
                <label class='col-12'>Email</label>
                <input class='col-12' type='email' id='email-id' name='email' required></input>
              </div>
              <div class='col-12'>
                <label>Hasło</label>
                <input class='col-12' type='password' id='password-id' name='password' required ></input>               
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
        $check_emails = $pdo->query("SELECT email from users");
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];

        $emailError = false;
        foreach($check_emails as $row_checkEmails)
        {
            if($row_checkEmails['email']==$email){
                $emailError = true;
            }
        }
        $password = $_POST['password'];
        if( !preg_match( '/[^A-Za-z0-9]+/', $password) || strlen( $password) < 8)
        {
            
        }else{
            $password = password_hash($password,PASSWORD_DEFAULT);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(!$emailError)
            {
                $make_account = $pdo->prepare("INSERT INTO users (firstname,surname,email,password,type) values (:firstname,:surname,:email,:password,'worker')");
                $make_account -> bindValue(':firstname',$firstname,PDO::PARAM_STR);
                $make_account -> bindValue(':surname',$surname,PDO::PARAM_STR);
                $make_account -> bindValue(':email',$email,PDO::PARAM_STR);
                $make_account -> bindValue(':password',$password,PDO::PARAM_STR);
                $make_account -> execute();
            }
        }
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
      const user_id = $(this).attr("id");
      console.log(user_id);
      $.ajax({ 
            type: "POST",
            url:"edit_user.php",
            data: {id: user_id},
            dataType:'JSON',
            success: function(data) {
              $('#user-id').val(data.id_user);
              $('#firstname-id').val(data.firstname);
              $("#surname-id").val(data.surname);
              $('#email-id').val(data.email);
              $('#city-id').val(data.city);
              $('#zipcode-id').val(data.ZIP);
              $('#street-id').val(data.street);
              $('#housenumber-id').val(data.house_number);
              $('#apartmentnumber-id').val(data.apartment_number);
              
            }
        });
    });
  });
</script>