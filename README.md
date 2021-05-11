# mariaDbWrapper
Just some wrapper classes I use when working with mariaDB and PHP

db.php is the actual database wrapper class

dd.php is an HTML dropdown builder that uses db.php, so I thought I'd add it in as well since I use it in a lot of stuff

ajax.js is my standard use jquery AJAX caller

# Usage Example - Exec query
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
    $elementName = 'myHtmlDropdown'
    $withBlank = false;
    $preSelected = 5;
    $valueAndTextAreDifferent = true;
    $isDisabled = 0;
    $paramsArray = ['i', $isDisabled];
    $sql = 'SELECT stuffID, stuffName FROM whatever WHERE isDisabled = ?';	
    function buildComplicatedDropdown($elementName, $sql, $paramsArray, $withBlank, $preSelected, $valueAndTextAreDifferent);
    
# Usage Example - AJAX call

    var stuff1 = $('#stuff1').val();
    var stuff2 = $('#stuff2').val();
    var data = { 'stuff1' : stuff1 , 'stuff2' : stuff2 };
    
    let refreshSchedule = function(){
    	functionThatDoesStuffOnSuccess();
    }
    standardAjaxWrapper('text', 'POST', 'getStuff.php', 'application/x-www-form-urlencoded', data, 'resultsDiv', 'errorDiv', true, true, functionThatDoesStuffOnSuccess);
