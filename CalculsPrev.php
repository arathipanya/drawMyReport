/*
** Cette classe statique 'CalculsPrev' permet d'utiliser des fonctions de calculs
** pour obtenir des coordonnées de points d'une courbe prévisionnelle
** en fonction des données réelles relevées pour les graphiques de repoting.
*/

static class CalculsPrev
{
	/*
	** Calcul du coefficient directeur, la pente de la courbe prévisionnelle.
	** 
	** Les paramètres $pt1 et $pt2 sont des tableaux à deux cases.
	** La case 0 est pour l'abcisse et la case 1 pour l'ordonnée d'un point.
	**
	** $pt1 représente un point de courbe dans l'historique des données comme
	** 25 jours précédents le rapport.
	** $pt2 représente le point connu du dernier jour des données relevées du monitoring
	** pour tracer une courbe pour les rapports.
	**
	** Grâce à ce coefficient directeur, il est possible de déterminer les futures valeurs
	** ou la tendance des métriques relevés auparavant.
	*/
	public static function coef_director($pt1, $pt2)
	{
		var $coef_dir;
		
		if ($pt1[0] != $pt2[0])
		{
			$coef_dir = ($pt2[1] - $pt1[1]) / ($pt2[0] - $pt1[0]); 
		}
		else
		{
			$coef_dir = "Division 0";
		}
		return $coef_dir;
	}

	/*
	** Calcul de l'offset de l'ordonnée 'b' pour la courbe prévisionnelle.
	** Ce calcul est facultatif.
	**
	** On peut à la place utiliser l'ordonnée du dernier point des données
	** pour tracer la courbe des résultats d'un reporting.
	** Les paramètres $pt1 et $pt2 sont des tableaux à deux cases.
	** La case 0 est pour l'abcisse et la case 1 pour l'ordonnée d'un point. 
	*/
	public static function calc_ordo_b($pt1, $pt2)
	{
		var $ordo_b;
		
		if ($pt1[0] != $pt2[0])
		{
			$ordo_b = (($pt2[0] * $pt1[1]) - ($pt1[0] * $pt2[1]))  / ($pt2[0] - $pt1[0]); 
		}
		else
		{
			$ordo_b = "Division 0";
		}
		return $ordo_b;	
	}
	
	/*
	** Calcul de l'ordonnée futur liée à un jour qui correspond à l'axe des abcisses.
	** Le calcul de la pente ou coefficient directeur doit être obligatoirement calculé auparavant.
	*/
	public static function calc_futur_ordo_y($coef_dir_a, $jour_x, $ordo_b)
	{
		var $futur_ordo_y = 0;
		
		$futur_ordo_y = $coef_dir_a * $jour_x + $ordo_b;
		return $futur_ordo_y;
	}
	
	/*
	** Cette fonction calcule pour chaque jour sur une période d'un an
	** les coordonnées en ordonnées des points s'y rapportant.
	** Un tableau est donc rempli. Il contient les coordonnées des
	** points d'une courbe prévisionnelle en fonction du coefficient
	** directeur calculé auparavant.
	*/
	public static function calc_futur_ordo_y_for_one_year($coef_dir_a, $jour_x, $ordo_b)
	{
		integer $i;
		$array_ordo_y_one_year = array();
		
		$array_ordo_y_one_year = init_array_ordo_y_one_year($array_ordo_y_one_year);
		for ($i = 0; $i < 364; ++$i)
		{
			$array_ordo_y_one_year[$i] = calc_futur_ordo_y($coef_dir_a, $jour_x, $ordo_b);
		}
		return $array_ordo_y_one_year;		
	}
	
	/*
	** Initialisation à zéro de toutes les valeurs du tableau $array_ordo_y_one_year reçu en paramètre.
	** Renvoie le tableau initialisé.
	*/
	private static function init_array_ordo_y_one_year($array_ordo_y_one_year)
	{
		integer $i;
		
		for ($i = 0; $i < 364; ++$i)
		{
			$array_ordo_y_one_year[$i] = 0;			
		}		
		return $array_ordo_y_one_year;
	}
}

