<?php

require_once('db.php');

class dd
{
	function buildDropdown($elementID, $table, $idColumn, $descColumn, $orderBy = 1, $withBlank = true, $preSelected = '', $valueAndTextAreDifferent = true, $excludeDisabled = false)
	{
		$html = "<select id='$elementID'>";
		if($withBlank){ $html.= "<option value='0'>Select...</option>"; }
	
	
		$db = new db();
		$conn = $db->getMariaDbConnection();
		
		$whereClause = '';
		
		if($excludeDisabled)
		{
			$whereClause = ' where isDisabled = 0';
		}
		
		$sql = "select $idColumn, $descColumn from $table $whereClause order by $orderBy";
		
		$stmt = $db->basicQuery($conn, $sql);
		$stmt->bind_result($optionValue, $optionText);
		
		while($stmt->fetch())
		{
			if(($valueAndTextAreDifferent && $preSelected == $optionValue) || (!$valueAndTextAreDifferent && $preSelected == $optionText))
			{
				$selectedHTML = 'selected';
			}
			else
			{
				$selectedHTML = '';
			}
		
			if($valueAndTextAreDifferent)
			{
				$html .= "<option value='$optionValue' $selectedHTML>$optionText</option>";
			}
			else
			{
				$html .= "<option value='$optionText' $selectedHTML>$optionText</option>";
			}
		}
		
		$html .= "</select>";
		
		return $html;
	}

	function buildComplicatedDropdown($elementID, $sql, $paramsArray, $withBlank = true, $preSelected = '', $valueAndTextAreDifferent = true)
	{
		$html = "<select id='$elementID'>";
		if($withBlank){ $html.= "<option value='0'>Select...</option>"; }
	
		$db = new db();
		$conn = $db->getMariaDbConnection();
		
		$stmt = $db->parameterQuery($conn, $sql, $paramsArray);
		$stmt->bind_result($optionValue, $optionText);
		
		while($stmt->fetch())
		{
			if(($valueAndTextAreDifferent && $preSelected == $optionValue) || (!$valueAndTextAreDifferent && $preSelected == $optionText))
			{
				$selectedHTML = 'selected';
			}
			else
			{
				$selectedHTML = '';
			}
		
			if($valueAndTextAreDifferent)
			{
				$html .= "<option value='$optionValue' $selectedHTML>$optionText</option>";
			}
			else
			{
				$html .= "<option value='$optionText' $selectedHTML>$optionText</option>";
			}
		}
		
		$html .= "</select>";
		
		return $html;
	}


/****************************************************************
	
	Non-DB generated dropdowns

*****************************************************************/
	
	function getIsDisabledDropdown($elementID, $preSelected = '')
	{
		$html = "<select id='$elementID'>";
		
		if($preSelected == 0)
		{
			$html .= "
				<option value='0' selected>Not Disabled</option>
				<option value='1'>Disabled</option>
			";
		}
		else if($preSelected == 1)
		{
			$html .= "
				<option value='0'>Not Disabled</option>
				<option value='1' selected>Disabled</option>
			";
		}
		
		$html .= "</select>";
		
		return str_replace(array("\r", "\n"), '', $html);
	}
	
	function getYesOrNoDropdown($elementID, $preSelected = 0)
	{
		$html = "<select id='$elementID'>";
		
		if($preSelected == 0)
		{
			$html .= "
				<option value='0' selected>No</option>
				<option value='1'>Yes</option>
			";
		}
		else if($preSelected == 1)
		{
			$html .= "
				<option value='0'>No</option>
				<option value='1' selected>Yes</option>
			";
		}
		
		$html .= "</select>";
		
		return str_replace(array("\r", "\n"), '', $html);
	}
	
	function getStateDropdown($elementID)
	{
	
		$html= "
			<select id='$elementID'>
				<option value='AL'>AL</option>
				<option value='AK'>AK</option>
				<option value='AZ'>AZ</option>
				<option value='AR'>AR</option>
				<option value='CA'>CA</option>
				<option value='CO'>CO</option>
				<option value='CT'>CT</option>
				<option value='DE'>DE</option>
				<option value='DC'>DC</option>
				<option value='FL'>FL</option>
				<option value='GA'>GA</option>
				<option value='HI'>HI</option>
				<option value='ID'>ID</option>
				<option value='IL'>IL</option>
				<option value='IN'>IN</option>
				<option value='IA'>IA</option>
				<option value='KS'>KS</option>
				<option value='KY'>KY</option>
				<option value='LA'>LA</option>
				<option value='ME'>ME</option>
				<option value='MD'>MD</option>
				<option value='MA'>MA</option>
				<option value='MI'>MI</option>
				<option value='MN'>MN</option>
				<option value='MS'>MS</option>
				<option value='MO'>MO</option>
				<option value='MT'>MT</option>
				<option value='NE'>NE</option>
				<option value='NV'>NV</option>
				<option value='NH'>NH</option>
				<option value='NJ'>NJ</option>
				<option value='NM'>NM</option>
				<option value='NY'>NY</option>
				<option value='NC'>NC</option>
				<option value='ND'>ND</option>
				<option value='OH'>OH</option>
				<option value='OK'>OK</option>
				<option value='OR'>OR</option>
				<option value='PA' selected>PA</option>
				<option value='RI'>RI</option>
				<option value='SC'>SC</option>
				<option value='SD'>SD</option>
				<option value='TN'>TN</option>
				<option value='TX'>TX</option>
				<option value='UT'>UT</option>
				<option value='VT'>VT</option>
				<option value='VA'>VA</option>
				<option value='WA'>WA</option>
				<option value='WV'>WV</option>
				<option value='WI'>WI</option>
				<option value='WY'>WY</option>
			</select>
		";
		
		return str_replace(array("\r", "\n"), '', $html);				
	}
}

?>
