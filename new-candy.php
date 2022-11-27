
<?php

$name = '';
$price = '';
$categories = '';


// Make sure we clicked the button
if (isset($_POST['submit'])) {
  $errors = array();
  $name = trim($_POST['name']);
  $price = trim($_POST['price']);
  $categories = $_POST['categories'];


  // Validations
  if (empty($name))
    $errors['name'] = 'Name is mandatory';

  if (empty($price))
    $errors['price'] = 'Price is mandatory';
  else if (!is_numeric($price))
    $errors['price'] = 'Price must be a number!';

  if (empty($categories))
    $errors['categories'] = 'category is mandatory';

  // Insert if no errors
  if (empty($errors)) {
    $conn = mysqli_connect('localhost', 'root', '', 'candy_shop');

    $query = "INSERT INTO candy(name, price, categ_id)
            VALUES('$name', $price, '$categories')";
    $result =  mysqli_query($conn, $query);

    mysqli_close($conn);

    if ($result)
      echo "<span style='color: green'>Successfully inserted !</span><br>";
    else
      echo "<span style='color: red'>Problem inserting. </span><br>";
  } else {
    // Display errors
    foreach ($errors as $key => $value) {
      echo "<span style='color: red'>$key : $value</span><br>";
    }
  }
}
?>