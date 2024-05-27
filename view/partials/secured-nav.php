
<div id="now-loading-overlay">
    <div id="overlay">
        <div class="loading-panel">

            <div class="strolling-box"></div>
        </div>
    </div>
</div>

<div class="container-fluid text-center d-block justify-content-center align-items-center align-content-center align-self-center">
    <div>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-nav" id="app-default-nav-bar">
        <div class="container-fluid">
            <a href="home" class="navbar-brand" id="nav-bar-app-name-anchor">
               <h4 class="fw-bold" style="color: #347054;font-size: 24px"><?=SITE_TITLE?></h4>
            </a>
            <button class="btn btn-primary mobile-only" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa fa-bars" aria-hidden="true"></i>
</button>
            <div class="offcanvas offcanvas-end bg-nav" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel" class="text-uppercase fw-bolder"> Welcome <?=$currentUser->fullname?></h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mobile-only">
                <div class="list-group mobile-only">
                <a href="purchases" class="list-group-item bg-nav list-group-item-action">My Past Questions</a>
                    <a href="dashboard" class="list-group-item bg-nav list-group-item-action">CBT Test</a>
                    <a href="news" class="list-group-item list-group-item-action bg-nav ">News</a>
                    <a href="reset-password" class="list-group-item list-group-item-action bg-nav ">Account Settings</a>

                   <a href="logout"class="list-group-item list-group-item-action bg-nav ">Logout</a>

                </div>
            </div>
</div>

            <div class="collapse navbar-collapse desktop-only" id="navbarCollapse">
                <div class="navbar-nav container-fluid justify-content-end">
                <a class="btn btn-outline-primary menu_btn" id="menu-btn-practice"
                       href="purchases">My Past Questions</a>
                    <a class="btn btn-outline-primary menu_btn" id="menu-btn-practice"
                       href="dashboard">CBT Test</a>

                    <a class="btn btn-outline-primary menu_btn" id="menu-btn-help"
                       href="reset-password">Account Settings</a>


                      <a href="logout"class="user-link"> <button type="submit" class=" btn btn-outline-primary menu_btn">Logout</button></a>


                </div>
            </div>
        </div>
    </nav>
</div>
</div>