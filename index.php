<!DOCTYPE html>
<html>

<head>
<title>UCSB Object Code Search</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="css/main.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/search.js"></script>

<noscript>
<div id="no-js-fire">
  <p>This page requires JavaScript in order to function properly. Please turn on JavaScript and refresh this page.</p>
</div>
</noscript>
</head>

<body>

<div id="filter">
	<form class="form-inline">
	    <!-- <div id="query" class="form-group"> -->
			<label for="search">Filter Object Codes: </label>
			<input id="search" type="text" placeholder="Just start typing!">
			<span id="clear" class="glyphicon glyphicon-remove-circle"></span><br/>
			<div id="filter-settings">
				Filter by: 
				<div class="checkbox" title="Match Search Query With Object Code Cell Contents When Searching.">
					<input id="code_check" class="filter-checkbox" type="checkbox" name="code_search" value="Code">
					<label for="code_check"> Code</label>
				</div>
				<div class="checkbox" title="Match Search Query With Title Cell Contents When Searching.">
					<input id="title_check" class="filter-checkbox" type="checkbox" name="title_search" value="Title" checked>
					<label for="title_check"> Title</label>
				</div>
				<div class="checkbox" title="Match Search Query With Decription Cell Contents When Searching.">
					<input id="desc_check" class="filter-checkbox" type="checkbox" name="description_search" value="Description" checked>
					<label for="desc_check"> Description</label>
				</div>
				<div class="checkbox" title="Match Search Query With Category Cell Contents When Searching.">
					<input id="cat_check" class="filter-checkbox" type="checkbox" name="category_search" value="Category">
					<label for="cat_check"> Category</label>
				</div>
			</div>
	    <!-- </div> -->
	</form>
    <p id="result-header">All Object Codes Are Shown Below.</p>
</div>

<div class="se-pre-con"></div>

<div id="content">
<table class="table table-responsive table-bordered">
	<colgroup>
		<col span="1" style="width:10%">
		<col span="1" style="width:20%">
		<col span="1" style="width:40%">
		<col span="1" style="width:15%">
	</colgroup>
	<thead><tr>
		<th>Code</th>
		<th>Title</th>
		<th>Description</th>
		<th>Category</th>
	</tr></thead>
	<tbody>
		<?php include 'content.php' ?>
	</tbody>
</table>
</div>

</body>

</html>
