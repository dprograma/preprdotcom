<?php require_once APP_ROOT . '/view/partials/admin-header.php'?>

</head>
<body>
<?php require_once APP_ROOT . '/view/partials/admin_sidebar.php'?>

<div class="container">
<?php if (isset($_GET['error'])): ?>
        <div class="text-center alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
      <?php endif; ?>
          <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date</th>
                    <th scope="col" colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <?php $q = 1; ?>
<tbody class="post-body bg-white">
    <?php foreach ($posts as $pos=> $post): ?>
        <tr data-id="<?=$post->id?>" class="bg-white">
            <th scope="row"><?= $pos +1 ?></th>
            <td class="text-uppercase"><?=$post->title?></td>
            <td class="text-capitalize"><?=$post->category?></td>
            <td class="text-capitalize"><?=$post->date_created?></td>
           
    
          

            <td class="text-center">
    <button type="button" class="btn btn-sm btn-rounded btn-pill text-uppercase ml-4 text-white <?= $post->publish == 1 ? 'bg-success' : 'bg-secondary text-white' ?>" title="Publish" onclick="confirmPostPublish(<?= $post->id ?>, <?= $post->publish ?>, this)">
        <?= $post->publish == 1 ? 'Published' : 'Unpublished' ?>
    </button>
</td>


<td class="view-modal-trigger">
    <a href="edit-post?id=<?= $post->id ?>" class="button btn btn-warning btn-view edit-link" data-question-id="<?= $post->id ?>">EDIT</a>
</td>

<td class="text-center">
    <button type="button" class="btn btn-sm btn-rounded btn-pill text-uppercase ml-4 text-white bg-danger text-white" title="Delete" onclick="return confirmDelete(<?= $post->id ?>, 'viewpost')">
        Delete
    </button>
</td>





        </tr>
       
    <?php endforeach;?>
</tbody>

            </table>
          </div>
        </div>
      

   

 








    <?php require_once APP_ROOT . '/view/partials/admin-footer.php'?>

    