<?php 

require 'conn.php';

$conn = getConn();

if (isset($_GET['idpjt'])&&isset($_GET['sttspjt'])) {

	if ($_GET['sttspjt']==0) {
		
		$var=$_GET['sttspjt'];
		$var1=true;

		$query = '	UPDATE 	pai 
					SET 	statusPai = :statusPai,
							QuandoIniciado = now()
					WHERE 	idPai = :idPai';

		$sql=$conn->prepare($query);
		$sql->bindParam(':idPai', $var);
		$sql->bindParam(':statusPai', $var1);

		if ($sql->execute()) {
			echo 'Inserido com sucesso';
		}elseif (!$sql->execute()) {
			echo 'Erro na inserção';
		}
	}
}