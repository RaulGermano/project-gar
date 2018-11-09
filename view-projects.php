<?php 

	require 'conn.php';

	$conn = getConn();

 ?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Project GAR</title>

   		<meta charset="utf-8">
		<meta name="author" content="Raul Germano">
		<link rel="icon" type="image/png" sizes="192x192" href="img/icon.png">
   		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   		<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"> 
   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   		<link rel="stylesheet" type="text/css" href="css/styleGar.css">
   		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   		<style type="text/css">

   			.colors-line {	width: 100%;
						    height: 3.5px;
						    float: left;
						    background-image: url(img/colors-line1.png);}

			.btn, .btn-small{margin: 0 3px 0 3px;}

			.card .card-content {	padding: 20px 12px;}

			a{font-size: 15pt; margin: 0;}

			.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating) {
				margin-right: 0px;
				font-weight: 500;}

			.card .card-action {	padding: 10px 10px;}

			.card{	box-shadow: -5px 6px 20px 1px #bcbcbc;
					border-radius: 7px;}

			.card .card-image img{	border-radius: 7px 7px 0 0;}

			.card .card-action:last-child {	border-radius: 0 0 7px 7px;}

   		</style>

    </head>

    <body>	

     <div class="navbar-fixed">
    	<nav class="tmn">
		    <div class="nav-wrapper grey darken-4">
			    <div class="">
			        <!-- <ul id="nav-mobile" class="left hide-on-small-only">
		       			 <li>
				        	<a href="" class='dropdown-trigger' data-hover="true" data-target="dropdown2" style='width: 200px;'>PROJETOS<i class="material-icons right">arrow_drop_down</i></a>
				        </li>

						<ul id='dropdown2' class='dropdown-content'>
						    <li>
						    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">add</i>NOVO</a>
						    </li>

						    <li>
						    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">remove</i>REMOVER</a>
						    </li>

						    <li>
						    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">format_align_left</i>VISUALIZAR</a>
						    </li>
						</ul>
	      			</ul> -->

					<ul id="nav-mobile" class="left hide-on-small-only">

		       			<li>
				        	<a href="" class='dropdown-trigger' data-hover="true" data-target="dropdown123" style='width: 240px; padding-left: 50px;'>STATUS PROJETO<i class="material-icons right">filter_list</i></a>
				        </li>

						<ul id='dropdown123' class='dropdown-content'>
							<li>
								<a href="view-projects.php?stts=<?php echo md5(0); ?>" class="grey-text text-darken-2"><i class="material-icons right">remove</i>TODOS</a>
							</li>

							<li>
								<a href="view-projects.php?stts=<?php echo md5(1); ?>" class="green-text text-darken-2"><i class="material-icons right">done</i>FINALIZADOS</a>
							</li>

							<li>
								<a href="view-projects.php?stts=<?php echo md5(2); ?>" class="blue-text text-darken-2"><i class="material-icons right">play_arrow</i>EM ANDAMENTO</a>
							</li>

							<li>
								<a href="view-projects.php?stts=<?php echo md5(3); ?>" class="red-text text-darken-2"><i class="material-icons right">stop</i>PARADOS</a>
							</li>
						</ul>

					</ul>	

					<a href="index.php" class="brand-logo center" style='font-size: 30pt; margin-top: -2px; font-weight: lighter; text-shadow: 1px 0px 20px #959595;'>GAR</a>

			     	<a href="#" data-target="mobile-demo" class="sidenav-trigger hide-on-med-and-up"><i class="material-icons">menu</i></a>

		      		<ul id="nav-mobile" class="right hide-on-small-only">
		       			<li>
		       				<i class="material-icons font-25">person</i>
		       			</li>

		       			<li>
				        	<a href="" class='dropdown-trigger' data-hover="true" data-target="dropdown1">RAUL.GERMANO <i class="material-icons right">arrow_drop_down</i></a>
				        </li>

						<ul id='dropdown1' class='dropdown-content'>
						    <li>
						    	<a href="#!" class="grey-text text-darken-2">CONFIGURAÇÕES</a>
						    </li>

						    <li>
						    	<a href="#!" class="grey-text text-darken-2">SAIR</a>
						    </li>
						</ul>
	      			</ul>
	      		</div>
		    </div>
  		</nav>
  	</div>

    <ul class="sidenav" id="mobile-demo">
    	<li class="waves-effect waves-black grey lighten-2" style="width: 100%;">
	    	<a href="" class="grey-text text-darken-2">
	    		<i class="material-icons left">
	    			person
	    		</i>
	    		RAUL.GERMANO
	    	</a>
	    	<ul id='dropdown1' class='dropdown-content'>
			    <li>
			    	<a href="#!" class="grey-text text-darken-2">CONFIGURAÇÕES</a>
			    </li>

			    <li>
			    	<a href="#!" class="grey-text text-darken-2">SAIR</a>
			    </li>
			</ul>
	    </li>
     	<li class="waves-effect" style="width: 100%;">
	    	<a href="" class="grey-text text-darken-2"><i class="material-icons left">refresh</i>RECARREGAR</a>
	    </li>
	    <li>
	    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">add</i>NOVO</a>
		</li>
	    <li>
	    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">remove</i>REMOVER</a>
		</li>
	    <li>
	    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">format_align_left</i>VISUALIZAR</a>
		</li>
	</ul>

	<h4 style="background: linear-gradient(to left, #ffffff, #ffffff, #cdcdcd75, #cdcdcd75, #ffffff, #ffffff ); text-align: center;">PROJETOS</h4>

	<!-- <a class='dropdown-trigger btn waves-effect waves-light btn blue darken-2' href='#' style='width:175px;' data-target='dropdownselect'>FILTROS</a>
	<ul id='dropdownselect' class='dropdown-content'>
		<li>
			<a href="#!" class="grey-text text-darken-2">FINALIZADOS</a>
		</li>

		<li>
			<a href="#!" class="grey-text text-darken-2">EM ANDAMENTO</a>
		</li>

		<li>
			<a href="#!" class="grey-text text-darken-2">PARADOS</a>
		</li>
	</ul> -->

	<br />

    	<div class="inner-m grey br-10 lighten-3 bs" style="padding: 20px;">
	    <div class="row" style="margin: 0;">

<?php 	if (!isset($_GET['stts'])) {
			echo 'tratar';
		}

		if ($_GET['stts']==md5(0)) {
			$query = '	SELECT 	codPai	AS 	codpai,
								nomePai 	AS 	nomepai,
								imgPai		AS 	imgpai, 
								statusPai 	AS 	statuspai
						FROM 	pai'; 

			$sql=$conn->prepare($query);

			$sql->execute();

			$select=$sql->fetchAll(); 

			foreach ($select as $each) { 

				if ($each['statuspai']==0) { ?>

					<div class="col s12 m6 l3">
						<div class="card">
							<div class="card-image">
								<img width="500" height="125" src="img/imgProjects/<?php echo $each['imgpai']; ?>">
								<a class="btn-floating halfway-fab red darken-2"><i class="material-icons" style='cursor: context-menu;'>stop</i></a>
							</div>

							<div class="card-stacked center">
								<div class="card-content">
									<p><?php echo $each['nomepai']; ?></p>
								</div>

								<div class="card-action center grey lighten-4">
									<a href="start-project.php?idpjt=<?php echo $each['codpai']; ?>&amp;sttspjt=<?php echo $each['statuspai']; ?>" class="red-text text-darken-2">INICIAR</a>

								</div>
							</div>
						</div>
					</div>
					
<?php 			}elseif ($each['statuspai']==1) { ?>

					<div class="col s12 m6 l3">
						<div class="card">
							<div class="card-image">
								<img width="500" height="125" src="img/imgProjects/<?php echo $each['imgpai']; ?>">
								<a class="btn-floating halfway-fab blue darken-2"><i class="material-icons" style='cursor: context-menu;'>play_arrow</i></a>
							</div>

							<div class="card-stacked">
								<div class="card-content center">
									<p><?php echo $each['nomepai']; ?></p>
								</div>

								<div class="card-action center grey lighten-4">
									<a href="react-item?php" class="blue-text text-darken-2">VISUALIZAR</a>
								</div>
							</div>
						</div>
					</div>
<?php 			}elseif ($each['statuspai']==2) { ?>

				<div class="col s12 m6 l3">
					<div class="card">
						<div class="card-image">
							<img width="500" height="125" src="img/imgProjects/<?php echo $each['imgpai']; ?>">
							<a class="btn-floating halfway-fab green darken-2"><i class="material-icons" style='cursor: context-menu;'>done</i></a>
						</div>

						<div class="card-stacked">
							<div class="card-content center">
								<p><?php echo $each['nomepai']; ?></p>
							</div>

							<div class="card-action center grey lighten-4">
								<a href="react-item?php" class="green-text text-darken-2">VISUALIZAR</a>
							</div>
						</div>
					</div>
				</div>
<?php 		} 
		}	
	}elseif ($_GET['stts']==md5(1)) {
		$query = '	SELECT 	codPai		AS 	codpai,
							nomePai 	AS 	nomepai,
						 	imgPai		AS 	imgpai, 
						 	statusPai 	AS 	statuspai
					FROM 	pai
					WHERE 	statusPai =2
					ORDER BY nomePai ASC'; 

		$sql=$conn->prepare($query);

		$sql->execute();

		$select=$sql->fetchAll(); 

		foreach ($select as $each) { ?>

			<div class="col s12 m6 l3">
				<div class="card">
					  <div class="card-image">
						<img width="500" height="125" src="img/imgProjects/<?php echo $each['imgpai']; ?>">
						<a class="btn-floating halfway-fab green darken-2"><i class="material-icons" style='cursor: context-menu;'>done</i></a>
					  </div>

					  <div class="card-stacked">
						<div class="card-content center">
							  <p><?php echo $each['nomepai']; ?></p>
						</div>

						<div class="card-action center grey lighten-4">
							  <a href="react-item?php" class="green-text text-darken-2">VISUALIZAR</a>
						</div>
					  </div>
				</div>
			</div>		
<?php  	}

		if (count($select)==0) { ?>
			<img src="img/imgProjects/padraoerror.jpg" alt="" width="550" height="150" class='bs-card br-10 container'>
<?php			
}

	}elseif ($_GET['stts']==md5(2)) {
		$query = '	SELECT 	codPai		AS 	codpai,
							nomePai 	AS 	nomepai,
						 	imgPai		AS 	imgpai, 
						 	statusPai 	AS 	statuspai
					FROM 	pai
					WHERE 	statusPai=1
					ORDER BY nomePai ASC'; 

		$sql=$conn->prepare($query);

		$sql->execute();

		$select=$sql->fetchAll(); 

		foreach ($select as $each) { ?>

			<div class="col s12 m6 l3">
				<div class="card">
					<div class="card-image">
						<img width="500" height="125" src="img/imgProjects/<?php echo $each['imgpai']; ?>">
						<a class="btn-floating halfway-fab blue darken-2"><i class="material-icons" style='cursor: context-menu;'>play_arrow</i></a>
					</div>

					<div class="card-stacked">
						<div class="card-content center">
							<p><?php echo $each['nomepai']; ?></p>
						</div>

						<div class="card-action center grey lighten-4">
							<a href="react-item?php" class="blue-text text-darken-2">VISUALIZAR</a>
						</div>
					</div>
				</div>
			</div>
<?php  	}

		if (count($select)==0) { ?>
			<img src="img/imgProjects/padraoerror.jpg" alt="" width="550" height="150" class='bs-card br-10'>
<?php			
		}

	}elseif ($_GET['stts']==md5(3)) {
		$query = '	SELECT 	codPai		AS 	codpai,
							nomePai 	AS 	nomepai,
						 	imgPai		AS 	imgpai, 
						 	statusPai 	AS 	statuspai
					FROM 	pai
					WHERE 	statusPai=0
					ORDER BY nomePai ASC'; 

		$sql=$conn->prepare($query);

		$sql->execute();

		$select=$sql->fetchAll(); 

		foreach ($select as $each) { ?>

			<div class="col s12 m6 l3">
				<div class="card">
					<div class="card-image">
						<img width="500" height="125" src="img/imgProjects/<?php echo $each['imgpai']; ?>">
						<a class="btn-floating halfway-fab red darken-2"><i class="material-icons" style='cursor: context-menu;'>stop</i></a>
					</div>

					<div class="card-stacked">
						<div class="card-content center">
							<p><?php echo $each['nomepai']; ?></p>
						</div>

						<div class="card-action center grey lighten-4">
							<a href="react-item?php" class="red-text text-darken-2">VISUALIZAR</a>
						</div>
					</div>
				</div>
			</div>
<?php  	}
		if (count($select)==0) { ?>
			<img src="img/imgProjects/padraoerror.jpg" alt="" width="550" height="150" class='bs-card br-10'>
<?php			
		}
	}

		 ?>
			</div>	
		</div>

	<div class="inner">

	   	<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />

	    <a href="" class="waves-effect waves-light btn grey darken-2 left hide-on-med-and-down"><i class="material-icons right">refresh</i>RECARREGAR</a> 
	    <a href="" class="waves-effect waves-light btn-small grey darken-2 left hide-on-large-only"><i class="large material-icons center">refresh</i></a> 

	    <a href="index.php" class="waves-effect waves-light btn grey darken-2 tooltipped left hide-on-med-and-down"><i class="material-icons left">keyboard_backspace</i>VOLTAR</a> 
	    <a href="index.php" class="waves-effect waves-light btn-small grey darken-2 tooltipped left hide-on-large-only"><i class="large material-icons center">keyboard_backspace</i></a> 
    	
	    <a data-target="modal1" class="modal-trigger waves-effect waves-light btn blue darken-2 right hide-on-med-and-down"><i class="material-icons left">add</i>NOVO PROJETO</a>
	    <a data-target="modal1" class="modal-trigger waves-effect waves-light btn-small blue darken-2 right hide-on-large-only"><i class="large material-icons center">add</i></a>

		  	<br /> <br /> <br /> <br />

		 </div>

		<div id="modal1" class="modal" style="border-radius: 10px;"> <!-- Modal para confirmar a exclusão dos itens selecionados. -->
		  		<i class="small modal-action modal-close material-icons grey-text text-darken-1 right" style="padding: 10px">clear</i>
		  		<form method="POST" action="" enctype="multipart/form-data">
			    	<div class="row padd-25">
		        		<div class="row">

		          			<div class="input-field col s12">
		            			<textarea name="textProj" required id="textProj" class="materialize-textarea" data-length="150"></textarea>
		            			<label for="textProj">PROJETO</label>
		          			</div>
		        		</div>

		        		<div class="row">
		        			<div class="file-field input-field">
						      	<div class="btn-small waves-effect waves-light blue darken-2">
						        	<span>IMAGEM</span>
						        	<input type="file" id="fileDate" name="imgProj" data-max-size="5242880">
						      	</div>

						      	<i id=sucess class="material-icons blue-text darken-2 right" style="cursor: default; margin-right: 10px; display: none;">done</i>
						      	<i id="error" class="material-icons red-text darken-2 right" style="cursor: default; margin-right: 10px; display: none;">clear</i>

						      	<div class="file-path-wrapper">
						        	<input disabled placeholder="NÃO OBRIGATÓRIO" id="fileDateDois" class="file-path validate">
						      	</div>
						    </div>
		        		</div>
		        		<div class="row">
						    <label class="center" ID="labe1" style="font-size: 12pt;"></label>
						</div>

		        		<button id="btnNewProj" disabled class="btn-small waves-effect waves-light right hide-on-med-and-down blue darken-2" type="submit" name="action">VALIDAR
						    <i class="material-icons right">done</i>
						</button>

						<button id="btnNewProj-min" disabled class="btn-small waves-effect waves-light right hide-on-large-only blue darken-2" type="submit" name="action">
						    <i class="material-icons center">done</i>
						</button>

						<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-med-and-down"><i class="material-icons left">clear</i>REDEFINIR</a> 
					   
					    <a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-large-only"><i class="large material-icons center">clear</i></a> 
		    		</div>
		    	</form>
		  	</div>
		</div>

		<section class="row contato grey lighten-4 mrg-0" id="contato" style="margin: 0"> <!-- Rodapé da página -->
  		<div class="container">
          	<div class="row">                  
            	<div class="col s12 m6">                  
             		<h2 class="title light">Redes sociais</h2>

                	<p class="caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven</p>

                	<a href="https://www.linkedin.com/in/raul-germano-043933162/" target="_blank" class="btn-floating waves-effect waves-light blue darken-3">
                    	<i class="fab fa-linkedin-in"></i>
                    </a> 

                    <a href="https://www.facebook.com/raul.germano.9" target="_blank" class="btn-floating waves-effect waves-light indigo darken-3">
                    	<i class="fab fa-facebook-f"></i>
                    </a> 

                    <a href="https://www.instagram.com/raul_germano/?hl=pt-br" target="_blank" class="btn-floating waves-effect waves-light orange darken-4">
                    	<i class="fab fa-instagram"></i>
                    </a>

                    <a href="#!" target="_blank" class="btn-floating waves-effect waves-light red darken-1">
                    	<i class="fab fa-youtube"></i>
                	</a>

                    <a href="#!" target="_blank" class="btn-floating waves-effect waves-light grey darken-3">
                    	<i class="fab fa-github"></i>
                    </a>
            	</div>

            	<div class="col s12 m6 icons-home">                  
             		<h2 class="title light">Contatos</h2>
                	<p class="caption">Lorem ipsum dolor sit amet, consectetur adipisicing 
                	<br /><br />
                 	<i class="fa fa-envelope" aria-hidden="true"></i>
                 	raul.germano@icloud.com<br />
                 	<i class="fas fa-phone-square" aria-hidden="true"></i>
                 	+55 (17) 99184-8128<br />
                 	</p>                                     
            	</div>                  
          	</div>
    	</div>           
	</section>

	<div class="colors-line"></div>

	<footer class="grey darken-4 white-text center padd-25">   
        <div class="col s12 container" align="left">
        &copy; Copyright 2018 
        </div>
    </footer>

<?php 	$conn1 = getConn();

$name='Raul Germano';

if (isset($_POST['action'])) {
	
	if (isset($_POST['textProj'])) {
		$txt=trim($_POST['textProj']);

	} else{
		header('Location: http://127.0.0.1/gar/index.php');
	}

	if (empty($txt)) {
		header('Location: http://127.0.0.1/gar/index.php');
	}

	if (isset($_POST['imgProj'])) {
		$img=trim($_POST['imgProj']);
	}

	if (isset($_FILES['imgProj'])) {
		
		$arquivo=$_FILES['imgProj']['name'];

		$_UP['pasta']='img/imgProjects/';
		$_UP['tamanho'] = 1024*1024*100;
		$_UP['extensoes'] = array('png', 'jpg', 'jpeg', '');
		$_UP['renomeia'] = true;
		
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';

		if($_FILES['imgProj']['error'] != 0 && $_FILES['imgProj']['error'] != 4){
			die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imgProj']['error']]);
			exit;
		}

		$extensao=strtolower($arquivo);
		$extensao=explode('.',$extensao);
		$extensao=end($extensao);

		if(array_search($extensao, $_UP['extensoes'])===false) {
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://127.0.0.1/gar/index.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada. Extesão inválida.\");
					</script>";
		} else if ($_UP['tamanho'] < $_FILES['imgProj']['size']){

			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://127.0.0.1/gar/index.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>";
		}else{

			if($_UP['renomeia'] == true){
				$nome_final = md5(time()).'.jpg';
			}else{
				$nome_final = $_FILES['imgProj']['name'];
			}

			if(move_uploaded_file($_FILES['imgProj']['tmp_name'], $_UP['pasta'].$nome_final)){

				move_uploaded_file($_FILES['imgProj']['tmp_name'], $_UP['pasta'].$nome_final);
				
				$query = '	INSERT INTO pai (cadPor, nomePai, imgPai)
							VALUES 		(:cadpor, :nome, :endimg)';

				$sql=$conn->prepare($query);
				$sql->bindParam(':cadpor', $name);
				$sql->bindParam(':nome', $txt);
				$sql->bindParam(':endimg', $nome_final);

				if ($sql->execute()) {
					echo 'Inserido com sucesso';
				}elseif (!$sql->execute()) {
					echo 'Erro na inserção';
				}
			}else{

				$query = '	INSERT INTO pai (cadPor, nomePai)
							VALUES 		(:cadpor, :nome)';

				$sql=$conn->prepare($query);
				$sql->bindParam(':cadpor', $name);
				$sql->bindParam(':nome', $txt);;

				if ($sql->execute()) {
					echo 'Inserido com sucesso';
				}elseif (!$sql->execute()) {
					echo 'Erro na inserção';
				}
			}
		}
	} ?>

	<meta http-equiv="refresh" content="0;">
<?php 	} ?>

    	<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/jsGar.js"></script>
		<script type="text/javascript" src="js/jqGar.js"></script>

		<script type="text/javascript">

			function apagarCampos(){
				document.getElementById("textProj").value='';
				document.getElementById("fileDate").value='';
				document.getElementById("fileDateDois").value='';
				document.getElementById("error").style.display="none";
     			document.getElementById("sucess").style.display="none";
     			labe1.innerHTML='';
			}

		</script>
	</body> 
 </html>