<html>
    <head>
        <title>ciBlog</title>
        <link rel='stylesheet' href='<?php echo base_url(); ?>/bootstrap.min.css'>
        <link rel='stylesheet' href='<?php echo base_url(); ?>/assets/css/style.css'>
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">ciBlog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=" <?php echo base_url(); ?> ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" <?php echo base_url(); ?>posts ">Posts</a>
                    </li>
                    <li>
                        <a class="nav-link" href=" <?php echo base_url(); ?>about ">About</a>
                    </li>
                </ul>
                <!--<form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form> -->

                <!-- If the user has NOT logged in -->
                <?php if(!$this->session->userdata('logged_in')) : ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="nav-link" href=" <?php echo base_url(); ?>users/register ">Register</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="nav-link" href=" <?php echo base_url(); ?>users/login ">Login</a>
                    </li>
                </ul>
                <?php endif; ?>

                <!-- If the user has ALREADY logged in -->
                <?php if($this->session->userdata('logged_in')) : ?>

                <ul class="nav navbar-nav navbar-right create">
                    <li>
                        <a class="nav-link" href=" <?php echo base_url(); ?>posts/create ">Create Post</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="nav-link border border-success rounded"> <?php echo "Hello, ".$this->session->userdata('username'); ?> </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="nav-link" href=" <?php echo base_url(); ?>users/logout ">Logout</a>
                    </li>
                </ul>
                <?php endif; ?>

            </div>
        </nav> 

        <!--
        <div class="text-right">
            <em> 
                <?php echo $this->session->userdata('username'); ?> 
            </em>
        </div>-->

        <br/>
    
        <div class='container'>
            <!-- Flash messages -->
            <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('user_registered') .'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_created')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('post_created') .'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_updated')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('post_updated') .'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_update_failed')): ?>
            <?php echo '<p class="alert alert-danger">'. $this->session->flashdata('post_update_failed') .'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_deleted')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('post_deleted') .'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('login_failed')): ?>
            <?php echo '<p class="alert alert-danger">'. $this->session->flashdata('login_failed') .'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('user_loggedin')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('user_loggedin') .'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('user_loggedout')): ?>
            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('user_loggedout') .'</p>'; ?>
            <?php endif; ?>