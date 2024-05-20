<?php
$file = $_GET['file'] ?? null;

if (!$file || !file_exists($file)) {
  http_response_code(404);
  echo "<h1>File Not Found</h1>";
  exit;
}

$fileContent = file_get_contents($file);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View <?php echo basename($file); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      pre {
        white-space: pre-wrap;
        word-wrap: break-word;
        font-family: Arial, sans-serif;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <a class="btn btn-primary mt-2 fw-medium" href="index.php">
        <i class="bi bi-arrow-left"></i>
      </a>
    </div>
    <div class="container mb-5">
      <h1 class="text-center fw-bold mb-4"><?php echo basename($file); ?></h1>
      <div class="card rounded-4 p-4 shadow border-0">
        <pre><?php echo htmlspecialchars($fileContent); ?></pre>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
