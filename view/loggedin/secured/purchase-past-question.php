<?php require_once APP_ROOT . '/view/partials/secured-header.php' ?>

<body>

  <?php require_once APP_ROOT . '/view/partials/secured-nav.php' ?>

  <div class="container-fluid" style="margin-top: 100px;">
    <div class="row mx-auto justify-content-center align-content-center text-center" style="padding-bottom: 50px;">
      <h1 class="h2 mb-0 sub-section-header">PAST QUESTION SHOP</h1>
    </div>
  </div>

  <div class="container text-center">
    <div class="row g-2">

      <?php
      // Pagination
      $limit = 6; // Number of items per page
      $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
      $offset = ($page - 1) * $limit; // Offset for the query

      try {
        $documents = $pdo->select("SELECT * FROM document LIMIT $limit OFFSET $offset")->fetchAll(PDO::FETCH_ASSOC);

        // Loop through the documents and display them in cards
        foreach ($documents as $document) {
      ?>
          <div class="col-12 col-md-4">
            <div class="card">
              <img src="<?= $document['coverpage']; ?>" class="card-img-top img-thumbnail rounded-0" alt="..." style="height: 280px;">
              <div class="card-body">
                <h5 class="card- text-start text-success">₦<?= $document['price']; ?></h5>
                <h6 class="card-title text-start"><?= $document['subject']; ?> past question</h6>
                <p class="card-text text-start"><?= $document['exam_body']; ?> (<?= $document['year']; ?>)</p>
                <hr />
                <form action="checkout" method="post">
                  <input type="hidden" name="sku" value="<?= $document['sku']; ?>">
                  <input type="hidden" name="price" value="<?= $document['price']; ?>">
                  <input type="hidden" name="subject" value="<?= $document['subject']; ?>">
                  <input type="hidden" name="exam_body" value="<?= $document['exam_body']; ?>">
                  <input type="hidden" name="year" value="<?= $document['year']; ?>">
                <input type="hidden" name="coverpage" value="<?= $document['coverpage']; ?>">
                  <input type="hidden" name="quantity" value="1">
                  <input type="submit" class="btn btn-primary" value="Buy Past Question">
                </form>
              </div>
            </div>
          </div>
      <?php
        }
      } catch (\PDOException $e) {
        $msg = "Error: " . $e->getMessage();
        redirect('purchase-past-question.php', $msg);
        exit;
      }
      ?>

    </div>
    <!-- Pagination links -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center mt-5">
        <?php
        $stmt = $pdo->select("SELECT COUNT(*) as total FROM document");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($row['total'] / $limit); // Calculate total pages

        // Previous page link
        if ($page > 1) {
          echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
        }

        // Page links
        for ($i = 1; $i <= $total_pages; $i++) {
          echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }

        // Next page link
        if ($page < $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
        }
        ?>
      </ul>
    </nav>
  </div>

</body>