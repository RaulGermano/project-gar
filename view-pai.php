<?php session_start();

	require 'conn.php';
	
	$conn = getConn();

	if (isset($_GET['neto'])) {

		echo 'id: '.$_GET['neto'];

		exit;

	}

	if (isset($_GET['removeitem'])) {

		echo 'falta arrumar';

		exit;

		$ids=trim($_GET['addsub']);
		$ids=explode('/',$ids);

		echo $ids[0].'<br />';
		echo $ids[1];

		$idForPai=$ids[1];

		if (isset($_GET['textSub'])) {

			$textSub=trim($_GET['textSub']);

			if (empty($textSub)) {
				header("location: view-pai.php?idpai=$idForPai");				
			}
	
			$query = '	INSERT INTO neto (cadPor, nomeNeto, codFilho)
						VALUES 		(:cadpor, :nome, :id)';
	
			$sql=$conn->prepare($query);
			$sql->bindValue(':cadpor', 'raul.germano');
			$sql->bindParam(':nome', $textSub);
			$sql->bindParam(':id', $ids[0]);
	
			if ($sql->execute()) {
				echo 'Inserido com sucesso';
			}elseif (!$sql->execute()) {
				echo 'Erro na inserção';
			}
			
			header("location:view-pai.php?idpai=$idForPai");
		}
	}

	if (isset($_GET['addsub'])) {

		$ids=trim($_GET['addsub']);
		$ids=explode('/',$ids);

		echo $ids[0].'<br />';
		echo $ids[1];

		// exit; 

		$idForPai=$ids[1];

		if (isset($_GET['textSub'])) {

			$textSub=trim($_GET['textSub']);

			if (empty($textSub)) {
				header("location: view-pai.php?idpai=$idForPai");				
			}
	
			$query = '	INSERT INTO neto (cadPor, nomeNeto, codFilho)
						VALUES 		(:cadpor, :nome, :id)';
	
			$sql=$conn->prepare($query);
			$sql->bindValue(':cadpor', 'raul.germano');
			$sql->bindParam(':nome', $textSub);
			$sql->bindParam(':id', $ids[0]);
	
			if ($sql->execute()) {
				echo 'Inserido com sucesso';
			}elseif (!$sql->execute()) {
				echo 'Erro na inserção';
			}
			
			header("location:view-pai.php?idpai=$idForPai");
		}
	}

	if (isset($_GET['action'])) {

        $id=trim($_GET['action']);
	 
		if (isset($_GET['textActivit'])) {
			$textAct=trim($_GET['textActivit']);

			if (empty($textAct)) {
				header("location: view-pai.php?idpai=$id");
			}
	
			$query = '	INSERT INTO filho (cadPor, nomeFilho, codPai)
						VALUES 		(:cadpor, :nome, :id)';
	
			$sql=$conn->prepare($query);
			$sql->bindValue(':cadpor', 'raul.germano');
			$sql->bindParam(':nome', $textAct);
			$sql->bindParam(':id', $id);
	
			if ($sql->execute()) {
				echo 'Inserido com sucesso';
			}elseif (!$sql->execute()) {
				echo 'Erro na inserção';
			}
			
			header("location:view-pai.php?idpai=$id");
		}
	}

	if (isset($_GET['idpai'])) {

		$idPai=trim($_GET['idpai']);

		if (trim(empty($idPai))) {
			header('location: http://127.0.0.1/gar/index.php');

		}else{
			$query = '	SELECT 	a.nomePai 								AS 	nomepai,
							 	a.imgPai								AS 	imgpai, 
							 	a.statusPai 							AS 	sttspai,
							 	a.momentoCad							AS 	momcad,
								a.momentoInicio							AS 	momini,
								(SELECT COUNT(b.codFilho) 
								FROM filho 								AS 	b 
								WHERE b.codPai = a.codPai) 				AS 	qntdFilho
						FROM 	pai 									AS 	a 
						WHERE 	codPai = :id'; 

			$sql=$conn->prepare($query);
			$sql->bindParam(':id', $idPai);
			$sql->execute();
			$select=$sql->fetch(); 

			$date=$select['momcad'];
			$date=substr($date, 0,10);
			$qnd=explode('-',$date);

			$qnd=$qnd[2].'/'.$qnd[1].'/'.$qnd[0];

			if ($select['qntdFilho']>0) {
				$status='JÁ INICIADO';
			}elseif ($select['qntdFilho']<=0) {
				$status='NÃO INICIADO';
			}
		}
	}

 ?>

<!DOCTYPE html>
<html ng-app="todoApp">
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
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>

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

   		</style>

    </head>

    <body>	

     <div class="navbar-fixed">
    	<nav class="tmn">
		    <div class="nav-wrapper grey darken-4">
			    <div class="">
			        <ul id="nav-mobile" class="left hide-on-small-only">
		       			 <li>
				        	<!-- <a href="" class='dropdown-trigger' data-hover="true" data-target="dropdown2">PROJETOS PROJETOS <i class="material-icons right">arrow_drop_down</i></a> -->
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
	      			</ul>

					<a href="index.php" class="brand-logo center" style='font-size: 30pt; margin-top: -2px; font-weight: lighter; text-shadow: 1px 0px 20px #959595;'>GAR</a>
					
					<a href="index.php" class="brand-logo left"><i class="material-icons back" style='font-size:35pt; color: #5b5b5b; padding-left: 15px;'>keyboard_backspace</i></a> 					

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

	<br />

		<div class="inner grey lighten-3 br-10 bs">
	    	<div class="inner">
	    		<div class="row">
	    			<h6 class="col s12 m2 l3 grey-text text-darken-2" style="padding: 25px; margin: 0">STATUS: <b><?php echo $status; ?></b></h6>
	    			<h5 class="col s12 m8 l6 grey-text text-darken-2" style="padding: 25px; margin: 0">PROJETO: <b><?php echo $select['nomepai']; ?></b></h5>
	    			<h6 class="col s12 m2 l3 grey-text text-darken-2" style="padding: 25px; margin: 0">CRIADO: <b><?php echo $qnd; ?></b></h6>
	    		</div>
			</div>
		</div>

	<br />

	<center>
		<button id="btnNew" data-target="modal1" class="btn waves-effect waves-light blue darken-2 modal-trigger" type="submit" style='' name="additem">ADICIONAR ATIVIDADE
			<i class="material-icons left">add</i>
		</button>

		<a class="waves-effect waves-black btn grey darken-2 white-text tooltipped" style='cursor: auto'>QUANTIDADE: <b><?php echo $select['qntdFilho'] ?></b></a> 

	</center>

	<div id="modal1" class="modal" style="border-radius: 10px;"> <!-- Modal para confirmar a exclusão dos itens selecionados. -->
		<i class="small modal-action modal-close material-icons grey-text text-darken-1 right" style="padding: 10px">clear</i>
		<form method="GET" action="add-item-view.php">
			<div class="row padd-25">

				<div class="row">
					<div class="input-field col s12">
						<textarea name="textActivit" required id="textProj" class="materialize-textarea" data-length="150"></textarea>
						<label for="textProj">ATIVIDADE</label>
					</div>
				</div>

				<button id="btnNewProj" disabled class="btn-small waves-effect waves-light right hide-on-med-and-down blue darken-2" value='<?php echo $idPai; ?>' type="submit" name="action">VALIDAR
					<i class="material-icons right">done</i>
				</button>

				<button id="btnNewProj-min" disabled class="btn-small waves-effect waves-light right hide-on-large-only blue darken-2" value='<?php echo $idPai; ?>' type="submit" name="action">
					<i class="material-icons center">done</i>
				</button>

				<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-med-and-down"><i class="material-icons left">clear</i>REDEFINIR</a> 
				
				<a class="waves-effect waves-black btn-small grey darken-2 white-text tooltipped right hide-on-large-only"><i class="large material-icons center">clear</i></a> 
			</div>
		</form>
	</div>

	<br>

	<tr style="background-color: transparent;">
		<td colspan="6">
		    <div id="<?php echo 'less'.$idPai; ?>"  class="row inner" style="zoom:80%; border-radius: 7px; display: block; background-color: rgba(100, 100, 100, .07); box-shadow: 0px 0px 9px 0px #bbbbbb;"> 
		            		
		        <div class="inner">
		            <h5 style="padding-top: 10px;" class="grey-text text-darken-1">ATIVIDADE(S)</h5>
		            			
<?php 				$query = '	SELECT 	a.nomeFilho 							AS nomeFilho,
										a.codFilho 								AS codFilho, 

										(SELECT COUNT(b.codNeto) FROM neto 		AS b
										WHERE 	b.codFilho = a.codFilho) 		AS qntdNeto,

										(SELECT COUNT(b.codNeto) FROM neto 		AS b
										WHERE 	b.codFilho = a.codFilho
										AND 	b.statusNeto=0)					AS qntdPendente,
										
										(SELECT COUNT(b.codNeto) FROM neto 		AS b
										WHERE	b.codFilho = a.codFilho
										AND 	b.statusNeto=1)					AS qntdIniciado,

										(SELECT COUNT(b.codNeto) FROM neto 		AS b
										WHERE 	b.codFilho = a.codFilho
										AND 	b.statusNeto=2)					AS qntdFinalizado

								FROM 	filho 									AS a
								WHERE 	a.codPai = :id';

					$sql=$conn->prepare($query);

					$sql->bindParam(':id', $idPai);

					$sql->execute();

					$select1=$sql->fetchAll();

					foreach ($select1 as $each1) { 

						if ($each1['qntdNeto']<1) { ?>

							<div style="border-radius: 7px;" id="<?php echo $each1['codFilho'].'abcdd'; ?>">
								<ul class="collapsible popout" role="sub" style="border-radius: 2px; zoom:80%; border-radius: 7px;">

									<li style="border-radius: 7px;">
										<div class="collapsible-header" style="border-radius: 7px;">
											
											<span class="badge" data-badge-caption="" style="font-size:20pt;height: 40px;padding: 10px 10px 10px 0px;border-radius: 10px;margin-top: 19px;margin-left:0;margin-right: 8px;"><?php echo $each1['qntdNeto']; ?></span>

											<p>
												<label>
													<span style="font-size: 25pt; cursor: pointer"><?php echo $each1['nomeFilho']; ?></span>
												</label>
											</p>

											<span class="new badge grey lighten-1" data-badge-caption="-" style='font-size:20pt; height: 40px; padding: 10px; border-radius: 10px; margin-top:18.5px;'>-</span>

										</div>

										<div class="collapsible-body">
											<h5 style="margin-top: -30px;" class="grey-text text-darken-1">SUBATIVIDADES</h5>
												
											<button id="btnNew" style="zoom: 140%;" data-target="<?php echo $each1['codFilho'].'modal2'; ?>" class="btn waves-effect waves-light blue darken-2 modal-trigger" type="submit" name="additem">ADICIONAR SUBATIVIDADE
												<i class="material-icons right">add</i>
											</button>
										</div> 
									</li>
							</div> 

<?php 					}elseif ($each1['qntdNeto']>0) { 

							$qntdNeto=100/$each1['qntdNeto'];

							if ($each1['qntdFinalizado']>0) {
								$porcent=$qntdNeto*$each1['qntdFinalizado'];
								$porcent=number_format($porcent, 2);
								$porcent=str_replace('.',',',$porcent);

							}elseif ($each1['qntdFinalizado']<1) {
								$porcent=0;
							} ?>

							<div style="border-radius: 7px;" id="<?php echo $each1['codFilho'].'abcdd'; ?>">
								<ul class="collapsible popout" role="sub" style="border-radius: 2px; zoom:80%; border-radius: 7px;">

									<li style="border-radius: 7px;">
										<div class="collapsible-header" style="border-radius: 7px;">

										<span class="badge" data-badge-caption="" style="font-size:20pt; height:40px; padding:10px 10px 10px 0px; border-radius:10px; margin-top:19px; margin-left:0; margin-right: 8px;"><?php echo $each1['qntdNeto']; ?></span>

											<p>
												<label>
													<span style="font-size: 25pt; cursor: pointer"><?php echo $each1['nomeFilho']; ?></span>
												</label>
											</p>

<?php 									if ($porcent=='100,00') { ?>
											<span class="new badge green darken-1" data-badge-caption="%" style='font-size:20pt; height: 40px; padding: 10px; border-radius: 10px; margin-top:18.5px;'><?php echo $porcent; ?></span>
<?php									}else { ?>
											<span class="new badge grey darken-1" data-badge-caption="%" style='font-size:20pt; height: 40px; padding: 10px; border-radius: 10px; margin-top:18.5px;'><?php echo $porcent; ?></span>
<?php									} ?>

										</div>

										<div class="collapsible-body">
											<div style='margin-bottom:70px;' class='hide-on-small-only'>
												<i class="small material-icons grey-text darken-2 left" style="cursor: default; margin-right: 10px;">remove</i>
												<span class='center grey-text darken-2' style="font-size: 17pt; margin-right:15px;"><?php echo 'Não iniciados'; ?></span>
												<span class='center grey-text darken-2' style="font-size: 17pt; margin-right:70px;"><b><?php echo $each1['qntdPendente']; ?></b></span>

												<i class="material-icons green-text darken-2 left" style="cursor: default; margin-right: 10px; font-size:15px; padding-top: 10px; padding-left: 6px; padding-right: 8px;">lens</i>
												<span class='center green-text darken-2' style="font-size: 17pt; margin-right:15px;"><?php echo 'Em andamento'; ?></span>
												<span class='center green-text darken-2' style="font-size: 17pt; margin-right:70px;"><b><?php echo $each1['qntdIniciado']; ?></b></span>
													
												<i class="small material-icons blue-text darken-2 left" style="cursor: default; margin-right: 15px;">done</i>
												<span class='center blue-text darken-2' style="font-size: 17pt; margin-right:15px;"><?php echo 'Finalizados'; ?></span>
												<span class='center blue-text darken-2' style="font-size: 17pt;"><b><?php echo $each1['qntdFinalizado']; ?></b></span>
											</div>

											<h5 style="margin-top: -30px;" class="grey-text text-darken-1">SUBATIVIDADE(S)</h5>
												

<?php 										$query = '	SELECT 		a.codNeto 		AS 	codNeto,
																	a.statusNeto 	AS 	statusNeto,
																	a.nomeNeto 		AS 	nomeNeto,
																	a.iniciadoPor 	AS 	iniciadoPor
														FROM 		neto			AS 	a
														INNER JOIN  filho 			AS 	b ON a.codFilho = b.codFilho
														WHERE a.codFilho=:id';

											$sql=$conn->prepare($query);

											$sql->bindParam(':id', $each1['codFilho']);

											$sql->execute();

											$select2=$sql->fetchAll();

											foreach ($select2 as $each2) { ?>
										
												<form action="" method="GET">
													<div class="collection white" style="box-shadow: 0 0 20px 1px #e3e3e3; padding: 20px; margin: 0; border-radius: 7px;">
														<div class="collection"> 
															<label>

	<?php 														if ($each2['statusNeto']==0) { ?>
																	<a href="view-pai.php?neto=<?php echo $each2['codNeto']; ?>" class="waves-effect waves-light green btn right darken-1 done-{{todo.doneButton<?php echo $each2['codNeto']; ?>}}">INICIAR</a>
																	<i class="small material-icons grey-text darken-2 right" style="cursor: default; margin-right: 10px;">remove</i>
																	<input type="checkbox" name='teste[]' id='neto<?php echo $each2['codNeto']; ?>' value='<?php echo $each2['codNeto']; ?>' ng-model="todo.done<?php echo $each2['codNeto']; ?>" class="filled-in blue" />
																	<span class="done-{{todo.done<?php echo $each2['codNeto']; ?>}}" style="font-size: 20pt;"><?php echo $each2['nomeNeto']; ?></span>																		
																
	<?php														}elseif ($each2['statusNeto']==1) { ?>
																	<i class="material-icons green-text darken-2 right animated infinite flash logo" style="cursor: default; margin-right: 10px; font-size:15px; padding-top: 10px; padding-left: 6px; padding-right: 8px;">lens</i>
																	<span class="done-{{todo.done<?php echo $each2['codNeto']; ?>}}" style="font-size: 20pt;" class=''><?php echo $each2['nomeNeto']; ?></span>
																	<span class='right green-text darken-2 animated infinite flash logo' style="font-size: 18.5pt; font-weight: 400;"><?php echo $each2['iniciadoPor']; ?></span>
	<?php														
																}elseif ($each2['statusNeto']==2) { ?>
																	<i class="small material-icons blue-text darken-2 right" style="cursor: default; margin-right: 10px;">done</i>
																	<span class="done-{{todo.done<?php echo $each2['codNeto']; ?>}}" style="font-size: 20pt;"><?php echo $each2['nomeNeto']; ?></span>
																	<span class='right blue-text darken-2' style="font-size: 18.5pt; font-weight: 400;"><?php echo $each2['iniciadoPor']; ?></span>

	<?php														} ?>

															</label>
														</div>
													</div> &nbsp;
	<?php 									} ?>

											<br>
											<br>

											<div class='row'>
												<button id="btnRemove<?php echo $each1['codFilho']; ?>" disabled='true' style="zoom: 140%;" data-target="<?php echo $each1['codFilho'].'modal3'; ?>" class="btn waves-effect waves-light red left darken-2 modal-trigger" type="submit" name="removeitem">REMOVER SUBATIVIDADE(S)
													<i class="material-icons right">remove</i>
												</button>

												<button id="btnNew" style="zoom: 140%;" data-target="<?php echo $each1['codFilho'].'modal2'; ?>" class="btn waves-effect waves-light blue right darken-2 modal-trigger" type="submit" name="additem">ADICIONAR SUBATIVIDADE
													<i class="material-icons right">add</i>
												</button>
											</div>

										</form>
									</div> 
								</li>
							</ul>
						</div> 

<?php 						} ?>

							<div id="<?php echo $each1['codFilho'].'modal2'; ?>" class="modal" style="border-radius: 10px;">
								<i class="small modal-action modal-close material-icons grey-text text-darken-1 right" style="padding: 10px">clear</i>
								<form method="GET" action="">
									<div class="row padd-25" style="zoom: 140%;">

										<div class="row">
											<h5 class='grey-text text-darken-1'>ATIVIDADE: <b><?php echo $each1['nomeFilho']; ?></b></h5>
										</div>

										<div class="row">
											<div class="input-field col s12">
												<textarea name="textSub" required id="textSub<?php echo $each1['codFilho']; ?>" class="materialize-textarea" data-length="150"></textarea>
												<label for="textProj">SUBATIVIDADE</label>
											</div>
										</div>

										<?php $idFilho=$each1['codFilho']; ?>

										<button id="btnNewSub<?php echo $each1['codFilho']; ?>" class="btn-small waves-effect waves-light right hide-on-med-and-down blue darken-2" value='<?php echo $idFilho.'/'.$idPai; ?>' type="submit" name="addsub">VALIDAR
											<i class="material-icons right">done</i>
										</button>

										<button id="btnNewSub-min<?php echo $each1['codFilho']; ?>" class="btn-small waves-effect waves-light right hide-on-large-only blue darken-2" value='<?php echo $idFilho.'/'.$idPai; ?>' type="submit" name="addsub">
											<i class="material-icons center">done</i>
										</button>

										<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-med-and-down"><i class="material-icons left">clear</i>REDEFINIR</a> 
										
										<a class="waves-effect waves-black btn-small grey darken-2 white-text tooltipped right hide-on-large-only"><i class="large material-icons center">clear</i></a> 
									</div>
								</form>
							</div>

							<div id="<?php echo $each1['codFilho'].'modal3'; ?>" class="modal" style="border-radius: 10px;">
								<i class="small modal-action modal-close material-icons grey-text text-darken-1 right" style="padding: 10px">clear</i>
								<form method="GET" action="">
									<div class="row padd-25" style="zoom: 140%;">

										<div class="row">
											<h5 class='grey-text text-darken-1'>Deseja mesmo remover o(s) item(s) selecionado(s)? </h5>
										</div>

										<br><br>

										<button id="btnNewSub<?php echo $each1['codFilho']; ?>" class="btn-small waves-effect waves-light right hide-on-med-and-down blue darken-2" value='' type="submit" name="addsub">CONFIRMAR
											<i class="material-icons right">done</i>
										</button>

										<button id="btnNewSub-min<?php echo $each1['codFilho']; ?>" class="btn-small waves-effect waves-light right hide-on-large-only blue darken-2" value='' type="submit" name="addsub">
											<i class="material-icons center">done</i>
										</button>

										<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-med-and-down"><i class="material-icons left">clear</i>CANCELAR</a> 
										
										<a class="waves-effect waves-black btn-small grey darken-2 white-text tooltipped right hide-on-large-only"><i class="large material-icons center">clear</i></a> 
									</div>
								</form>
							</div>


<?php					} ?>
					<br>
				</div>
			</div>
		</td>
	</tr>


	<div class="inner">

		<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />

		<a href="" class="waves-effect waves-light btn grey darken-2 left hide-on-med-and-down"><i class="material-icons right">refresh</i>RECARREGAR</a> 
		<a href="" class="waves-effect waves-light btn-small grey darken-2 left hide-on-large-only"><i class="large material-icons center">refresh</i></a> 

		<a href="index.php" class="waves-effect waves-light btn grey darken-2 tooltipped left hide-on-med-and-down"><i class="material-icons left">keyboard_backspace</i>VOLTAR</a> 
		<a href="index.php" class="waves-effect waves-light btn-small grey darken-2 tooltipped left hide-on-large-only"><i class="large material-icons center">keyboard_backspace</i></a> 
		
		<br /> <br /> <br /> <br />

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

    	<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/jsGar.js"></script>
		<script type="text/javascript" src="js/jqGar.js"></script>

		<script>

			$("#textSub<?php echo $each1['codFilho']; ?>").on('input', function(){
				$("#btnNewSub<?php echo $each1['codFilho']; ?>").prop('disabled', !this.value);
				$("#btnNewSub-min<?php echo $each1['codFilho']; ?>").prop('disabled', !this.value);
			});


			$("#neto<?php echo $each2['codNeto']; ?>").change(function() {
				if(this.checked) {
					$("#btnRemove<?php echo $each1['codFilho']; ?>").prop('disabled', !this.value);
				}else{
					$("#btnRemove<?php echo $each1['codFilho']; ?>").prop('disabled', this.value);
				}
			});

			var countChecked = function() {
				var n = $("input:checked").length;
				$("#btnRemove<?php echo $each1['codFilho']; ?>").text("REMOVER SUBATIVIDADE(S) "+(n > 0 ? n : '-'));
			};

			countChecked();

			$( "input[type=checkbox]" ).on( "click", countChecked);

		</script>

	</body> 
 </html> 