<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL ^ E_NOTICE);

include_once 'dbconfig.php'; 
if(isset($_POST['btn-save'])){ 
	$nome = $_POST['nome']; 
	$CPFCNPJ = $_POST['CPFCNPJ'];
	$dt_nascimento = $_POST['dt_nascimento'];
	$endereco = $_POST['endereco'];
    $desc_titulo = $_POST['desc_titulo'];
    $valor = $_POST['valor'];
    $dt_vencimento = $_POST['dt_vencimento'];
    
    
	if($crud->create($nome,$CPFCNPJ,$dt_nascimento,$endereco,$desc_titulo,$valor,$dt_vencimento)){ 
        header("Location: add-data.php?inserted");    
    }else{                                             
		header("Location: add-data.php?failure");  
	}
}
?>
<?php include_once 'header.php'; ?>
<?php
if(isset($_GET['inserted'])){ 
	?>
    <div class="container">
	   <div class="alert alert-info">
       Registro inserido com sucesso.  
	   </div>
	</div>
    <?php
}else if(isset($_GET['failure'])){ 
	?>
    <div class="container">
	   <div class="alert alert-warning">
       Não foi possível inserir registro.
	   </div>
	</div>
    <?php
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

<script>
    $(document).ready(function () { 
        $('.money').mask("###0.00", {reverse: true});
    });
</script>

<div class="container">
	<form method='post' action="add-data.php">
    <table class='table table-bordered'>
        <tr>
            <td>Nome</td><td><input type='text' name='nome' class='form-control' required></td>
        </tr>
        <tr>
            <td>CPFCNPJ</td><td><input type='text' pattern="[0-9]+$" name='CPFCNPJ' class='form-control' required></td>
        </tr>
        <tr>
            <td>Dt_nascimento</td><td><input type='date' name='dt_nascimento' class='form-control' required></td>
        </tr>
        <tr>
            <td>Endereço</td><td><input type='text' name='endereco' class='form-control' required></td>
        </tr>
        <tr>
            <td>Desc_titulo</td><td><input type='text' name='desc_titulo' class='form-control' required></td>
        </tr>
        <tr>
            <td>Valor</td><td><input type='text' name='valor' class='form-control money' required></td>
        </tr>
        <tr>
            <td>Dt_vencimento</td><td><input type='date' name='dt_vencimento' class='form-control' required></td>
        </tr>
       
        <tr>
            <td colspan="2">
            
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Inserir registro</button>
             
            <a href="index.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>