<?php require_once APP_ROOT . '/view/partials/auth-header.php'?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
        body, .bg-nav {
            background-image: url(assets/img/bg_patterned_white.png);
        }
         
    </style>
</head>

<body>




  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
 
  <!-- Content -->

  <div class="positive-relative">
  <div class="authentication-wrapper authentication-basic">
    <div class="authentication-inner py-4">

      <!--  Two Steps Verification -->
      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="index-2.html" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
<span style="color:var(--bs-primary);">
<img src="https://hiddentreaxure.com/wp-content/uploads/2020/05/cropped-icon-32x32.png" alt="">
</span>
</span>
            <span class="app-brand-text demo text-heading fw-semibold"><?=SITE_TITLE?></span>
          </a>
        </div>
        <!-- /Logo -->
      
        <div class="card-body">
          <h4 class="mb-2">Reset Password 🔒</h4>
          <p class="mb-4">Your new password must be different from previously used passwords</p>
          <form id="formAuthentication" class="mb-3"  method="POST">
          <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
    <?php endif; ?>
          <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password" class="form-control" name="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="password">Current Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password" class="form-control" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="password">New Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
          
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="confirmPassword">Confirm Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
            <input type="hidden" name="reset-password">
            <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
              Set new password
            </button>
            <div class="text-center">
              <a href="dashboard" class="d-flex align-items-center justify-content-center">
                <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i>
               Back to Past Question
              </a>
            </div>
          </form>
        </div>
      </div>
      <!-- / Two Steps Verification -->
    


<!-- / Content -->

  

  
  <?php require_once APP_ROOT . '/view/partials/auth-footer.php'?>
