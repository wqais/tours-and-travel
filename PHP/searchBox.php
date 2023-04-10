<?php
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
?>

<form class="search-form" action="search.php" method="GET">
  <div class="container search-container mt-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10">
        <div class="card p-3  py-4">
          <h5>Search A Tour</h5>
          <div class="row g-3 mt-2">
            <div class="col-md-3">
              <select class="form-select form-control month-select" name="month-select" aria-label="Choose Month" aria-placeholder="Choose Month">
                <option selected label=" "></option>
                <?php
                foreach ($months as $month) {
                ?>
                  <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                <?php
                }
                ?>
              </select>
              </datalist>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control dest-search" name="dest-search" placeholder="Enter destination">
            </div>
            <div class="col-md-3">
              <button class="btn btn-secondary btn-block search-btn" type="submit" name="submit">Search Results</button>
            </div>
          </div>
          <br />
          <p>
            <a class="advanced" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Search with advanced filters
            </a>
          </p>
          <div class="collapse advanced-search justify-content-center" id="collapseExample">
            <div class="card card-body filter">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" placeholder="Budget" class="form-control" name="budget">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Region" name="region">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
</form>