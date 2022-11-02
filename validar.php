<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<title>Form</title>
			<style type = "text/css">
				div	{text-align: center}
				div div	{font-size: larger}
				.prompt	{color: blue;
						 font-family: sans-serif
						 font-size: smaller}
				.avisoerro	{color:red}
				.smalltext	{font-size: smaller}
				.error	{color: red;
						 font-size: smaller}
			</style>
	</head>
	
	<body>
		<?php
			extract ($_POST);
			$falha = false;
			
			//array de titulos de livros
			$listalivros = array ("Java como programar", "Use a cabeca Java", "C# como programar", "Use a cabeca C#");
			
			//array com os sistemas operacionais
			$listasistemas = array ("Windows XP", "Windows Vista", "Mac OS X", "Linux", "Other");
			
			//array com os campos de texto
			$camposform = array ("fname" => "Nome", "lname" => "Sobrenome", "email" => "Email", "phone" => "Fone");

			//garantir que todos os campos foram preenchidos corretamente
			if (isset ($submit) ) {
				$formerros [ "fnameerror" ] = false;
				if($fname == ""){
					$formerros ["fnameerror"] = true;
					$falha = true;
				}
				$formerros ["lnameerror"] = false;
				
				if ($lname == ""){
					$formerror ["lnameerror"] = true;
					$falha = true;
				}
				$formerrors["emailerror"] = false;
				
				if($email == "") {
					$formerrors ["emailerror"] = true;
					$falha = true;
				}
				$formerrors ["phoneerror"] = false;
				
				if (!preg_match("/^\ \([0-9]{3}\) [0-9] {3} - [0-9] {4} $/", $phone)){
					$formerros["phoneerror"] = true;
					$falha = true;
				}
				
				if(!$falha){
				} //fim do if
			} //fim do if
			
			print ( "<h1>Registro de dados.</h1>
				Por favor, preencha todos os campos e clique em Registrar.");
				
			if($falha){
				print ("<br> <span class = 'avisoerro'>
					Os campos com * sao obrigatorios.</span>");
			}
			
			print("<!-- posta os dados no form.php -->
					<form method = 'post' action = 'validar.php'>
					
					<h3>Dados do Cliente</h3>
					<span class = 'prompt'>
					Por favor, preencha os campos abaixo. <br> </span>
					
					<!-- cria os quatros campos de texto, campos do form, entradas, alternativas -->");
					
			foreach ($camposform as $inputname => $inputalt){
				print (" $inputalt <input type = 'text'
						name = '$inputname' value = '". (isset ($$inputname) ? $$inputname : ''). "' />");
						
				if(isset ($formerros) && $formerrors [($inputname) . "error"] == true)
					print("<span class = 'error'> * </span>");
				
				print( "<br>");
			} //fim foreach
			
			if (isset ($formerrors) && $formerrors[ "phoneerror"])
				print ("<span class = 'error'>");
			else
				print ("<span class = 'smalltext'>");
			
			print("Este deve ser o formato correto (555)555-5555
			</span> <br><br>
			
			<h3>Livros</h3>
			
			<span class = 'prompt'>
			Qual livro gostaria ter dados!
			</span> <br>
			
			<!--criar a lista drop down com nomes dos Livros -->
			<select name = 'livros'>");
			
			foreach ($listalivros as $livrocorrente) {
				print ("<option");
				
				if (isset($livros) && ($livrocorrente == $livros))
					print ("selected = 'true'");
				
				print (">$livrocorrente</option>");
			} //fim do foreach
			
			print ("</select> <br> <br>
					<h3>Sistemas Operacionais</h3>
					<br><span class = 'prompt'>
					Qual sistema operacional usa atualmente?
					<br> </span>
					
					<!-- cria cinco botões de rádio -->");
				$counter = 0;
				foreach ($listasistemas as $sistemacorrente) {
					print("<input type = 'radio' name = 'os'
							value = '$sistemacorrente'");
							
					if (isset($os) && ($sistemacorrente == $os))
						print ("checked = 'checked'");
				    elseif (isset($os) && !$os && $counter == 0)
						print ("checked ='checked'"); 
						
					print ("/>$sistemacorrente");
					
					//colocar uma quebra de linha na lista de sistemas operacionais
					if($counter == 1) print ("<br>");
					++$counter;
				} //fim do foreach
				
				print ("<!-- criar o botão enviar -->
						<br> <input type = 'submit' name = 'submit'
						value = 'Registrar'/> </form> </body> </html> ");
		?>
