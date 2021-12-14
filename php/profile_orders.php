<?php
session_start();
if($_SESSION['login'])
{
    $id = $_SESSION['id_user'];
}else{
    
}
include("./load_database.php");
$get_orders= $pdo->query("SELECT * FROM orders INNER JOIN basket on orders.id_order=basket.id_order where id_user='$id' ORDER BY order_date DESC");

?>
<table id="MyTable" class="table table-striped table-light">
    <thead class="table-head">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">DATA ZAMÓWIENIA</th>
        <th scope="col">DATA ZAKOŃCZENIA</th>
        <th scope="col">SZCZEGÓŁY</th> 
        <th scope='col'>STATUS</th>      
        </tr>
    </thead>
    <tbody class="table-body">
<?php
include("load_database.php");
foreach($get_orders as $row_orders)
{
  echo "<tr>";
  echo "<td>".$row_orders['id_order']."</td>";
  echo "<td>".$row_orders['order_date']."</td>";
  echo "<td>".$row_orders['shipment_date']."</td>";
  ?>
  <td><button class="edit_data" data-toggle="modal" data-target="#myModal"  class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_orders['id_order']?>">SZCZEGÓŁY</button></td>
  <?php
  echo "<td>".$row_orders['status']."</td>";
  echo "</tr>";
}


?>
</tbody>
</table>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">SZCZEGÓŁY ZAMÓWIENIA</h4>
        </div>
        <div class='container'>
          <div class='row'>
            <div id='ordered-products' class='products col-12 container-row'>
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        </div>
      </div>
      
    </div>
    <script>
        $(".edit_data").click(function(){
        const order_id = $(this).attr("id");
        console.log(order_id);
          $.ajax({ 
            type: "POST",
            url:"./php/products_ordered.php",
            data: {id: order_id},
            success: function(data) {
              
                document.getElementById("ordered-products").innerHTML = data;
            }
          });
    });
    </script>
<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
