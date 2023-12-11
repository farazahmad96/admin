<?php
include('../connection.php');

if (isset($_POST['add_category'])) {
  $category_name = $_POST['category_name'];
  $price_per_day = $_POST['price_per_day'];

  $sql = "INSERT into business_category (category_name, price_per_day) VALUES ('$category_name', '$price_per_day')";
  if ($conn->query($sql) === TRUE) {
    header('Location: category.php?success');
  } else {
    echo "Error adding category";
  }
}

$categories = "SELECT * FROM business_category";
$result = $conn->query($categories);

$businesses = "SELECT * FROM businesses";
$businesses_res = $conn->query($businesses);

?>

<!-- header  -->
<?php include('./include/header.php'); ?>
<!-- header  -->
<!--Container -->
<div class="mx-auto bg-grey-lightest">
  <!--Screen-->
  <div class="min-h-screen flex flex-col">
    <!-- navbar  -->
    <?php include('./include/navbar.php'); ?>
    <!-- navbar  -->

    <div class="flex flex-1">
      <!--Sidebar-->
      <?php include('./include/sidebar.php'); ?>
      <!--/Sidebar-->
      <!--Main-->
      <main class="bg-white-500 flex-1 p-3 overflow-hidden">


        <div class="w-10/12 my-[30px] mx-auto">
          <h1 class="mb-2 text-3xl font-bold tracking-tight text-center text-gray-900 dark:text-white">Add Your Category</h1>
          <form id="categoryForm" method="POST" action="">
            <div class="mt-10 flex">
              <i class="fa-solid fa-euro text-4xl ml-3 flex"> </i>
              <h2 class="ml-5 font-semibold text-2xl">Price per day</h2>
              <input type="number" name="price_per_day" class="bg-gray-200 w-10 ml-3" placeholder="Price" required />

              <h2 class="ml-5 font-semibold text-2xl">Category Name</h2>
              <input id="categoryNameInput" name="category_name" placeholder="Enter Category Name" type="text" class="bg-gray-200 w-40 ml-3" required />
              <button type="submit" name="add_category" onclickkk="addCategory()" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-10">
                Add Category
              </button>
            </div>
          </form>

          <div class="ml-5 mt-10 list-categories">
            <h1 class="text-2xl">Category list</h1>
            <div class="ml-5 mt-5">

              <?php
              if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                  $category_name = $row["category_name"];
                  echo '<div class="ml-5 mt-4">
                <span class="text-green-400 text-2xl">-</span>
                <a href="" class="Car grage text-2xl font-semibold">' . $category_name . '</a>
                <span> 
                <input class="ml-10" type="text" value="' . $category_name . '" readonly>
                </span>
                <div>
                <h1>Price Per Day: </h1>       '.$row['price_per_day'].'
                </div>
            </div>';
                }
              } else {
                echo "No categories found.";
              }
              ?>

            </div>
          </div>
        </div>

      </main>
      <!--/Main-->
    </div>

  </div>

</div>

<script src="./main.js"></script>

</body>

</html>