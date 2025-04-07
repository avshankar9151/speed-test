<?php

function download() {
    $filesize = $_REQUEST['filesize'] ?? (100 * 1024); // 100 KB

    // Create an in-memory blob with the given size
    $blob = str_repeat('A', $filesize);

    // Set headers for file download
    header('Content-Type: image/png');
    // header('Content-Disposition: attachment; filename="file.bin"');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
    header('Pragma: no-cache'); // HTTP 1.0
    header('Expires: 0'); // Proxies
    header('Content-Description: File Transfer');
    header('Content-Length: ' . strlen($blob));

    // Output the blob
    echo $blob;
}

$_REQUEST['action'] = $_REQUEST['action'] ?? 'download';
switch ($_REQUEST['action']) {
    case 'download':
        download();
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}

?>