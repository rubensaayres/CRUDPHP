
<?php include_once 'dbconfig.php'; ?> 
<?php include_once 'header.php'; ?> 

<div class="container">
    
    <a href="add-data.php" class="btn btn-large btn-info">
        <i class="glyphicon glyphicon-plus"></i> &nbsp; Adicionar registro
    </a>
</div>
<br />
<div class="container"> 
    
	<table class='table table-bordered table-responsive'> 
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
            <th colspan="2" align="center">Ações</th>
        </tr>
        <?php    
		  $crud->dataview("SELECT * FROM tbl_devedores"); 
	    ?>
    </table> 
</div>
<?php include_once 'footer.php'; ?> 