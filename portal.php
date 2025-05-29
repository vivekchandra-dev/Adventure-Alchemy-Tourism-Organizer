<?php

$url = 'trial.jpg';

?>
<style>
	body {
		background-image: url('<?php echo $url ?>');
		background-size: centre;
		background-position: top;
		background-repeat: repeat;
	}
	header.masthead {
		background-image: url('<?php echo validate_image($_settings->info('frontend.jpg')) ?>') !important;
	}
	header.masthead .container {
		background: #66cdaa;
	}
	
</style>


<!-- The rest of your HTML code remains unchanged -->

<!-- Masthead-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header.masthead .container {
            background: rgba(169, 169, 169, 0.30); /* Transparent gray background */
            padding: 30px; /* Adjust padding as needed */
            border-radius: 45%; /* Oval shape */
            overflow: hidden; /* Ensure content doesn't overflow the rounded corners */
        }

        .masthead-heading {
            font-size: 2em; /* Larger font size */
            margin-bottom: 10px; /* Reduced spacing */
            color: #000000; /* Black text color */
            font-family: 'Comic Sans MS', cursive; /* Cursive font with fallback */
        }

        .masthead-subheading {
            font-size: 1em; /* Font size for subheading */
            margin-bottom: 15px; /* Reduced spacing */
            color: #fff; /* Text color */
        }

        .btn {
            display: inline-block;
            padding: 10px 30px; /* Adjusted button padding */
            font-size: 1.5em; /* Adjusted font size */
            text-decoration: none;
            color: #fff;
            background-color: #198EA5; /* Darker blue button color */
            border-radius: 15px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #325FA2; /* Change button color on hover */
        }
    </style>
    <title>Adventure Alchemy</title>
</head>
<body>

<!-- Masthead-->
<header class="masthead">
    <div class="container">                          
        <div class="masthead-heading text-uppercase">𝒜𝒹𝓋𝑒𝓃𝓉𝓊𝓇𝑒 𝒜𝓁𝒸𝒽𝑒𝓂𝓎</div>  
        <div class="masthead-heading text-uppercase">𝒴𝑜𝓊 𝒹𝓇𝑒𝒶𝓂 𝒾𝓉.𝓌𝑒 𝓅𝓁𝒶𝓃 𝒾𝓉.</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#home">START YOUR JOURNEY</a>
    </div>
</header>

<!--𝓐𝓓𝓥𝓔𝓝𝓣𝓤𝓡𝓔 𝓐𝓛𝓒𝓗𝓔𝓜𝓨 𝓨𝓸𝓾 𝓓𝓻𝓮𝓪𝓶 𝓘𝓽. 𝓦𝓮 𝓟𝓵𝓪𝓷 𝓘𝓽. -->

</body>
</html>

<!-- Your other content goes here -->

</body>
</html>

<!-- Services-->
<section class="page-section" id="home">
	<div class="container">
		<h2 class="text-center">Tour Packages</h2>
	<div class="d-flex w-100 justify-content-center">
		<hr class="border-warning" style="border:3px solid" width="15%" >
	</div>
	<div class="row">
		<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() limit 3");
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
			<div class="col-md-4 p-4">
    <div class="card w-100 rounded-0" style="background: linear-gradient(to bottom , #85d7ff, #1fb6ff);">
        <img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title truncate-1 w-100"><?php echo $row['title'] ?></h5><br>
            <div class=" w-100 d-flex justify-content-start">
                <div class="stars stars-small">
                    <input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label>
                    <input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label>
                    <input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label>
                    <input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label>
                    <input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label>
                </div>
            </div>
            <p class="card-text truncate"><?php echo $row['description'] ?></p>
            <div class="w-100 d-flex justify-content-end">
                <a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-warning">View Package <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

		<?php endwhile; ?>
	</div>
	<div class="d-flex w-100 justify-content-end">
		<a href="./?page=packages" class="btn btn-flat btn-warning mr-4">Explore Package <i class="fa fa-arrow-right"></i></a>
	</div>
	</div>
</section>
<!-- About-->
<section class="page-section" id="about">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">About Us</h2>
		</div>
		<div>
			<div class="card w-100" >
				<div class="card-body" style="background: linear-gradient(to bottom , #85d7ff, #1fb6ff>
					<?php echo file_get_contents(base_app.'about.html') ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Contact Us</h2>
			<h3 class="section-subheading text-muted">Send us a message for inquiries.</h3>
		</div>
		<!-- * * * * * * * * * * * * * * *-->
		<!-- * * SB Forms Contact Form * *-->
		<!-- * * * * * * * * * * * * * * *-->
		<!-- This form is pre-integrated with SB Forms.-->
		<!-- To make this form functional, sign up at-->
		<!-- https://startbootstrap.com/solution/contact-forms-->
		<!-- to get an API token!-->
		<form id="contactForm" >
			<div class="row align-items-stretch mb-5">
				<div class="col-md-6">
					<div class="form-group">
						<!-- Name input-->
						<input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required />
					</div>
					<div class="form-group">
						<!-- Email address input-->
						<input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
					</div>
					<div class="form-group mb-md-0">
						<input class="form-control" id="subject" name="subject" type="subject" placeholder="Subject *" required />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-textarea mb-md-0">
						<!-- Message input-->
						<textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
					</div>
				</div>
			</div>
			<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
		</form>
	</div>
</section>
<script>
$(function(){
	$('#contactForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:_base_url_+"classes/Master.php?f=save_inquiry",
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("an error occured",'error')
				end_loader()
			},
			success:function(resp){
				if(typeof resp == 'object' && resp.status == 'success'){
					alert_toast("Inquiry sent",'success')
					$('#contactForm').get(0).reset()
				}else{
					console.log(resp)
					alert_toast("an error occured",'error')
					end_loader()
				}
			}
		})
	})
})
</script>