// Download the file
function downloadFile(fileID) {
    let downloadUrl = `endpoint/download-file.php?fileID=${fileID}`;

    let downloadLink = document.createElement('a');
    downloadLink.href = downloadUrl;
    downloadLink.download = 'filename.ext';
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
}