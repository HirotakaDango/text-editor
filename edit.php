<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['file']) && isset($_POST['content'])) {
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
  } else {
    http_response_code(400);
    echo "Invalid request.";
    exit;
  }
}

// Get the file name from the query string
if (isset($_GET['file'])) {
  $fileName = basename($_GET['file']);
  if (file_exists($fileName)) {
    $fileContent = file_get_contents($fileName);
  } else {
    die("File not found.");
  }
} else {
  die("No file specified.");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo basename($fileName); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <style>
      textarea {
        border: none;
        outline: none;
        resize: none;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
      }
    </style>
  </head>
  <body>
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
  </body>
</html>
