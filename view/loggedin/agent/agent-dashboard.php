<?php require_once APP_ROOT . '/view/partials/admin-header.php' ?>

</head>

<body>
    <?php require_once APP_ROOT . '/view/partials/agent_sidebar.php' ?>


    <?php if (isset($_GET['error'])): ?>
        <div class="text-center alert alert-<?= $_GET['type'] ?>" role="alert"><?= $_GET['error'] ?></div>
    <?php endif; ?>
    <div class="row">



        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content" style="height: 95px;">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Revenue</div>
                            <div class="widget-subheading">Revenue Made</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="fs-6 text-success">₦<?= formatNumber($totalAmount) ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content" style="height: 95px;">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Past Question </div>
                            <div class="widget-subheading">Total Past Question Uploaded</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="fs-6 text-info"><?= $totalQuestionsUploaded ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content" style="height: 95px;">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Past Question Approved</div>
                            <div class="widget-subheading">Total Past Question approved</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="fs-6 text-info"><?= $totalQuestionsUploaded ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content" style="height: 95px;">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Past Question Pending</div>
                            <div class="widget-subheading">Total Past Question Pending</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="fs-6 text-info"><?= $totalQuestionsUploaded ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">All Users

                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center">TimeFrame</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($usersData as $count => $user): ?>
                                <tr>
                                    <td class="text-center text-muted">#<?= $count + 1 ?></td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle"
                                                            src="assets/images/avatars/4.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><?= $user['fullname'] ?></div>
                                                    <div class="widget-subheading opacity-7"><?= $user['email'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $user['created_date'] ?></td>
                                    <td class="text-center">
                                        <div
                                            class="badge <?= ($user['access'] === 'admin') ? 'badge-warning' : (($user['access'] === 'secured') ? 'badge-success' : 'badge-danger') ?>">
                                            <?= ($user['access'] === 'admin') ? 'Admin' : (($user['access'] === 'secured') ? 'Verified' : 'Unverified') ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="text-danger"
                                            onclick="confirmDelete(<?= $user['id'] ?>, 'agent-dashboard')">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
                <div class="d-block text-center card-footer d-flex justify-content-evenly">
                    <button class="btn-wide btn btn-success">Prev</button>

                    <button class="btn-wide btn btn-success">Next</button>
                </div>
            </div>
        </div>
    </div> -->

    </div>
    <?php require_once APP_ROOT . '/view/partials/admin-footer.php' ?>