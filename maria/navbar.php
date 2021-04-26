<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #769c8b;">
<div class="container">
    <a class="navbar-brand" href="#">Blog</a>
    
    <ul class="navbar-nav ml-3">
        <?php
            $isAdmin = false;
            $currentUser = "";
            if (isset($_SESSION['user']) != "") {
                $currentUser = $_SESSION['user'];
            }
            if (isset($_SESSION['admin']) != "") {
                $currentUser = $_SESSION['admin'];   
                $isAdmin = true; 
            }
            
            $menuItems = "";
            if ($currentUser != "") {
                $menuItems = "<li class='nav-item active'>
                                    <a class='navbar-brand' href='index.php'>Home</a>
                                </li>";
                if ($isAdmin) {
                    $menuItems .= "<li class='nav-item'>
                                    <a class='navbar-brand' href='create.php'>Add Article</a>
                                        </li>
                                    <li class='nav-item'>
                                        <a class='navbar-brand' href='manage_user.php'>Manage User</a>
                                    </li>";
                }
                $menuItems .= "<li class='nav-item'>
                                    <a class='navbar-brand' href='profile.php?id=".$currentUser."'>Profile</a>
                                </li>
                                <li class='nav-item'>
                                    <a href='logout.php?logout'>Sign Out</a>
                                </li>";                                    
            }
            
            echo $menuItems;
        ?>
    </ul>
    </div>
</nav>