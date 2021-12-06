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
    if(isset($_POST['delete_send'])){
        $idToDelete = $_POST['delete_send'];
        $stmt_to_delete = $pdo->prepare("DELETE FROM products where id_product like :id_product");
        $stmt_to_delete->bindValue(':id_product',$idToDelete,PDO::PARAM_STR);
        $stmt_to_delete->execute();
        $stmt_to_delete_fotos = $pdo->prepare("DELETE FROM gallery where id_product like :id_product");
        $stmt_to_delete_fotos->bindValue(':id_product',$idToDelete,PDO::PARAM_STR);
        $stmt_to_delete_fotos->execute();
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
        <form method="POST" enctype="multipart/form-data">
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
            <label class=''>Główne zdjęcie</label><br>
            <div class='row'>
            <img class='main_img col-12'id="main_img" src="../photos/produkty/empty.jpg" alt=""/>   
            <div>
            <input class='main-file' style='display:none'required type="file" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" name="fileToUploadMain" id="fileToUpload">
            <label>Dodatkowe zdjęcia</label><br>
            <div class='row'>
            <img class='under_img col-6' id='under_img1'src="../photos/produkty/empty.jpg" alt="" />
            <img class='under_img col-6' id="under_img2" src="../photos/produkty/empty.jpg" alt="" />
            <input required class='under-file col-6' type="file" style='display:none'onchange="readURL2(this);" accept="image/gif, image/jpeg, image/png" name="fileToUpload2" id='fileToUpload2'>
            <input required class='under-file col-6'type="file" style='display:none'onchange="readURL3(this);" accept="image/gif, image/jpeg, image/png" name="fileToUpload3" id='fileToUpload3' >
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
            <div class='sizes row'>
              <label class='size-label col-6'>Rozmiar</label>
              <label class='size-amount col-6'>Ilość</label><br>  
                <div class='shoes-sizes row'>   
                  <div class='col-6'>
                    <input required name='size[]' type='text' class='shoes-size col-12'></input>
                  </div>       
                  <div class='col-6'>
                    <input required name='size_amount[]' min=0 class='shoes-size-amount col-12'></input>
                  </div>
                  
              </div>
              <button onclick="add()">Add</button>
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
  function add(){
      var new_input_size="<div class='col-6'><input required class='col-12' type='text' name='size[]'></div>";
      var new_input_amount = "<div  class='col-6'><input required class='col-12' type='text' name='size_amount[]'></div>";
      $('.shoes-sizes').append(new_input_size);
      $('.shoes-sizes').append(new_input_amount);
    }
    
// show selected image
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#main_img').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function readURL3(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#under_img2').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#under_img1').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

</script>
<script>
    $(document).ready(function() {
        $(".edit_data").click(function(){
          var product = $(this).attr("id");
          // tablica z indexami petelka
          $.ajax({
            type: "POST",
            url:"edit_product.php",
            data: {id: product},
            success: function(data) {
                document.getElementById("modal-body").innerHTML=data;
                $("#main_img_edit").click(function(){
                  $("#fileToUpload_edit1").trigger('click');
                });
                $("#under_img_edit2").click(function(){
                  $("#fileToUpload_edit2").trigger('click');
                });
                $("#under_img_edit3").click(function(){
                  $("#fileToUpload_edit3").trigger('click');
                });
                $("#add_input").click(function(){
                  var new_input_size="<div class='col-5'><input required class='col-12' type='text' name='size[]'></div>";
                  var new_input_amount = "<div  class='col-5'><input required class='col-12' type='text' name='amount[]'></div>";
                  $('.div-of-extra-size').append(new_input_size);
                  $('.div-of-extra-size').append(new_input_amount);
                });
                
            }
          });
          
          
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
    $size = $_POST['size'];
    $amount = $_POST['amount'];
    $count = count($size);
    $stmt_get_all_sizes = $pdo->exec("DELETE FROM products where id_product=$id");
    for($i=0;$i<$count;$i++)
    {
      $edit_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id,'$product_name','$size[$i]',$product_category,$price,$amount[$i])");
    }
    

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
    if(basename($_FILES["fileToUploadMain"]["name"])!='')
    {
      $stmt_add_to_gallery_main = $pdo->exec("UPDATE  gallery set foto='$target_file_main_path' where id_product=$id and main=1");
    }
    if(basename($_FILES["fileToUpload2"]["name"])!=''){
      $stmt_add_to_gallery_main2 = $pdo->exec("UPDATE  gallery set foto='$target_file_2_path' where id_product=$id and main=2");
    }
    if(basename($_FILES["fileToUpload3"]["name"])!=''){
      $stmt_add_to_gallery_main3 = $pdo->exec("UPDATE  gallery set foto='$target_file_3_path' where id_product=$id and main=3");
    }
    
    //  header("REFRESH:0");
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
    $size = $_POST['size'];
    $amount = $_POST['size_amount'];
    $count = count($size);
    for($i=0;$i<$count;$i++)
    {
      $add_product = $pdo->exec("INSERT INTO products (id_product,product_name,size,id_category,price,amount) values ($id_product,'$product_name','$size[$i]',$id_category,$price,$amount[$i])");
    }
    $stmt_add_to_gallery_main = $pdo->exec("INSERT INTO gallery (id_product,foto,main) values ($id_product,'$target_file_main_path',1)");
    $stmt_add_to_gallery_main = $pdo->exec("INSERT INTO gallery (id_product,foto,main) values ($id_product,'$target_file_2_path',2)");
    $stmt_add_to_gallery_main = $pdo->exec("INSERT INTO gallery (id_product,foto,main) values ($id_product,'$target_file_3_path',3)");
   
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

<?php
    if(isset($_POST['delete-size-send']))
    {
      $id = $_POST['delete-size-send'];
      $stmt_del = $pdo->exec("DELETE from products where id=$id");
      header("REFRESH:0"); 
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

    <script>
    $("#under_img1").click(function(){
  $("#fileToUpload2").trigger('click');
  
});
$("#under_img2").click(function(){
  $("#fileToUpload3").trigger('click');
});
$("#main_img").click(function(){
  $("#fileToUpload").trigger('click');
});


  </script>
  