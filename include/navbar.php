        <!--navbar Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">CodeMarket</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <a href="#" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Dashboard</a>
                    <!-- Check if the username is set in the session -->
                    <?php if (isset($_SESSION['username'])) : ?>
                        <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                        <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block"><?php echo $_SESSION['username']; ?></a>
                        <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="logout.php" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <!-- If not logged in, show login link or button -->
                        <a href="login.php" class="text-white p-2 no-underline hidden md:block lg:block">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <!--/navbar-->