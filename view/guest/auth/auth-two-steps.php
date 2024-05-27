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
        <div class="card-body">
          <h4 class="mb-2">Two Step Verification 💬</h4>
          <p class="text-start mb-4">
            We sent a verification code to your mobile. Enter the code from the mobile in the field below.
            <span class="d-block mt-2">******1234</span>
          </p>
          <p class="mb-0">Type your 6 digit security code</p>
          <?php if (!empty($verificationError)) : ?>
        <p style="color: red;"><?php echo $verificationError; ?></p>
    <?php endif; ?>
          <form id="twoStepsForm" method="POST">
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
    <?php endif; ?>
    <div class="mb-3">
        <div class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
            <input type="text" class="form-control  text-center "  name="verification" value="" placeholder="Enter Code Received">
           
        </div>
      
    </div>
    <input type="hidden" name="verifyCode">

    <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
        Verify my account
    </button>
    <div class="text-center">Didn't get the code?
        <!-- <a href="javascript:void(0);">
            Resend
        </a> -->
    </div>
</form>

        </div>
      </div>
      <!-- / Two Steps Verification -->
    


<!-- / Content -->

  

  
  <?php require_once APP_ROOT . '/view/partials/auth-footer.php'?>
