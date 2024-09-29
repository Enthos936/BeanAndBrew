<?php session_start() ?>
<nav class="bg-brown dark:bg-brown flex overflow-hidden sticky drop-shadow-2xl">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-start p-4">
        <a href="/Views/home.view.php">
            <img src="/Images/logo.png" class = "h-14 px-4" alt="Logo">
        </a>
        <!-- Creates a image for the first item in the navbar that is clickable that will redirect the user to the homepage -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row">
                <?php $LeftNavItems=["Products","Rate My Cake!","Booking"];?>
                <?php foreach($LeftNavItems as $item): ?>
                <li>
                        <a href="<?= str_replace("!", "", str_replace(" ","",$item))?>.view.php" class=" text-xl block px-4 text-white hover:text-gray-400 focus:underline"> <?= $item?></a>
                </li>
                <?php endforeach; ?>
                <!-- PHP That loops through each item in the item array to create individual buttons for each item -->
            </ul> 
        </div>
    </div>
    <div class="max-w-screen flex flex-grow items-center justify-end p-4">
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row">
                <li>
                    <a href="Basket.view.php" class="text-xl block px-4 text-white hover:text-gray-400 focus:underline">Basket</a>
                </li>
                <?php if ($_SESSION["LoggedIn"] == "True"): ?>
                    <li>
                        <a href="../views/DatabaseAccess/LogOut.php" class="text-xl block px-4 text-white hover:text-gray-400 focus:underline">Log Out</a>
                    </li>
                <?php elseif ($_SESSION["LoggedIn"] == "False"):?>
                    <li>
                        <a href="Login.view.php" class="text-xl block px-4 text-white hover:text-gray-400 focus:underline">Login</a>
                    </li>
                <?php endif ?>
                <!--This if statement is used to identify whether or not the user is logged in and present the right button for either loggin in or out -->
            </ul>
        </div>
    </div>
</nav>
<?php if(isset($_SESSION["LoggedIn"])== False){$_SESSION["LoggedIn"]="False";}?>
<!-- PHP that is used to check whether the logged in variable is set and if not sets it to false -->