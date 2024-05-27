<?php require_once APP_ROOT . '/view/partials/header.php'?>
<style>
.bg-color{
              background-color:#347054;  
              color:white;
            }
      @media only screen and (min-width: 720px) {
            .img-container {
               width:50%; margin:auto
            }
            .container-fluid{
                width:50%;
                margin:auto;margin-top:30px;
                margin-bottom:50px;
            }
            .text-restrict{
                width:50%;
                margin:auto;
            }
            .para-restrict{
                 width:100%;
                
                 text-align:center;
            
            }
            
        }
          @media only screen and (max-width: 720px) {
            .img-container {
               width:70%; margin:auto
            }
              .container-fluid{
               margin-top:30px;
                margin-bottom:50px;
                  text-align:center;
            }
            .heading-text{
                margin-top:30px; 
            }
            
            .para-restrict{
                 width:100%;
                
                 text-align:center;
            
            }
            
        }
</style>
  </head>
  <body>
      <?php require_once APP_ROOT . '/view/partials/nav.php'?>

    <div class="container-fluid" >
        <div class="img-container" >
    <img src="https://cdn-icons-png.flaticon.com/512/5138/5138594.png" alt="" >
    </div>
    <div class="text-restrict">
           <h1 class="heading-text">Access Restricted!!!</h1>

           <!--<a name="" id="" class="btn btn-primary" href="home" role="button">Back to Home</a>-->
             <?php
    // Check if the user is logged in
    if(!empty(Session::get('loggedin'))){
         echo ' <p class="para-restrict">Sorry, you are already logged in.  </p>';
   echo ' <p class="para-restrict"> Your access is restricted by your administrator. </p>';
     echo ' <p class="para-restrict">Go to your dashboard with the button below. </p>';

        echo '<a name="" id="" class="btn bg-color w-full mt-3 " href="dashboard" role="button">Go to Dashboard</a>';
    } else {
 echo ' <p class="para-restrict">Sorry, you cannot access this page  </p>';
   echo ' <p class="para-restrict"> Your access is restricted by your administrator. </p>';
     echo ' <p class="para-restrict">Go to your home with the button below. </p>';
        echo '<a name="" id="" class="btn bg-color  mt-3 w-full" href="auth-login" role="button">Login</a>';
    }
    ?>
    </div>
    </div>

<?php require_once APP_ROOT . '/view/partials/footer.php'?>
