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
function downloadFile(id) {
    let downloadUrl = './endpoint/download-file.php?fileID='+id;

    fetch(downloadUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            // Extract file name from the response headers
            let contentDisposition = response.headers.get('content-disposition');
            if (contentDisposition) {
                let match = contentDisposition.match(/filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/);
                if (match) {
                    let fileName = match[1].replace(/['"]/g, ''); // Remove quotes if present
                    // Continue with reading the blob
                    return { response, fileName };
                } else {
                    throw new Error('Unable to extract filename from response headers.');
                }
            } else {
                throw new Error('Content-Disposition header not found in the response.');
            }
        })
        .then(({ response, fileName }) => response.blob().then(blob => ({ blob, fileName })))
        .then(({ blob, fileName }) => {
            // Use FileReader to read the blob as a data URL
            const reader = new FileReader();
            reader.onload = () => {
                const dataUrl = reader.result;

                // Create a temporary link element
                let downloadLink = document.createElement('a');
                downloadLink.href = dataUrl;
                downloadLink.download = fileName;

                // Append the link to the document and trigger the click event
                document.body.appendChild(downloadLink);
                downloadLink.click();

                // Clean up
                document.body.removeChild(downloadLink);
            };

            reader.readAsDataURL(blob);
        })
        .catch(error => console.error('Download error:', error));
}