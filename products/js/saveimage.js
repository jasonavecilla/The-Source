$(function(){
    // File input field trigger when the HTML element is clicked
    $("#dropBox").click(function(){
        $("#fileToUpload").click();
    });
    
    // Prevent browsers from opening the file when its dragged and dropped
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Call a function to handle file upload on select file
    $('input[type=file]').on('change', fileUpload);
});

function fileUpload(event){
    // Allowed file types
    var allowedFileTypes = 'image.*|application/pdf'; //text.*|image.*|application.*

    // Allowed file size
    var allowedFileSize = 1024*5; //in KB

    // Notify user about the file upload status
    $("#dropBox").html("");
    $("#txtonimg").html("");
    
    
    // Get selected file
    files = event.target.files;
    
    // Form data check the above bullet for what it is  
    var data = new FormData();                                

    // File data is presented as an array
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if(!file.type.match(allowedFileTypes)) {              
            // Check file type
            $("#dropBox").html('<p class="error">File extension error! Please select the allowed file type only.</p>');
        }else if(file.size > (allowedFileSize*1024)){
            // Check file size (in bytes)
            $("#dropBox").html('<p class="error">File size error! Sorry, the selected file size is larger than the allowed size (>'+allowedFileSize+'KB).</p>');
        }else{
            // Append the uploadable file to FormData object
            data.append('file', file, file.name);
            
            // Create a new XMLHttpRequest
            var xhr = new XMLHttpRequest();     
            
            // Post file data for upload
            xhr.open('POST', '../c/saveimg.php', true);  
            xhr.send(data);
            xhr.onload = function () {

                // console.log(xhr.responseText);

                var response = JSON.parse(xhr.responseText);
                if(xhr.status === 200 && response.status == 'type_err'){
                    $("#dropBox").html('<p class="error">File extension error! Click to upload another file.</p>');
                }else if(response.status == 'err'){
                    $("#dropBox").html('<p class="error">Something went wrong, please try again.</p>');
                }else{
                    document.getElementById("dropBox").style.backgroundImage = "url('../../products/images/" + response.status + "')";
                }
            };
        }
    }
}