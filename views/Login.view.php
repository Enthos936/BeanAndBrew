<?php require "../components/Head.php" ?>
<?php require "../components/NavBar.php" ?>
<!--Imports neccessary code from exterior files such as the header information and navbar -->
<?= $_SESSION["Errors_Present"] = False ?>
<?php if ($_SESSION["LoggedIn"] == "True"): ?>
<?php header("Location: Home.view.php"); ?>
<?php endif; ?>
<!-- used to set the errors present variable back to false -->
<div class="flex-col h-[563px] desktop:h-[779px] flex bg-cover  overflow-hidden justify-center align-middle items-center text-white" style="background-image: url(../images/banner.jpg) ;">
    <div class="w-[400px] h-[280px] text-center rounded-[30px]">
        <h1 class="text-[40px]">Log In</h1>
        <form action="/views/DatabaseAccess/LoginData.php" class = " drop-shadow-2xl" method="POST">
        <!--Used to open the form tags as well as call the php file for data to be taken into -->
            <label class=""for="email">Email:</label><br>
            <input placeholder="  Enter Email" class="rounded-lg text-black text-base mb-4 w-[260px]" type="text" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input placeholder="  Enter Password" class="rounded-lg text-black text-base mb-4 w-[260px]" type="text" id="password" name="password" required><br>

            <div class="flex-col items-center align-middle text-l">
                <button class="w-[128px] h-[40px] text-base mb-4 hover:bg-blue-300 bg-white text-black rounded-lg p-2 text-l" type="submit">Log in</button>
                <a class="bg-cream h-[40px] text-black rounded-lg py-[10.8px] px-[18.36205px]" href="/views/Register.view.php">Register now</a>
            </div>
        </form>
        <!-- piece of code above is used to create the input fields for the user as well as the log in and register buttons -->
    </div>

</div>


<?php require "../components/BottomBar.php" ?>

<?php require "../components/ErrorCheck.php" ?>
