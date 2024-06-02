<?php require_once APP_ROOT . '/view/partials/admin-header.php' ?>

</head>

<body>
  <?php require_once APP_ROOT . '/view/partials/admin_sidebar.php' ?>

  <div class="container">
    <?php if (isset($_GET['error'])): ?>
      <div class="text-center alert alert-<?= $_GET['type'] ?>" role="alert"><?= $_GET['error'] ?></div>
    <?php endif; ?>
    <div>
      <table class="table table-striped" style="font-size: 12px;">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">SKU</th>
            <th scope="col">Exam Body</th>
            <th scope="col">Subject</th>
            <th scope="col">Exam Year</th>
            <th scope="col">Date</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center"></th>
          </tr>
        </thead>
        <?php $q = 0; ?>

        <!-- post body for past questions                -->
        <tbody class="post-body bg-white">
            <?php foreach ($questions as $question): ?>
              <tr data-id="<?= $question->id ?>" class="bg-white">
                <th scope="row"><?= ++$q ?></th>
                <td class="text-uppercase"><?= $question->fullname ?></td>
                <td class="text-uppercase"><?= $question->sku ?></td>
                <td class="text-uppercase"><?= $question->exam_body ?></td>
                <td class="text-capitalize"><?= $question->subject ?></td>
                <td class="text-capitalize"><?= $question->year ?></td>
                <td class="text-capitalize"><?= $question->created_at ?></td>

                <!-- <td class="view-modal-trigger">
                  <button type="button" class="button btn btn-warning btn-view"
                    data-modal-id="viewModal<?= $q ?>">Pending</button>
                </td> -->

                <!-- Update your "EDIT" links with data attributes -->
                <!-- <td class="view-modal-trigger">
                  <a href="edit-question?id=<?= $question->id ?>" class="button btn btn-warning btn-view edit-link"
                    data-question-id="<?= $question->id ?>">EDIT</a>
                </td> -->
                <td class="text-center">
                  <button type="button"
                    class="btn btn-sm btn-rounded btn-pill text-uppercase ml-4 text-white <?= $question->published == 1 ? 'bg-success' : 'bg-secondary text-white' ?>"
                    title="Publish" data-status="<?= $question->published ?>" onclick="confirmPublish(<?= $question->id ?>, '<?=$url ?>', this)">
                    <?= $question->published == 1 ? 'Published' : 'Unpublished' ?>
                  </button>
                </td>
                <td class="text-center">
                  <button type="button"
                    class="btn btn-sm btn-rounded btn-pill text-uppercase ml-4 text-white bg-danger text-white"
                    title="Delete" onclick="return confirmDelete(<?= $question->id ?>, 'view-past-questions')">
                    Delete
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>

        <!-- end of post body for past questions -->


      </table>
    </div>
  </div>
  <!-- view modal -->

  <?php require_once APP_ROOT . '/view/partials/admin-footer.php' ?>