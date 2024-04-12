
function standardAjaxWrapper(varDataType, varType, varUrl, varContentType, varData, varSuccessDiv, varErrorDiv, withLoading = false, withFunction = false, additionalFunction = '')
{
	if(withLoading)
	{
		 $('#'+varSuccessDiv).html("<img src='images/loading.gif'>");
	}

	$.ajax({
	    dataType: varDataType,
	    type: varType,
	    url: varUrl,
	    data: varData,
	    contentType: varContentType,
	    success: function(result){
		   
		   $('#'+varSuccessDiv).html(result);
		   
		   if(withFunction)
		   {
		   	additionalFunction(result);
		   }
			 
	    },
	    error: function(xhr, textStatus, errorThrown) {
	       	
	       	    $('#'+varSuccessDiv).html('');
		    $('#'+varErrorDiv).html(errorThrown);
	    }
	});
}

function standardAjaxPromiseWrapper(varDataType, varType, varUrl, varContentType, varData)
{
	return new Promise((resolve, reject)=>
	{
		$.ajax({
		    dataType: varDataType,
		    type: varType,
		    url: varUrl,
		    data: varData,
		    contentType: varContentType,
		    success: function(result){
			   resolve(result);
		    },
		    error: function(xhr, textStatus, errorThrown) {
		       	   reject(xhr, textStatus, errorThrown);
		    }
		});
	});	
}
