<section class="page-section bg-dark" id="home">
	<div class="container">
    <h1 class="text-center" style="color: #FFD700;">Tour Packages</h1>

		<h2 class="text-center">
        <form id="searchForm" class="mb-3">
    <input type="text" id="searchInput" placeholder="Search for packages..." style="padding: 10px; font-size: 16px; border: 2px solid #FFD700; border-radius: 5px; transition: border-color 0.3s; width: 250px; margin-right: 10px;">
    <button type="submit" style="padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; background-color: #FFD700; color: white; cursor: pointer; transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;"
    onmouseover="this.style.backgroundColor='#FFB90F'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.1)';"
    onmouseout="this.style.backgroundColor='#FFD700'; this.style.transform='none'; this.style.boxShadow='none';">
        Search
    </button>
</form>

</h2>
	<div class="d-flex w-100 justify-content-center">
		<hr class="border-warning" style="border:2px solid" width="100%">
	</div>
	<div class="w-100">
		<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() ");
			while($row = $packages->fetch_assoc() ):
				$cover='';
				if(is_dir(base_app.'uploads/package_'.$row['id'])){
					$img = scandir(base_app.'uploads/package_'.$row['id']);
					$k = array_search('.',$img);
					if($k !== false)
						unset($img[$k]);
					$k = array_search('..',$img);
					if($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count =$review->num_rows;
				$rate = 0;
				while($r= $review->fetch_assoc()){
					$rate += $r['rate'];
				}
				if($rate > 0 && $review_count > 0)
				$rate = number_format($rate/$review_count,0,"");
		?>
			<div class="card d-flex w-100 rounded-0 mb-3 package-item" style="background: linear-gradient(90deg, #FFFFE0, #FFB6C1);">
				<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="215rem" style="object-fit:cover">
				<div class="card-body">
				<h5 class="card-title truncate-1"><?php echo $row['title'] ?></h5>
				<div class=" w-100 d-flex justify-content-start">
				<form action="">
					<div class="stars stars-small">
							<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label> 
							<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label> 
							<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label> 
							<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label> 
							<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label> 
					</div>
				</form>
				</div>
				<p class="card-text truncate"><?php echo $row['description'] ?></p>
				<div class="w-100 d-flex justify-content-between">
				<span class="rounded-0 btn btn-flat btn-sm btn-primary"><i class="fa"></i> ₹ <?php echo number_format($row['cost']) ?></span>
				<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-warning">View Package <i class="fa fa-arrow-right"></i></a>
				</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	
	</div>
</section>


<div id="resultsContainer"></div>

<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const searchTerm = document.getElementById('searchInput').value;

    fetch('search.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'searchTerm=' + encodeURIComponent(searchTerm),
    })
    .then(response => response.json())
    .then(data => {
        renderResults(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

function renderResults(data) {
    const resultsContainer = document.getElementById('resultsContainer');
    resultsContainer.innerHTML = ''; // Clear previous results

    if (data.length > 0) {
        data.forEach(package => {
            const packageItem = document.createElement('div');
            packageItem.classList.add('card', 'd-flex', 'w-100', 'rounded-0', 'mb-3', 'package-item');
            packageItem.innerHTML = `
                <img class="card-img-top" src="${validate_image(package.cover)}" alt="${package.title}" height="215rem" style="object-fit:cover">
                <div class="card-body">
                    <h5 class="card-title truncate-1">${package.title}</h5>
                    <!-- Other package details here -->
                </div>
            `;
            resultsContainer.appendChild(packageItem);
        });
    } else {
        resultsContainer.innerHTML = '<p>No results found</p>';
    }
}

document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const searchTerm = document.getElementById('searchInput').value;
    console.log('Search Term:', searchTerm);

    fetch('search.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'searchTerm=' + encodeURIComponent(searchTerm),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Search Results:', data);
        renderResults(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script>