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
  }
}

// Get all text files in the current directory
$files = glob("*.txt");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Files Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container-fluid">
      <button type="button" class="btn btn-primary mt-2 fw-medium" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-circle"></i> add new txt file
      </button>
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
                <div class="card-body">
                  <h5 class="fw-medium text-center"><?php echo strlen($file) > 25 ? substr($file, 0, 22) . '...' : $file; ?></h5>
                  <h6 class="fw-medium small mt-4">Last modified:</h6>
                  <h6 class="fw-medium small mt-1"><?php echo $fileModifiedTime; ?></h6>
                  <div class="btn-group w-100 mt-3">
                    <a href="view.php?file=<?php echo urlencode($file); ?>" class="btn btn-sm bg-dark-subtle bg-opacity-25 link-body-emphasis border-0 fw-medium"><i class="bi bi-eye-fill"></i></a>
                    <a href="<?php echo $file; ?>" download="<?php echo $file; ?>" class="btn btn-sm bg-dark-subtle bg-opacity-25 link-body-emphasis border-0 fw-medium"><i class="bi bi-download"></i></a>
                    <a href="edit.php?file=<?php echo urlencode($file); ?>" class="btn btn-sm bg-dark-subtle bg-opacity-25 link-body-emphasis border-0 fw-medium"><i class="bi bi-pencil-square"></i></a>
                    <a href="#" class="btn btn-sm bg-dark-subtle bg-opacity-25 link-body-emphasis border-0 fw-medium" onclick="renameFile('<?php echo $file; ?>')"><i class="bi bi-input-cursor"></i></a>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo $file; ?>?');">
                      <input type="hidden" name="file_name" value="<?php echo $file; ?>">
                      <button type="submit" name="delete" class="btn btn-sm bg-dark-subtle bg-opacity-25 link-body-emphasis border-0 rounded-start-0 fw-medium"><i class="bi bi-trash3-fill"></i></button>
                    </form>
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
  </body>
</html>
