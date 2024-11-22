<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Form</title>
</head>

<body>
    <div class="container my-5">
        <h2>Add Users Form</h2>
        <form action="<?php echo base_url('CrudControllers/Practice') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact" placeholder="Enter your contact" required>
            </div>

            <div class="form-group">
                <label for="textarea">Address:</label>
                <textarea class="form-control" name="address" rows="3" placeholder="Enter your address"></textarea>
            </div>

            <div class="form-group">
                <label for="imageUpload">Choose an image</label>
                <input type="file" name="img" class="form-control-file" id="imageUpload" accept="image/*">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>