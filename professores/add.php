<?php
 error_reporting( ~E_NOTICE ); 
 require_once 'functions.php';
 
 $db = open_database();

 if(isset($_POST['btnsave']))
 {
  $CPF_professor = $_POST['CPF_professor'];
  $nome_professor = $_POST['nome_professor'];
  
  
  if(empty($CPF_professor)){
   $errMSG = "Insira o CPF";
  }
  else if(empty($nome_professor)){
   $errMSG = "Insira o nome!";
  }
  

  if(!isset($errMSG))
  {
    $sql = "INSERT INTO professores (CPF_professor, nome_professor)
VALUES ('$CPF_professor', '$nome_professor')";

    if ($db->query($sql) === TRUE) {
    echo "Obrigada!";
    } else {
    echo "Erro: " . $sql . "<br>" . $db->error;
    }
    
    }
   else
   {
    $errMSG = "Erro!";
   }
  }
?>
<header>

<?php include(HEADER); ?>

</header>


<style>

        body {

            padding: 2%;

        }
        
</style>

<form method="post" enctype="multipart/form-data" class="form-horizonta">
     
 <table class="table table-bordered table-responsive">
 
    <tr>
     <td><label class="control-label">CPF</label></td>
        <td><input class="form-control" type="text" name="CPF_professor" placeholder="Insira CPF" value="<?php echo $CPF_professor; ?>" /></td>
    </tr>
    
    <tr>
     <td><label class="control-label">Nome</label></td>
        <td><input class="form-control" type="text" name="nome_professor" placeholder="Insira nome" value="<?php echo $nome_professor; ?>" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>

<?php include(FOOTER); ?>