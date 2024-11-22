<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        .full-height {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container full-height d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <h2 class="text-center">Login</h2>
            <form action="<?php echo base_url('CrudControllers/Loginpost') ?>" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                        required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="text-center mt-3">
                <p>Don't have an account? <a href="<?php echo base_url() . 'CrudControllers/Registration' ?>">Please
                        register first.</a></p>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <script>
            alert("<?php echo $this->session->flashdata('error'); ?>");
        </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>