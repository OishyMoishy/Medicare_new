<?php
session_start();
require 'database.php';
require 'functions.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $blogs = getUserBlogs($conn, $user_id);
} else {
    $blogs = getAllBlogs($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blogstyle.css">
    <title>Blog Website</title>
<style type="text/css">
    
    .learn-more-button {
    background-color: #16a085;
    color: white;
    border: 1px solid ;
    padding: 0.5em 1em;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    text-transform: uppercase; /* Uppercase text */
    font-weight: bold; /* Bold text */
}

.learn-more-button:hover {
    background-color: #fff;
    color: #16a085;
    border: 1px solid #16a085;
    transform: scale(1.05); /* Scale effect on hover */
}
nav {
            width: 250px;
            background: white;
            color: #16a085;
            padding-top: 30px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            margin: 20px 0;
        }

        nav ul li a {
            color: #16a085;
            text-decoration: none;
            font-size: 20px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: background 0.2s;
        }

        nav ul li a:hover {
            background: #16a085;
            color: white;
        }

        nav ul li a .nav-item {
            margin-left: 10px;
        }

        .main-content {
            margin-left: 270px; /* Adjust based on sidebar width */
            padding: 20px;
        }

</style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="index.php" class="logo">
                        <img src="medicineImg/logo.jpg" alt="Logo" style="width: 40px; height: 40px; border-radius: 50%;">
                        <span class="nav-item">Medi Care</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="bloglogin.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Login</span>
                    </a>
                </li>
                <li>
                    <a href="blogregister.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Sign Up</span>
                    </a>
                </li>
                <li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="post_blog.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Post Blog</span>
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="bloglogout.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Logout</span>
                    </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
        
        <main class="main-content">
            <header>
                <h1>Blogs</h1>
            </header>

        <div class="blog-container">
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-card">
                    <h2><?= htmlspecialchars($blog['title']) ?></h2>
                    <p>by <?= htmlspecialchars($blog['username']) ?></p>
                    <p><?= htmlspecialchars(substr($blog['content'], 0, 100)) ?>...</p>
                    <button class="learn-more-button" onclick="window.location.href='blog.php?id=<?= htmlspecialchars($blog['id']) ?>'">Learn More</button>
                    <?php if (isset($_SESSION['user_id']) && $blog['user_id'] == $_SESSION['user_id']): ?>
                        <form action="delete_blog.php" method="POST" style="display:inline;">
                            <input type="hidden" name="blog_id" value="<?= htmlspecialchars($blog['id']) ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>