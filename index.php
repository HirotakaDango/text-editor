<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["add"])) {
    // Add new text file
    $fileName = $_POST["file_name"] . ".txt";
    $file = fopen($fileName, "w");
    fclose($file);
    header("Location: index.php");
    exit();
  } elseif (isset($_POST["upload"])) {
    // Upload multiple text files
    $uploadDir = "./";
    $uploadFiles = $_FILES["files"]["name"];
    $numFiles = count($uploadFiles);
    for ($i = 0; $i < $numFiles; $i++) {
      $uploadFile = $uploadDir . basename($uploadFiles[$i]);
      move_uploaded_file($_FILES["files"]["tmp_name"][$i], $uploadFile);
    }
    header("Location: index.php");
    exit();
  } elseif (isset($_POST["delete"])) {
    // Remove specific text file
    $fileName = $_POST["file_name"];
    if (file_exists($fileName)) {
      unlink($fileName);
    }
    header("Location: index.php");
    exit();
  } elseif (isset($_POST["rename"])) {
    // Rename a text file
    $oldFileName = $_POST["old_file_name"];
    $newFileName = $_POST["new_file_name"];
    if (file_exists($oldFileName)) {
      rename($oldFileName, $newFileName);
    }
    header("Location: index.php");
    exit();
  } elseif (isset($_POST['file']) && isset($_POST['content'])) {
    // Save edited file content
    $fileName = basename($_POST['file']);
    $fileContent = $_POST['content'];
    if (file_exists($fileName)) {
      file_put_contents($fileName, $fileContent);
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
  if (!$file || !file_exists($file)) {
    http_response_code(404);
    echo "<h1>File Not Found</h1>";
    exit;
  }
  $fileContent = file_get_contents($file);
  $viewMode = true;
}

// Edit file
if (isset($_GET['edit'])) {
  $fileName = basename($_GET['edit']);
  if (file_exists($fileName)) {
    $fileContent = file_get_contents($fileName);
    $editMode = true;
  } else {
    die("File not found.");
  }
}

// Download file
if (isset($_GET['download'])) {
  $file = $_GET['download'];
  $filepath = './' . $file;

  if (file_exists($filepath)) {
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

// Batch download all files
if (isset($_GET['batch']) && $_GET['batch'] == 'all') {
    $zip = new ZipArchive();
    $zipName = 'batch_' . date('Y-m-d') . '.zip';
    
    if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
        $files = glob("*.txt");
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

// Get all text files in the current directory
$files = glob("*.txt");
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Files Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php if (isset($viewMode)): ?>
      <div class="container-fluid">
        <a class="btn btn-primary mt-2 fw-medium" href="index.php">
          <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      <div class="container mt-4 mb-5">
        <input type="text" class="form-control rounded-4 border-0 shadow p-4 mb-4" placeholder="Edit filename" aria-label="Edit filename" value="<?php echo htmlspecialchars($file); ?>" readonly>
        <textarea class="form-control vh-100 w-100 mb-3 p-4 border-0 rounded-4 shadow" readonly><?php echo htmlspecialchars($fileContent); ?></textarea>
      </div>
    <?php elseif (isset($editMode)): ?>
      <div class="container-fluid">
        <a class="btn btn-primary mt-2 fw-medium" href="index.php">
          <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      <div class="container mt-4 mb-5">
        <form id="editForm">
          <div class="input-group mb-4">
            <input type="text" class="form-control rounded-4 border-0 shadow p-4 rounded-end-0" placeholder="Edit filename" aria-label="Edit filename" value="<?php echo htmlspecialchars($fileName); ?>" readonly>
            <button class="btn btn-primary fw-medium" type="button" id="saveButton">Save</button>
          </div>
          <textarea class="form-control vh-100 w-100 mb-3 p-4 border-0 rounded-4 shadow" id="fileContent"><?php echo htmlspecialchars($fileContent); ?></textarea>
        </form>
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
      <div class="container-fluid">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
              <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Add New Text File -->
                <div class="container">
                  <h2 class="my-4 text-center fw-bold">Add New Text File</h2>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="File Name" name="file_name" required>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary w-100 fw-medium">Add</button>
                  </form>
                </div>
                <!-- Upload Multiple Text Files -->
                <div class="container mb-3">
                  <h2 class="my-4 text-center fw-bold">Upload Multiple Text Files</h2>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <input type="file" class="form-control" name="files[]" multiple required>
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary w-100 fw-medium">Upload</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container mb-5">
        <h1 class="my-4 text-center fw-bold"><?php echo basename(getcwd()); ?></h1>
        <div class="btn-group mt-2">
          <button type="button" class="btn btn-primary fw-medium" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus-circle"></i> add
          </button>
          <a class="btn btn-primary fw-medium" href="?batch=all">
            <i class="bi bi-download"></i> batch
          </a>
        </div>
        <div class="row">
          <?php
          // Check if there are any text files
          if (count($files) > 0) {
            // Loop through each file and display them
            foreach ($files as $file) {
              $fileModifiedTime = date("l, d F, Y", filemtime($file));
          ?>
              <div class="col-md-6 col-lg-3 col-sm-12 g-3">
                <div class="card rounded-4 p-1 shadow border-0 h-100">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center"><?php echo strlen($file) > 25 ? substr($file, 0, 22) . '...' : $file; ?></h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1"><?php echo $fileModifiedTime; ?></h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo $file; ?>?');">
                          <input type="hidden" name="file_name" value="<?php echo $file; ?>">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="index.php?view=<?php echo urlencode($file); ?>" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="index.php?download=<?php echo urlencode($file); ?>" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="index.php?edit=<?php echo urlencode($file); ?>" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('<?php echo $file; ?>')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
          ?>
            <div class="container">
              <h1 class="position-absolute top-50 start-50">No text files found.</h1>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
      <script>
        function renameFile(oldFileName) {
          const newFileName = prompt("Enter new filename:", oldFileName);
          if (newFileName !== null && newFileName !== "" && newFileName !== oldFileName) {
            const form = document.createElement("form");
            form.method = "post";
            form.action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>";
            form.style.display = "none";

            const oldFileInput = document.createElement("input");
            oldFileInput.type = "hidden";
            oldFileInput.name = "old_file_name";
            oldFileInput.value = oldFileName;
            form.appendChild(oldFileInput);

            const newFileInput = document.createElement("input");
            newFileInput.type = "hidden";
            newFileInput.name = "new_file_name";
            newFileInput.value = newFileName;
            form.appendChild(newFileInput);

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