<div class="card">
  <div class="card-header">
    <h3 class="card-title">All category</h3>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
      <tr>
        <th>Category name</th>
        <th style="width: 40px">Delete</th>
        <th style="width: 40px">Edit</th>
      </tr>
      </thead>
      <tbody>
      <?php
      $category = getAllCategory($conn);
      recursiveCategoryTable($category);
      ?>
      </tbody>
    </table>
  </div>
</div>