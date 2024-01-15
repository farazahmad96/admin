<?php
include('../connection.php');
$categoriesActive = 'bg-white';

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
$catResult = $conn->query($categories);

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
          <h1 class="mb-2 text-3xl font-bold tracking-tight text-center text-gray-900 dark:text-white">Add New Category</h1>
          <form id="categoryForm" method="POST" action="">

            <div class="flex flex-wrap -mx-3 mb-6">


              <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-md font-light mb-1" for="price_per_day">
                  Price Per Day
                </label>
                <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="price_per_day" id="price_per_day" type="number" placeholder="1" required>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-md font-light mb-1" for="category_name">
                  Category Name
                </label>
                <input class="appearance-none block w-full text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="category_name" name="category_name" type="text" placeholder="Hotel.." required>
              </div>
              <!-- <button type="submit" name="add_category" onclickkk="addCategory()" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-10">
                Add Category
              </button> -->
              <button type="submit" name="add_category" onclickkk="addCategory()" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                Add Category
              </button>
          </form>

        </div>


        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
          <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
              All Coupons
            </div>
            <div class="p-3">
              <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                    <th class="border w-1/6 px-4 py-2">Id</th>
                    <th class="border w-1/4 px-4 py-2">Cateogry</th>
                    <th class="border w-1/6 px-4 py-2">Price Per Day</th>
                    <th class="border w-1/7 px-4 py-2">Code</th>
                    <th class="border w-1/5 px-4 py-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($catResult->num_rows > 0) {
                    // Output data of each row
                    while ($catRow = $catResult->fetch_assoc()) {
                      $code = 'code_' . $catRow['id'];
                  ?>
                      <tr>
                        <td class="border px-4 py-2">
                          <?= $catRow['id'] ?>
                        </td>
                        <td class="border px-4 py-2"> <?= $catRow['category_name'] ?></td>
                        <td class="border px-4 py-2">
                          <?= $catRow['price_per_day'] ?>
                        </td>
                        <td class="border px-4 py-2">
                          <?= $code ?>
                        </td>

                        <td class="border px-4 py-2">
                          <form method="POST" action="">
                            <input type="hidden" name="coupon_id" value="<?= $catRow['id'] ?>">
                            <button type="submit" name="recycle-coupon" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                              <i class="fa fa-check"></i>
                            </button>
                          </form>
                          <form method="POST" action="">
                            <input type="hidden" name="coupon_id" value="<?= $catRow['id'] ?>">
                            <button type="submit" name="delete-coupon" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--/Grid Form-->

    </div>

    </main>
    <!--/Main-->
  </div>

</div>

</div>

<script src="./main.js"></script>

</body>

</html>