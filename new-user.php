<?php 
	require 'conn.php';
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

			.datepicker-date-display {background-color: #43A047;}

			.datepicker-cancel, .datepicker-clear, .datepicker-today, .datepicker-done {color: #43A047;}

			.datepicker-table td.is-selected {background-color: #43A047;}

			.dropdown-content li>a, .dropdown-content li>span {color: #43A047;}

			.month-prev:active, .month-next:active{    background-color: #43a047c4; border-radius:7px;}

			.month-prev:focus, .month-next:focus{    background-color: #43a047c4; border-radius:7px;}

			.datepicker-controls .select-month input {width: 100px;}

   		</style>

    </head>

    <body>	

	<br />

	<h4 style="background: linear-gradient(to left, #212121, #212121, #8d8d8d, #212121, #212121 ); text-align: center;">PROJECT GAR</h4>		

	<br /> <br />

	<div class="container">
		<div class="container br-10 grey lighten-3 bs-dark">
			<form method="GET" action="" enctype="multipart/form-data">
				<div class="row padd-25 inner">
					<div class="row">
						<div class="input-field col s12 m6 l6">
							<input type="text" name='nome' id="input_nome" data-length="50" required onkeyup="return HabBtn()">
							<label for="input_nome">NOME</label>
						</div>

						<div class="input-field col s12 m6 l6">
							<input type="text" name='login' id="input_login" data-length="25" required onkeyup="return HabBtn()">
							<label for="input_login">LOGIN</label>
						</div>
						
						<div class="input-field col s12 m12 l12">
							<input id="email" name='email' type="email" class="validate" required>
							<label for="email">E-MAIL</label>
							<span style="width:200px; text-align:left;" class="helper-text" data-error="E-MAIL INVÁLIDO" data-success="E-MAIL VÁLIDO">Status</span>
						</div>

						<div class="input-field col s12 m6 l6">
							<input type="text" name='telefone' id='input_fone' class="fone" required >
							<label for="input_fone">TELEFONE</label>
						</div>

						<div class="input-field col s12 m6 l6">
							<input type="text" id='input_date' name='datanasc' maxlength=0 class="datepicker" required>
							<label for="input_date">DATA DE NASCIMENTO</label>
						</div>

						<div class="input-field col s12 m12 l12">
							<input type="password" name='senha' id="input_pass" data-length="25" minlength=8 required onkeyup="return HabBtn()">
							<label for="input_pass">SENHA</label>
						</div>

						<div class="file-field input-field col s12 m12 l12">
							<div class="btn-small waves-effect waves-light green darken-1">
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

					<br>

					<button id="btnNewProj" name='cad' class="btn-small waves-effect waves-light right hide-on-med-and-down green darken-1" type="submit">CADASTRAR
						<i class="material-icons right">done</i>
					</button>

					<button id="btnNewProjMin" name='cad' class="btn-small waves-effect waves-light right hide-on-large-only green darken-1" type="submit">
						<i class="material-icons center">done</i>
					</button>

					<a href='login.php' class="waves-effect waves-black btn-small grey darken-2 white-text left hide-on-med-and-down"><i class="material-icons left">keyboard_backspace</i>VOLTAR</a> 
					<a href='login.php' class="waves-effect waves-black btn-small grey darken-2 white-text left hide-on-large-only"><i class="large material-icons center">keyboard_backspace</i></a> 

					<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-med-and-down"><i class="material-icons left">clear</i>REDEFINIR</a> 
					<a onclick="return apagarCampos()" class="waves-effect waves-black btn-small grey darken-2 white-text right hide-on-large-only"><i class="large material-icons center">clear</i></a> 
				</div>
			</form>
		</div>
	</div>

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
		
		<script type='text/javascript' src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
		
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

		<script type='text/javascript'>
        $(function(){
            var masks = ['(00) 00000-0000', '(00) 0000-00009'],
            maskBehavior = function(val, e, field, options) {
                return val.length > 14 ? masks[0] : masks[1];
            };
            
            $('.fone').mask(maskBehavior, {onKeyPress: 
                function(val, e, field, options) {
                    field.mask(maskBehavior(val, e, field, options), options);
                }
            });
		});
		
        </script>
	</body> 
 </html>

 <?php 	
 
 	if (isset($_GET['cad'])) {

		$error = array();
	
		if (!isset($_GET['nome'])||!isset($_GET['login'])||!isset($_GET['email'])||!isset($_GET['senha'])||!isset($_GET['telefone'])) {
			$error[]='Não foi possível realizar o cadastro!<br />';

		}else{
			$nome=trim(strtoupper($_GET['nome']));
			$login=trim(strtoupper($_GET['login']));
			$email=trim(strtoupper($_GET['email']));
			$senha=trim(strtoupper($_GET['senha']));
			$telefone=trim(strtoupper($_GET['telefone']));
			$dataNasc=trim(strtoupper($_GET['datanasc']));

			if (empty($nome)||empty($login)||empty($email)||empty($senha)||empty($telefone)) {
				$error[]='Não foi possível realizar o cadastro!<br />';

			}else{

				$telefone=explode('(',$telefone);
				$telefone=explode(')', $telefone[1]);
				$telefone1=explode('-', $telefone[1]);

				$telefone=$telefone[0].$telefone1[0].$telefone1[1];

				$telefone=explode(' ', $telefone);

				$telefone=$telefone[0].$telefone[1];

				$dataNasc = date("d/m/Y", strtotime($dataNasc));

				$dataNasc=explode('/',$dataNasc);

				$data=date('d/m/Y');

				$data=explode('/',$data);

				if (($data[2]-$dataNasc[2])==18) {

					if ($data[1]==$dataNasc[1]) {

						if ($data[0]>=$dataNasc[0]) {
							$result=true;

						}elseif($data[0]<$dataNasc[0]){
							$result=false;
						}

					}elseif ($data[1]>$dataNasc[1]) {
						$result=true;

					}elseif ($data[1]<$dataNasc[1]) {
						$result=false;
					}

				}elseif (($data[2]-$dataNasc[2])>18) {
					$result=true;

				}elseif (($data[2]-$dataNasc[2])<18) {
					$result=false;
				}

				var_dump($nome);
				var_dump($login);
				var_dump($email);
				var_dump($telefone);
				var_dump($dataNasc);
				var_dump($senha);

				if ($result==false) {
					unset($nome, $login, $email, $telefone, $dataNasc, $senha); ?>
					<meta http-equiv="refresh" content="0; http://127.0.0.1/gar/cadastro-usuario.php">
<?php  			}

				if (5==4) {
				
					$conn = getConn();

					$query = '	INSERT INTO cadastro(
											nomeUser,
											loginUser,
											emailUser,
											senhaUser)
								VALUES		(:nome,
											:loginName,
											:email,
											:telefone,
											:senha)'; 
				
					$sql=$conn->prepare($query);
					$sql->bindParam(':nome', $nome);
					$sql->bindParam(':loginName', $login);
					$sql->bindParam(':email', $emil);
					$sql->bindParam(':telefone', $telefone);
					$sql->bindParam(':senha', $senha);
				
					$sql->execute();

					unset($conn);
				}
			}
		}

		foreach ($error as $list) {
			echo $list;
		}
	} ?>