<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Update Data</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Update Form</h2>
        <form action="<?php echo base_url() . 'CrudControllers/UpdateData/' . $user['id'] ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="<?php echo $user["name"]; ?>" name="name"
                    placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" value="<?php echo $user["email"]; ?>" name="email"
                    placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" value="<?php echo $user["password"]; ?>" name="password"
                    placeholder="Enter your password" required>
            </div>


            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" value="<?php echo $user["contact"]; ?>" name="contact"
                    placeholder="Enter your contact" required>
            </div>

            <div class="form-group">
                <label for="textarea">Address:</label>
                <input type="text" class="form-control" value="<?php echo $user["address"]; ?>" name="address"
                    placeholder="Enter your address" required>
            </div>

            <div class="form-group">
                <label for="imageUpload">Choose an image</label>
                <span><?php echo $user["img"]; ?></span>
                <input type="file" name="img" value="<?php echo $user["img"]; ?>" class="form-control-file"
                    id="img">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>

</html>