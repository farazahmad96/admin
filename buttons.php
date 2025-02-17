<!-- header  -->
<?php include('./include/header.php'); ?>
<!-- header  -->

<!--Container -->
<div class="mx-auto bg-gray-lightest">
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
            <main class="bg-white-medium flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Outline Buttons form-->
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                Outline Buttons
                            </div>
                            <div class="p-3">
                                <button class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded">
                                    Button
                                </button>
                                <button class="bg-transparent hover:bg-green-500 text-green-dark font-semibold hover:text-white py-2 px-4 border border-green hover:border-transparent rounded">
                                    Button
                                </button>
                                <button class="bg-transparent hover:bg-orange-500 text-orange-dark-800 font-semibold hover:text-white py-2 px-4 border border-orange-500 hover:border-transparent rounded">
                                    Button
                                </button>
                                <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500hover:border-transparent rounded">
                                    Button
                                </button>
                            </div>
                        </div>
                        <!--/Outline Buttons -->

                        <!--Solid Buttons-->
                        <div class="mb-2 mx-2 border-solid border-gray-300 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                Solid Buttons
                            </div>
                            <div class="p-3">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                                <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                                <button class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                            </div>
                        </div>
                        <!--/Solid Buttons-->
                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!--Card Section Starts Here-->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Outline Buttons form-->
                        <div class="mb-2 border-solid border-gray-200 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                Buttons Styles
                            </div>
                            <div class="p-3">
                                <button class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                    Button
                                </button>
                                <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                                    Button
                                </button>
                                <button class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full">
                                    Button
                                </button>
                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
                                    Button
                                </button>
                            </div>
                        </div>
                        <!--/Outline Buttons -->

                        <!--Solid Buttons-->
                        <div class="mb-2 mx-2 border-solid border-gray-200 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                Button Bordered
                            </div>
                            <div class="p-3">
                                <button class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 border border-blue-800 rounded">
                                    Button
                                </button>
                                <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 border border-green-800 rounded">
                                    Button
                                </button>
                                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 border border-orange-800 rounded">
                                    Button
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-800 rounded">
                                    Button
                                </button>
                            </div>
                        </div>
                        <!--/Solid Buttons-->
                    </div>
                    <!--Card Section Ends Here-->
                    <!--Card Section Starts Here-->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Outline Buttons form-->
                        <div class="mb-2 border-solid border-gray-200 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                Button Groups
                            </div>
                            <div class="p-3">
                                <div class="inline-flex">
                                    <button class="bg-gray-200 hover:bg-gray-500 text-gray-900 font-bold py-2 px-4 rounded-l">
                                        Prev
                                    </button>
                                    <button class="bg-gray-200 hover:bg-gray-500 text-gray-900 font-bold py-2 px-4 rounded-r">
                                        Next
                                    </button>
                                </div>

                                <div class="inline-flex">
                                    <button class="bg-teal-200 hover:bg-teal-500 text-teal-900 font-bold py-2 px-4 rounded-l">
                                        Prev
                                    </button>
                                    <button class="bg-teal-200 hover:bg-teal-500 text-teal-900 font-bold py-2 px-4 rounded-r">
                                        Next
                                    </button>
                                </div>


                                <div class="inline-flex">
                                    <button class="bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded-l">
                                        Prev
                                    </button>
                                    <button class="bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded-r">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--/Outline Buttons -->

                        <!--Solid Buttons-->
                        <div class="mb-2 mx-2 border-solid border-gray-200 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-100 px-2 py-3 border-solid border-gray-200 border-b">
                                Miscellaneous
                            </div>
                            <div class="p-3">
                                <button class="bg-blue-500 hover:bg-blue-200 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-500 rounded">
                                    3D Button
                                </button>
                                <button class="bg-white hover:bg-gray-500 text-gray-900 font-semibold py-2 px-4 border border-gray-200 rounded shadow">
                                    Elevated Button
                                </button>
                                <button class="bg-gray-200 hover:bg-gray-500 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                                    </svg>
                                    <span>Download</span>
                                </button>
                                <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed">
                                    Button
                                </button>
                            </div>
                        </div>
                        <!--/Solid Buttons-->
                    </div>
                    <!--Card Section Ends Here-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-gray-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>
</body>

</html>