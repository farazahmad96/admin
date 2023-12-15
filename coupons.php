<?php
include('../connection.php');

if (isset($_POST['add-coupon'])) {
    $code = strtoupper($_POST['code']);
    $coupon_type = $_POST['type'];
    $expiration_date = $_POST['expire_on'];

    // Insert data into the "coupons" table
    $sql = "INSERT INTO coupons (`code`, `type`, `expire_on`) VALUES ('$code', '$coupon_type', '$expiration_date')";

    if ($conn->query($sql) === TRUE) {
        header('Location: coupons.php?success');
    } else {
        echo "Error: " . $conn->error;
    }
}

// Check if the delete button is clicked
if (isset($_POST['delete-coupon'])) {
    $couponIdToDelete = $_POST['coupon_id'];

    // Delete the coupon with the given ID
    $deleteSql = "DELETE FROM coupons WHERE id = $couponIdToDelete";
    if ($conn->query($deleteSql) === TRUE) {
        header('Location: coupons.php?delete');
    } else {
        echo "Error: " . $conn->error;
    }
}

// Check if the recycle button is clicked
if (isset($_POST['recycle-coupon'])) {
    $couponIdToRecycle = $_POST['coupon_id'];

    // Update the status of the coupon with the given ID
    $recycleSql = "UPDATE coupons SET status = NOT status WHERE id = $couponIdToRecycle";
    if ($conn->query($recycleSql) === TRUE) {
        header('Location: coupons.php?success=recycle');
    } else {
        echo "Error: " . $conn->error;
    }
}

$success = isset($_GET['success']);
$delete = isset($_GET['delete']);

$coupons = "SELECT * FROM coupons";
$resultCoupons = $conn->query($coupons);

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
                <div class="w-3/5 my-[30px] mx-auto">
                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Add Your Coupon</h1>

                    <?php
                    if ($success) {
                        echo '<div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert"> Coupon added successfully!
                    </div>';
                    }
                    if ($delete) {
                        echo '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert"> Coupon delete successfully!
                    </div>';
                    }
                    ?>

                    <form class="mb-4 xl:max-w-[1200px] mx-auto" method="POST" action="">
                        <!-- Random Coupon Generator Button -->
                        <div class="mb-4">
                            <button type="button" id="generateRandomCoupon" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                                Generate Random Coupon
                            </button>
                            <input type="text" id="code" name="code" class="p-2 border border-gray-300 rounded-md w-full mt-2" required />
                        </div>

                        <!-- Expiration Date -->
                        <div class="mb-4">
                            <label for="expire_on" class="text-lg font-bold mb-2 block">
                                Expiration Date
                            </label>
                            <input type="date" id="expire_on" name="expire_on" class="p-2 border border-gray-300 rounded-md w-full" required />
                        </div>

                        <!-- Type Dropdown -->
                        <div class="mb-4">
                            <label for="type" class="text-lg font-bold mb-2 block">
                                Coupon Type
                            </label>
                            <select id="type" name="type" class="p-2 border border-gray-300 rounded-md w-full">
                                <option value="free">Free</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                        <!-- Add Coupon Button -->
                        <a href="index.php" type="button" name="add-coupon" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full">
                            Close
                        </a>
                        <button type="submit" name="add-coupon" class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                            Add Coupon
                        </button>
                    </form>

                    <!-- Horizontal Line -->
                    <div class="h-[3px] bg-gray-400"></div>
                </div>

                <!--Grid Form-->
                <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                            Coupons
                        </div>
                        <div class="p-3">
                            <table class="table-responsive w-full rounded">
                                <thead>
                                    <tr>
                                        <th class="border w-1/6 px-4 py-2">Id</th>
                                        <th class="border w-1/4 px-4 py-2">Coupon Code</th>
                                        <th class="border w-1/6 px-4 py-2">Type</th>
                                        <th class="border w-1/6 px-4 py-2">Expires On</th>
                                        <th class="border w-1/7 px-4 py-2">Status</th>
                                        <th class="border w-1/5 px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if ($resultCoupons->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $resultCoupons->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    <?= $row['id'] ?>
                                                </td>
                                                <td class="border px-4 py-2"> <?= $row['code'] ?></td>
                                                <td class="border px-4 py-2">
                                                    <?= $row['type'] ?>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <?= $row['expire_on'] ?>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <?= $row['status'] == 1 ? '<i class="fas fa-check text-green-500 mx-2"></i>' : '<i class="fas fa-ban text-red-500 mx-2"></i>' ?>

                                                </td>
                                                <td class="border px-4 py-2">
                                                    <form method="POST" action="">
                                                        <input type="hidden" name="coupon_id" value="<?= $row['id'] ?>">
                                                        <button type="submit" name="recycle-coupon" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                            <i class="fa fa-pointer"></i>
                                                        </button>
                                                    </form>
                                                    <form method="POST" action="">
                                                        <input type="hidden" name="coupon_id" value="<?= $row['id'] ?>">
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

                <!-- Script for Random Coupon Generator -->
                <script>
                    document.getElementById('generateRandomCoupon').addEventListener('click', function() {
                        var randomCoupon = generateRandomCoupon();
                        document.getElementById('code').value = randomCoupon;
                    });

                    function generateRandomCoupon() {
                        // Implement your random coupon generation logic here
                        // Example: Generate a random string of 6 characters
                        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        var randomCoupon = '';
                        for (var i = 0; i < 3; i++) {
                            randomCoupon += characters.charAt(Math.floor(Math.random() * characters.length));
                        }
                        for (var i = 0; i < 3; i++) {
                            randomCoupon += Math.floor(Math.random() * 10);
                        }
                        return randomCoupon;
                    }
                </script>
            </main>
            <!--/Main-->
        </div>

    </div>

</div>

<script src="./main.js"></script>

</body>

</html>