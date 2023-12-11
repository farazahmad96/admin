<?php
include('../connection.php');
$noOfBusinesses = "SELECT COUNT(id) as total_businesses FROM businesses";
$resultBusiness = $conn->query($noOfBusinesses);

$totalBusinesses = 0;

if ($resultBusiness->num_rows > 0) {
    $row = $resultBusiness->fetch_assoc();
    $totalBusinesses = $row['total_businesses'];
}

// Fetch the number of users
$noOfUsers = "SELECT COUNT(id) as total_users FROM users";
$resultUsers = $conn->query($noOfUsers);

$totalUsers = 0;

if ($resultUsers->num_rows > 0) {
    $rowUsers = $resultUsers->fetch_assoc();
    $totalUsers = $rowUsers['total_users'];
}

// Fetch the number of categories
$noOfCategories = "SELECT COUNT(id) as total_users FROM business_category";
$resultCat = $conn->query($noOfCategories);

$totalUsers = 0;

if ($resultCat->num_rows > 0) {
    $rowCat = $resultCat->fetch_assoc();
    $totalCategories = $rowCat['total_users'];
}

// Fetch trending categories based on usage count
$trendingCategoriesQuery = "SELECT bc.category_name, COUNT(b.category_id) as category_count FROM businesses b JOIN business_category bc ON b.category_id = bc.id GROUP BY b.category_id ORDER BY category_count DESC LIMIT 4";
$resultCategories = $conn->query($trendingCategoriesQuery);


//connection
$conn->close();
?>

<!-- header  -->
    <?php include('./include/header.php'); ?>
<!-- header  -->

<!--Container -->
<div class="mx-auto bg-grey-400">
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
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Stats Row Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    <?= $totalBusinesses ?>
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Businesses
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    $1,500.09
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Revenue
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                <?= $totalUsers ?>
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Users
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    <?= $totalCategories ?>
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Categories
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- /Stats Row Ends Here -->

                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- trending cat card -->

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Trending Categories</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Used</th>
                                        <th scope="col">Current</th>
                                        <th scope="col">Change</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="hidden">
                                        <th scope="row">1</th>
                                        <td>
                                            <button class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                                                Twitter
                                            </button>
                                        </td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <span class="text-green-500"><i class="fas fa-arrow-up"></i>-%</span>
                                        </td>
                                    </tr>
                                    <?php
$counter = 1;
                while ($row = $resultCategories->fetch_assoc()) {
                    echo '<tr>
                            <th scope="row">' . $counter . '</th>
                            <td>
                                <button class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                                    ' . $row['category_name'] . '
                                </button>
                            </td>
                            <td>' . $row['category_count'] . '</td>
                            <td>-</td>
                            <td>
                                <span class="text-green-500"><i class="fas fa-arrow-up"></i>5%</span>
                            </td>
                        </tr>';
                    $counter++;
                }

                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /trending category card -->

                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!-- Progress Bar hidden -->
                    <div class="hidden flex flex-1 flex-col md:flex-row lg:flex-row mx-2 mt-2">
                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full pt-2">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Progress Among Projects</div>
                            </div>
                            <div class="">
                                <div class="w-full">

                                    <div class="shadow w-full bg-grey-light">
                                        <div class="bg-blue-500 text-xs leading-none py-1 text-center text-white"
                                             style="width: 45%">45%
                                        </div>
                                    </div>


                                    <div class="shadow w-full bg-grey-light mt-2">
                                        <div class="bg-teal-500 text-xs leading-none py-1 text-center text-white"
                                             style="width: 55%">55%
                                        </div>
                                    </div>


                                    <div class="shadow w-full bg-grey-light mt-2">
                                        <div class="bg-orange-500 text-xs leading-none py-1 text-center text-white"
                                             style="width: 65%">65%
                                        </div>
                                    </div>


                                    <div class="shadow w-full bg-grey-300 mt-2">
                                        <div class="bg-red-800 text-xs leading-none py-1 text-center text-white"
                                             style="width: 75%">75%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Profile Tabs-->
                    <div class="hidden flex flex-1 flex-col md:flex-row lg:flex-row mx-2 p-1 mt-2 mx-auto lg:mx-2 md:mx-2 justify-between">
                        <!--Top user 1-->
                        <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                            <img src="https://i.imgur.com/w1Bdydo.jpg" alt="" class="w-full"/>
                            <div class="flex justify-center -mt-8">
                                <img src="https://i.imgur.com/8Km9tLL.jpg" alt=""
                                     class="rounded-full border-solid border-white border-2 -mt-3">
                            </div>
                            <div class="text-center px-3 pb-6 pt-2">
                                <h3 class="text-black text-sm bold font-sans">Olivia Dunham</h3>
                                <p class="mt-2 font-sans font-light text-grey-700">Hello, i'm from another the other
                                    side!</p>
                            </div>
                            <div class="flex justify-center pb-3 text-grey-dark">
                                <div class="text-center mr-3 border-r pr-3">
                                    <h2>34</h2>
                                    <span>Photos</span>
                                </div>
                                <div class="text-center">
                                    <h2>42</h2>
                                    <span>Friends</span>
                                </div>
                            </div>
                        </div>
                        <!--Top user 2-->
                        <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                            <img src="https://i.imgur.com/w1Bdydo.jpg" alt="" class="w-full"/>
                            <div class="flex justify-center -mt-8">
                                <img src="https://i.imgur.com/8Km9tLL.jpg" alt=""
                                     class="rounded-full border-solid border-white border-2 -mt-3">
                            </div>
                            <div class="text-center px-3 pb-6 pt-2">
                                <h3 class="text-black text-sm bold font-sans">Olivia Dunham</h3>
                                <p class="mt-2 font-sans font-light text-grey-dark">Hello, i'm from another the other
                                    side!</p>
                            </div>
                            <div class="flex justify-center pb-3 text-grey-dark">
                                <div class="text-center mr-3 border-r pr-3">
                                    <h2>34</h2>
                                    <span>Photos</span>
                                </div>
                                <div class="text-center">
                                    <h2>42</h2>
                                    <span>Friends</span>
                                </div>
                            </div>
                        </div>
                        <!--Top user 3-->
                        <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                            <img src="https://i.imgur.com/w1Bdydo.jpg" alt="" class="w-full"/>
                            <div class="flex justify-center -mt-8">
                                <img src="https://i.imgur.com/8Km9tLL.jpg" alt=""
                                     class="rounded-full border-solid border-white border-2 -mt-3">
                            </div>
                            <div class="text-center px-3 pb-6 pt-2">
                                <h3 class="text-black text-sm bold font-sans">Olivia Dunham</h3>
                                <p class="mt-2 font-sans font-light text-grey-dark">Hello, i'm from another the other
                                    side!</p>
                            </div>
                            <div class="flex justify-center pb-3 text-grey-dark">
                                <div class="text-center mr-3 border-r pr-3">
                                    <h2>34</h2>
                                    <span>Photos</span>
                                </div>
                                <div class="text-center">
                                    <h2>42</h2>
                                    <span>Friends</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Profile Tabs-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
            <div class="flex flex-1 mx-auto">Distributed by:  <a href="https://themewagon.com/" target=" _blank">Themewagon</a></div>
        </footer>
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>
</body>

</html>