/*
** Cette classe statique 'CalculsPrev' permet d'utiliser des fonctions de calculs
** pour obtenir des coordonn�es de points d'une courbe pr�visionnelle
** en fonction des donn�es r�elles relev�es pour les graphiques de repoting.
*/

static class CalculsPrev
{
	/*
	** Calcul du coefficient directeur, la pente de la courbe pr�visionnelle.
	** 
	** Les param�tres $pt1 et $pt2 sont des tableaux � deux cases.
	** La case 0 est pour l'abcisse et la case 1 pour l'ordonn�e d'un point.
	**
	** $pt1 repr�sente un point de courbe dans l'historique des donn�es comme
	** 25 jours pr�c�dents le rapport.
	** $pt2 repr�sente le point connu du dernier jour des donn�es relev�es du monitoring
	** pour tracer une courbe pour les rapports.
	**
	** Gr�ce � ce coefficient directeur, il est possible de d�terminer les futures valeurs
	** ou la tendance des m�triques relev�s auparavant.
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
	** Calcul de l'offset de l'ordonn�e 'b' pour la courbe pr�visionnelle.
	** Ce calcul est facultatif.
	**
	** On peut � la place utiliser l'ordonn�e du dernier point des donn�es
	** pour tracer la courbe des r�sultats d'un reporting.
	** Les param�tres $pt1 et $pt2 sont des tableaux � deux cases.
	** La case 0 est pour l'abcisse et la case 1 pour l'ordonn�e d'un point. 
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
	** Calcul de l'ordonn�e futur li�e � un jour qui correspond � l'axe des abcisses.
	** Le calcul de la pente ou coefficient directeur doit �tre obligatoirement calcul� auparavant.
	*/
	public static function calc_futur_ordo_y($coef_dir_a, $jour_x, $ordo_b)
	{
		var $futur_ordo_y = 0;
		
		$futur_ordo_y = $coef_dir_a * $jour_x + $ordo_b;
		return $futur_ordo_y;
	}
	
	/*
	** Cette fonction calcule pour chaque jour sur une p�riode d'un an
	** les coordonn�es en ordonn�es des points s'y rapportant.
	** Un tableau est donc rempli. Il contient les coordonn�es des
	** points d'une courbe pr�visionnelle en fonction du coefficient
	** directeur calcul� auparavant.
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
	** Initialisation � z�ro de toutes les valeurs du tableau $array_ordo_y_one_year re�u en param�tre.
	** Renvoie le tableau initialis�.
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

