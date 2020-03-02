<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">USERS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_URL ?>user/create_user.php">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_URL ?>user/get_user.php">View</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="<?php echo ROOT_URL; ?>inc/export.php" class="btn btn-success my-2 my-sm-0" target="_blank">Export</a>
            </form>
        </div>
    </div>
</nav>