<?php 

	// Chamando o arquivo de conexão ao Banco de Dados.
	require 'conn.php';

	// Método Get da conexão. Traz a conexão à página.
	$conn = getConn();

 ?>

<!DOCTYPE html>
<html> <!-- Inicio do HTML. Dentro dessa Tag, ficará toda a composição da página. -->
    <head> <!-- Onde se define as MetaTags (<meta...>), links de referência (<link...>), Estilização, Script, entre outros -->
    	<title>Project GAR</title> <!-- Título da página.´Serpa exibido na aba do Navegador. -->

   		<meta charset="utf-8">
		<meta name="author" content="Raul Germano">
		<link rel="icon" type="image/png" sizes="192x192" href="img/icon.png">
		   
   		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- link de referência: O projeto utiliza o Framework Google Fonts, responsavel pela estilização das fontes da página. -->

   		<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"> 
   		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> <!-- links de referência: O projeto utiliza os Frameworks MaterialDesign e FontAwesome, responsaveis pelos icones presentes na página -->

   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!-- link de referência: O projeto utiliza o Framework Materialie, responsavel pela estilização da página. -->

   		<link rel="stylesheet" type="text/css" href="css/styleGar.css"> <!-- link de referencia: Responsavel pela estilização costumizada da página. Esta entrando na pasta "css", trazendo o arquivo "styleGar.css" -->

   		<style type="text/css">
   			/*Tag Style: Estilização da página. Dentro dessa tag, posso adicionar estilizações, atravez de atributos das demais Tags, classes, e por outros modos, como a seguir: */

   			.padd-25{padding: 25px;}

   			.colors-line {	width: 100%;
						    height: 3.5px;
						    float: left;
						    background-image: url(img/colors-line1.png);}

			.pagination{margin: 0;}

			.btn, .btn-small{margin: 0 3px 0 3px;}
			
			.logo{  animation-duration: 2.5s;
            		animation-delay: 2.5s;}

			@keyframes flash {	from,
								100%{
									opacity: 1;
								}

								50%{
									opacity: .25;
								}
							}

				.flash {
				animation-name: flash;
				}

				.animated.infinite {
				-webkit-animation-iteration-count: infinite;
				animation-iteration-count: infinite;
				}

   		</style>

    </head>

    <body>	

     <div class="navbar-fixed">
    	<nav class="tmn">
		    <div class="nav-wrapper grey darken-4">
			    <div class="">
			    	<!-- <ul id="nav-mobile" class="left hide-on-med-and-down"> -->
			        <ul id="nav-mobile" class="left hide-on-small-only">
		       			 <li>
				        	<a href="" class='dropdown-trigger' data-hover="true" data-target="dropdown2" style='width: 150px; padding-left: 30px;'>MENU<i class="material-icons right">arrow_drop_down</i></a>
				        </li>

						<ul id='dropdown2' class='dropdown-content'>
						    <li>
						    	<a href="#!" data-target="modal1" class=" modal-trigger grey-text text-darken-2"><i class="material-icons left">add</i>NOVO</a>
						    </li>

						    <!--<li>
						    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">remove</i>REMOVER</a>
						    </li>

						    <li>
						    	<a href="#!" class="grey-text text-darken-2"><i class="material-icons left">format_align_left</i>VISUALIZAR</a>
						    </li>-->
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

	<h4 style="background: linear-gradient(to left, #ffffff, #ffffff, #cdcdcd75, #cdcdcd75, #ffffff, #ffffff ); text-align: center;">INICIO</h4>

    <div class="inner">

		<table class="striped"> <!-- Tabela em HTML-->
	        <thead> <!-- Cabeçãlho da Tabela. Onde fica os primeiros dados da tabela, como os títulos  -->
	          	<tr> <!-- Linha onde os títulos das colunas ficam posicionados. -->
	             	<th>NOME</th>
	              	<th style="text-align: center;">QNTD ATIVIDADES</th>
	              	<th style="text-align: center;">QNTD SUBATIVIDADES</th>
	              	<!-- <th style="text-align: center;">QNTD HORAS</th> -->
	              	<th style="text-align: center;">ANDAMENTO</th>

	              	<th></th> <!--"Th" vazio porque não há necessidade de um título para essa coluna em especifico -->
	              	<!--"Th"s São os titulos das colunas. -->
	          	</tr>
	        </thead>

	        <tbody> <!-- Corpo da tabela. Onde os dados (linhas) ficaram armazenados. -->
<?php // Inicio do código PHP.
 // Variavel $conn esta recebendo o método Get da conexão. 

				$query = '	SELECT 		a.codPai								AS 	codPai,
										a.nomePai								AS 	nomePai,
							            (SELECT COUNT(b.codFilho) FROM filho 	AS 	b 
											WHERE b.codPai = a.codPai) 			AS 	qntdFilho
							FROM 		pai 									AS 	a '; 

							/* SELECT 		a.codPai			AS 	codPai,
											a.nomePai			AS 	nomePai,
 											COUNT(b.nomeFilho) 	AS 	qntdFilho,
 											COUNT(c.nomeNeto)	AS 	qntdNeto,
 											COUNT(c.horasNeto) 	AS 	horasNeto
							FROM 		pai 				AS 	a
							INNER JOIN 	filho 				AS 	b ON a.codPai = b.codFilho
							INNER JOIN 	neto 				AS 	c ON b.codFilho = c.codNeto
							GROUP BY 	(a.nomePai)*/

				$sql=$conn->prepare($query);

				$sql->execute(); //Executando o conteudo presente na váriavel "$sql", usando a função "execute()".

				$select=$sql->fetchAll(); // O retorno será um vetor, armazenado na variavel "$select".

				foreach ($select as $each) { // inicio do ForEach. Fará um loop trazendo as posições do vetor. Nesse caso, as posições do vetor, são os dados presentes nas colunas do Banco de Dados. 

					$query = '	SELECT 		COUNT(*) 	AS qntdNeto
								FROM 		neto n
								INNER JOIN 	filho f ON n.codfilho = f.codFilho
								INNER JOIN 	pai p 	ON f.codPai = p.codPai
								WHERE 		p.codPai = :idPai'; 

					$sql=$conn->prepare($query);

					$sql->bindParam(':idPai', $each['codPai']);

					$sql->execute(); //Executando o conteudo presente na váriavel "$sql", usando a função "execute()".

					$select=$sql->fetchAll();

					foreach ($select as $each123) { ?> <!-- Fim do bloco de PHP. -->

		          <tr>

		            <td class=""><?php echo $each['nomePai']; // valor do vetor onde esta passado para a váriavel "$each", com o valor da coluna "nomePai". Caso tenha alguma alteração no Banco de Dados, que afete essa tabela (seja por modifcação ou qualquer alteração), a alteração também deve ser aplicad onde ela é chamada.  ?></td> 
		            <td style="width: 130px; padding-bottom: 0; text-align: center;"><?php echo $each['qntdFilho']; ?></td>
		            <td style="width: 130px; padding-bottom: 0; text-align: center;"><?php echo $each123['qntdNeto']; ?></td>
		            <!-- <td style="width: 100px; padding-bottom: 0; text-align: center;">as</td> -->
		            <td style="width: 130px; padding-bottom: 0; text-align: center;"><?php echo '86,89 %'; ?></td>
		            <td style="width: 90px; text-align: right; padding-bottom: 0;"> <!-- Botões de Visualizar, Adicionar e Remover. -->
		          	
		            	<!-- <a href="#!" onclick="addItem('<?php echo 'txt'.$each['codPai']; ?>')"> "id" que será referenciado no Script, chamando a função AddItem, passando o valor do "id", como parametro. (a função é fazer a formulário usado para adicionar um novo item, sumir e/ou sumir). 
		            		<i class="small material-icons" style="color: #1976D2;">add_box</i>
		            	</a> -->

<?php 					if ($each['qntdFilho']>0) { ?>
			            	<a href="#!" id="abc" onclick="lessIten('<?php echo 'less'.$each['codPai']; ?>')">
			            		<i class="small material-icons" style="color: #1976D2;">add_box</i>
			            	</a>
<?php 		          	} ?>

						<a href="view-pai.php?idpai=<?php echo $each['codPai']; ?>">
		            		<i class="small material-icons" style="color: #616161;">insert_chart</i>
		            	</a>

		            </td> <!-- "td"s são as "celulas" de cada linha. Todas compõem uma linha inteira. -->
		         </tr> 
			        
		    	<tr style="background-color: transparent;"> <!-- Formulário que é exibido quando a função "AddItem()" é acionada -->
		            <td colspan="6">
		            	<div id="<?php echo 'txt'.$each['codPai']; ?>" class="row inner" style="zoom:80%; display: none;">
		            		<div class="input-field">
				            	<label for="input_text">DIGITE</label>
				            	<input id="input_text" class="col s4 m5 l6" type="text" data-length="70" maxlength="70" minlength="1" name="texto">
				            </div>
		            		<input style="margin-left: 40px;" id="input-data-inicio" type="text" class="datepicker col s1 m2 l2" value="INICIO">
				            
		            		<input style="margin-left: 40px;"  id="input-data-fim" type="text" class="datepicker col s1 m2 l2" value="FIM">

		            		<button class="btn waves-effect waves-light grey darken-2" type="submit" name="action" style="float: right; margin-top: 15px;" >
						    	<i class="material-icons right" style="margin-left: 0">send</i>
						  	</button>
		    			</div>
		    		</td>
		        </tr>

		        <tr style="background-color: transparent;">
		            <td colspan="6">
		            	<div id="<?php echo 'less'.$each['codPai']; ?>"  class="row inner" style="zoom:80%; border-radius: 7px; display: none; background-color: rgba(100, 100, 100, .07); box-shadow: 0px 0px 9px 0px #bbbbbb;"> <!-- Apresentando os ATIVIDADES presentes no projeto PAI. -->
		            		
		            		<div class="inner">
		            			<h5 style="padding-top: 10px;" class="grey-text text-darken-1">ATIVIDADES</h5>
		            			
<?php 								 $query = '	SELECT 	a.nomeFilho 							AS nomeFilho,
												       	a.codFilho 								AS codFilho, 
												       	(SELECT COUNT(b.codNeto) FROM neto 		AS b
												            WHERE b.codFilho = a.codFilho) 		AS qntdNeto
												FROM 	filho 									AS a
												WHERE a.codPai = :id';

									$sql=$conn->prepare($query);

									//$sql->bindParam(':id', $each['idTeste']); Usando o "id" do PAI (Projeto inteiro/final) no WHERE, para trazer os filhos que pertencem ao PAI. Exemplo: Trazendo os Filhos do PAI que possui o id = 56.

									$sql->bindParam(':id', $each['codPai']);

									$sql->execute();

									$select1=$sql->fetchAll();

									foreach ($select1 as $each1) { 
										if ($each1['qntdNeto']<1) { ?>
											
		            		
										<div style="border-radius: 7px;" id="<?php echo $each1['codFilho'].'abcdd'; ?>">
										  	<ul  style="border-radius: 2px; zoom:80%; border-radius: 7px; border-bottom: 1px solid #ddd;     -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12); box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);margin: 24px 24px;-webkit-transition: margin 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);transition: margin 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);">

											  	<li style="border-radius: 7px; cursor: auto;">
											    	<div class="collapsible-header" style="border-radius: 7px; cursor: auto;">

												    	<span class="badge" data-badge-caption="" style="font-size:20pt;height: 40px;padding: 10px 10px 10px 0px;border-radius: 10px;margin-top: 19px;margin-left:0;margin-right: 8px;"><?php echo $each1['qntdNeto']; ?></span>

														<p>
															<label>
																<!-- <input type="checkbox" disabled class="filled-in blue"/> -->
																<span style="font-size: 25pt; cursor: pointer"><?php echo $each1['nomeFilho']; ?></span>
															</label>
														</p>

														<span class="new badge grey lighten-1" data-badge-caption="-" style='font-size:20pt; height: 40px; padding: 10px; border-radius: 10px; margin-top:18.5px;'>-</span>
											  		
													  </div>

										      		<div class="collapsible-body">

		            									<h5 style="margin-top: -30px;" class="grey-text text-darken-1">SUBATIVIDADES</h5>

<?php 													$query = '	SELECT 		a.nomeNeto 	AS 	nomeNeto
																	FROM 		neto		AS 	a
																	INNER JOIN  filho 		AS 	b ON a.codFilho = b.codFilho
																	INNER JOIN 	pai 		AS 	c ON b.codFilho = c.codPai
																	WHERE a.codFilho=:id';

														$sql=$conn->prepare($query);

														$sql->bindParam(':id', $each1['codFilho']);

														$sql->execute();

														$select2=$sql->fetchAll();

														foreach ($select2 as $each2) { ?>

													      	<div class="collection white" style="box-shadow: 0 0 20px 1px #e3e3e3; padding: 20px; margin: 0; border-radius: 7px;">
													      		<div class="collection"> 
																  <label>
															        	<!-- <input type="checkbox" class="filled-in blue"/> -->
															        	<span style="font-size: 20pt;"><?php echo $each2['nomeNeto']; ?></span>
															      	</label>
																</div>
															</div>

															&nbsp;
<?php 													} ?>
										      		</div> 
											  	</li>
											</ul>
										</div> 
<?php 								}elseif ($each1['qntdNeto']>0) { 
									
									$qntdTotal[]=$each1['qntdNeto']; ?>

										<div style="border-radius: 7px;" id="<?php echo $each1['codFilho'].'abcdd'; ?>">
										  	<ul class="collapsible popout" role="sub" style="border-radius: 2px; zoom:80%; border-radius: 7px;">

											  	<li style="border-radius: 7px;">
											    	<div class="collapsible-header" style="border-radius: 7px;">
														
													<span class="badge" data-badge-caption="" style="font-size:20pt;height: 40px;padding: 10px 10px 10px 0px;border-radius: 10px;margin-top: 19px;margin-left:0;margin-right: 8px;"><?php echo $each1['qntdNeto']; ?></span>

												    	<p>
													      	<label>
													        	<!-- <input type="checkbox" disabled class="filled-in blue"/> -->
													        	<span style="font-size: 25pt; cursor: pointer"><?php echo $each1['nomeFilho']; ?></span>
													      	</label>
													    </p>

														<span class="new badge grey darken-1" data-badge-caption="%" style='font-size:20pt; height: 40px; padding: 10px; border-radius: 10px; margin-top:18.5px;'><?php echo $each1['qntdNeto']; ?></span>

											  		</div>

										      		<div class="collapsible-body">
														<div style='margin-bottom:70px;' class='hide-on-small-only'>
														  	<i class="small material-icons grey-text darken-2 left" style="cursor: default; margin-right: 10px;">remove</i>
															<span class='center grey-text darken-2' style="font-size: 17pt; margin-right:15px;"><?php echo 'Não iniciados'; ?></span>
															<span class='center grey-text darken-2' style="font-size: 17pt; margin-right:70px;"><b><?php echo '5'; ?></b></span>

															<i class="material-icons green-text darken-2 left" style="cursor: default; margin-right: 10px; font-size:15px; padding-top: 10px; padding-left: 6px; padding-right: 8px;">lens</i>
															<span class='center green-text darken-2' style="font-size: 17pt; margin-right:15px;"><?php echo 'Em andamento'; ?></span>
															<span class='center green-text darken-2' style="font-size: 17pt; margin-right:70px;"><b><?php echo '2'; ?></b></span>
															  
															<i class="small material-icons blue-text darken-2 left" style="cursor: default; margin-right: 15px;">done</i>
														  	<span class='center blue-text darken-2' style="font-size: 17pt; margin-right:15px;"><?php echo 'Finalizados'; ?></span>
														  	<span class='center blue-text darken-2' style="font-size: 17pt;"><b><?php echo '1'; ?></b></span>
														</div>
															<h5 style="margin-top: -30px;" class="grey-text text-darken-1">SUBATIVIDADES</h5>
														

<?php 													

$query = '	SELECT 		a.nomeNeto 	AS 	nomeNeto
																	FROM 		neto		AS 	a
																	INNER JOIN  filho 		AS 	b ON a.codFilho = b.codFilho
																	INNER JOIN 	pai 		AS 	c ON b.codFilho = c.codPai
																	WHERE a.codFilho=:id';

														$sql=$conn->prepare($query);

														$sql->bindParam(':id', $each1['codFilho']);

														$sql->execute();

														$select2=$sql->fetchAll();

														foreach ($select2 as $each2) { ?>

													      	<div class="collection white" style="box-shadow: 0 0 20px 1px #e3e3e3; padding: 20px; margin: 0; border-radius: 7px;">
													      		<div class="collection"> 
																	<label>

<?php 																if ($each2['nomeNeto']=='Criar Banco de Dados') { ?>
																		<i class="small material-icons grey-text darken-2 right" style="cursor: default; margin-right: 10px;">remove</i>
																		<span style="font-size: 20pt;"><?php echo $each2['nomeNeto']; ?></span>																		
															        	
<?php																}elseif ($each2['nomeNeto']=='Criar Tabelas') { ?>
																		<i class="small material-icons blue-text darken-2 right" style="cursor: default; margin-right: 10px;">done</i>
																		<span style="font-size: 20pt;"><?php echo $each2['nomeNeto']; ?></span>
																		<span class='right blue-text darken-2' style="font-size: 17pt;"><?php echo 'Raul Germano'; ?></span>
	
<?php																}elseif ($each2['nomeNeto']<>'Criar Banco de Dados') { ?>
																		<i class="material-icons green-text darken-2 right animated infinite flash logo" style="cursor: default; margin-right: 10px; font-size:15px; padding-top: 10px; padding-left: 6px; padding-right: 8px;">lens</i>
																		<!-- <input type="checkbox" class="filled-in green"/> -->
																		<span style="font-size: 20pt;" class=''><?php echo $each2['nomeNeto']; ?></span>
																		<span class='right green-text darken-2 animated infinite flash logo' style="font-size: 17pt;"><?php echo 'Raul Germano'; ?></span>
<?php																}?>

															      	</label>
																</div>
															</div>

															&nbsp;
<?php 													} ?>
										      		</div> 
											  	</li>
											</ul>
										</div> 
<?php 								} 
	 							} 

	 						} ?>

	 							<br>

								  	<button class="waves-effect btn grey darken-2 right" type="submit" style="cursor: auto; margin-right: 20px;">QUANTIDADE TOTAL: <b><?php echo array_sum($qntdTotal); ?></b></button>

									<br /> <br /> <br /> <!-- Quebras de linha -->
		            		</div>
		    			</div>
		    		</td>
		        </tr>
<?php 			} ?>
	       	</tbody>
	    </table>

	   	<br /> <br /> <br /> <br /> <br />

	    <a class="waves-effect waves-light btn grey darken-2 tooltipped left hide-on-med-and-down"><i class="material-icons left">keyboard_backspace</i>VOLTAR</a> 
	    <a class="waves-effect waves-light btn grey darken-2 left hide-on-med-and-down"><i class="material-icons right">refresh</i>RECARREGAR</a> 
    	<a href="view-projects.php?stts=<?php echo md5(0); ?>" class="waves-effect waves-light btn grey darken-2 right hide-on-med-and-down"><i class="material-icons right">format_align_left</i>VISUALIZAR PROJETO(S)</a>
	    <a data-target="modal1" class="modal-trigger waves-effect waves-light btn blue darken-2 right hide-on-med-and-down"><i class="material-icons left">add</i>NOVO PROJETO</a>

	    <a class="waves-effect waves-light btn-small grey darken-2 tooltipped left hide-on-large-only"><i class="large material-icons center">keyboard_backspace</i></a> 
	    <a class="waves-effect waves-light btn-small grey darken-2 left hide-on-large-only"><i class="large material-icons center">refresh</i></a> 
    	<a href="view-projects.php?stts=<?php echo md5(0); ?>" class="waves-effect waves-light btn-small grey darken-2 right hide-on-large-only"><i class="large material-icons center">format_align_left</i></a>
	    <a data-target="modal1" class="modal-trigger waves-effect waves-light btn-small blue darken-2 right hide-on-large-only"><i class="large  material-icons center">add</i></a>

	  	<ul class="pagination">
		    <li class="disabled">
		    	<a href="#!">
		    		<i class="material-icons">chevron_left</i>
		    	</a>
		    </li>

		    <li class="active grey darken-2 waves-effect waves-light">
		    	<a href="#!">1</a>
		    </li>

<?php 		$x = 200;

	    if ($x >= 30) { ?>

	    	<li class="waves-effect"><a href="#!">2</a></li> 

<?php 	} elseif ($x < 30) { ?>

		<?php } ?>
		</ul> 

		  	<br /> <br /> <br /> <br />

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
					   
					    <a class="waves-effect waves-black btn-small grey darken-2 white-text tooltipped right hide-on-large-only"><i class="large material-icons center">clear</i></a> 
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
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> <!-- script de referência: O projeto utiliza o Framework JQuery. -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> <!-- Script de referência do Framework Materialoize. -->
		<script type="text/javascript" src="js/jsGar.js"></script> <!-- Script de referencia: Esta entrando na pasta "js", trazendo o arquivo "jsGar.js", onde contem todos os Scripts que a página possui. -->
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