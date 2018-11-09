<?php // Inicio do código PHP.
	
	function getConn(){ // criação da função/ método que faz a conexão ao Banco de Dados, quando chamada.

		$host='127.0.0.1';
		$db='bancogarteste';
		$user = 'root';
		$pass = '';
		$chst='utf8';

		$dns = "mysql:host=$host;dbname=$db;charset=$chst"; // String de conexão.
		
		try { 
			$pdo = new PDO($dns, $user, $pass);
			return $pdo; 
		} catch (PDOException $error) {
			echo 'Erro: '.$error->getMessage();

		} // Após testar a conexão, com auxílio do bloco TryCatch. Se o PHP não identificar nenhum erro, ele instanciará a conexão com o Banco de Dados, mas se haver algum erro, será exibido uma mensagem de erro, presente no método "getMessage()".
	}



?> <!-- Fim do bloco de PHP. -->
