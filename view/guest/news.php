<?php require_once APP_ROOT . '/view/partials/header.php'?>
<title>Past Question Hub | <?=SITE_TITLE?></title>

<body>


<?php require_once APP_ROOT . '/view/partials/nav.php'?>




<div class="pt-10 pt-md-24 bg-news">
    <div class="container-xl max-w-screen-xl">
        <div class="row justify-content-md-center">
            <div class="col-md-10 col-xl-8 text-md-center">
                <div>
                    <h1 class="ls-tight font-bolder display-7 text-white mb-7 text-center text-uppercase text-center">
                    Our News Hub
                    </h1>
                    <p class="lead text-white text-opacity-80 px-9 mb-10 text-center">
                    These are our latest book summaries and stories under the our various categories such as NECO, JAMB, WAEC POST UTME and others. 
                        </h1>
                 
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-10 mt-md-24">
            <div class="col-lg-12 text-lg-center mb-n20 mb-md-n40 position-relative overlap-10">
              
               
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-10">
<div class="col-12 col-md-10 text-center" style="margin-top:40px;">
                <!-- Heading -->
                <h1 class=" font-bolder h3  text-nav">
                Welcome to <?=SITE_TITLE?> News Hub!
                </h1>
                <!-- Text -->
   <p class="lead text-muted mt-3 px-6 text-capitalize">
  
Weekly Published Articles, News, blogs and so many more .
Our blog takes the message from the weekend and lays out next right steps, so you can hear a message and do a message in practical ways.</p>
                </p>
            </div>
        </div>

        <div class="row mx-auto">
    <?php foreach ($posts as $post) : ?>
        <div class="col-lg-4 col-md-6">
            <a href="blogdetails?title=<?= str_replace(' ', '_', $post->title) ?>" class="text-decoration-none">
                <div class="courst_card">
                    <div class="course_card_img"><img src="<?= $post->img ?>" alt="course" /></div>
                    <hr>
                    <div class="course_card_content">
                        <div class="d-flex align-items-start">
                            <div class="avatar me-3">
                                <img src="assets/img/icons/brands/social-label.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div class="me-2">
                                <h5 class="mb-1">
                                    <span class="stretched-link text-uppercase fw-bolder text-nav">
                                        <?= $post->title ?>
                                    </span>
                                </h5>
                                <div class="">
                                    <span class="fw-bold text-nav text-uppercase">Category: </span>
                                    <span class="text-uppercase text-nav"><?= $post->category ?></span>
                                </div>
                                <small class="fw-bolder text-nav">
                                    <?php
                                    $dateString = $post->date_created;
                                    $dateTime = new DateTime($dateString);
                                    echo $dateTime->format("F jS, Y g:i A");
                                    ?>
                                </small>
                            </div>
                        </div>
                        <hr>
                        <p class="description m-2 text-capitalize text-nav"><?= substr(html_entity_decode($post->body), 0, 150) ?>...</p>
                    </div>
                    <div class="course_card_footer text-center ">
                        <a class="text-nav fw-bolder" href="blogdetails?title=<?= str_replace(' ', '_', $post->title) ?>">Learn More <i class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

</div>

<?php require_once APP_ROOT . '/view/partials/footer.php'?>
