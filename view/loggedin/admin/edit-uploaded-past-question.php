<?php require_once APP_ROOT . '/view/partials/admin-header.php'?>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
</head>
<body>
<?php require_once APP_ROOT . '/view/partials/agent_sidebar.php'?>


<form method="POST" class="modal-content card px-3 bg-none" enctype="multipart/form-data">
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-<?=$_GET['type']?>" role="alert"><?=$_GET['error']?></div>
        <?php endif; ?>
        <div class="form-group mb-3 exam-div">
      <label for="examBody">Exam Body</label>
      <select class="form-control text-uppercase" id="examBody" name="examBody">
        <?php if (isset($questions->exam_body)): ?>
        <option value="<?=$questions->exam_body?>" selected><?=$questions->exam_body?></option>
        <?php endif; ?>
        <option value="WAEC">WAEC</option>
        <option value="NECO">NECO</option>
        <option value="JAMB">JAMB</option>
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="subject">Subject</label>
      <input type="text" class="form-control text-uppercase" id="subject" name="subject" value="<?=$questions->subject?>">
    </div>

    <div class="form-group mb-3">
      <label for="examYear">Exam Year</label>
      <select class="form-control text-uppercase" id="examYear" name="examYear">
        <?php if (isset($questions->year)): ?>
          <option value="<?=$questions->year?>" selected><?=$questions->year?></option>
        <?php endif; ?>
        <?php 
          $currentyear = date('Y');
          for($i=$currentyear; $i >= 1970; $i--){
            echo "<option value='$i'>" . $i . "</option>";
          }
        ?>
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="examBody">Upload PDF/Word Document <span><small><i>(2mb max)</i></small></span></label>
      <input type="file" class="form-control text-uppercase" name="fileToUpload" id="fileToUpload" value="<?=$questions->filename?>">
    </div>

    <div class="input-group mb-4">
  <span class="input-group-text" id="basic-addon1">Price (₦)</span>
  <input type="number" class="form-control text-uppercase" name="price" id="price" placeholder="1000" disabled value="<?=$questions->price?>">
</div>


    <div class="form-group mb-3">
      <input type="submit" class="w-100 text-center btn-primary p-2" value="Update Document" name="edit-uploaded-past-question">
    </div>

</form>
    </body>

    <?php require_once APP_ROOT . '/view/partials/admin-footer.php'?>