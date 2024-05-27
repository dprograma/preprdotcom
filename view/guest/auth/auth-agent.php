<?php require_once APP_ROOT . '/view/partials/auth-header.php' ?>

</head>

<body>



    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                <!-- Register Card -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="home" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <span style="color:var(--bs-primary);">
                                    <img src="<?= FAVICON ?>" alt="">
                                </span>
                            </span>
                            <span class="app-brand-text demo text-heading fw-semibold"><?= SITE_TITLE ?></span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="card-body mt-2 text-center">
                        <h4 class="mb-2 text-capitalize">Become an Agent 🚀</h4>
                        <p class="mb-4 text-capitalize">Make passive income

                        <form action="auth-register" id="formAuthentication" class="mb-3" method="POST">
                            <?php if (isset($_GET['error'])): ?>
                                <div class="alert alert-<?= $_GET['type'] ?>" role="alert"><?= $_GET['error'] ?></div>
                            <?php endif; ?>
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username" autofocus>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your Name">
                                <label for="name">Full Name</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="email" class="form-control" id="name" name="email"
                                    placeholder="Enter your Email">
                                <label for="email">Email Address</label>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="confirm-password" class="form-control"
                                            name="confirm-password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="confirm-password" />
                                        <label for="confirm-password"> Confirm Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="register">
                            <button type="submit" class="btn btn-primary d-grid w-100">
                                Become an Agent
                            </button>
                        </form>

                        <p class="text-center">
                            <span>Already an Agent?</span>
                            <a href="auth-agent-login">
                                <span>Sign in as Agent instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->






                <?php require_once APP_ROOT . '/view/partials/auth-footer.php' ?>