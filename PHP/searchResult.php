

<div class="card mb-3 tour-card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../<?php echo $allTours["tour_img"]; ?>" class="rounded float-start tour-img" alt="Tour Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $allTours["tour_title"]; ?></h5>
                        <p class="card-text"><?php echo $allTours["tour_desc"]; ?></p>
                        <p class="card-text"><strong>Pricing: &#8377; <?php echo $allTours["tour_price"]; ?> per person</strong></p>
                        <p class="card-text">Package Duration: <?php echo $package["pack_duration"]; ?> days</p>
                        <p class="card-text"><small class="text-muted">Avg. Rating: <?php echo $allTours["tour_avg_rating"]; ?></small></p>
                        <form action="bookTour.php" method="GET">
                            <?php
                            $tourTitle = urlencode($allTours["tour_title"]);
                            ?>
                            <a href="bookTour.php?tour_title=<?php echo $tourTitle ?>" class="btn btn-secondary book-btn">Book Now</a>
                        </form>
                        <p class="card-text"><small class="text-muted"><span class="badge package-badge"><?php echo $package["pack_type"]; ?></span></small></p>

                    </div>
                </div>
            </div>
        </div>