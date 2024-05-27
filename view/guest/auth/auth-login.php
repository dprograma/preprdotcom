<?php require_once APP_ROOT . '/view/partials/auth-header.php'?>
    
</head>

<body>

 
  <!-- Content -->

  <div class="positive-relative">
  <div class="authentication-wrapper authentication-basic">
    <div class="authentication-inner py-4">

      <!--  Two Steps Verification -->
      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="home" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
<span style="color:var(--bs-primary);">
<img src="<?=FAVICON?>" alt="">
</span>
</span>
            <span class="app-brand-text demo text-heading fw-semibold"><?=SITE_TITLE?></span>
          </a>
        </div>
        <!-- /Logo -->
      
        <div class="card-body mt-2">
          <h4 class="mb-2">Welcome to <?=SITE_TITLE?>! 👋</h4>
          <p class="mb-4">Please login to your account and start the exploring</p>

          <form id="formAuthentication" class="mb-3"  method="POST">
          <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
    <?php endif; ?>
            <div class="form-floating form-floating-outline mb-3">
              <input type="text" class="form-control" id="email" name="email-username" placeholder="Enter your email or username" autofocus>
              <label for="email">Email or Username</label>
            </div>
            <div class="mb-3">
              <div class="form-password-toggle">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <label for="password">Password</label>
                  </div>
                  <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                </div>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
              <a href="auth-forgot-password" class="float-end mb-1">
                <span>Forgot Password?</span>
              </a>
            </div>
            <div class="mb-3">
            <input type="hidden" name="login">

              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>
          <p class="text-center">
            <span>Are you an Agent?</span>
            <a href="auth-agent-login">
              <span>Login as Agent</span>
            </a>
          </p>
          <p class="text-center">
            <span>New on our platform?</span>
            <a href="auth-register">
              <span>Create an account</span>
            </a>
          </p>

          <div class="divider my-4">
            <div class="divider-text">or</div>
          </div>

          <div class="d-flex justify-content-center gap-2">
            <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-facebook">
              <i class="tf-icons mdi mdi-24px mdi-facebook"></i>
            </a>

            <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-twitter">
              <i class="tf-icons mdi mdi-24px mdi-twitter"></i>
            </a>

            <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-github">
              <i class="tf-icons mdi mdi-24px mdi-github"></i>
            </a>

            <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
              <i class="tf-icons mdi mdi-24px mdi-google"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- / Two Steps Verification -->
    


<!-- / Content -->

  

  
  <?php require_once APP_ROOT . '/view/partials/auth-footer.php'?>
