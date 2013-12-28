var allowedCharacters = "";
var errorMessage = "The given URL is invalid.";

$(document).ready(function() {
  $('input#url').keyup(function() {
    var output = parseUrl($('input#url').val());
    output = outputToHtml(output);
    $('div#output').html(output);
  });
  
  var output = parseUrl($('input#url').val());
  output = outputToHtml(output);
  $('div#output').html(output);
  
});

function parseUrl(url) {
  // Check for illegal characters
  if (url.match(/[^A-Za-z0-9_.~!*'();:@&=+$,/?%#\[\]-]/)) {
    return errorMessage; // invalid URL
  }
  
  // Get parameters
  if (url.indexOf('?') < 0) {
    return ""; // No parameters
  }
  var parameters = url.substr(url.indexOf('?') + 1).split('&');
  
  var returnStr = "";
  var i = 0;
  for (i; i < parameters.length; i++) {
    // Parse parameter
    var parsedParameter = parseParameter(parameters[i]);
    
    if (parsedParameter === errorMessage) {
      return errorMessage;
    }
    returnStr += parsedParameter + "\n";
  }
  
  return returnStr;
}

function parseParameter(parameter) {
  // Get key and value
  var keyValue = parameter.split('=');
  if (keyValue.length != 2) {
    return errorMessage;
  }
  
  return keyValue[0] + ": \"" + keyValue[1] + "\"";
}

// Parses the output from parseUrl() into HTML
function outputToHtml(output) {
  if (output.length == 0) {
    return "<span>No parameters.</span>";
  }
  if (output === errorMessage) {
    return "<span class=\"error\">" + output + "</span>";
  }
  
  var outputArr = output.split("\n");
  output = "";
  var i = 0;
  for (i; i < outputArr.length; i++) {
    if (outputArr[i].length > 0) {
      var key = outputArr[i].substring(0, outputArr[i].indexOf(':'));
      var value = outputArr[i].substring(outputArr[i].indexOf(':') + 3, outputArr[i].length - 1);
      output += "<span class=\"key\">" + key + "</span>\n<span class=\"value\">" + value + "</span><br /><br />";
    }
  }
  
  return output;
}