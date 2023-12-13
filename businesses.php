<?php
include('../connection.php');

if (isset($_POST['add_category'])) {
  $category_name = $_POST['category_name'];
  $price_per_day = $_POST['price_per_day'];

  $sql = "INSERT into business_category (category_name, price_per_day) VALUES ('$category_name', '$price_per_day')";
  if ($conn->query($sql) === TRUE) {
    header('Location: admin.php?success');
  } else {
    echo "Error adding category";
  }
}

$categories = "SELECT * FROM business_category";
$result = $conn->query($categories);

$businesses = "SELECT * FROM businesses where is_deleted = 0 ORDER BY id desc";
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

        <div class="flex flex-col">

          <div class="w-10/12 my-[30px] mx-auto">

            <h1 class="mb-2 text-3xl font-bold tracking-tight text-center text-gray-900 dark:text-white">Businesses listed below</h1>

            <!-- <div class="mb-4 xl:max-w-[1200px] mx-auto" id="business_K_<?= $row['id']; ?>"> -->



            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="p-4">
                      <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                      </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Business name
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Business Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Social
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Website
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Coupon Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Days
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Delete
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  if ($businesses_res->num_rows > 0) {
                    // Output data of each row
                    while ($row = $businesses_res->fetch_assoc()) {
                      // print_r($row);
                      // die;
                      $expireDateObj = new DateTime($row['expire_at']);
                      $currentDateObj = new DateTime();
                      $days = '';
                      $paid_status = '';

                      // Calculate the difference in days
                      $interval = $currentDateObj->diff($expireDateObj);
                      $daysLeft = $interval->days;
                      if ($row['is_paid'] == 1) {
                        // $paid_status = 'Selected';
                        $paid_color = 'green';
                        $days =  " Days Left: " . $daysLeft;
                      } else {
                        $paid_status = 'Not Selected';
                        $paid_color = 'red';
                        $days = '';
                      }
                  ?>
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                          <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                          </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <?= $row['business_name'] ?>
                        </th>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['business_desc'] ?>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['business_address'] ?>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['business_phone'] ?>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['business_social'] ?>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['business_website'] ?>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['coupon_code'] ?>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['days'] ?>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                          <?= $row['status'] == 1 ? '<span class="font-medium text-green-600 dark:text-green-500 hover:underline">Active</span>' : '<span class="font-medium text-red-600 dark:text-red-500 hover:underline">Inactive</span>' ?>
                        </td>
                        <td class="flex items-center px-6 py-4">
                          <span onclick="updateStatus(<?= $row['id'] ?>, 'accept')" class="py-2 px-4 mb-3 bg-green-400 font-bold flex items-center rounded-full hover:bg-green-500 hover:cursor-pointer"><i class="fa fa-check text-white text-2xl"></i>
                          </span>
                          <span onclick="updateStatus(<?= $row['id'] ?>, 'reject')" class="py-2 px-4 mb-3 bg-red-400 font-bold flex items-center rounded-full hover:bg-red-500 hover:cursor-pointer"><i class="fa fa-ban text-white text-2xl"></i>
                          </span>
                        </td>
                        <td class="px-6 py-4">
                          <span onclick="updateStatus(<?= $row['id'] ?>, 'delete')" class="py-2 px-4 mb-3 bg-red-400 font-bold flex items-center rounded-full hover:bg-red-500 hover:cursor-pointer"><i class="fa fa-trash text-white text-2xl"></i>
                          </span>
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
      </main>
      <!--/Main-->
    </div>
    <!--Footer-->
    <footer class="bg-grey-darkest text-white p-2">
      <div class="flex flex-1 mx-auto">&copy; My Design</div>
    </footer>
    <!--/footer-->

  </div>

</div>

<script src="./main.js"></script>

</body>

</html>


<!-- new code below faraz -->
<script>
  let categoryIdCounter = 1; // Initialize category ID counter

  function addCategory() {
    const categoryNameInput = document.getElementById("categoryNameInput");
    const categoryName = categoryNameInput.value.trim();

    if (categoryName !== "") {
      // Create a new unique ID for the category
      const categoryId = `category-${categoryIdCounter}`;
      categoryIdCounter++;

      // Add the new category to the list
      const categoryList = document.querySelector(".list-categories");
      const newCategoryElement = document.createElement("div");
      newCategoryElement.className = "ml-5 mt-4";
      newCategoryElement.innerHTML = `
            <span class="text-green-400 text-2xl">-</span>
            <a id="${categoryId}" href="" class="text-2xl font-semibold">${categoryName}</a>
            <input type="text" class="bg-gray-200 w-40 ml-3 show_code_here" />
          `;

      categoryList.appendChild(newCategoryElement);

      // Clear the input field
      categoryNameInput.value = "";
    }
  }

  //accept or reject business
  function updateStatus(id, status) {
    $.ajax({
      type: "POST",
      url: '../ajax/status.php',
      data: {
        id: id,
        status: status
      },
      success: function(result) {
        // alert(result)
        if (result == 1) {
          // $("#business_" + id).remove();
          location.reload()
        } else {
          location.reload()
        }
      }
    });
  }
</script>