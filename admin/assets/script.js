// Datatable function
$(document).ready( function () {
    $('#fileTable').DataTable();
    
});

// Updating file
function updateFile(id) {
    $("#updateFileModal").modal("show");

    let updateFileID = $("#fileID-" + id).text();
    let updateFileTitle = $("#fileTitle-" + id).text();
    let updateFile = $("#file-" + id).text();
    let updateFileUploader = $("#fileUploader-" + id).text();

    $("#updateFileID").val(updateFileID);
    $("#updateFileTitle").val(updateFileTitle);
    $("#updateFile").text(updateFile);
    $("#updateFileUploader").val(updateFileUploader);
}

// Deleting file
function deleteFile(id) {
    if (confirm("Do you want to delete this file?")) {
        window.location = "./endpoint/delete-file.php?file=" + id;
    }
}

// Download the file
function downloadFile(fileID) {
    let downloadUrl = `./endpoint/download-file.php?fileID=${fileID}`;

    fetch(downloadUrl)
        .then(response => response.blob())
        .then(blob => {
            // Create a temporary link element
            let downloadLink = document.createElement('a');
            downloadLink.href = window.URL.createObjectURL(blob);

            // Extract file name from the response headers
            let contentDisposition = response.headers.get('content-disposition');
            
            if (contentDisposition) {
                let match = contentDisposition.match(/filename="(.+)"/);
                if (match) {
                    let fileName = match[1];

                    downloadLink.download = fileName;

                    // Append the link to the document and trigger the click event
                    document.body.appendChild(downloadLink);
                    downloadLink.click();

                    // Clean up
                    document.body.removeChild(downloadLink);
                } else {
                    console.error('Unable to extract filename from response headers.');
                }
            } else {
                console.error('Content-Disposition header not found in the response.');
            }
        })
        .catch(error => console.error('Download error:', error));
}
