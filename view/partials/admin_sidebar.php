<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
               <a href="home"><img src=" <?=FAVICON?>" alt=""></a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-infos">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa-solid fa-user" ></i>                                            </span>
                                            
                                        </button>
                                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right user-button-width">
                                            <button type="button" tabindex="0" class="dropdown-item user-buttons"><a href="admin-settings" class="user-link">Profile</a></button>
                                            <div tabindex="-1" class="dropdown-divider"></div>

                                            <button type="button" id="TooltipDemo" class="btn-open-options user-buttons user-link" style="margin-left:100px">
                Settings
            </button>
                                           
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item user-buttons" ><a href="logout"class="user-link">Logout</a></button>
                                        </div>
                                    </div>
                </span>
            </div>    <div class="app-header__content">
               
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa-solid fa-user"></i>                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right user-button-width">
                                            <button type="button" tabindex="0" class="dropdown-item user-buttons"><a href="admin-settings" class="user-link">Profile</a></button>
                                            <div tabindex="-1" class="dropdown-divider"></div>

                                            <button type="button" id="TooltipDemo" class="btn-open-options user-buttons user-link" style="margin-left:100px">
                Settings
            </button>
                                           
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item user-buttons" ><a href="logout"class="user-link">Logout</a></button>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Header
                                                </div>
                                                <div class="widget-subheading">Makes the header top fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Sidebar
                                                </div>
                                                <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Footer
                                                </div>
                                                <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>
                                Header Options
                            </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                      
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                                Line
                                            </button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                                Shadow
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                               
                            </div>
                        </div>
                    </div>
                   
                     <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading"> </li>
                                <li>
                                    <a href="admin-dashboard" class="mm-active">
                                    <i class="fa-solid fa-house"></i>
                                     Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="payment-gateway" class="">
                                    <i class="fas fa-money-check"></i>
                                     Payment Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="upload-past-question" class="">
                                    <i class="fa-solid fa-upload"></i>
                                      Upload Past Question
                                    </a>
                                </li>
                                <li>
                                    <a href="view-agent-past-questions" class="">
                                    <i class="fa-brands fa-hive"></i>
                                      <?php $str = "View Agent Past Questions"; echo strlen($str) > 25 ? substr($str, 0, 25) . "...": $str; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="create-past-question" class="">
                                    <i class="fa-solid fa-book"></i>
                                      Create Past Question
                                    </a>
                                </li>
                                <li>
                                    <a href="view-past-questions" class="">
                                    <i class="fa-brands fa-hive"></i>                                      View Past Questions
                                    </a>
                                </li>
                                <li>
                                    <a href="create-post" class="">
                                    <i class="fa-brands fa-hive"></i>                                      Create News
                                    </a>
                                </li>
                                <li>
                                    <a href="viewpost" class="">
                                    <i class="fa-brands fa-hive"></i>                                      View News
                                    </a>
                                </li>
                             
                                
                            </ul>
                        </div>
                    </div>
                </div>  
                <div class="app-main__outer">
                    <div class="app-main__inner mt-3 ">
                        <div class="app-page-title bg-white ">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                    <i class="fa-solid fa-user" style="color:#347054"></i>
                                    </div>
                                    <div>Admin Past Question Hub
                                        <div class="page-title-subheading">Hey <span class="fw-bolder user-link"><?=$currentUser->fullname?>!!!</span> Welcome to <?=SITE_TITLE?>! 👋
                                        </div>
                                    </div>
                                </div>
                                 </div>
                        </div>