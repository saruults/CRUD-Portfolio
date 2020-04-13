
<section class="projects" id="projects">
  <h1>P R O J E C T S</h1> 
  <br />
  <div class="projects-card-container">
  <?php $results = mysqli_query($db, "SELECT * FROM projects"); ?>
  <?php while ($row = mysqli_fetch_array($results)) { ?>
      <?php $pieces = explode(" ", $row['tags']); ?>
        <a href="projects/<?php echo $row['slug']; ?>">
              <div class="projects-card">
                <h1>
                  <?php echo $row['title']; ?>
                </h1>
                <div class="project-card-imgholder">
                  <img
                    src="images/<?php echo $row['img']; ?>"
                  />
                </div>
                <div class="projects-card-tags">
                  <?php foreach ($pieces as $piece){ ?>
                    <div class="tag <?php echo strtolower($piece) . '-tag' ?>"> 
                      <?php echo strtoupper($piece) ?>
                    </div>
                   <?php } ?>
                </div>
              </div>
            </a>

	<?php } ?>
         
    
  </div>
  </div>
</section>
