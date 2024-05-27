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
        <?php if (isset($_GET['error'])): ?>
        <div class="text-center alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
      <?php endif; ?>
          <h4 class="mb-2">Forgot Password? 🔒</h4>
          <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
          <form id="formAuthentication" class="mb-3"  method="POST">
            <div class="form-floating form-floating-outline mb-3">
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
              <label>Email</label>
            </div>
            <input type="hidden" name="forgot-password">

            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
          </form>
          <div class="text-center">
            <a href="auth-login" class="d-flex align-items-center justify-content-center">
              <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- / Two Steps Verification -->
    


<!-- / Content -->

  

  
  <?php require_once APP_ROOT . '/view/partials/auth-footer.php'?>
