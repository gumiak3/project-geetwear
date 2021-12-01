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
    <title>GEETWEAR ADMIN PANEL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css_bootstrap/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../css_bootstrap/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css_bootstrap/style.css" />
    
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
                <li><a class="dropdown-item" href="../index.php">Sklep</a></li>
                <li>
                  <a class="dropdown-item" href="#"><form method='POST' action='../php/logout.php'>
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
              <a href="DashBoard.php" class="dashboard nav-link px-3 active">
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
              <a href="productsManagement.php" class="orders nav-link px-3">
                <span class="me-2"><i class="bi bi-cart-dash"></i></span>
                <span>Produkty</span>
              </a>
              <a href="" class="pages nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Strony</span>
              </a>
              <a href="#" class="users nav-link px-3">
                <span class="me-2"><i class="bi bi-people"></i></span>
                <span>Użytkownicy</span>
              </a>
              <a href="#" class="orders nav-link px-3">
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
    <h2>Produkty</h2>
</div>
<button class="add-btn" data-toggle="modal" data-target="#addMyModal"  class='edit_record' data-toggle="modal" data-target="mymodal" >DODAJ REKORD</button>
<table id="MyTable" class="table table-striped table-dark">
    <thead class="table-head">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NAZWA</th>
        <th scope="col">KATEGORIA</th>
        <th scope="col">CENA</th>
        <th scope="col">EDYCJA</th>
        <th scope="col">USUWANIE</th>        
        </tr>
    </thead>
    <tbody class="table-body">
<?php
include("../php/load_database.php");
$get_products = $pdo->query("SELECT DISTINCT id_product,product_name,id_category,price FROM products");

foreach($get_products as $row_products)
{
    echo"<tr>" ;
    echo "<td>".$row_products['id_product']."</td>";
    echo "<td>".$row_products['product_name']."</td>";
    $id_category = $row_products['id_category'];
    $get_categories = $pdo->query("SELECT category_name from categories where id_category=$id_category");
    foreach($get_categories as $row_categories)
    {
        echo "<td>".$row_categories['category_name']."</td>";
    }
    echo "<td>".$row_products['price']." zł</td>";
    ?>
    <td><button name='edit_send' class="edit_data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_products['id_product']?>" value="<?=$row_products['id_product']?>">EDYCJA</button></td>
    <form method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rekord?');">
        <td><button type='submit' name='delete_send' class='delete_record' value="<?=$row_products['id_product']?>">USUŃ</button></td>
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
        echo $idToDelete;
        $stmt_delete_gallery = $pdo->prepare("DELETE FROM gallery where id_product like :id_product");
        $stmt_to_delete = $pdo->prepare("DELETE FROM products where id_product like :id_product");
        $stmt_delete_gallery->bindValue(':id_product',$idToDelete,PDO::PARAM_STR);
        $stmt_delete_gallery->execute();
        $stmt_to_delete->bindValue(':id_product',$idToDelete,PDO::PARAM_STR);
        $stmt_to_delete->execute();
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
          <h4 class="modal-title">EDYCJA</h4>
        </div>
        <form method="POST">
        <div id='modal-body'class="modal-body">
            
            <h3 id="product_id"></h3>
            <input type="hidden" id="id_product" name="id"></input>
            <label class="category-label">Nazwa produktu</label>
            <input name="product_name" id="product_name" ></input><br>
            
          
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
            <form method="POST" enctype="multipart/form-data">
            <h3 id="category_id"></h3>
            <label class='col-12'>Główne zdjęcie</label><br>
            <img class='main_img col-12'id="main_img" src="#" alt=""/>   
            <input class='main-file' required type="file" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" name="fileToUploadMain" id="fileToUpload">
            <label>Dodatkowe zdjęcia</label><br>
            <div class='row'>
            <img class='col-6' id="under_img1" src="#" alt="" />
            <img class='col-6' id="under_img2" src="#" alt="" />
            <input required class='under-file col-6' type="file" onchange="readURL2(this);" accept="image/gif, image/jpeg, image/png" name="fileToUpload2" id="fileToUpload">
            <input required class='under-file col-6'type="file" onchange="readURL3(this);" accept="image/gif, image/jpeg, image/png" name="fileToUpload3" id="fileToUpload">
            </div>
            <label class="category-label">Nazwa produktu</label>
            <input required name="product_name" id="product_name" ></input><br>
            <label>Kategoria</label>
            <select required name='category' class='select-category'>
            <?php
                $get_categories = $pdo->query("SELECT * from categories");
                foreach($get_categories as $row_categories)
                {
                    echo "<option value='".$row_categories['id_category']."'>".$row_categories['category_name']."</option>";
                }
            ?>
            </select><br>
            <label>Cena</label>
            <input required type='text' name='price'></input>  
            <label>Rodzaj produktu</label><br>
            <select class='select-category' id='sizes'>
              <option id='1'>Ubranie</option>
              <option id='2'>Obuwie</option>
            </select>
            <div class='sizes row'>
              <label class='size-label col-6'>Rozmiar</label>
              <label class='size-amount col-2'>Ilość</label><br>  
                <div class='shoes-sizes row col-12'>          
                  <input name='shoes-size1' class='shoes-size col-4'></input>
                  <input name='shoes-size-amount1' class='shoes-size-amount col-4'></input>
                  <input name='shoes-size2'class='shoes-size col-4'></input>
                  <input name='shoes-size-amount2' class='shoes-size-amount col-4'></input>
                  <input name='shoes-size3' class='shoes-size col-4'></input>
                  <input name='shoes-size-amount3' class='shoes-size-amount col-4'></input>
                  <input name='shoes-size4' class='shoes-size col-4'></input>
                  <input name='shoes-size-amount4' class='shoes-size-amount col-4'></input>
                  <input name='shoes-size5'class='shoes-size col-4'></input>
                  <input name='shoes-size-amount5' class='shoes-size-amount col-4'></input>
                  <input name='shoes-size6'class='shoes-size col-4'></input>
                  <input name='shoes-size-amount6' class='shoes-size-amount col-4'></input>
              </div>
                <div class='clothes-sizes'>
                  <input name='clothes-size1' class='shoes-size col-4'></input>
                  <input name='clothes-size-amount1' class='shoes-size-amount col-4'></input>
                  <input name='clothes-size2' class='shoes-size col-4'></input>
                  <input name='clothes-size-amount2' class='shoes-size-amount col-4'></input>
                  <input name='clothes-size3' class='shoes-size col-4'></input>
                  <input name='clothes-size-amount3' class='shoes-size-amount col-4'></input>
                  <input name='clothes-size4' class='shoes-size col-4'></input>
                  <input name='clothes-size-amount4' class='shoes-size-amount col-4'></input>
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

   <script src="../js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js_bootstrap/jquery-3.5.1.js"></script>
    <script src="./js_bootstrap/jquery.dataTables.min.js"></script>
    <script src="./js_bootstrap/dataTables.bootstrap5.min.js"></script>
    <script src="./js_bootstrap/script.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
    <script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js'></script>
  </body>
</html>
<script>
// show selected image
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#main_img').attr('src', e.target.result).width(150).height(150);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function readURL3(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#under_img2').attr('src', e.target.result).width(150).height(150);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#under_img1').attr('src', e.target.result).width(150).height(150);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<script>
// showing sizes
  $("#sizes").change(function(){
    if($("#sizes").val()=="Obuwie"){
      $(".shoes-sizes").fadeIn();
      $(".clothes-sizes").fadeOut();
    }
    else if($("#sizes").val()=="Ubranie"){
      $(".clothes-sizes").fadeIn();
      $(".shoes-sizes").fadeOut();
    }
  });        
</script>

<script>
    $(document).ready(function() {
        $(".edit_data").click(function(){
          var product = $(this).attr("id");
          $.ajax({
            type: "POST",
            url:"edit_product.php",
            data: {id: product},
            success: function(data) {
                document.getElementById("modal-body").innerHTML=data;
            }
          })
          
        });
        $('#MyTable').dataTable( {
        "searching": true,
        "info": false,
        "pageLength": 10,
        "bLengthChange": false
    } );
} );
    </script>


<?php
  if(isset($_POST['edit-submit'])){ // EDIT
      $id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_category = $_POST['product_category'];
      $price = $_POST['price'];
      $stmt_edit = $pdo->exec("UPDATE products set product_name='$product_name', id_category=$product_category,price=$price where id_product=$id");    
      header("Refresh:0");
  }
  if(isset($_POST['add-submit'])){ // ADD
    // to save
    $target_dir = "../photos/produkty/";
    $target_file_main_save = $target_file = $target_dir . basename($_FILES["fileToUploadMain"]["name"]);
    $target_file_2_save = $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
    $target_file_3_save = $target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);

    // to get path
    $target_dir_to_get_path= "photos/produkty/";
    $target_file_main_path = $target_file = $target_dir_to_get_path . basename($_FILES["fileToUploadMain"]["name"]);
    $target_file_2_path = $target_file = $target_dir_to_get_path . basename($_FILES["fileToUpload2"]["name"]);
    $target_file_3_path = $target_file = $target_dir_to_get_path . basename($_FILES["fileToUpload3"]["name"]);
    // end path

    // saving images into specific folder
    move_uploaded_file($_FILES["fileToUploadMain"]["tmp_name"], $target_file_main_save);
    move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file_2_save);
    move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file_3_save);
    
    $stmt_get_last_id = $pdo->query("SELECT * from products");
    foreach($stmt_get_last_id as $row_last_id)
    {
      $id_product = $row_last_id['id_product'];
    }
    $id_product+=1;
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $amount = '';
    $size = '';
    
    // get sizes and their amount
    // shoes
    $shoe_size1 = $_POST['shoes-size1'];
    $shoe_amount1 = $_POST['shoes-size-amount1'];
    if($shoe_amount1=='')
    {
      $shoe_amount1=0;
    }
    if(if_null($shoe_size1,$shoe_amount1)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$shoe_size1',$id_category,$price,$shoe_amount1)");
    }
    $shoe_size2 = $_POST['shoes-size2'];
    $shoe_amount2 = $_POST['shoes-size-amount2'];
    if($shoe_amount2=='')
    {
      $shoe_amount2=0;
    }
    if(if_null($shoe_size2,$shoe_amount2)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$shoe_size2',$id_category,$price,$shoe_amount2)");
    }
    $shoe_size3 = $_POST['shoes-size3'];
    $shoe_amount3 = $_POST['shoes-size-amount3'];
    if($shoe_amount3=='')
    {
      $shoe_amount3=0;
    }
    if(if_null($shoe_size3,$shoe_amount3)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$shoe_size3',$id_category,$price,$shoe_amount3)");
    }
    $shoe_size4 = $_POST['shoes-size4'];
    $shoe_amount4 = $_POST['shoes-size-amount4'];
    if($shoe_amount4=='')
    {
      $shoe_amount4=0;
    }
    if(if_null($shoe_size4,$shoe_amount4)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$shoe_size4',$id_category,$price,$shoe_amount4)");
    }
    $shoe_size5 = $_POST['shoes-size5'];
    $shoe_amount5 = $_POST['shoes-size-amount5'];
    if($shoe_amount5=='')
    {
      $shoe_amount5=0;
    }
    if(if_null($shoe_size5,$shoe_amount5)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$shoe_size5',$id_category,$price,$shoe_amount5)");
    }
    $shoe_size6 = $_POST['shoes-size6'];
    $shoe_amount6 = $_POST['shoes-size-amount6'];
    if($shoe_amount6=='')
    {
      $shoe_amount6=0;
    }
    if(if_null($shoe_size6,$shoe_amount6)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$shoe_size6',$id_category,$price,$shoe_amount6)");
    }
    
    // clothes
    
    $clothes_size1 = $_POST['clothes-size1'];
    $clothes_amount1 = $_POST['clothes-size-amount1'];
    if($clothes_amount1=='')
    {
      $clothes_amount1=0;
    }
    if(if_null($clothes_size1,$clothes_amount1)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$clothes_size1',$id_category,$price,$clothes_amount1)");
    }
    $clothes_size2 = $_POST['clothes-size2'];
    $clothes_amount2 = $_POST['clothes-size-amount2'];
    if($clothes_amount2=='')
    {
      $clothes_amount2=0;
    }
    if(if_null($clothes_size2,$clothes_amount2)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$clothes_size2',$id_category,$price,$clothes_amount2)");
    }
    $clothes_size3 = $_POST['clothes-size3'];
    $clothes_amount3 = $_POST['clothes-size-amount3'];
    if($clothes_amount3=='')
    {
      $clothes_amount3=0;
    }
    if(if_null($clothes_size3,$clothes_amount3)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$clothes_size3',$id_category,$price,$clothes_amount3)");
    }
    
    $clothes_size4 = $_POST['clothes-size4'];
    $clothes_amount4 = $_POST['clothes-size-amount4'];
    if($clothes_amount4=='')
    {
      $clothes_amount4=0;
    }
    if(if_null($clothes_size4,$clothes_amount4)){
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$clothes_size4',$id_category,$price,$clothes_amount4)");
    }
    
    
    $stmt_add_to_gallery_main = $pdo->exec("INSERT INTO gallery (id_product,foto,main) values ($id_product,'$target_file_main_path',1)");
    $stmt_add_to_gallery_main = $pdo->exec("INSERT INTO gallery (id_product,foto,main) values ($id_product,'$target_file_2_path',0)");
    $stmt_add_to_gallery_main = $pdo->exec("INSERT INTO gallery (id_product,foto,main) values ($id_product,'$target_file_3_path',0)");
    header("REFRESH:0");
  }
  function if_null($size,$amount){
    if($size=='')
    {
      return false;
    }else{
      
      return true;
    }
  }
?>

<?php if(isset($_POST['edit-size-send'])){ ?>
<script>

  </script>
<?php } ?>

<?php
    if(isset($_POST['edit-size-send'])){
        $size = $_POST['input-size'];
        $amount = $_POST['input-amount'];
        $id = $_POST['edit-size-send'];
        $stmt_edit_size = $pdo->prepare("UPDATE products set size=:size, amount=:amount where id=$id");
        $stmt_edit_size->bindValue(':size',$size,PDO::PARAM_STR);
        $stmt_edit_size->bindValue(':amount',$amount,PDO::PARAM_STR);
        $stmt_edit_size->execute();    
    }
    if(isset($_POST['delete-size-send']))
    {
      $id = $_POST['delete-size-send'];
      $stmt_del = $pdo->exec("DELETE from products where id=$id");
    }
    if(isset($_POST['add-size-send'])){
      $id = $_POST['add-size-send'];
      $size = $_POST['input-size'];
      $amount = $_POST['input-amount'];
      $stmt_get_variables = $pdo->query("SELECT * FROM products where id_product=$id");
      foreach($stmt_get_variables as $row_variables)
      {
        $product_name = $row_variables['product_name'];
        $id_category = $row_variables['id_category'];
        $price = $row_variables['price'];
      }
      $stmt = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values($id,'$product_name','$size',$id_category,$price,$amount)");
      unset($_POST['add-size_send']);
    }

?>