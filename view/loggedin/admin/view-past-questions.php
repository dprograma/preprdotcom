<?php require_once APP_ROOT . '/view/partials/admin-header.php' ?>

</head>

<body>
  <?php require_once APP_ROOT . '/view/partials/agent_sidebar.php' ?>

  <div class="container">
    <?php if (isset($_GET['error'])): ?>
      <div class="text-center alert alert-<?= $_GET['type'] ?>" role="alert"><?= $_GET['error'] ?></div>
    <?php endif; ?>
    <div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Exam Body</th>
            <th scope="col">Subject</th>
            <th scope="col">Exam Year</th>
            <th scope="col">Date</th>
            <th scope="col" colspan="3" class="text-center">Action</th>
          </tr>
        </thead>
        <?php $q = 1; ?>

        <!-- post body for past questions                -->
        <tbody class="post-body bg-white">
          <?php if ($currentUser->is_agent): ?>
            <?php if (empty($questions)): ?>
            <?php else: ?>
              <?php foreach ($questions as $ques => $question): ?>
                <tr data-id="<?= $question->id ?>" class="bg-white">
                  <th scope="row"><?= $ques + 1 ?></th>
                  <td class="text-uppercase"><?= $question->exam_body ?></td>
                  <td class="text-capitalize"><?= $question->subject ?></td>
                  <td class="text-capitalize"><?= $question->year ?></td>
                  <td class="text-capitalize"><?= $question->created_at ?></td>

                  <td class="view-modal-trigger">
                    <button type="button" class="button btn btn-info btn-view"
                      data-modal-id="viewModal<?= $ques ?>">View</button>
                  </td>

                  <!-- Update your "EDIT" links with data attributes -->
                  <td class="view-modal-trigger">
                    <a href="edit-question?id=<?= $question->id ?>" class="button btn btn-warning btn-view edit-link"
                      data-question-id="<?= $question->id ?>">EDIT</a>
                  </td>
                  <td class="text-center">
                    <button type="button"
                      class="btn btn-sm btn-rounded btn-pill text-uppercase ml-4 text-white <?= $question->publish == 1 ? 'bg-success' : 'bg-secondary text-white' ?>"
                      title="Publish" onclick="confirmPublish(<?= $question->id ?>, <?= $question->publish ?>, this)">
                      <?= $question->publish == 1 ? 'Published' : 'Unpublished' ?>
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
            <?php endif; ?>

          <?php else: ?>
            <?php foreach ($questions as $ques => $question): ?>
              <tr data-id="<?= $question->id ?>" class="bg-white">
                <th scope="row"><?= $ques + 1 ?></th>
                <td class="text-uppercase"><?= $question->exam_body ?></td>
                <td class="text-capitalize"><?= $question->subject ?></td>
                <td class="text-capitalize"><?= $question->exam_year ?></td>
                <td class="text-capitalize"><?= $question->created_at ?></td>

                <td class="view-modal-trigger">
                  <button type="button" class="button btn btn-info btn-view"
                    data-modal-id="viewModal<?= $ques ?>">View</button>
                </td>

                <!-- Update your "EDIT" links with data attributes -->
                <td class="view-modal-trigger">
                  <a href="edit-question?id=<?= $question->id ?>" class="button btn btn-warning btn-view edit-link"
                    data-question-id="<?= $question->id ?>">EDIT</a>
                </td>
                <td class="text-center">
                  <button type="button"
                    class="btn btn-sm btn-rounded btn-pill text-uppercase ml-4 text-white <?= $question->publish == 1 ? 'bg-success' : 'bg-secondary text-white' ?>"
                    title="Publish" onclick="confirmPublish(<?= $question->id ?>, <?= $question->publish ?>, this)">
                    <?= $question->publish == 1 ? 'Published' : 'Unpublished' ?>
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
          <?php endif; ?>
        </tbody>

        <!-- end of post body for past questions -->


      </table>
    </div>
  </div>
  <!-- view modal -->
  <div>
    <?php if ($currentUser->is_agent): ?>
      <?php if (empty($questions)): ?>
      <?php else: ?>
        <?php foreach ($questions as $ques => $question): ?>
          <div class="modal modal-view-div view-only-modal" id="viewModal<?= $ques ?>">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">×</span>
            <form class="modal-content card px-3 col-md-8 form-view offset-md-2" method="post">

              <div class="form-group mb-3 exam-div">
                <label for="examBody">Exam Body</label>
                <input type="text" value="<?= htmlspecialchars($question->exam_body) ?>" class="form-control text-capitalize"
                  id="examBody" name="examBody" readonly>
              </div>

              <div class="form-group mb-3">
                <label for="subject">Subject</label>
                <input type="text" class="form-control text-capitalize" id="subject" name="subject"
                  value="<?= htmlspecialchars($question->subject) ?>" readonly>
              </div>

              <div class="form-group mb-3">
                <label for="examYear">Exam Year</label>
                <input type="text" class=" form-control text-capitalize" id="examYear" name="examYear"
                  value="<?= htmlspecialchars($question->exam_year) ?>" readonly>
              </div>

              <div class="form-group mb-3">
                <label for="question">Question</label>
                <textarea class="form-control" id="question" rows="3" name="question"
                  readonly><?= htmlspecialchars($question->question) ?></textarea>
              </div>
              <!-- <div class="form-group mb-3">
                <label for="optionA">Option A</label>
                <input type="text" class=" form-control text-capitalize" id="optionA" name="optionA"
                  value="<?= htmlspecialchars($question->option_a) ?>" readonly>
              </div> -->
<!-- 
              <div class="form-group mb-3">
                <label for="optionB">Option B</label>
                <input type="text" class=" form-control text-capitalize" id="optionB" name="optionB"
                  value="<?= htmlspecialchars($question->option_b) ?>" readonly>
              </div> -->

              <!-- <div class="form-group mb-3">
                <label for="optionC">Option C</label>
                <input type="text" class=" form-control text-capitalize" id="optionC" name="optionC"
                  value="<?= htmlspecialchars($question->option_c) ?>" readonly>
              </div>

              <div class="form-group mb-3">
                <label for="optionD">Option D</label>
                <input type="text" class="form-control" id="optionD" name="optionD"
                  value="<?= htmlspecialchars($question->option_d) ?>" readonly>
              </div>

              <div class="form-group mb-3">
                <label for="optionE">Option E</label>
                <input type="text" class=" form-control text-capitalize" id="optionE" name="optionE"
                  value="<?= htmlspecialchars($question->option_e) ?>" readonly>
              </div> -->

              <!-- <div class="form-group mb-3">
                <label for="correctAnswer">Correct Answer</label>
                <input type="text" class=" form-control text-capitalize" id="correctAnswer" name="correctAnswer"
                  value="<?= htmlspecialchars($question->correct_answer) ?>" readonly>
              </div> -->


              <div class="clearfix d-flex justify-content-between " style="margin-bottom: 150px; margin-top:50px">
                <button type="button" class="cancelbtn btn btn-secondary text-white p-3" style="width:40%">close</button>
                <a href="edit-question?id=<?= $question->id ?>" class="text-white btn-view edit-link btn btn-primary p-3 "
                  style="width:40%" data-question-id="<?= $question->id ?>">EDIT</a>
              </div>
            </form>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    <?php else: ?>
      <?php foreach ($questions as $ques => $question): ?>
        <div class="modal modal-view-div view-only-modal" id="viewModal<?= $ques ?>">
          <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">×</span>
          <form class="modal-content card px-3 col-md-8 form-view offset-md-2" method="post">

            <div class="form-group mb-3 exam-div">
              <label for="examBody">Exam Body</label>
              <input type="text" value="<?= htmlspecialchars($question->exam_body) ?>" class="form-control text-capitalize"
                id="examBody" name="examBody" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="subject">Subject</label>
              <input type="text" class="form-control text-capitalize" id="subject" name="subject"
                value="<?= htmlspecialchars($question->subject) ?>" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="examYear">Exam Year</label>
              <input type="text" class=" form-control text-capitalize" id="examYear" name="examYear"
                value="<?= htmlspecialchars($question->exam_year) ?>" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="question">Question</label>
              <textarea class="form-control" id="question" rows="3" name="question"
                readonly><?= htmlspecialchars($question->question) ?></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="optionA">Option A</label>
              <input type="text" class=" form-control text-capitalize" id="optionA" name="optionA"
                value="<?= htmlspecialchars($question->option_a) ?>" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="optionB">Option B</label>
              <input type="text" class=" form-control text-capitalize" id="optionB" name="optionB"
                value="<?= htmlspecialchars($question->option_b) ?>" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="optionC">Option C</label>
              <input type="text" class=" form-control text-capitalize" id="optionC" name="optionC"
                value="<?= htmlspecialchars($question->option_c) ?>" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="optionD">Option D</label>
              <input type="text" class="form-control" id="optionD" name="optionD"
                value="<?= htmlspecialchars($question->option_d) ?>" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="optionE">Option E</label>
              <input type="text" class=" form-control text-capitalize" id="optionE" name="optionE"
                value="<?= htmlspecialchars($question->option_e) ?>" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="correctAnswer">Correct Answer</label>
              <input type="text" class=" form-control text-capitalize" id="correctAnswer" name="correctAnswer"
                value="<?= htmlspecialchars($question->correct_answer) ?>" readonly>
            </div>


            <div class="clearfix d-flex justify-content-between " style="margin-bottom: 150px; margin-top:50px">
              <button type="button" class="cancelbtn btn btn-secondary text-white p-3" style="width:40%">close</button>
              <a href="edit-question?id=<?= $question->id ?>" class="text-white btn-view edit-link btn btn-primary p-3 "
                style="width:40%" data-question-id="<?= $question->id ?>">EDIT</a>
            </div>
          </form>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <?php require_once APP_ROOT . '/view/partials/admin-footer.php' ?>