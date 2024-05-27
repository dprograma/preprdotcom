<?php require_once APP_ROOT . '/view/partials/admin-header.php'?>

</head>
<body>
<?php require_once APP_ROOT . '/view/partials/admin_sidebar.php'?>

<div class="card-body">
          <h4 class="mb-2">Reset Details 🔒</h4>
          <form id="formAuthentication" class="mb-3"  method="POST">
          <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
    <?php endif; ?>
    <div class="form-floating form-floating-outline mb-3">
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" value=" <?=$currentUser->username?>">
              <label for="username">Username</label>
            </div>
            <div class="form-floating form-floating-outline mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value=" <?=$currentUser->fullname?>"> 
              <label for="name">Full Name</label>
            </div>
            <div class="form-floating form-floating-outline mb-3">
              <input type="email" class="form-control" id="name" name="email" placeholder="Enter your Email" value=" <?=$currentUser->email?>">
              <label for="email">Email Address</label>
            </div>
         
            <input type="hidden" name="reset-details">
            <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
              Reset Details
            </button>
           
          </form>
        </div>
                        
                  
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
                <span class="input-group-text cursor-pointer"><i class="fa-solid fa-lock text-white"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password" class="form-control" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="password">New Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="fa-solid fa-lock text-white"></i></span>
              </div>
            </div>
          
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="confirmPassword">Confirm Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="fa-solid fa-lock text-white"></i></span>
              </div>
            </div>
            <input type="hidden" name="reset-password">
            <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
              Set new password
            </button>
           
          </form>
        </div>
                     
                    </div>
                    <?php require_once APP_ROOT . '/view/partials/admin-footer.php'?>
