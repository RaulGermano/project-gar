<?php 

	require 'conn.php';

	$conn = getConn();

	if (isset($_GET['idpai'])) {
		$idPai=$_GET['idpai'];

		if (trim(empty($idPai))) {
			header('location: http://127.0.0.1/gar/index.php');

		}else{
			$query = '	SELECT 	nomePai 		AS 	nomepai,
							 	imgPai			AS 	imgpai, 
							 	statusPai 		AS 	statuspai,
							 	QuandoCriado	AS 	qndcriado
						FROM 	pai
						WHERE 	codPai = :id'; 

			$sql=$conn->prepare($query);
			$sql->bindParam(':id', $idPai);

			$sql->execute();

			$select=$sql->fetch(); 

			$date=$select['qndcriado'];
			$date=substr($date, 0,10);
			$qnd=explode('-',$date);

			$qnd=$qnd[2].'/'.$qnd[1].'/'.$qnd[0];


		}
	}

 ?>

<!DOCTYPE html>
<html class='grey darken-4'>
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

			.item{	width: 50%;
					margin:auto;}

   		</style>

    </head>

    <body>	

	<br />

	<h4 style="background: linear-gradient(to left, #212121, #212121, #8d8d8d, #212121, #212121 ); text-align: center;">PROJECT GAR</h4>

	<br /> <br />

	<div class="container">
		<div class="container grey br-10 lighten-3 bs-dark">
			<form method="POST" action="" enctype="multipart/form-data">
				<div class="row padd-25 inner">
					<div class="row">
						<div class="input-field col s12 m12 l12">
							<input type="text" id="input_text" data-length="25" maxlength=25 onkeyup="return HabBtn()" required>
							<label for="input_text">LOGIN</label>
						</div>
						
						<div class="input-field col s12 m12 l12">
						<input type="password" id="input_text" data-length="25" maxlength=25 minlength=8 onkeyup="return HabBtn()" required>
							<label for="input_text">SENHA</label>
						</div>
						
					</div>
						<!-- <div class="row" style="margin-left: 15px;">
							<label>
								<input type="checkbox" class="filled-in" />
								<span>Controle de horas</span>
							</label>
						</div> -->

					<div class="row">
						<label class="center" ID="labe1" style="font-size: 12pt;"></label>
					</div>

					<button id="btnNewProj" class="btn-small waves-effect waves-light right hide-on-med-and-down blue darken-2" type="submit" name="action">FAZER LOGIN
						<i class="material-icons right">done</i>
					</button>

					<button id="btnNewProjMin" class="btn-small waves-effect waves-light right hide-on-large-only blue darken-2" type="submit" name="action">
						<i class="material-icons center">done</i>
					</button>

					<a href='cadastro-usuario.php' id="btnNewProj" class="btn-small waves-effect waves-light left hide-on-med-and-down green darken-1" name="action">CADASTRE-SE
						<i class="material-icons right">add</i>
					</a>
					
					<a href='cadastro-usuario.php' id="btnNewProjMin" class="btn-small waves-effect waves-light left hide-on-large-only green darken-1" name="action">
						<i class="material-icons center">add</i>
					</a>

					<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-med-and-down"><i class="material-icons left">clear</i>REDEFINIR</a> 
				
					<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-large-only"><i class="large material-icons center">clear</i></a> 
				</div>
			</form>
		</div>
	</div>
    	

<?php 	$query = '	SELECT 	codPai		AS 	codpai,
							nomePai 	AS 	nomepai,
						 	imgPai		AS 	imgpai, 
						 	statusPai 	AS 	statuspai
					FROM 	pai
					WHERE 	codPai = :id'; 

		$sql=$conn->prepare($query);
		$sql->bindParam(':id', $idPai);

		$sql->execute();

		$select=$sql->fetchAll(); 

		foreach ($select as $each) { 

		} ?>


		<div class="inner">

		   	<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />

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

		<script type="text/javascript">
			$('.dropdown-trigger').dropdown({
				alignment: 'left',
				coverTrigger: false
			});

			function HabBtn(){
				var xUm=document.getElementById("textProj").value;
				if (xUm.lenght==0) {
					document.getElementById("btnNewProj").disabled=true;
					document.getElementById("btnNewProjMin").disabled=true;
				}else if(xUm.lenght!=0){
					document.getElementById("btnNewProj").disabled=false;
					document.getElementById("btnNewProjMin").disabled=false;
				}
			}

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