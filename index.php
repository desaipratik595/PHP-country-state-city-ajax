<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dynamic Dropdown List Country State City in PHP MySQL using Ajax</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
html, body {
background-color: #4287f5;
color: #000;
font-family: 'Nunito', sans-serif;
font-weight: 200;
height: 100vh;
margin: 0;
}
label {
    color:red;
    font-size:22px;
}
.full-height {
height: 100vh;
}
.flex-center {
align-items: center;
display: flex;
justify-content: center;
}
.position-ref {
position: relative;
}
.top-right {
position: absolute;
right: 10px;
top: 18px;
}
.content {
text-align: center;
}
.title {
font-size: 84px;
}
.links > a {
color: #636b6f;
padding: 0 25px;
font-size: 13px;
font-weight: 600;
letter-spacing: .1rem;
text-decoration: none;
text-transform: uppercase;
}
.m-b-md {
margin-bottom: 30px;
}
</style>
</head>
<body>
<div class="container mt-5">
<div class="row">
<div class="card">
<div class="card-header">
<h2 class="text-danger">Country State City Dropdown in PHP MySQL using Ajax example</h2>
</div>
<div class="card-body">
<form>
<div class="form-group">
<label for="country">Country</label>
<select class="form-control" id="country-dropdown">
<option value="">Select Country</option>
<?php
require_once "db.php";
$result = mysqli_query($conn,"SELECT * FROM countries");
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
<?php
}
?>
</select>
</div>
<div class="form-group">
<label for="state">State</label>
<select class="form-control" id="state-dropdown">
</select>
</div>                        
<div class="form-group">
<label for="city">City</label>
<select class="form-control" id="city-dropdown">
</select>
</div>
</div>
</div>
</div>
</div> 
</div>
<script>
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "states-by-country.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "cities-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});
});
</script>
</body>
</html>