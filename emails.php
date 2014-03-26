<!DOCTYPE html>
<html lang="fr" xml:lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
		<title>Construction de rapport</title>
		<link rel="stylesheet" type="text/css" href="include/css/formulaire.css" />
		<script type="text/javascript" />
		
						
		<script>
			function loadit( element)
			{
				var tabs=document.getElementById('tabs').getElementsByTagName("a");
				for (var i=0; i < tabs.length; i++)
				{
					if(tabs[i].href == element.href) 
						tabs[i].className="selected";
					else
						tabs[i].className="";
				}
			}
		</script>
	</head>
	
	<body>
	
		<div id="chooseElementReport">
			<p><h1>Elements de rapport</h1></p>
			
			<div id="tabs">
				<ul>
					<li><a href="CreateReport.html" target="mainFrame" onclick="loadit (this)" >PERSONNALISATION ET SAUVEGARDE DES RAPPORTS</a></li>
					<li><a href="ReportBuilding.html" class="selected" target="mainFrame" onclick="loadit (this)" >PARAMETRAGE DES ENVOIS PAR EMAIL</a></li>					
				</ul>
		
				<div id="toto"
					<p></p>
					<form id="form1" action="" method="post" name="form1">
						<label>
							<input type="text" value="exemple" name="textfield">
						</label>
						<p>
							<label>
								<input type="button" onclick="alert(document.form1.textfield.value)" value="Envoyer" name="Submit">
							</label>
						</p>
					</form>
				</div>
			</div>
		
		</div>
		
	</body>
</html>