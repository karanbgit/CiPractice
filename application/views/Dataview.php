<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Dataview</title>
</head>


<body>

    <div class="container mt-5">
        <h1 class="text-center ">Data View</h1>
        <a href="<?php echo base_url('CrudControllers/Form') ?>" class="btn btn-primary m-2">Add User</a>

        <a href="<?php echo base_url('CrudControllers/Logout') ?>" class="btn btn-danger m-2">Logout</a>
        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <?php $count = 0;
            foreach ($li as $data): ?>
                <tbody>
                    <tr>
                        <td><?php echo ++$count ?></td>
                        <td><?php echo $data->name ?></td>
                        <td><?php echo $data->email ?></td>
                        <td><?php echo $data->contact ?></td>
                        <td><?php echo $data->address ?></td>
                        <td><?php echo $data->password ?></td>
                        <td><img class="image-fluid" src="<?php echo base_url() . 'uploads/' . $data->img ?>" alt="Image"
                                style="width: 80px; height: 80px;"></td>
                        <td>
                            <a href="<?php echo base_url() . 'CrudControllers/UpdateById/' ?><?php echo $data->id ?>"
                                class="btn btn-primary">Edit</a>
                            <a href="<?php echo base_url() . 'CrudControllers/DeleteById/' ?><?php echo $data->id ?>"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>

            <?php endforeach; ?>

        </table>
    </div>
    <?php if ($this->session->flashdata('success')): ?>
        <script>
            alert("<?php echo $this->session->flashdata('success'); ?>");
        </script>
    <?php endif; ?>



</body>

</html>