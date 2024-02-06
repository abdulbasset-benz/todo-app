<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <title>ToDo - App</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="header">
                <img src="../assets/pic2.jpeg" alt="">
                <h4>Welcome User!</h4> 
            </div>
            
            <div class="list">
                <ul>
                    <li>
                        <a href="#">
                        <ion-icon name="create-outline"></ion-icon>
                        <span>Tasks</span>
                        </a>
                    </li> 
                    <li>
                        <a href="#">
                        <ion-icon name="layers-outline"></ion-icon>
                        <span>Upcoming</span>
                        </a>
                    </li> 
                    <li>
                        <a href="#">
                        <ion-icon name="folder-outline"></ion-icon>
                        <span>Project</span>
                        <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </li> 
                </ul>
            </div>
            <div class="footer">
                <div class="setting">
                    <a class="bot-section" href="">
                        <ion-icon name="settings-outline" size = "medium"></ion-icon>
                        <span>Settings</span>
                    </a>
                </div>
                <div class="logout">
                    <a class="bot-section" href="">
                        <ion-icon name="log-out-outline" size = "medium"></ion-icon>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div> 
    </div>
    <div class="main">
        <div class="search-bar">
            <form class="form" action="" method="post">
                <ion-icon name="add-circle" size = "large"></ion-icon>
                <input id="search" type="search" name="" placeholder="add task">
                <button>
                <ion-icon name="add" class="icon"></ion-icon>
    
                ADD</button>
            </form>
        </div>
    </div>
    









<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>