<<<<<<< HEAD
 <div id="navBarContainer">
    <nav class="navBar">
        <span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
            <img src="assets/images/icons/logo.png">
        </span>
        <div class="group">
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('search.php')" class="navItemLink">
                    Search
                    <img src="assets/images/icons/search.png" class="icon" alt="Search">
                </span>
            </div>
        </div>
        <div class="group">
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName() ?></span>
            </div>
        </div>
    </nav>
=======
<div id="navBarContainer">
    <nav class="navBar">
        <span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
            <img src="assets/images/icons/logo.png">
        </span>
        <div class="group">
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('search.php')" class="navItemLink">
                    Search
                    <img src="assets/images/icons/search.png" class="icon" alt="Search">
                </span>
            </div>
        </div>
        <div class="group">
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('profile.php')" class="navItemLink">Username</span>
            </div>
        </div>
    </nav>
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
</div>