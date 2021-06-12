<?php


include_once 'dbconfig.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
    //var_dump($id);
	$crud->delete($id);
	header("Location: delete.php?deleted");	
}

?>
<?php include_once 'header.php'; ?>

<div class="container">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	Registro excluído com sucesso. 
		</div>
        <?php
	}
	else if(isset($_POST['btn-del']))
	{
		?>
        <div class="alert alert-danger">
        Não foi possível excluir registro.
		</div>
        <?php
	}else{
        echo "";
    }
	?>	
</div>

<div class="container">
 	
	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
            <th>Id</th>
            <th>Nome </th>
            <th>CPFCNPJ</th>
            <th>Dt_nascimento</th>
            <th>Endereço</th>
            <th>Desc_titulo</th>
            <th>Valor</th>
            <th>Dt_vencimento</th>
            <th>Updated</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM tbl_devedores WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
                <td><?php print($row['id']); ?></td> 
                <td><?php print($row['nome']); ?></td>
                <td><?php print($row['CPFCNPJ']); ?></td>
                <td><?php print($row['dt_nascimento']); ?></td>
                <td><?php print($row['endereco']); ?></td>
				<td><?php print($row['desc_titulo']); ?></td>
				<td><?php print($row['valor']); ?></td>
				<td><?php print($row['dt_vencimento']); ?></td>
				<td><?php print($row['updated']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; Sim</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Não</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index.php" class="btn btn-large btn-success" style="float: right;><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar</a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>