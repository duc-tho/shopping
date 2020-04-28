<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <h1>Hello - <?php echo $data['product']; ?></h1>
     <?php include_once "{$_(PATH_APPLICATION)}\\views\pages\Product_Page.php"; ?>
     <?php
     foreach ($data["category"] as $value) {
          echo "<div>{$value["CateID"]} - {$value["CategoryName"]} - {$value["Description"]}<br></div>";
     }
     ?>
</body>

</html>