x<?php require_once APP_ROOT . '/view/partials/auth-header.php'?>
    
</head>

<body>
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
 
  <!-- Content -->

  <div class="positive-relative">
  <div class="authentication-wrapper authentication-basic">
        <!-- Upgrade Plan -->
  <div class="col-md-6 col-xxl-4 mb-4">
    <div class="card">
      <div class="card-body">
      <?php if (isset($_GET['error'])): ?>
        <div class="text-center alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
      <?php endif; ?>
      <h4 class="text-center mt-3 text-uppercase">member monthly subscription</h4>

        <small class="text-center align-self-center fs-6">Please make the payment to start enjoying all the features of our premium plan as soon as possible.</small>
        <div class="bg-label-primary p-2 border rounded my-3">
          <div class="d-flex px-1">
            <div class="border border-2 border-primary rounded me-3 p-2 d-flex align-items-center justify-content-center w-px-40 h-px-40">
              <i class="mdi mdi-star-outline mdi-24px"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Yearly Plan</h6>
                <!-- <a href="javascript:void(0)" class="small" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</a> -->
              </div>
              <div class="user-progress">
                <div class="d-flex justify-content-center">
                  <sup class="mt-3 mb-0 text-heading small">₦</sup>
                  <h3 class="fw-medium mb-0"><?=$priceTag['amount'] ?>.00</h3>
                  <sub class="mt-auto mb-2 text-heading small"> /Year</sub>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <form id="formAuthentication" onsubmit="return false" method="POST">
        <div class="form-floating form-floating-outline mb-3">
              <input type="text" class="form-control" id="email" name="email"  value="<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';?>" readonly >
              <label for="email">Re-Enter Email</label>
            </div>
       
          <h6 class="mb-3 pb-1">Payment Details</h6>
          <div class="d-flex justify-content-between align-items-center mt-3">
              <p class="mb-0">Subtotal</p>
              <h6 class="mb-0">₦<?=$priceTag['amount']?>.00</h6>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <p class="mb-0">Tax</p>
              <h6 class="mb-0">₦0.00</h6>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center mt-3 pb-1">
              <p class="mb-0">Total</p>
              <h6 class="mb-0">₦<?=$priceTag['amount'] ?>.00</h6>
            </div>
         
          
          <div class="col-12 text-center">
            <input type="hidden" name="payment-process">
            <button type="submit" class="btn btn-primary w-100 mt-3">
             Make Payment
              <i class="mdi mdi-arrow-right scaleX-n1-rtl"></i> </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/ Upgrade Plan -->

    


<!-- / Content -->

  

  
  <?php require_once APP_ROOT . '/view/partials/auth-footer.php'?>
