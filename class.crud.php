<?php


class crud 
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($nome,$CPFCNPJ,$dt_nascimento,$endereco,$desc_titulo,$valor,$dt_vencimento)
	{
		try
		{
			
			$stmt = $this->db->prepare(
				"INSERT INTO tbl_devedores(nome,CPFCNPJ,dt_nascimento,endereco,desc_titulo,valor,dt_vencimento) 
						VALUES(:nome, :CPFCNPJ, :dt_nascimento, :endereco, :desc_titulo, :valor, :dt_vencimento)");
			
			$stmt->bindparam(":nome",$nome);
			$stmt->bindparam(":CPFCNPJ",$CPFCNPJ);
			$stmt->bindparam(":dt_nascimento",$dt_nascimento);
			$stmt->bindparam(":endereco",$endereco);
			$stmt->bindparam(":desc_titulo",$desc_titulo);
			$stmt->bindparam(":valor",$valor);
			$stmt->bindparam(":dt_vencimento",$dt_vencimento);			
			
			return $stmt->execute();
		}
		catch(PDOException $e)  
		{					   
			echo $e->getMessage();	
			return false;
		}	
	}
	
	public function getID($id)  
	{
		$stmt = $this->db->prepare("SELECT * FROM tbl_devedores WHERE id=:id"); 
		$stmt->execute(array(":id"=>$id)); 
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC); 
		return $editRow;
	}

	
	public function update($id,$nome,$CPFCNPJ,$dt_nascimento,$endereco,$desc_titulo,$valor,$dt_vencimento)
	{
		try
		{
			
			$stmt=$this->db->prepare("UPDATE tbl_devedores SET nome=:nome, 
		                                               CPFCNPJ=:CPFCNPJ, 
													   dt_nascimento=:dt_nascimento, 
													   endereco=:endereco,
													   desc_titulo=:desc_titulo,
													   valor=:valor,
													   dt_vencimento=:dt_vencimento													   
													WHERE id=:id ");
			
			$stmt->bindparam(":nome",$nome);
			$stmt->bindparam(":CPFCNPJ",$CPFCNPJ);
			$stmt->bindparam(":dt_nascimento",$dt_nascimento);
			$stmt->bindparam(":endereco",$endereco);
			$stmt->bindparam(":desc_titulo",$desc_titulo);
			$stmt->bindparam(":valor",$valor);
			$stmt->bindparam(":dt_vencimento",$dt_vencimento);
			$stmt->bindparam(":id",$id);
			
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e) 
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id) 
	{
		$stmt = $this->db->prepare("DELETE FROM tbl_devedores WHERE id=:id"); 
		$stmt->bindparam(":id",$id); 
		$stmt->execute(); 
		return true;  
	}                
	
		
	public function dataview($query) 
	{
		$stmt = $this->db->prepare($query); 
		$stmt->execute(); 	
		if($stmt->rowCount() > 0)  
		{	
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))  
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
                	<td align="center">
					
                	<a href="edit-data.php?edit_id=<?php print($row['id']); ?>">
					<i class="glyphicon glyphicon-edit"></i>
					</a>
                	</td>
                	<td align="center">
					
                	<a href="delete.php?delete_id=<?php print($row['id']); ?>">
					<i class="glyphicon glyphicon-remove-circle"></i>
					</a>
                	</td>
                </tr>
                <?php
			}
		}
		else 
		{
			?>
            <tr>
            <td>Sem registros...</td>
            </tr>
            <?php
		}
	}	
}
?>