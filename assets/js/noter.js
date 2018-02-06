
$(document).ready( function (){
    $("#uploadfrom").submit( function(submitEvent) {

        // get the file name, possibly with path (depends on browser)
        var filename = $("#uploadfile").val();

        // Use a regular expression to trim everything before final dot
        var extension = filename.replace(/^.*\./, '');

        // Iff there is no dot anywhere in filename, we would have extension == filename,
        // so we account for this possibility now
        if (extension == filename) {
            extension = '';
        } else {
            // if there is an extension, we convert to lower case
            // (N.B. this conversion will not effect the value of the extension
            // on the file upload.)
            extension = extension.toLowerCase();
        }

        switch (extension) {
            case 'pdf':
            case 'ort':
            case 'doc':
            case 'docx':
            case 'rtf':
                
            // uncomment the next line to allow the form to submitted in this case:
          break;
			
            default:
                // Cancel the form submission
				alert("File must be of allowed types.");
                submitEvent.preventDefault();
        }

  });
});