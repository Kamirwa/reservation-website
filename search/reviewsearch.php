
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
    <form action="autodemo2.php" autocomplete = "off" method="post">
        <label for="id2"> (put any number to search for the reviews under that number)Reviews for: </label>
        <input type="text" name="id2" id="id2">
        <div id="countryList"></div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

	<!--Javascript code using jQuery to perform autocomplete search -->
	<script>
		$(document).ready(function() {
			$('#id2').keyup(function() {
				var query = $(this).val();
				if (query != '') {
					$.ajax({
						url: 'autodemo2.php',
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
        <title>Search</title>
    </head>
    <body>
        <h2>QUERY 3</h2>
        <form action="search2.php" method="post">
        <label for ="id2">enter any letter or text to search for female users: </label>
        <input type ="id2" name ="id2" id ="id2"pattern="[A-Za-z]+" title="Only letters are allowed" required><br><br>
        <input type = "submit" value ="search"></button>
    </form>
    </body>
</html>-->