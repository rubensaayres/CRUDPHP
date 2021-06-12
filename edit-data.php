<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL ^ E_NOTICE);

include_once 'dbconfig.php';

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

if(isset($_POST['btn-update']))
{
	$nome = $_POST['nome']; 
	$CPFCNPJ = $_POST['CPFCNPJ'];
	$dt_nascimento = date('Y-m-d', strtotime($_POST['dt_nascimento']));
	$endereco = $_POST['endereco'];
    $desc_titulo = $_POST['desc_titulo'];
    $valor = $_POST['valor'];
    $dt_vencimento = date('Y-m-d', strtotime($_POST['dt_vencimento'])); 
    //echo $id;die(); 
	
	if($crud->update($id,$nome,$CPFCNPJ,$dt_nascimento,$endereco,$desc_titulo,$valor,$dt_vencimento))
	{
		$msg = "<div class='alert alert-info'>
        Registro editado com sucesso.
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
        Não foi possível editar registro.
                </div>";
	}
}


?>

<?php include_once 'header.php'; ?>
<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

<script>
    $(document).ready(function () { 
        $('.money').mask("###0.00", {reverse: true});
    });
</script>

<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Nome</td><td><input type='text' name='nome' class='form-control' value=<?=$nome;?> required></td>
        </tr>
        <tr>
            <td>CPFCNPJ</td><td><input type='text' name='CPFCNPJ' class='form-control' value=<?=$CPFCNPJ;?> required></td>
        </tr>
        <tr>
            <td>Dt_nascimento</td><td><input type='date' name='dt_nascimento' class='form-control' value=<?=$dt_nascimento;?> required></td>
        </tr>
        <tr>
            <td>Endereço</td><td><input type='text' name='endereco' class='form-control' value=<?=$endereco;?> required></td>
        </tr>
        <tr>
            <td>Desc_titulo</td><td><input type='text' name='desc_titulo' class='form-control' value=<?=$desc_titulo;?> required></td>
        </tr>
        <tr>
            <td>Valor</td><td><input type='text' name='valor' class='form-control money' value=<?=$valor;?> required></td>
        </tr>
        <tr>
            <td>Dt_vencimento</td><td><input type='date' name='dt_vencimento' class='form-control' value=<?=$dt_vencimento;?> required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Registro Editar
				</button>
                <a href="index.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>