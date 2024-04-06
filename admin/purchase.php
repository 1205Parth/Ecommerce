<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Purchase
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Row-Material</li>
        <li class="active">Purchse</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="addNewPurchase btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Supplier Name</th>
                  <th>Row-Material Name</th>
                  <th>Qty (Meters)</th>
                  <th>Price</th>
                  <th>Tool</th>
                
                  
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT purchase.*, suppliers.name as supplier_name, row_material.name as raw_material FROM purchase LEFT JOIN suppliers ON suppliers.id = purchase.supplier_id LEFT JOIN row_material ON row_material.id = purchase.raw_material_id");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <tr>
                            <td>".$row['supplier_name']."</td>
                            <td>".$row['raw_material']."</td>
                            <td>".$row['quantity']."</td>
                            <td>".$row['price']."</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/purchase_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getSupplier();
    getRawMaterial();
    getRow(id);
  });

  $('.addNewPurchase').click(function(e){
    e.preventDefault();
    getSupplier();
    getRawMaterial();
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'purchase_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
        $('.purchase_id').val(response.id);
      $('.supplier_list').val(response.supplier_id);
      $('.raw_material_list').val(response.raw_material_id);
      $('#edit_quantity').val(response.quantity);
      $('#edit_price').val(response.price);
    }
  });
}

function getSupplier(){
  $.ajax({
    type: 'POST',
    url: 'supplier_fetch.php',
    dataType: 'json',
    success:function(response){
      $('.supplier_list').append(response);
    }
  });
}
function getRawMaterial(){
  $.ajax({
    type: 'POST',
    url: 'raw_material_fetch.php',
    dataType: 'json',
    success:function(response){
        $('.raw_material_list').append(response);
    }
  });
}
</script>
</body>
</html>
