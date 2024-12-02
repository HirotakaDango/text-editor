
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      Text Editor    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
  </head>
  <body>
          <div class="container mb-5">
        <h1 class="my-4 text-center fw-bold">novels</h1>
        <div class="btn-group mt-2">
          <button type="button" class="btn btn-primary fw-medium" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus-circle"></i> add
          </button>
          <a class="btn btn-primary fw-medium" href="?batch=all">
            <i class="bi bi-download"></i> batch
          </a>
        </div>
        <div class="row row-cols-2 row-cols-md-4 g-1 mt-2">
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">111.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 05 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">66.2 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 111.txt?');">
                          <input type="hidden" name="file_name" value="111.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=111.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=111.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=111.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('111.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">2.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">7.01 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 2.txt?');">
                          <input type="hidden" name="file_name" value="2.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=2.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=2.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=2.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('2.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">3.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">2.82 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 3.txt?');">
                          <input type="hidden" name="file_name" value="3.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=3.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=3.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=3.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('3.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">4.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">4.03 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 4.txt?');">
                          <input type="hidden" name="file_name" value="4.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=4.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=4.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=4.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('4.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">5.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 21 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">6.36 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 5.txt?');">
                          <input type="hidden" name="file_name" value="5.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=5.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=5.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=5.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('5.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">6.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Friday, 29 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">3.08 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 6.txt?');">
                          <input type="hidden" name="file_name" value="6.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=6.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=6.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=6.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('6.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">7.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 23 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">29.93 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 7.txt?');">
                          <input type="hidden" name="file_name" value="7.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=7.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=7.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=7.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('7.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">8.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">40.46 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete 8.txt?');">
                          <input type="hidden" name="file_name" value="8.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=8.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=8.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=8.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('8.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Amane.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 28 September, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">17.52 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Amane.txt?');">
                          <input type="hidden" name="file_name" value="Amane.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Amane.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Amane.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Amane.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Amane.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Blooming Stars.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 05 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">23.67 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Blooming Stars.txt?');">
                          <input type="hidden" name="file_name" value="Blooming Stars.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Blooming+Stars.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Blooming+Stars.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Blooming+Stars.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Blooming Stars.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Bruh.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 27 July, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">1.97 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Bruh.txt?');">
                          <input type="hidden" name="file_name" value="Bruh.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Bruh.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Bruh.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Bruh.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Bruh.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Concept of my yuri.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 27 July, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">17.3 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Concept of my yuri.txt?');">
                          <input type="hidden" name="file_name" value="Concept of my yuri.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Concept+of+my+yuri.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Concept+of+my+yuri.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Concept+of+my+yuri.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Concept of my yuri.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Dr. Zodiac.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 11 July, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">4.37 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Dr. Zodiac.txt?');">
                          <input type="hidden" name="file_name" value="Dr. Zodiac.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Dr.+Zodiac.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Dr.+Zodiac.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Dr.+Zodiac.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Dr. Zodiac.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Fumetsu no Muyō.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 05 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">4.47 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Fumetsu no Muyō.txt?');">
                          <input type="hidden" name="file_name" value="Fumetsu no Muyō.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Fumetsu+no+Muy%C5%8D.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Fumetsu+no+Muy%C5%8D.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Fumetsu+no+Muy%C5%8D.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Fumetsu no Muyō.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">HORROR001.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 20 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">8.05 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete HORROR001.txt?');">
                          <input type="hidden" name="file_name" value="HORROR001.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=HORROR001.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=HORROR001.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=HORROR001.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('HORROR001.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Hikawa Nozomi.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 30 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">1.35 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Hikawa Nozomi.txt?');">
                          <input type="hidden" name="file_name" value="Hikawa Nozomi.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Hikawa+Nozomi.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Hikawa+Nozomi.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Hikawa+Nozomi.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Hikawa Nozomi.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Hinamori Subaru.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Sunday, 01 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">988 bytes</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Hinamori Subaru.txt?');">
                          <input type="hidden" name="file_name" value="Hinamori Subaru.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Hinamori+Subaru.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Hinamori+Subaru.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Hinamori+Subaru.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Hinamori Subaru.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Hinotori Yamamoto.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 09 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">11.13 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Hinotori Yamamoto.txt?');">
                          <input type="hidden" name="file_name" value="Hinotori Yamamoto.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Hinotori+Yamamoto.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Hinotori+Yamamoto.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Hinotori+Yamamoto.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Hinotori Yamamoto.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Hm.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 31 August, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">1.64 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Hm.txt?');">
                          <input type="hidden" name="file_name" value="Hm.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Hm.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Hm.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Hm.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Hm.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Hoshizono Satsuki.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 28 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">1.16 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Hoshizono Satsuki.txt?');">
                          <input type="hidden" name="file_name" value="Hoshizono Satsuki.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Hoshizono+Satsuki.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Hoshizono+Satsuki.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Hoshizono+Satsuki.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Hoshizono Satsuki.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Idea of my yuri.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Sunday, 20 October, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">158.71 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Idea of my yuri.txt?');">
                          <input type="hidden" name="file_name" value="Idea of my yuri.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Idea+of+my+yuri.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Idea+of+my+yuri.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Idea+of+my+yuri.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Idea of my yuri.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Love Parasites.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 16 April, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">19.51 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Love Parasites.txt?');">
                          <input type="hidden" name="file_name" value="Love Parasites.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Love+Parasites.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Love+Parasites.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Love+Parasites.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Love Parasites.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Melody.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 07 September, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">7.47 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Melody.txt?');">
                          <input type="hidden" name="file_name" value="Melody.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Melody.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Melody.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Melody.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Melody.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">My Yuri Story #1.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 11 July, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">14.91 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete My Yuri Story #1.txt?');">
                          <input type="hidden" name="file_name" value="My Yuri Story #1.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=My+Yuri+Story+%231.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=My+Yuri+Story+%231.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=My+Yuri+Story+%231.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('My Yuri Story #1.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">My Yuri Story #3.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 11 July, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">2.69 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete My Yuri Story #3.txt?');">
                          <input type="hidden" name="file_name" value="My Yuri Story #3.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=My+Yuri+Story+%233.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=My+Yuri+Story+%233.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=My+Yuri+Story+%233.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('My Yuri Story #3.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">My idea of band.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 21 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">4.27 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete My idea of band.txt?');">
                          <input type="hidden" name="file_name" value="My idea of band.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=My+idea+of+band.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=My+idea+of+band.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=My+idea+of+band.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('My idea of band.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Regulus von Greifenburg.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 26 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">2.7 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Regulus von Greifenburg.txt?');">
                          <input type="hidden" name="file_name" value="Regulus von Greifenburg.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Regulus+von+Greifenburg.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Regulus+von+Greifenburg.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Regulus+von+Greifenburg.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Regulus von Greifenburg.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Shinonome Koharu, Amethysia & Kotonoha Minato.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">37.63 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Shinonome Koharu, Amethysia & Kotonoha Minato.txt?');">
                          <input type="hidden" name="file_name" value="Shinonome Koharu, Amethysia & Kotonoha Minato.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Shinonome+Koharu%2C+Amethysia+%26+Kotonoha+Minato.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Shinonome+Koharu%2C+Amethysia+%26+Kotonoha+Minato.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Shinonome+Koharu%2C+Amethysia+%26+Kotonoha+Minato.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Shinonome Koharu, Amethysia & Kotonoha Minato.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Stella Marie Peterson.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 21 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">1.93 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Stella Marie Peterson.txt?');">
                          <input type="hidden" name="file_name" value="Stella Marie Peterson.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Stella+Marie+Peterson.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Stella+Marie+Peterson.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Stella+Marie+Peterson.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Stella Marie Peterson.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Takamura.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">17.95 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Takamura.txt?');">
                          <input type="hidden" name="file_name" value="Takamura.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Takamura.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Takamura.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Takamura.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Takamura.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Victor Blackthorn.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Sunday, 17 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">16.42 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Victor Blackthorn.txt?');">
                          <input type="hidden" name="file_name" value="Victor Blackthorn.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Victor+Blackthorn.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Victor+Blackthorn.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Victor+Blackthorn.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Victor Blackthorn.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Wundersterne.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">46.95 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Wundersterne.txt?');">
                          <input type="hidden" name="file_name" value="Wundersterne.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Wundersterne.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Wundersterne.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Wundersterne.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Wundersterne.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI001.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Wednesday, 01 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">20.94 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI001.txt?');">
                          <input type="hidden" name="file_name" value="YURI001.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI001.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI001.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI001.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI001.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI002.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Friday, 22 March, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">5.04 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI002.txt?');">
                          <input type="hidden" name="file_name" value="YURI002.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI002.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI002.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI002.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI002.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI003.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Friday, 22 March, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">5.04 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI003.txt?');">
                          <input type="hidden" name="file_name" value="YURI003.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI003.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI003.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI003.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI003.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI004.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Wednesday, 01 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">36.39 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI004.txt?');">
                          <input type="hidden" name="file_name" value="YURI004.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI004.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI004.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI004.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI004.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI005.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Wednesday, 01 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">22.94 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI005.txt?');">
                          <input type="hidden" name="file_name" value="YURI005.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI005.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI005.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI005.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI005.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI006.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Wednesday, 01 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">8.49 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI006.txt?');">
                          <input type="hidden" name="file_name" value="YURI006.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI006.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI006.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI006.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI006.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI007.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Wednesday, 01 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">80.7 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI007.txt?');">
                          <input type="hidden" name="file_name" value="YURI007.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI007.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI007.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI007.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI007.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI008.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Wednesday, 01 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">37.86 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI008.txt?');">
                          <input type="hidden" name="file_name" value="YURI008.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI008.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI008.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI008.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI008.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI009.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 06 April, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">3.22 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI009.txt?');">
                          <input type="hidden" name="file_name" value="YURI009.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI009.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI009.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI009.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI009.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI010.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Wednesday, 28 August, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">194.93 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI010.txt?');">
                          <input type="hidden" name="file_name" value="YURI010.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI010.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI010.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI010.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI010.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI011.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 21 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">14.93 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI011.txt?');">
                          <input type="hidden" name="file_name" value="YURI011.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI011.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI011.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI011.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI011.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI012.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 07 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">16.6 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI012.txt?');">
                          <input type="hidden" name="file_name" value="YURI012.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI012.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI012.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI012.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI012.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI013.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 06 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">27.32 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI013.txt?');">
                          <input type="hidden" name="file_name" value="YURI013.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI013.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI013.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI013.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI013.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI014.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Tuesday, 07 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">5.21 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI014.txt?');">
                          <input type="hidden" name="file_name" value="YURI014.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI014.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI014.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI014.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI014.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">YURI015.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 09 May, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">14.85 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete YURI015.txt?');">
                          <input type="hidden" name="file_name" value="YURI015.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=YURI015.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=YURI015.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=YURI015.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('YURI015.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">Yoru.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Saturday, 31 August, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">6.48 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete Yoru.txt?');">
                          <input type="hidden" name="file_name" value="Yoru.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=Yoru.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=Yoru.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=Yoru.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('Yoru.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">band.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 15 July, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">6.94 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete band.txt?');">
                          <input type="hidden" name="file_name" value="band.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=band.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=band.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=band.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('band.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">github-recovery-codes.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Friday, 15 November, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">132 bytes</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete github-recovery-codes.txt?');">
                          <input type="hidden" name="file_name" value="github-recovery-codes.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=github-recovery-codes.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=github-recovery-codes.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=github-recovery-codes.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('github-recovery-codes.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">task.txt</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Thursday, 11 July, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">198 bytes</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete task.txt?');">
                          <input type="hidden" name="file_name" value="task.txt">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=task.txt" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=task.txt" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=task.txt" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('task.txt')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col">
                <div class="card rounded-4 p-1 shadow border-0 h-100 bg-light-subtle">
                  <div class="card-body position-relative">
                    <h5 class="fw-medium text-center text-truncate">index.php</h5>
                    <h6 class="fw-medium small mt-4">Last modified:</h6>
                    <h6 class="fw-medium small mt-1">Monday, 02 December, 2024</h6>
                    <h6 class="fw-medium small mt-4">Size:</h6>
                    <h6 class="fw-medium small mt-1">16.41 KB</h6>
                    <div class="dropdown position-absolute top-0 start-0">
                      <button class="btn p-1 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical link-body-emphasis"></i>
                      </button>
                      <ul class="dropdown-menu rounded-4 shadow border-0">
                        <form action="/novels/index.php" method="post" onsubmit="return confirm('Are you sure you want to delete index.php?');">
                          <input type="hidden" name="file_name" value="index.php">
                          <li><button type="submit" name="delete" class="dropdown-item"><i class="bi bi-trash3-fill"></i> delete</button></li>
                        </form>
                        <li><a href="?view=index.php" class="dropdown-item"><i class="bi bi-eye-fill"></i> view</a></li>
                        <li><a href="?download=index.php" class="dropdown-item"><i class="bi bi-download"></i> download</a></li>
                        <li><a href="?edit=index.php" class="dropdown-item"><i class="bi bi-pencil-square"></i> edit</a></li>
                        <li><a href="#" class="dropdown-item" onclick="renameFile('index.php')"><i class="bi bi-input-cursor"></i> rename</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
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
            form.action = "/novels/index.php";
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