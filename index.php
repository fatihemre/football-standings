<?php
require_once 'database.php';

$page = $_GET['page'] ?? 'matches';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Football Standing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <div class="page">
        <header class="logo">
            <img src="assets/images/logo.png" alt="Türkiye Süper Ligi Logosu">
        </header>
        <div class="content">
            <nav class="sidebar">
                <a class="<?php echo $page === 'matches' ? 'active' : '';?> nav-item" href="index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    Anasayfa
                </a>
                <a class="<?php echo $page === 'fixture' ? 'active' : '';?> nav-item" href="index.php?page=fixture">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    Fikstür
                </a>
                <a class="<?php echo $page === 'standings' ? 'active' : '';?> nav-item" href="index.php?page=standings">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    Puan Durumu
                </a>
            </nav>
            <div class="page-content">
                <?php
                $file = __DIR__.'/_'.$page.'.php';
                if(file_exists($file)) {
                    require $file;
                } else {
                    require '404.php';
                }

                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>