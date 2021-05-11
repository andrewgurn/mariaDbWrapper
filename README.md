# mariaDbWrapper
Just a wrapper class I use when working with mariaDB and PHP

# Usage Example - Exec Query
    require_once('db.php');
    $db = new db();
    $conn = $db->getMariaDbConnection();
    $paramsArray = ['is', $searchInt, $searchString];
    $sql = 'SELECT stuff1, stuff2 FROM whatever WHERE someInt = ? AND someString = ?';		
    $stmt = $db->parameterQuery($conn, $sql, $paramsArray);
    $stmt->bind_result($stuff1, $stuff2);
		
    while($stmt->fetch())
    {
	    //do whatever
    }
	
# Usage Example - Build a dropdown
    require_once('dd.php');
    $isDisabled = 0;
    $withBlank = false;
    $preSelected = 5;
    $valueAndTextAreDifferent = true;
    $paramsArray = ['i', $isDisabled];
    $sql = 'SELECT stuffID, stuffName FROM whatever WHERE isDisabled = ?';	
    function buildComplicatedDropdown('myHtmlDropdown', $sql, $paramsArray, $withBlank, $preSelected, $valueAndTextAreDifferent);
    
