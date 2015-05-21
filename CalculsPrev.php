

static class CalculsPrev
{

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
}

