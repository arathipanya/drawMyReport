<!DOCTYPE html>
<html lang="fr" xml:lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
		<title>Construction de rapport</title>
		<link rel="stylesheet" type="text/css" href="include/css/formulaire.css" />
				
		<script type="text/javascript" >
			function loadit(element)
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
		
		<!-- 		Show or hide some DIV according the events on the buttons in each Form.		   -->
		
		<script type="text/javascript" >
		
			//////////////////////////////////////////////////////////
			// Fonctions d'affichage des DIV pour chaque formulaire
			//////////////////////////////////////////////////////////
			
			// Menu principal
			
			function showMainMenu()
			{
				hidePartCreateReport();
				hidePartFinalizeReport();
				//hideFormChooseMachine();
				//hideFormTypeData();
				//hideFormTypeGraf();
				//hideFormTitleGraf();
				//hideFormCreateReport();
				//hideFormModifReport();
				//hideFormViewListReport();
				//hideViewReport();				
				elmt = document.getElementById('mainMenu');
				elmt.style.display = "";
			}
			
			// Partie [B]
			
			function showFinalizeReport()
			{
				hidePartCreateReport();
				elmt = document.getElementById('finalizeReport');
				elmt.style.display = "";
			}
			
			function showTitleReport()
			{
				showFinalizeReport();
				hideChoosePeriode();
				hideChooseCreatedGraf();
				hideNameReport();
				hideListCreatedReports();
				elmt = document.getElementById('titleReport');
				elmt.style.display = "";				
			}
						
			function showChoosePeriode()
			{
				hideTitleReport();
				hideChooseCreatedGraf();
				hideNameReport();
				hideListCreatedReports();
				elmt = document.getElementById('choosePeriode');
				elmt.style.display = "";
			}
			
			function showChooseCreatedGraf()
			{
				hideTitleReport();
				hideChoosePeriode();
				hideNameReport();
				hideListCreatedReports();
				elmt = document.getElementById('chooseCreatedGraf');
				elmt.style.display = "";
			}
			
			function showNameReport()
			{
				hideListCreatedReports();
				hideTitleReport();
				hideChooseCreatedGraf();
				hideChoosePeriode();
				elmt = document.getElementById('nameReport');
				elmt.style.display = "";
			}
			
			function showListCreatedReports()
			{
				hideTitleReport();
				hideNameReport();
				hideChoosePeriode();
				hideChooseCreatedGraf();
				elmt = document.getElementById('listCreatedReports');
				elmt.style.display = "";
			}
			
			// Fin Partie [B]
			
			// Début Partie [A]
			
			function showPartCreateReport()
			{
				elmt = document.getElementById('createReport');
				elmt.style.display = "";
			}
			
			function showFormChooseMachine()
			{	
				showPartCreateReport();			
				hideMainMenu();
				hideFormTypeData();
				hideFormTypeGraf();
				hideFormTitleGraf();				
				elmt = document.getElementById('chooseMachine');
				elmt.style.display = "";
			}
			
			function showFormTypeData()
			{
				hideMainMenu();
				hideFormChooseMachine();
				hideFormTypeGraf();
				hideFormTitleGraf();				
				elmt = document.getElementById('typeData');
				elmt.style.display = "";
			}
			
			function showFormTypeGraf()
			{
				hideMainMenu();
				hideFormChooseMachine();
				hideFormTypeData();				
				hideFormTitleGraf();				
				
				elmt = document.getElementById('typeGraf');
				elmt.style.display = "";
			}
			
			function showFormTitleGraf()
			{
				hidePartFinalizeReport();
				showPartCreateReport();
				hideMainMenu();
				hideFormChooseMachine();
				hideFormTypeData();				
				hideFormTypeGraf()				
				
				elmt = document.getElementById('titleGraf');
				elmt.style.display = "";
			}
			
			function showZoneCreateNewReport()
			{
				hideMainMenu();
				hideFormChooseMachine();
				hideFormTypeData();
				hideFormTypeGraf();
				hideFormTitleGraf();
				
				elmt = document.getElementById('');
				elmt.style.display = "";
			}
			
			function showFormModifReport()
			{
				hideFormCreateReport();
				hideFormModifReport();
				hideFormViewListReport();
				hideViewReport();
				hideMainMenu();
				elmt = document.getElementById('');
				elmt.style.display = "";
			}
			
			function showFormViewListReport()
			{
				hideFormCreateReport();
				hideFormModifReport();
				hideFormViewListReport();
				hideViewReport();
				hideMainMenu();
				elmt = document.getElementById('');
				elmt.style.display = "";
			}
			
			function showViewReport()
			{
				hideFormCreateReport();
				hideFormModifReport();
				hideFormViewListReport();
				hideViewReport();
				hideMainMenu();
				elmt = document.getElementById('');
				elmt.style.display = "";
			}			
			
			function showFieldsetForms()
			{
				elmt = document.getElementById('selectGraf');
				elmt.style.display = "";
			}
			
			// Fin Partie [A]
			
			////////////////////////////////////////////////////////////
			// Fonctions d'occultation des DIV pour chaque formulaire
			////////////////////////////////////////////////////////////
			
			function hidePartFinalizeReport()
			{
				elmt = document.getElementById('finalizeReport');
				elmt.style.display = "none";
			}
			
			function hidePartCreateReport()
			{
				elmt = document.getElementById('createReport');
				elmt.style.display = "none";
			}
			
			function hideTitleReport()
			{
				elmt = document.getElementById('titleReport');
				elmt.style.display = "none";
			}
			
			function hideChoosePeriode()
			{
				elmt = document.getElementById('choosePeriode');
				elmt.style.display = "none";
			}
			
			function hideChooseCreatedGraf()
			{
				elmt = document.getElementById('chooseCreatedGraf');
				elmt.style.display = "none";
			}
			
			function hideNameReport()
			{
				elmt = document.getElementById('nameReport');
				elmt.style.display = "none";
			}
			
			function hideListCreatedReports()
			{
				elmt = document.getElementById('listCreatedReports');
				elmt.style.display = "none";
			}
			
			function hideFormTypeGraf()
			{
				elmt = document.getElementById('typeGraf');
				elmt.style.display = "none";
			}
			
			function hideFormChooseMachine()
			{
				elmt = document.getElementById('chooseMachine');
				elmt.style.display = "none";
			}
			
			function hideZoneCreateNewReport()
			{
				elmt = document.getElementById('zoneFormCreateNewReport');
				elmt.style.display = "none";
			}
			
			function hideFormModifReport()
			{
				elmt = document.getElementById('modifReport');
				elmt.style.display = "none";
			}
			
			function hideFormViewListReport()
			{
				elmt = document.getElementById('viewListReport');
				elmt.style.display = "none";
			}
			
			function hideViewReport()
			{
				elmt = document.getElementById('viewReport');
				elmt.style.display = "none";
			}
			
			function hideMainMenu()
			{
				elmt = document.getElementById('mainMenu');
				elmt.style.display = "none";
			}
			
			function hideFormTypeData()
			{
				elmt = document.getElementById('typeData');
				elmt.style.display = "none";
			}
			
			function hideFormTitleGraf()
			{
				elmt = document.getElementById('titleGraf');
				elmt.style.display = "none";
			}
			
			function hideFieldsetForms()
			{
				elmt = document.getElementById('selectGraf');
				elmt.style.display = "none";
			}
			
		
		</script>
	</head>
	
	<body>
	
				
		<div id="chooseElementReport">
			<p><h1>Eléments de rapport</h1></p>
			
			<!--		Menu sous forme d'onglets		-->
			
			<div id="tabs">
			</div>
			
			<!--       Div principale pour la personnalisation et sauvegarde des rapports      -->		
				<div id="zoneFormCreateNewReport">
					<fieldset id="form">
					<!--       Div du menu principal pour les formulaires de type création de nouveaux rapports  	-->
					<div id="mainMenu">
						<p>
							<button name="createNewReport" type="button" onclick="showFormChooseMachine()" >Créer un nouveau rapport</button>
						</p>
						<p>
							<button name="viewListReport" type="button" onclick="" >Liste des rapports créés modifiables</button>
						</p>
						<p></p>
					</div>
					
					<!--  -->
					<!--  DEBUT		Div étape A => Sélectionner un graphe	 -->
					<!--  -->
					<div id="createReport">
					
						<p>
							<h2>[A] Sélectionner un graphique</h2>
						</p>
						<br />
						<!--  Formulaire étape A1 => Choisir la/les machine(s) concernée(s)	{OBLIGATOIRE} -->
						<form id="chooseMachine" action="" name="chooseMachine" >
							<p>
								<label for="listChoixMachines">Choix machine<br /><span class="information"> (écrire une lettre du nom de la machine à choisir ou la touche bas du clavier pour afficher la liste)</span></label>
								<p></p>
								<input list="listMachines" type="text" id="listChoixMachines">
								<datalist id="listMachines">
									<option value="machine1">Machine_1</option>
									<option value="machine2">Machine_2</option>
									<option value="machine3">Machine_3</option>
									<option value="machine4">Machine_4</option>
									<option value="machine5">Machine_5</option>
									<option value="machine6">Machine_6</option>
									<option value="machine7">Machine_7</option>
									<option value="machine8">Machine_8</option>
									<option value="machine9">Machine_9</option>
									<option value="machine10">Machine_10</option>
								</datalist>
							</p>
							<p>
								<button name="previous" type="button" onclick="showMainMenu()">Précédent</button>								
								<button name="next" type="button" onclick="showFormTypeData()">Suivant</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>
						
						<!--  Formulaire étape A2 => Choisir les types de données (espace disque, connexion, etc...) {OBLIGATOIRE}	 -->
						<form id="typeData" action="" method="post" name="typeData" >
							<p>
								<label for="listChoixTypeData">Choix type de données<br /><span class="information"> (écrire une lettre du type de données à choisir ou la touche bas du clavier pour afficher la liste)</span></label>
								<p></p>
								<input list="listTypeData" type="text" id="listChoixTypeData">
								<datalist id="listTypeData">
									<option value="espace_disque">Espace_disque</option>
									<option value="connexion">Connexion</option>
									<option value="type3">Type_3</option>
									<option value="type4">Type_4</option>
									<option value="type5">Type_5</option>
									<option value="type6">Type_6</option>
									<option value="type7">Type_7</option>
									<option value="type8">Type_8</option>
									<option value="type9">Type_9</option>
									<option value="type10">Type_10</option>
								</datalist>								
							</p>
							<p>
								<button name="previous" type="button" onclick="showFormChooseMachine()">Précédent</button>								
								<button name="next" type="button" onclick="showFormTypeGraf()">Suivant</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>

						<!--  Formulaire étape A3 => Choisir le type de graphique à générer	{OBLIGATOIRE}	 -->
						<form id="typeGraf" action="" method="post" name="typeGraf" >
							<label><p><h3>Choix du type de graphique à générer : </h3><img src="./include/images/multiGraph1_reduit.png" ></p> </label>
							<fieldset id="choosetypeGraf" >
								<legend>Type de graphique</legend>								
								<p></p>								
								<div ><input id="circular" type="radio" name="typeGraf" value="circular" ><label for="circular">Type Circulaire</label><img class="miniGraf" src="./include/images/diagramme-circulaire2_reduit.png"></div>
								<div ><input id="verticalStick" type="radio" name="typeGraf" value="verticalStick" ><label for="verticalStick">Type Bâton vertical</label><img class="miniGraf" src="./include/images/batons_vertical1_reduit.png"></div>
								<div ><input id="horizontalStick" type="radio" name="typeGraf" value="horizontalStick" ><label for="horizontalStick">Type Bâton horizontal</label><img class="miniGraf" src="./include/images/batons_horizontal1_reduit.png"></div>
								<div ><input id="line" type="radio" name="typeGraf" value="line" ><label for="line">Type Ligne<img class="miniGraf" src="./include/images/courbe1_reduit.png"></div>
							</fieldset>
							<p>
								<button name="previous" type="button" onclick="showFormTypeData()">Précédent</button>								
								<button name="next" type="button" onclick="showFormTitleGraf()">Suivant</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>

						<!--  Formulaire étape A4 => Donner un titre et une description pour le graphique généré	[OPTIONNEL]	 -->
						<form id="titleGraf" action="" method="post" name="titleGraf" >
							<p>
								<label for="title">Titre du graphique : </label><input type="text" value="titre" name="textfield" />								
							</p>
							<p>
								<label for="description">Description du graphique : </label>
								<textarea name="description" rows=4 cols=80  wrap=virtual>Description</textarea>
							</p>
							<p>
								<button name="previous" type="button" onclick="showFormTypeGraf()">Précédent</button>								
								<button name="next" type="button" onclick="showTitleReport()">Suivant</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>						
						
						</div>
					<!--  -->
					<!--  FIN		Div étape A => Sélectionner un graphe	 -->
					<!--  -->
						
						
					<!--  -->
					<!--  DEBUT		Div étape B => Créer et sauvegarder un rapport	 -->
					<!--  -->
					<div id="finalizeReport">
					
						<p>
							<h2>[B] Finaliser et sauvegarder un rapport</h2>
						</p>
						<br />
						<!--  Formulaire étape B1 => Donner un titre et un sous-titre pour le rapport	[OPTIONNEL]	 -->
						<form id="titleReport" action="" method="post" name="titleReport" >
							<p>
								<label for="title">Titre du rapport : </label><input type="text" value="titre" name="textfield" />								
							</p>
							<p>
								<label for="subtitle">Sous-titre du rapport : </label>
								<textarea name="subtitle" rows=4 cols=80  wrap=virtual>subtitle</textarea>
							</p>
							<p>
								<button name="previous" type="button" onclick="showFormTitleGraf()">Précédent</button>								
								<button name="next" type="button" onclick="showChoosePeriode()">Suivant</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>	

						<!--  Formulaire étape B2 => Choisir la période de remontée des données {OBLIGATOIRE} -->
						<form id="choosePeriode" action="" name="choosePeriode" >
							
							<p>
								<label for="listChoixPeriodes">Choix période<br /><span class="information"> (écrire une lettre du nom de la machine à choisir ou la touche bas du clavier pour afficher la liste)</span></label>
								<p></p>
								<input list="listPeriodes" type="text" id="listChoixperiodes">
								<datalist id="listPeriodes">
									<option value="7 jours">7_jours</option>
									<option value="15 jours">15_jours</option>
									<option value="1 mois">1_mois</option>
									<option value="3 mois">3_mois</option>
									<option value="6 mois">6_mois</option>
									<option value="1 an">1_an</option>
								</datalist>
							</p>
							<p>
								<button name="previous" type="button" onclick="showTitleReport()">Précédent</button>								
								<button name="next" type="button" onclick="showChooseCreatedGraf()">Suivant</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>
						
						<!--  Formulaire étape B3 => Choisir les graphes à afficher sur le rapport {OBLIGATOIRE}	 -->
						<form id="chooseCreatedGraf" action="" method="post" name="chooseCreatedGraf" >
							<p>
								<label for="listChoixGraf">Choix du graphique à afficher sur le rapport<br />
									<span class="information"> (écrire une lettre du type de données à choisir ou la touche bas du clavier pour afficher la liste)</span>
								</label>
								<p></p>
								<input list="listGrafCreated" type="text" id="listChoixGraf">
								<datalist id="listGrafCreated">
									<option value="graphique 1">graphique_1 </option>
									<option value="graphique 2">graphique_2</option>
									<option value="graphique 3">graphique_3</option>
									<option value="graphique 4">graphique_4</option>
									<option value="graphique 5">graphique_5</option>
									<option value="graphique 6">graphique_6</option>
									<option value="graphique 7">graphique_7</option>
									<option value="graphique 8">graphique_8</option>
									<option value="graphique 9">graphique_9</option>
									<option value="graphique 10">graphique_10</option>
								</datalist>								
							</p>
							<p>
								<button name="previous" type="button" onclick="showChoosePeriode()">Précédent</button>								
								<button name="next" type="button" onclick="showNameReport()">Suivant</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>

						<!--  Formulaire étape B4 => Donner un nom unique au rapport	{OBLIGATOIRE}	 -->
						<form id="nameReport" action="" method="post" name="nameReport" >
							<p>
								<label for="name">Nom (unique) du rapport : </label><input type="text" value="rapport 1" name="textfield" />								
							</p>
							<p>
								<button name="previous" type="button" onclick="showChooseCreatedGraf()">Précédent</button>								
								<button name="next" type="button" onclick="showListCreatedReports()">Finaliser la création du rapport</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>

						<!--  Formulaire étape B5 => Afficher et rechercher les rapports crées	[OPTIONNEL]	 -->
						<form id="listCreatedReports" action="" method="post" name="listCreatedReports" >
							<p>
								<label for="searchReport">Nom du rapport à rechercher : </label><input type="text" value="rapport Toto" name="textfield" />								
							</p>
							<br />
							<p>
								<label for="description">Rapport trouvé : </label>
								<textarea name="description" rows=5 cols=80  wrap=virtual>Rapport Toto sur quota espace disque utilisateur.</textarea>
							</p>
							<p>
								<button name="previous" type="button" onclick="showNameReport()">Précédent</button>								
								<button name="next" type="button" onclick="showMainMenu()">Retour au menu</button>
								<button name="cancel" type="button" onclick="showMainMenu()">Annuler</button>
							</p>
						</form>						
						
						</div>
						<!--  -->
						<!--  FIN		Div étape B => Créer et sauvegarder un rapport	 -->
						<!--  -->
						
						
						
						
					</fieldset>	
				</div>
			</div>
		
		</div>
		<script type="text/javascript" >
			showMainMenu();
		</script>
	
	</body>
</html>
