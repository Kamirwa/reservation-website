<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>QUERY 2</h2>
	    <!--Form to input data search-->
    <form action="autodemo1.php" autocomplete = "off" method="post">
        <label for="id2"> Guest names: </label>
        <input type="text" name="id2" id="id2">
        <div id="countryList"></div>
    </form>

	<!--Javascript code using jQuery to perform autocomplete search -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#id2').keyup(function() {
				var query = $(this).val();
				if (query != '') {
					$.ajax({
						url: 'autodemo1.php',
						method: 'POST',
						data: {
							query: query
						},
						success: function(response) {
							$('#countryList').fadeIn();
							$('#countryList').html(response);
						}
					});
				} else {
					$('#countryList').fadeOut();
					$('#countryList').html('');
				}
			});

			$(document).on('click', 'li', function() {
				$('#id2').val($(this).text());
				$('#countryList').fadeOut();
			});

		});
	</script>
</body>
</html>
<!--<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
         integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <title>Search</title>
    </head>
    <body>
        <h2>QUERY 1</h2>
        <form action="search.php" method="post">
        <label for ="id2">: </label>
        <input type ="number" name ="id2" id ="id2" pattern="[0-9]+" title="Only numbers are allowed" required><br><br>
        <input type = "submit" value ="search"></button>
    </form>
    </body>
</html>-->