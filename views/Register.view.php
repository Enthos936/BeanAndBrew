<?php require "../components/Head.php" ?>
<?php require "../components/NavBar.php" ?>
<!--Imports neccessary code from exterior files such as the header information and navbar -->
<div class="flex-col flex bg-cover h-[563px] desktop:h-[779px] overflow-hidden justify-center align-middle items-center  text-white" style="background-image: url(../images/banner.jpg) ;">
    <div class="w-[400px] text-center rounded-[30px]">
        <h1 class="text-[40px]">Register</h1>
        <form action="/views/DatabaseAccess/RegisterData.php" class = "drop-shadow-2xl" method="POST">
        <!--Used to open the form tags as well as call the php file for data to be taken into -->
            <label  for="first_name">First Name:</label><br>
            <input placeholder="  Enter First Name" class="rounded-lg text-black text-base mb-4 w-[275px]" type="text" id="first_name" name="first_name" required><br>

            <label  for="last_name">Last Name:</label><br>
            <input placeholder="  Enter Last Name" class="rounded-lg text-black text-base mb-4 w-[275px]" type="text" id="last_name" name="last_name" required><br>

            <label  for="email">Email:</label><br>
            <input placeholder="  Enter Email" class="rounded-lg text-black text-base mb-4 w-[275px]" type="text" id="email" name="email" required><br>

            <label  for="password">Password:</label><br>
            <input placeholder="  Enter Password" class="rounded-lg text-black text-base mb-4 w-[275px]" type="text" id="password" name="password" required><br>

            <label  for="confirm_password">Confirm Password:</label><br>
            <input placeholder="  Confirm Password" class="rounded-lg text-black text-base mb-4 w-[275px]" type="text" id="confirm_password" name="confirm_password" required><br>

            <button class="text-base mb-4 hover:bg-blue-300 bg-white text-black rounded-lg p-2" type="submit">Create Account!</button> 
        </form>
        <!-- piece of code above is used to create the input fields for the user as well as the log in and register buttons -->
    </div>
</div>

<?php require "../components/BottomBar.php" ?>

<?php require "../components/ErrorCheck.php" ?>
