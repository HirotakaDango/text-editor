<?php
$allowedExtensions = ['txt', 'php', 'html', 'css', 'js'];
$baseDir = __DIR__; // Base directory is the script's directory

function isAllowedExtension($filename) {
  global $allowedExtensions;
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  return in_array($extension, $allowedExtensions);
}

function generateUniqueFileName($filename) {
  $baseName = pathinfo($filename, PATHINFO_FILENAME);
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  $counter = 1;

  // Append _1, _2, ... until a unique name is found
  while (file_exists($baseName . '_' . $counter . '.' . $extension)) {
    $counter++;
  }

  return $baseName . '_' . $counter . '.' . $extension;
}

function getFileList($currentDir) {
  $files = [];
  $folders = [];
  $items = scandir($currentDir);
  foreach ($items as $item) {
    if ($item == '.' || $item == '..') {
      continue;
    }
    $itemPath = $currentDir . '/' . $item;
    if (is_dir($itemPath)) {
      $folders[] = $item;
    } elseif (is_file($itemPath) && isAllowedExtension($item)) {
      $files[] = $item;
    }
  }
  return ['files' => $files, 'folders' => $folders];
}

function isValidPath($base, $path) {
  $realBasePath = realpath($base);
  $realPath = realpath($path);
  if ($realPath === false) {
    return false; // Path doesn't exist
  }
  return strpos($realPath, $realBasePath) === 0;
}

function recursiveDeleteDirectory($dir) {
  global $baseDir;
  if (!is_dir($dir) || !isValidPath($baseDir, $dir)) { // Security check - stay within basedir
    return false;
  }
  $items = scandir($dir);
  foreach ($items as $item) {
    if ($item == '.' || $item == '..') {
      continue;
    }
    $itemPath = $dir . '/' . $item;
    if (is_dir($itemPath)) {
      recursiveDeleteDirectory($itemPath);
    } else {
      unlink($itemPath);
    }
  }
  return rmdir($dir);
}


// Determine current directory
$currentPath = isset($_GET['path']) ? $_GET['path'] : '';
$absoluteCurrentPath = $baseDir;

if ($currentPath) {
  $proposedPath = $baseDir . '/' . $currentPath;
  if (isValidPath($baseDir, $proposedPath)) {
    $absoluteCurrentPath = $proposedPath;
  } else {
    echo "<script>alert('Invalid path access.'); window.location.href='./';</script>";
    exit();
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["add"])) {
    // Add new file
    $fileName = $_POST["file_name"];
    $fullFileName = $absoluteCurrentPath . '/' . $fileName;
    if (isAllowedExtension($fileName)) {
      if (file_exists($fullFileName)) {
        $fullFileName = generateUniqueFileName($fullFileName);
      }
      $file = fopen($fullFileName, "w");
      fclose($file);
    }
    header("Location: ?path=" . urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')));
    exit();
  } elseif (isset($_POST["upload"])) {
    // Upload multiple files
    $uploadDir = $absoluteCurrentPath . '/';
    $uploadFiles = $_FILES["files"]["name"];
    $numFiles = count($uploadFiles);
    for ($i = 0; $i < $numFiles; $i++) {
      $uploadFileName = $uploadFiles[$i];
      if (isAllowedExtension($uploadFileName)) {
        $uploadFilePath = $uploadDir . $uploadFileName;
        if (file_exists($uploadFilePath)) {
          $uploadFileName = generateUniqueFileName($uploadFileName);
          $uploadFilePath = $uploadDir . $uploadFileName;
        }
        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $uploadFilePath);
      }
    }
    header("Location: ?path=" . urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')));
    exit();
  } elseif (isset($_POST["delete"])) {
    // Remove specific file
    $fileName = $_POST["file_name"];
    $fullFileName = $absoluteCurrentPath . '/' . $fileName;
    if (file_exists($fullFileName) && isAllowedExtension($fileName)) {
      unlink($fullFileName);
    }
    header("Location: ?path=" . urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')));
    exit();
  } elseif (isset($_POST["delete_folder"])) {
    // Remove specific folder
    $folderName = $_POST["folder_name"];
    $fullFolderName = $absoluteCurrentPath . '/' . $folderName;
    if (is_dir($fullFolderName)) {
      if (recursiveDeleteDirectory($fullFolderName)) { // Use recursive delete function
        // Folder deleted successfully
      } else {
        echo "<script>alert('Failed to delete folder or its contents.');</script>";
      }
    }
    header("Location: ?path=" . urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')));
    exit();
  } elseif (isset($_POST["add_folder"])) {
    // Add new folder
    $folderName = $_POST["folder_name"];
    $fullFolderName = $absoluteCurrentPath . '/' . $folderName;
    if (!is_dir($fullFolderName)) {
      mkdir($fullFolderName);
    }
    header("Location: ?path=" . urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')));
    exit();
  } elseif (isset($_POST["rename"])) {
    // Rename a file or folder
    $oldItemName = $_POST["old_item_name"];
    $newItemName = $_POST["new_item_name"];
    $oldFullPath = $absoluteCurrentPath . '/' . $oldItemName;
    $newFullPath = $absoluteCurrentPath . '/' . $newItemName;

    if (file_exists($oldFullPath)) {
      rename($oldFullPath, $newFullPath);
    }
    header("Location: ?path=" . urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')));
    exit();
  } elseif (isset($_POST['file']) && isset($_POST['content'])) {
    // Save edited file content
    $fileName = basename($_POST['file']);
    $fileContent = $_POST['content'];
    $fullFileName = $absoluteCurrentPath . '/' . $fileName;

    if (file_exists($fullFileName) && isAllowedExtension($fileName)) {
      file_put_contents($fullFileName, $fileContent);
      echo "File saved successfully.";
    } else {
      http_response_code(404);
      echo "File not found.";
    }
    exit;
  }
}

// View file
if (isset($_GET['view'])) {
  $file = $_GET['view'];
  // Correct Path Construction:
  $fullFilePath = $absoluteCurrentPath . '/' . $file;
  if (!$file || !file_exists($fullFilePath) || !isAllowedExtension($file)) {
    http_response_code(404);
    echo "<h1>File Not Found</h1>";
    exit;
  }
  $fileContent = file_get_contents($fullFilePath);
  $viewMode = true;
}

// Edit file
if (isset($_GET['edit'])) {
  $fileName = basename($_GET['edit']); // Basename is OK here for display in input
  // Correct Path Construction:
  $fullFileName = $absoluteCurrentPath . '/' . $fileName;
  if (file_exists($fullFileName) && isAllowedExtension($fileName)) {
    $fileContent = file_get_contents($fullFileName);
    $editMode = true;
  } else {
    die("File not found.");
  }
}

// Download file
if (isset($_GET['download'])) {
  $file = $_GET['download'];
  // Correct Path Construction:
  $filepath = $absoluteCurrentPath . '/' . $file;

  if (file_exists($filepath) && isAllowedExtension($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    exit;
  } else {
    echo "File not found.";
    exit;
  }
}

// Batch download all files in current directory (and subdirectories - optional, adjust glob if needed)
if (isset($_GET['batch']) && $_GET['batch'] == 'all') {
  $zip = new ZipArchive();
  $zipName = 'batch_' . date('Y-m-d') . '.zip';

  if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
    $searchPath = rtrim($absoluteCurrentPath, '/') . '/*'; // Search in current directory and subdirectories
    $files = array_merge(
      glob($searchPath . ".txt"), glob($searchPath . ".php"), glob($searchPath . ".html"), glob($searchPath . ".css"), glob($searchPath . ".js")
    );
    foreach ($files as $file) {
      $zip->addFile($file, basename($file));
    }
    $zip->close();

    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $zipName);
    header('Content-Length: ' . filesize($zipName));
    readfile($zipName);
    unlink($zipName); // Delete the zip file after download
    exit();
  } else {
    echo "Failed to create zip file.";
    exit();
  }
}

// Contextual Batch Download
if (isset($_GET['batch']) && $_GET['batch'] == 'context') {
  $zip = new ZipArchive();
  $zipName = 'batch_context_' . date('Y-m-d') . '.zip';

  if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
    $dirIterator = new RecursiveDirectoryIterator($absoluteCurrentPath);
    $iterator = new RecursiveIteratorIterator($dirIterator);

    foreach ($iterator as $fileinfo) {
      if ($fileinfo->isFile() && isAllowedExtension($fileinfo->getFilename())) {
        $zip->addFile($fileinfo->getPathname(), ltrim(str_replace($absoluteCurrentPath, '', $fileinfo->getPathname()), '/')); // Maintain folder structure in zip
      }
    }
    $zip->close();

    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $zipName);
    header('Content-Length: ' . filesize($zipName));
    readfile($zipName);
    unlink($zipName); // Delete the zip file after download
    exit();
  } else {
    echo "Failed to create zip file.";
    exit();
  }
}


// Get files and folders in the current directory
$fileList = getFileList($absoluteCurrentPath);
$files = $fileList['files'];
$folders = $fileList['folders'];

$currentDirPathDisplay = ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/');
if(empty($currentDirPathDisplay)){
  $currentDirPathDisplay = basename($baseDir);
}

// Build breadcrumb path
$breadcrumbs = [];
$pathSegments = explode('/', $currentDirPathDisplay);
$crumbPath = '';
foreach ($pathSegments as $index => $segment) {
  if ($segment === basename($baseDir) && $index === 0 && empty($currentDirPathDisplay)) {
    continue; // Skip base directory if it's the root and display is empty
  }
  if ($segment !== basename($baseDir) || !empty($currentDirPathDisplay)) { // Only add if not base dir, or if display path is not empty (meaning we are inside subfolders)
    $crumbPath .= $segment . '/';
    if(!empty($segment)){ // Prevent adding empty segments as breadcrumbs
      $breadcrumbs[] = ['name' => $segment, 'path' => rtrim($crumbPath, '/')];
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <header>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    if (isset($_GET['edit'])) {
      echo 'Edit ' . $_GET['edit'];
    } elseif (isset($_GET['view'])) {
      echo 'View ' . $_GET['view'];
    } else {
      echo 'File Manager - ' . $currentDirPathDisplay;
    }
    ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
  <style>
    .file-info {
      font-size: 0.8rem;
      color: #aaa; /* Adjust color for file info text */
    }
    .list-group-item-filename {
      display: flex;
      align-items: center; /* Vertically align icon and filename */
    }
    .list-group-item-filename i {
      margin-right: 0.5em; /* Space between icon and filename */
    }
    .breadcrumb-item.disabled-link {
      color: #6c757d; /* Bootstrap text-secondary color */
      pointer-events: none; /* Make non-interactive */
      cursor: default;      /* Use default cursor */
    }

    .breadcrumb-item.disabled-link a {
      text-decoration: none; /* Remove underline if it's inheriting */
      color: #6c757d; /* Ensure consistent color */
    }
  </style>
  </header>
  <body>
  <?php if (isset($viewMode)): ?>
    <div class="container-fluid px-0 w-100">
      <div class="row g-0">
        <div class="col-md-3 d-none d-md-block">
          <div class="px-2 overflow-auto vh-100 py-2">
            <div class="list-group">
              <?php
              // Display the list of files for editing
              foreach ($files as $file) {
                $fileModifiedTime = date("l, d F, Y", filemtime($absoluteCurrentPath . '/' . $file));
                ?>
                <a href="?path=<?php echo urlencode($currentPath); ?>&view=<?php echo urlencode($file); ?>" class="list-group-item list-group-item-action my-1 border-0 bg-body-tertiary rounded">
                  <h6 class="fw-medium text-truncate"><?php echo $file; ?></h6>
                  <small class="file-info">Last modified: <?php echo $fileModifiedTime; ?></small>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="input-group rounded-0">
            <a class="btn btn-primary fw-medium rounded-0" href="./?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>"><i class="bi bi-arrow-left"></i></a>
            <input type="text" class="form-control border-0 py-2 rounded-0 bg-light-subtle focus-ring focus-ring-dark" placeholder="Edit filename" aria-label="Filename" value="<?php echo $_GET['view']; ?>" readonly>
            <a class="btn btn-primary fw-medium rounded-0" href="?path=<?php echo urlencode($currentPath); ?>&download=<?php echo urlencode($_GET['view']); ?>"><i class="bi bi-download"></i></a>
            <a class="btn btn-primary fw-medium rounded-0" href="?path=<?php echo urlencode($currentPath); ?>&edit=<?php echo urlencode($_GET['view']); ?>"><i class="bi bi-pencil-fill"></i></a>
          </div>
          <textarea class="form-control w-100 p-2 border-0 focus-ring focus-ring-dark" style="height: calc(100svh - 44px); max-height: calc(100svh - 44px); min-height: calc(100svh - 44px); box-sizing: border-box;" readonly><?php echo htmlspecialchars($fileContent); ?></textarea>
        </div>
      </div>
    </div>
  <?php elseif (isset($editMode)): ?>
    <div class="container-fluid px-0 w-100">
      <div class="row g-0">
        <div class="col-md-3 d-none d-md-block">
          <div class="px-2 overflow-auto vh-100 py-2">
            <div class="list-group">
              <?php
              // Display the list of files for editing
              foreach ($files as $file) {
                $fileModifiedTime = date("l, d F, Y", filemtime($absoluteCurrentPath . '/' . $file));
                ?>
                <a href="?path=<?php echo urlencode($currentPath); ?>&edit=<?php echo urlencode($file); ?>" class="list-group-item list-group-item-action my-1 border-0 bg-body-tertiary rounded">
                  <h6 class="fw-medium text-truncate"><?php echo $file; ?></h6>
                  <small class="file-info">Last modified: <?php echo $fileModifiedTime; ?></small>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <form id="editForm">
            <div class="input-group rounded-0">
              <a class="btn btn-primary fw-medium rounded-0" href="./?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>"><i class="bi bi-arrow-left"></i></a>
              <a class="btn btn-primary fw-medium rounded-0" href="?path=<?php echo urlencode($currentPath); ?>&view=<?php echo urlencode($_GET['edit']); ?>"><i class="bi bi-eye-fill"></i></a>
              <input type="text" class="form-control border-0 py-2 rounded-0 bg-light-subtle focus-ring focus-ring-dark" placeholder="Edit filename" aria-label="Edit filename" value="<?php echo $_GET['edit']; ?>" readonly>
              <a class="btn btn-primary fw-medium rounded-0" href="./?path=<?php echo urlencode($currentPath); ?>&download=<?php echo urlencode($_GET['edit']); ?>"><i class="bi bi-download"></i></a>
              <button class="btn btn-primary fw-medium rounded-0" type="button" id="saveButton"><i class="bi bi-floppy-fill"></i></button>
            </div>
            <textarea class="form-control w-100 p-2 border-0 focus-ring focus-ring-dark" style="height: calc(100svh - 44px); max-height: calc(100svh - 44px); min-height: calc(100svh - 44px); box-sizing: border-box;" id="fileContent"><?php echo htmlspecialchars($fileContent); ?></textarea>
          </form>
        </div>
      </div>
    </div>

    <script>
      document.getElementById('saveButton').addEventListener('click', saveFile);
      document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 's') {
          event.preventDefault();
          saveFile();
        }
      });

      function saveFile() {
        const fileName = '<?php echo $fileName; ?>';
        const fileContent = document.getElementById('fileContent').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
          if (xhr.status === 200) {
            alert('File saved successfully.');
          } else {
            alert('Error saving file.');
          }
        };
        xhr.send('file=' + encodeURIComponent(fileName) + '&content=' + encodeURIComponent(fileContent));
      }
    </script>
  <?php else: ?>
    <div class="container-fluid px-0">
    </div>


    <div class="container mb-5">
      <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb bg-body-tertiary rounded-3 py-2 px-3">
          <li class="breadcrumb-item"><a href="./" class="link-body-emphasis fw-medium text-decoration-none"><i class="bi bi-folder-symlink-fill"></i> <?php echo basename($baseDir); ?></a></li>
          <?php
          $breadcrumbCount = count($breadcrumbs);
          foreach ($breadcrumbs as $index => $crumb) {
            if (($index + 1) === $breadcrumbCount) { // Check if it's the last breadcrumb
              echo '<li class="breadcrumb-item disabled-link">' . $crumb['name'] . '</li>'; // Render as disabled if it's the last one
            } else {
              echo '<li class="breadcrumb-item"><a href="./?path=' . urlencode($crumb['path']) . '" class="link-body-emphasis fw-medium text-decoration-none">' . $crumb['name'] . '</a></li>';
            }
          }
          ?>
        </ol>
      </nav>

      <div class="d-flex justify-content-between align-items-center mt-2">
        <div class="btn-group mt-2">
          <button type="button" class="btn btn-primary fw-medium" data-bs-toggle="collapse" data-bs-target="#addItemCollapse" aria-expanded="false" aria-controls="addItemCollapse">
            <i class="bi bi-plus-circle"></i> Add
          </button>
          <a class="btn btn-primary fw-medium" href="?path=<?php echo urlencode($currentPath); ?>&batch=context">
            <i class="bi bi-download"></i> Batch
          </a>
        </div>
      </div>

      <div class="collapse" id="addItemCollapse">
        <div class="card card-body bg-body-tertiary rounded-4 border-0 shadow mt-3">
          <div class="container">
            <h2 class="my-2 text-center fw-bold">Add New File</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>" method="post">
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="File Name" name="file_name" required>
              </div>
              <button type="submit" name="add" class="btn btn-primary w-100 fw-medium">Add File</button>
            </form>
          </div>
          <div class="container mt-3">
            <h2 class="my-2 text-center fw-bold">Add New Folder</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>" method="post">
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Folder Name" name="folder_name" required>
              </div>
              <button type="submit" name="add_folder" class="btn btn-primary w-100 fw-medium">Add Folder</button>
            </form>
          </div>
          <div class="container my-3">
            <h2 class="my-2 text-center fw-bold">Upload Multiple Files</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <input type="file" class="form-control" name="files[]" multiple required>
              </div>
              <button type="submit" name="upload" class="btn btn-primary w-100 fw-medium">Upload Files</button>
            </form>
          </div>
        </div>
      </div>


      <ul class="list-group mt-3">
        <?php
        // Display Folders First
        if (count($folders) > 0) {
          foreach ($folders as $folder) {
            $folderPath = $absoluteCurrentPath . '/' . $folder;
            $folderModifiedTime = date("l, d F, Y", filemtime($folderPath));
            ?>
            <li class="list-group-item border bg-body-tertiary rounded-4 my-1 shadow">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <div class="list-group-item-filename">
                    <i class="bi bi-folder-fill me-2"></i>
                    <a href="?path=<?php echo urlencode($currentPath . '/' . $folder); ?>" class="link-body-emphasis text-decoration-none text-truncate" style="margin-left: -22px; padding-left: 22px; margin-right: 5px; padding-right: 5px; line-height: 1.7;">
                      <span class="fw-medium text-truncate"><?php echo $folder; ?></span>
                    </a>
                  </div>
                  <h6 class="file-info small mt-2"><?php echo $folderModifiedTime; ?></h6>
                </div>
                <div class="dropdown">
                  <button class="btn btn-sm p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end rounded-4 shadow border-0">
                    <li><a href="?path=<?php echo urlencode($currentPath . '/' . $folder); ?>" class="dropdown-item"><i class="bi bi-folder"></i> open folder</a></li>
                    <li><a href="#" class="dropdown-item" onclick="renameItem('<?php echo $folder; ?>', true)"><i class="bi bi-input-cursor"></i> rename folder</a></li>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete folder <?php echo $folder; ?>?');">
                      <input type="hidden" name="folder_name" value="<?php echo $folder; ?>">
                      <li><button type="submit" name="delete_folder" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete folder</button></li>
                    </form>
                  </ul>
                </div>
              </div>
            </li>
          <?php
          }
        }

        // Display Files
        if (count($files) > 0) {
          foreach ($files as $file) {
            $filePath = $absoluteCurrentPath . '/' . $file;
            $fileModifiedTime = date("l, d F, Y", filemtime($filePath));
            $fileSize = filesize($filePath); // Get the file size in bytes

            // Format the file size into a readable format (KB, MB, GB)
            if ($fileSize < 1024) {
              $formattedSize = $fileSize . ' bytes';
            } elseif ($fileSize < 1048576) {
              $formattedSize = round($fileSize / 1024, 2) . ' KB';
            } elseif ($fileSize < 1073741824) {
              $formattedSize = round($fileSize / 1048576, 2) . ' MB';
            } else {
              $formattedSize = round($fileSize / 1073741824, 2) . ' GB';
            }
            ?>
            <li class="list-group-item border bg-light-subtle rounded-4 my-1 shadow">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <div class="list-group-item-filename">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    <span class="fw-medium text-truncate"><?php echo $file; ?></span>
                  </div>
                  <h6 class="file-info small mt-2"><?php echo $fileModifiedTime; ?></h6>
                  <h6 class="file-info small"><?php echo $formattedSize; ?></h6>
                </div>
                <div class="dropdown">
                  <button class="btn btn-sm p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end rounded-4 shadow border-0">
                    <li><a href="?path=<?php echo urlencode($currentPath); ?>&view=<?php echo urlencode($file); ?>" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                    <li><a href="?path=<?php echo urlencode($currentPath); ?>&download=<?php echo urlencode($file); ?>" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                    <li><a href="?path=<?php echo urlencode($currentPath); ?>&edit=<?php echo urlencode($file); ?>" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                    <li><a href="#" class="dropdown-item" onclick="renameItem('<?php echo $file; ?>', false)"><i class="bi bi-input-cursor"></i> rename file</a></li>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo $file; ?>?');">
                      <input type="hidden" name="file_name" value="<?php echo $file; ?>">
                      <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                    </form>
                  </ul>
                </div>
              </div>
            </li>
          <?php
          }
        } else if (count($folders) == 0) {
          ?>
          <li class="list-group-item bg-body-tertiary rounded-4 my-1 shadow text-center">
            No files or folders found.
          </li>
        <?php
        }
        ?>
      </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
      function renameItem(oldItemName, isFolder) {
        let promptMessage = isFolder ? "Enter new folder name:" : "Enter new filename:";
        let newItemName = prompt(promptMessage, oldItemName);
        if (newItemName !== null && newItemName !== "" && newItemName !== oldItemName) {
          const form = document.createElement("form");
          form.method = "post";
          form.action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?path=<?php echo urlencode(ltrim(str_replace($baseDir, '', $absoluteCurrentPath), '/')); ?>";
          form.style.display = "none";

          const oldItemInput = document.createElement("input");
          oldItemInput.type = "hidden";
          oldItemInput.name = "old_item_name";
          oldItemInput.value = oldItemName;
          form.appendChild(oldItemInput);

          const newItemInput = document.createElement("input");
          newItemInput.type = "hidden";
          newItemInput.name = "new_item_name";
          newItemInput.value = newItemName;
          form.appendChild(newItemInput);

          const renameInput = document.createElement("input");
          renameInput.type = "hidden";
          renameInput.name = "rename";
          renameInput.value = "rename";
          form.appendChild(renameInput);

          document.body.appendChild(form);
          form.submit();
        }
      }
    </script>
  <?php endif; ?>
  </body>
</html>