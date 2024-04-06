<?php include 'includes/session.php'; ?>
<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }
  if(isset($_POST['add'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $question=$_POST['question'];
        
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM inquiry WHERE name=:name");
        $stmt->execute(['name'=>$name]);
        $row = $stmt->fetch();

        if($row['numrows'] > 0){
            $_SESSION['error'] = 'Page already exist';
        }
        else{

            try{
                $stmt = $conn->prepare("INSERT INTO inquiry (name, email,quetion) VALUES (:name, :email,:quetion)");
                $stmt->execute(['name'=>$name, 'email'=>$email,'contact_number'=>$contact_number,'quetion'=>$quetion]);
                $_SESSION['success'] = 'Page added successfully';

            }
            catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
            }
        }

        $pdo->close();
    }
?>
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
        inquiry List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Inquiry</li>
        <li class="active">List</li>
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
     
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Quetion</th>
                  <th>Tool</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM inquiry $where");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['question']."</td>
                            <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
      
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
    <?php include 'includes/inquiry_modal.php'; ?>
    <?php include 'includes/inquiry_modal2.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
// $(function(){
//   $(document).on('click', '.edit', function(e){
//         e.preventDefault();
//     $('#edit').modal('show');
//     var id = $(this).data('id');
//     getRow(id);
//   });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.name', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $('#addproduct').click(function(e){
    e.preventDefault();
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'inquiry_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.id').val(response.cmsid);
      $('.title').val(response.title);
      $('.title').html(response.title);
      CKEDITOR.instances.editor2.setData(response.description); 
    }
  });
} 
</script>
</body>
</html>
