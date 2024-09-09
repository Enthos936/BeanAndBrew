<nav class="bg-brown dark:bg-brown flex overflow-hidden">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-start p-4">
        <a href="/Views/home.view.php" target="_blank">
            <img src="/Images/logo.png" class = "h-14 px-4" alt="Logo">
        </a>
        <!-- Creates a image for the first item in the navbar that is clickable that will redirect the user to the homepage -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row">
                <?php $LeftNavItems=["Products","Rate My Cake!","Booking"];?>
                <?php foreach($LeftNavItems as $item): ?>
                <li>
                        <a href="#" class="block px-4 text-white hover:text-gray-400 focus:underline"> <?= $item?></a>
                </li>
                <?php endforeach; ?>
                <!-- PHP That loops through each item in the item array to create individual buttons for each item -->
            </ul>
        </div>
    </div>
    <div class="max-w-screen-xl flex flex-grow items-center justify-end p-4">
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row">
                <?php $RightNavItems=["My Basket","Login"];?>
                <?php foreach($RightNavItems as $item): ?>
                <li>
                        <a href="<?=$item?>.view.php" class="block px-4 text-white hover:text-gray-400 focus:underline"> <?= $item?></a>
                </li>
                <?php endforeach; ?>
                <!-- PHP That loops through each item in the item array to create individual buttons for each item -->
            </ul>
        </div>
    </div>
</nav>
