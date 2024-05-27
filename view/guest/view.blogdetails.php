<?php require_once APP_ROOT . '/view/partials/header.php'?>
<title>Past Question Hub | <?=SITE_TITLE?></title>

</head>

<body>


<?php require_once APP_ROOT . '/view/partials/nav.php'?>

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<!--Responsive Sidebar-->


 

  <!--Blog Contents-->
  <div class="blog-container " style="background-color:whitesmoke">
    <div class="blog-container" >
      <div class="blog-card" style="margin-bottom:50px; ">
      <div class="bg-nav text-white mb-7 mt-7 p-4 text-center rounded" >
        <h2 class="text-white "><?=$post->title?></h2>
        <h5  class="text-white "><?=$post->category?>, <?php
                    $dateString = $post->date_created;
                    $dateTime = new DateTime($dateString);
                    echo $dateTime->format("F jS,  Y g:i A");
                ?></h5>
        </div>
        <div class="blog-fake-img rounded m-auto mt-3"><img src="<?=$post->img?>" alt="" class=" blog-img" ></div>
        
        <p class="blog-body text-capitalize text-center p-7 rounded">  <?=html_entity_decode($post->body)?></p>
      </div>
      
    </div>
   </div>

  <!--Footer-->
  

<?php require_once APP_ROOT . '/view/partials/footer.php'?>
