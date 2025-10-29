<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSCE 20303 | Update Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar bg-body-tertiary mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="images/logo.png" height="40%" width="40%" alt="UAFS">
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update contacts</h5>
                        <p class="card-text">Update contact</p>
                        <form action="contactUpdateController.php" method="POST">
                            <input type="hidden" id="contactID" name="contactID" value="<?php echo htmlspecialchars($contact->contactID) ?? '', ENT_QUOTES; ?>">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" value="<?php echo htmlspecialchars($username) ?? '', ENT_QUOTES; ?>" required> 
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" value="<?php echo htmlspecialchars($email) ?? '', ENT_QUOTES; ?>" required>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="contactListController.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>