<?php
require_once APP_ROOT . '/view/partials/header.php'
    ?>
<title>Past Question Hub | <?= SITE_TITLE ?></title>

<body>


    <?php require_once APP_ROOT . '/view/partials/nav.php' ?>




    <div class="pt-10 pt-md-24 bg-1">
        <div class="container-xl max-w-screen-xl">
            <div class="row justify-content-md-center">
                <div class="col-md-10 col-xl-8 text-md-center">
                    <div>
                        <h1
                            class="ls-tight font-bolder display-7 text-white mb-7 text-center text-uppercase text-center">
                            past Question Hub
                        </h1>
                        <p class="lead text-white text-opacity-80 px-9 mb-10 text-center">
                            Gain access to the key insights from thousands of past questions. We publish a yearly past
                            questions. You can can subscribe to have access to them all.
                            </h1>
                        <div class="mx-sm-n2">
                            <a href="auth-register"
                                class="btn btn-lg btn-white border-nav my-2 mx-sm-2 w-full w-sm-auto text-uppercase">Get
                                started</a>
                            <a href="auth-login"
                                class="btn btn-lg border-white  btn-primary bg-nav my-2 mx-sm-2 w-full w-sm-auto text-uppercase">
                                sign in
                            </a>
                        </div>
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
                Welcome to <?= SITE_TITLE ?> Past Question Hub!
            </h1>
            <!-- Text -->
            <p class="lead text-muted mt-3 px-6">
                We developed this service so that all students can study: JAMB Past Questions and Answers, Post UTME
                Past Questions and Answers, WAEC Past Questions and Answers, and NECO Past Questions and Answers from
                the comfort of their zone.
            <p class="desktop-only lead text-muted">
                Additionally, this feature is for students who desire to excel in examinations by studying past
                questions and answers from all subjects offered by JAMB (UTME), WAEC (SSCE), NECO, and Post UTME for
                various Nigerian universities.</p>
            </p>
        </div>
    </div>

    <!-- past question section -->

    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row mx-auto justify-content-center align-content-center text-center" style="padding-bottom: 50px;">
            <h1 class="h2 mb-0 sub-section-header">PAST QUESTION SHOP</h1>
        </div>
    </div>

    <div class="container mb-3">
        <form method="get">
            <div class="row g-3 pe-1 ps-1">
                <div class="col">
                    <input type="text" name="subject" class="form-control rounded-0 p-md-2" placeholder="Subject"
                        aria-label="Subject">
                </div>
                <div class="col">
                    <input type="text" name="exam_body" class="form-control rounded-0 p-md-2" placeholder="Exam Body"
                        aria-label="Exam Body">
                </div>

                <div class="col">
                    <select name="year" class="form-control rounded-0 p-md-2">
                        <option class="rounded-0" value="">Year</option>
                        <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                            <option class="rounded-0" value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary p-md-2"
                        style="color: #fff; background-color: #347054; border-color: #347054; font-weight: 300; font-size: 16px;">Search</button>
                </div>
            </div>
        </form>

    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="list-group rounded-0">
                    <?php

                    // Retrieve search parameters from the form
                    $cart_list = [];
                    $subject_name = $_GET['subject'] ?? '';
                    $exam_body = $_GET['exam_body'] ?? '';
                    $subject_year = $_GET['year'] ?? '';
                    // $carts = $_SESSION['cart'] ?? '';
                    if (isset($_COOKIE['cart'])) {
                        // Unserialize the cart data from the cookie
                        $carts = unserialize($_COOKIE['cart']);
                        // print_r($carts);
                    } else {
                        $carts = [];
                    }
                    foreach ($carts as $sku => $cart) {
                        $cart_list[] = $sku;
                    }

                    $add_style = "color: #fff; background-color: #781515; border-color: #781515;font-size: 12px; padding: 5px;";
                    $added_style = "color: #fff; background-color: #347054; border-color: #347054;font-size: 12px; padding: 5px;";
                    // Pagination
                    $limit = 6; // Number of items per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
                    $offset = ($page - 1) * $limit; // Offset for the query
                    
                    try {
                        $query = "SELECT * FROM document LIMIT $limit OFFSET $offset";
                        $search = "SELECT count(*) as total FROM document LIMIT $limit";
                        if (!empty($subject_name || $exam_body || $subject_year)) {
                            $query = "SELECT * FROM document WHERE `subject` LIKE '%$subject_name%' AND `exam_body` LIKE '%$exam_body%' AND `year` LIKE '%$subject_year%'  LIMIT $limit";
                            $search = "SELECT count(*) as total from document WHERE `subject` LIKE '%$subject_name%' AND `exam_body` LIKE '%$exam_body%' AND `year` LIKE '%$subject_year%' LIMIT $limit";
                        }


                        $documents = $pdo->select($query)->fetchAll(PDO::FETCH_ASSOC);

                        // Loop through the documents and display them in cards
                        foreach ($documents as $document) {
                            ?>
                            <div class="list-group-item d-flex align-items-center p-2">
                                <!-- Thumbnail image on the left -->
                                <img src="<?= $document['coverpage']; ?>" class="img-thumbnail mr-3" alt="Thumbnail"
                                    style="height: 50px; width: 50px;">
                                <div class="ms-4 text-start">
                                    <!-- Past Question name -->
                                    <h6 class="mb-1"><?= ucwords($document['subject']); ?> Past Question</h6>
                                    <!-- Exam body and year -->
                                    <p class="mb-1"><?= $document['exam_body']; ?> (<?= $document['year']; ?>)</p>
                                    <!-- Price in bold -->
                                    <h6 class="font-weight-bold text-success">₦<?= $document['price']; ?></h6>
                                </div>
                                <div class="ms-auto">
                                    <!-- Buy button on the right -->
                                    <form action="add-to-cart" method="post">
                                        <input type="hidden" name="sku" value="<?= $document['sku']; ?>">
                                        <input type="hidden" name="price" value="<?= $document['price']; ?>">
                                        <input type="hidden" name="subject" value="<?= $document['subject']; ?>">
                                        <input type="hidden" name="exam_body" value="<?= $document['exam_body']; ?>">
                                        <input type="hidden" name="year" value="<?= $document['year']; ?>">
                                        <input type="hidden" name="coverpage" value="<?= $document['coverpage']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="submit" class="btn btn-primary"
                                            style="<?php echo (in_array($document['sku'], $cart_list)) ? $added_style : $add_style; ?>"
                                            value="<?php echo (in_array($document['sku'], $cart_list)) ? 'Added To Cart' : 'Add To Cart'; ?>" />
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    } catch (\PDOException $e) {
                        $msg = "Error: " . $e->getMessage();
                        redirect('purchase-past-question.php', $msg);
                        exit;
                    }
                    ?>
                </div>
                <!-- Pagination links -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-5">
                        <?php
                        $stmt = $pdo->select($search);
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        if (is_array($row) && isset($row['total'])) {
                            $total_pages = ceil($row['total'] / $limit);
                        } else {
                            $total_pages = 1; // default value if no rows are found
                        }
                        // Calculate total pages
                        if ($total_pages >= 1) {
                            // Previous page link
                            if ($page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                            }

                            // Page links
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                            }

                            // Next page link
                            if ($page < $total_pages) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                            }
                        }
                        else {
                            // Previous page link
                            if ($page > 1) {
                                echo '<li class="page-item active"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                            }

                            // Next page link
                            if ($page < $total_pages) {
                                echo '<li class="page-item text-muted disabled"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-- end past question section -->
    <div class="pt-0 pb-24 ">
        <div class="container ">

            <div class="row g-20 mt-5">
                <div class="col-md-4">
                    <div class="card  shadow-4 rounded">
                        <div class="card-body p-7">
                            <div class="mt-4 mb-7">
                                <div class="icon icon-shape bg-nav dark text-white rounded-circle text-lg">
                                    <i class="bi bi-fullscreen"></i>
                                </div>
                            </div>
                            <div class="pt-2 pb-3">
                                <!-- Title -->
                                <h5 class="h4 mb-2">Mission</h5>
                                <!-- Text  -->
                                <p class=" text-muted mb-0">
                                    Our mission is to provide a diverse range of educational resources, fostering
                                    intellectual growth, and facilitating access to essential examination materials.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-4 rounded ">
                        <div class="card-body p-7">
                            <div class="mt-4 mb-7">
                                <div class="icon icon-shape bg-nav dark text-white rounded-circle text-lg">
                                    <i class="bi bi-columns"></i>
                                </div>
                            </div>
                            <div class="pt-2 pb-3">
                                <!-- Title -->
                                <h5 class="h4 mb-2">Categories</h5>
                                <!-- Text  -->
                                <p class=" text-muted mb-0">
                                    We offer 1,000+ text and audio summaries in areas such as Health, Personal
                                    Development, Internet Marketing, Business, Relationship, and Money.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg- shadow-4 rounded  ">
                        <div class="card-body p-7">
                            <div class="mt-4 mb-7">
                                <div class="icon icon-shape bg-nav dark text-white rounded-circle text-lg">
                                    <i class="bi bi-palette"></i>
                                </div>
                            </div>
                            <div class="pt-2 pb-3">
                                <!-- Title -->
                                <h5 class="h4 mb-2">Community</h5>
                                <!-- Text  -->
                                <p class=" text-muted mb-0">
                                    Our worldwide community includes thousands of readers, across all continents,
                                    tribes, region, etc.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" pb-2">
        <div class="container max-w-screen-xl">
            <!-- Section title -->
            <section id="about">

                <div class="row justify-content-center text-center ">
                    <div class="col-lg-7 margin-top">

                        <h1 class="ls-tight font-bolder text-uppercase ">
                            ABOUT <?= SITE_TITLE ?></h1>
                        <!-- Text -->

                    </div>
                </div>


        </div>
    </div>
    <div class="counter">
        <div class="left w-100 ">
            <p class="px-6 text-center">
                Welcome to our one-stop platform for news, thought-provoking blogs, and an extensive collection of
                books. Dive into the world of knowledge with easy access to WAEC, NECO, and JAMB past questions for
                academic excellence. Explore a curated selection of books available for purchase and reading, enhancing
                your learning journey. Our site is designed for the general public, with a special focus on individuals
                seeking educational resources and staying informed. Join us on this educational adventure where
                information meets convenience.</p>
        </div>
        <!--<div class="right ">-->

        <!--    <div class="count-container card  shadow-4 rounded ">-->
        <!--        <p class="count">300000</p>-->
        <!--        <p>NECO PQ&A</p>-->
        <!--    </div>-->
        <!--    <div class="count-container card  shadow-4 rounded">-->
        <!--        <p class="count">500</p>-->
        <!--        <p>JAMB PQ&A</p>-->
        <!--    </div>-->

        <!--    <div class="count-container card  shadow-4 rounded">-->
        <!--        <p class="count">1000</p>-->
        <!--        <p>WAEC PQ&A</p>-->
        <!--    </div>-->
        <!--</div>-->
    </div>

    </section>
    <section id="terms">

        <div class="row justify-content-center text-center ">
            <div class="col-lg-7 margin-top">

                <h1 class="ls-tight font-bolder text-uppercase ">
                    Terms and Conditions</h1>
                <!-- Text -->

            </div>
        </div>


        </div>
        </div>
        <div class="counter">
            <div class="left w-100 ">
                <p class="px-6 text-center">Your exploration of our platform is subject to responsible usage. We urge
                    users to respect intellectual property rights and adhere to community guidelines. By accessing our
                    site, you agree to comply with our terms and conditions, ensuring a positive and collaborative
                    online environment for all users. Join us in upholding these standards and contributing to a
                    thriving community of learners.</p>
            </div>

        </div>

    </section>
    <section id="mission">

        <div class="row justify-content-center text-center ">
            <div class="col-lg-7 margin-top">

                <h1 class="ls-tight font-bolder text-uppercase ">
                    Mission</h1>
                <!-- Text -->

            </div>
        </div>


        </div>
        </div>
        <div class="counter">
            <div class="left w-100 ">
                <p class="px-6 text-center">At our core, we aim to empower individuals on their learning path. Our
                    mission is to provide a diverse range of educational resources, fostering intellectual growth, and
                    facilitating access to essential examination materials. We believe in the transformative power of
                    education and strive to be a guiding force on your academic journey.</p>
            </div>

        </div>

    </section>
    <section id="contact">

        <div class="bg-nav pt-24">
            <div class="container-form">
                <div class="contact-info">
                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill text-nav"></i>
                        <p>Address</p>
                        <p> Powa plaza uwani Enugu</p>

                    </div>
                    <div class="info-item">
                        <i class="bi bi-telephone-outbound-fill text-nav"></i>
                        <p>For Rights & Agent Requests</p>
                        <p>(234) 703-215-6107</p>
                        <p>support@hiddentreaxure.com</p>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-telephone-outbound-fill text-nav"></i>
                        <p>For Event Inquiries</p>
                        <p>(234) 703-215-6107</p>
                        <p>info@hiddentreaxure.com</p>
                    </div>
                    <div class="social-icons">
                        <a href="#" class="icon "><i class="bi bi-twitter text-nav"></i></a>
                        <a href="#" class="icon"><i class="bi bi-facebook text-nav"></i></a>
                        <a href="#" class="icon"><i class="bi bi-instagram text-nav"></i></a>
                        <a href="#" class="icon"><i class="bi bi-whatsapp text-nav"></i></a>
                        <a href="#" class="icon"><i class="bi bi-telegram text-nav"></i></a>
                    </div>
                </div>
                <div class="contact-form">
                    <h1 class="text-center text-nav">Contact Us</h1>

                    <form id="contact-form" class="form" action="#" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <span class="name-error"></span>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <span class="email-error"></span>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message"></textarea>
                            <span class="message-error"></span>

                        </div>
                        <button type="submit" class="bg-nav">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <div class="container max-w-screen-xl">

        <!-- Clients -->
        <div class="row justify-content-center px-lg-5">
            <div class="col-lg-2 col-md-3 col-4">
                <div class="px-7 py-7 text-muted svg-fluid">
                    <img src="https://teddyb.app/assets/images/waec.svg" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4">
                <div class="px-7 py-7 text-muted svg-fluid">
                    <img src="https://www.allschool.com.ng/wp-content/uploads/2018/03/post-utme.png" alt="" srcset="">
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4">
                <div class="px-7 py-7 text-muted svg-fluid">
                    <img src="https://i0.wp.com/www.medianigeria.com/wp-content/uploads/2018/03/NECO.jpg?fit=640%2C310&ssl=1"
                        alt="">
                </div>
            </div>

        </div>
    </div>

    <?php require_once APP_ROOT . '/view/partials/footer.php' ?>