
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


