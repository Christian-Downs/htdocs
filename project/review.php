<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Rating System</title>
    <style>
        .star-rating<?php echo $business->getId(); ?> {
            direction: rtl;
            display: inline-block;
            font-size: 2em;
            unicode-bidi: bidi-override;
        }
        .star-rating<?php echo $business->getId(); ?>  input {
            display: none;
        }
        .star-rating<?php echo $business->getId(); ?> label {
            color: #ddd;
            cursor: pointer;
            display: inline-block;
            font-size: 2em;
            padding: 0;
            position: relative;
        }
        .star-rating<?php echo $business->getId(); ?> label:hover,
        .star-rating<?php echo $business->getId(); ?> label:hover ~ label,
        .star-rating<?php echo $business->getId(); ?> input:checked ~ label {
            color: #f5b301;
        }
    </style>
</head>
<body>
    <form id="reviewForm<?php echo $business->getId(); ?>">
        <div class="star-rating<?php echo $business->getId(); ?>">
            <input type="radio" id="star5for<?php echo $business->getId(); ?>" name="ratingFor<?php echo $business->getId(); ?>" value="5"><label for="star5for<?php echo $business->getId(); ?>" title="5 stars">&#9733;</label>
            <input type="radio" id="star4for<?php echo $business->getId(); ?>" name="ratingFor<?php echo $business->getId(); ?>" value="4"><label for="star4for<?php echo $business->getId(); ?>" title="4 stars">&#9733;</label>
            <input type="radio" id="star3for<?php echo $business->getId(); ?>" name="ratingFor<?php echo $business->getId(); ?>" value="3"><label for="star3for<?php echo $business->getId(); ?>" title="3 stars">&#9733;</label>
            <input type="radio" id="star2for<?php echo $business->getId(); ?>" name="ratingFor<?php echo $business->getId(); ?>" value="2"><label for="star2for<?php echo $business->getId(); ?>" title="2 stars">&#9733;</label>
            <input type="radio" id="star1for<?php echo $business->getId(); ?>" name="ratingFor<?php echo $business->getId(); ?>" value="1"><label for="star1for<?php echo $business->getId(); ?>" title="1 star">&#9733;</label>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html></div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let form = document.getElementById('reviewForm<?php echo $business->getId(); ?>')
        
        
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const data = new FormData(form);
            let review = data.get('ratingFor<?php echo $business->getId(); ?>');
            data.append('review',review)
            data.append('businessId', <?php echo $business->getId() ?>);
            <?php include_once 'models/userModel.php' ?>
            data.append('userId', <?php echo unserialize($_SESSION['user'])->id; ?>); 

            fetch('models/reviewModel.php', {
                method: 'POST',
                body: data
            })
            .then(response => response.text())
            .then(data => {
                location.reload();
                // console.log(data);
                // alert('Review submitted successfully!');
            })
            .catch(error => {
                // console.error('Error:', error);
                // alert('There was an error submitting your review.');
            });
        });
    });
</script>