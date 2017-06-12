<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=teknoloji", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>