<?php

$host = 'localhost';
$user = 'root';
$pswd = '';
$db = 'books';

$pdo = new PDO("mysql: host={$host}; dbname={$db}; charset=utf8", $user, $pswd);

function getThemes()
{
    global $pdo;
    $sql = 'SELECT DISTINCT themes FROM books WHERE themes IS NOT NULL';
    $result = $pdo -> query($sql);
    return $result -> fetchAll(PDO::FETCH_COLUMN);
}

function getCategory()
{
    global $pdo;
    $sql = 'SELECT DISTINCT category FROM books WHERE category IS NOT NULL';
    $res = $pdo -> query($sql);
    return $res -> fetchAll(PDO::FETCH_COLUMN);
}   

function insertBook()
{
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $new = isset($_POST['new']) ? 1 : 0;
    $themes = isset($_POST['themes']) ? $_POST['themes'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';

    global $pdo;
    /*$query = "INSERT INTO books (name, price, new, themes, category) VALUES(
        :name, :price, :new, :themes, :category)";
    
    $pz = $pdo -> prepare($query); // подготовленный запрос
    $pz -> bindParam('name', $name);
    $pz -> bindParam('price', $price);
    $pz -> bindParam('new', $new);
    $pz -> bindParam('themes', $themes);
    $pz -> bindParam('category', $category);
    $pz -> execute(); // выполняет подготовленный запппрос*/

    $query = "INSERT INTO books (name, price, new, themes, category) VALUES(
        ?, ?, ?, ?, ?)";
    $pz = $pdo -> prepare($query); // подготовленный запрос    
    $pz -> execute([$name, $price, $new, $themes, $category]);
    // echo $query;
}

function deleteBook()
{
    global $pdo;
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $sql ='DELETE FROM books WHERE id = ?';
    $pz = $pdo -> prepare($sql);
    $pz -> execute([$id]);
    // echo $id;
}

function editBook()
{

}