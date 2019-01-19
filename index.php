<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Home page</title>
</head>
<body>
    
<?php

include_once 'function.php';
include_once 'book.php';

if(isset($_POST['action']) && $_POST['action']=='insert')
{
    insertBook();
}

if(isset($_POST['action']) && $_POST['action']=='delete')
{
    deleteBook();
}
//$sql = 'SELECT * FROM books LIMIT 0, 10';
//$result = $pdo -> query($sql);

/*
while ($row = $result -> fetch())
{
    echo '<pre>' . print_r($row, true) . '<pre>';
}
*/
//FETCH_ASSOC - ассоциативный массив
//FETCH_NUM - ключи цифры
//FETCH_OBJ - возвращает объект
//FETCH_CLASS

/*
$result -> setFetchMode(PDO::FETCH_CLASS, 'Book'); // создает объект указанного класса, значения столбцов присваиваются свойствам класса
while ($row = $result -> fetch()) // возвращает данные одной строки в виде ассоциативного массива, в кот. ключами являются название столбцов
{
    // echo '<pre>' . print_r($row, true) . '<pre>';
    // echo $row -> name . '<br>';
    echo $row -> getName() . ', ' . $row -> getPrice() . '<br>';
}
*/

/*
$result -> setFetchMode(PDO::FETCH_CLASS, 'Book');
$all = $result -> fetchALL();
echo '<pre>' . print_r($all, true) . '<pre>';
*/

$page = isset($_GET['page']) ? $_GET['page'] : 0;

$sql = 'SELECT * FROM books ORDER BY id DESC LIMIT '. ($page * 50) .', 50';
$result = $pdo -> query($sql);

$books = $result ->fetchAll(PDO::FETCH_OBJ); //массив объектов
echo '<table border="1">';
echo '<a href="add.php" class="my-add fas fa-plus"></a>';
echo '<tr><th>#</th><th>id</th><th>name</th><th>price</th><th>new</th><th>themes</th><th>category</th><th>edit</th><th>delete</th></tr>';
for($i = 0; $i < count($books); $i++)
{
    $book = $books[$i];
    echo '<tr>';
        echo '<td>' . ($page * 50 + $i + 1) . '</td>';  
        echo '<td>' . $book -> id . '</td>';
        echo '<td>' . $book -> name . '</td>';
        echo '<td>' . round($book -> price, 2) . '</td>';?>
        <!-- echo '<td><i class="fas fa-check" style=""></i></td>'; -->
        <td><i class="fas fa-check" style="<?php if($book->new==0){echo 'color:#ccc;';}else{echo 'color:#007bff;';}?>"></i></td>
        <?php
        echo '<td>' . $book -> themes . '</td>';
        echo '<td>' . $book -> category . '</td>';
        echo '<td><a href="edit.php?id='.$book->id.'" class="fas fa-edit"></a></td>';
        echo '<td>
            <form method="POST" action="index.php">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="'. $book->id.'">
                <button class="fas fa-trash-alt"></button>
            </form>
            </td>';  
    echo '</tr>';
}
echo '</table>';

$sqlPaginate = 'SELECT COUNT(*) FROM books';
$resultPaginate = $pdo -> query($sqlPaginate);
$pages = ceil(($resultPaginate->fetch(PDO::FETCH_NUM)[0]) / 50); // ceil - округление в большую сторону
//echo $pages;

?>

<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <?php for($i = 0; $i < $pages; $i++) : ?>
        <li class="page-item <?php if($page==$i){echo 'active';} ?>"><a class="page-link" href="index.php?page=<?=$i?>"><?=($i+1) ?></a></li>
    <?php endfor ?>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>