<?php
    $loggedUser = selectSingle(2);
    $welcome = 'Welcome, '.$loggedUser['fname'].'  '.$loggedUser['lname'].'!';
?>

<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
        <?php echo $_SESSION['message']['msg']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="logo">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_vjpdyidb.json"  background="transparent"  speed="1"  style="width: 60px; height: 60px; border-radius: 30px; background-color: rgba(0, 0, 0, .15)"  loop  autoplay></lottie-player>
                        </div>
                    </div>
                    <div class="col-md-8 text-right">
                        <nav>
                            <ul>
                                <li>
                                    <a href="/">Dashboard</a>
                                </li>
                                <li>
                                    <a href="/create.php">Create New</a>
                                </li>
                                <li>
                                    <?php echo $welcome; ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

