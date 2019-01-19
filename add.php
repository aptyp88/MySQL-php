<?php include_once 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Add book</title>
</head>
<body>

<h1 class="display-4">Add book</h1>

<form method="POST" action="index.php" class="add">
    <input type="hidden" name="action" value="insert">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Price" name="price">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="new">
        <label class="form-check-label" for="exampleCheck1">New</label>
    </div>
    <label for="exampleFormControlSelect1">Themes</label>
    <select class="form-control" id="exampleFormControlSelect1" name="themes">
        <?php
            $themes = getThemes();
            foreach ($themes as $theme): ?>
        <option><?= $theme ?></option>
        <?php endforeach ?>
    </select>

    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category">
        <?php
            $category = getCategory();
            foreach ($category as $cat) : ?>
        <option><?= $cat?></option>
        <?php endforeach ?>
    </select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>