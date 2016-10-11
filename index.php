<?php
$b = '';
$p = '';

if( isset( $_POST['submit'] && "Submit" === $_POST['submit'] ) ) {
	
	if( isset( $_POST['projectid'] ) && isset( $_POST['bucketid'] ) && isset( $_POST['jsonkey'] ) ) {
	
		$b = $_POST['bucketid'];
		$p = $_POST['projectid'];
		require_once( __DIR__ . '/GcsWrapper.php' );
		$storage_test = new cAcGoogleCloudStorage( $p, $_POST['jsonkey'], $b );
	
	}

}
?>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<header class="container">
<h1>GCS Wrapper Test</h1>
<p>Enter the Project ID, Bucket ID, and content of the json file generated by Google's IAM, then submit to get results</p>
</header>
<content class="container">
	<form id="gcs-test-form" class="form-horizontal" method="post">

		<fieldset>

		<!-- Form Name -->
		<legend>Test GCS</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="projectid">Project ID</label>  
		  <div class="col-md-4">
		  <input id="projectid" name="projectid" type="text" placeholder="project-12345" class="form-control input-md" <?php echo empty( $p ) ? '' : 'value="' . $p . '"'?> >
		  <span class="help-block">enter the id, not the name</span>  
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="bucketid">Bucket ID</label>  
		  <div class="col-md-4">
		  <input id="bucketid" name="bucketid" type="text" placeholder="your-bucket-id" class="form-control input-md" <?php echo empty( $b ) ? '' : 'value="' . $b . '"'?> >
		  <span class="help-block">enter the unique identifier for the bucket</span>  
		  </div>
		</div>

		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="jsonkey">JSON Key Content</label>
		  <div class="col-md-4">                     
			<textarea class="form-control" id="jsonkey" name="jsonkey"></textarea>
		  </div>
		</div>
		
		<div class="form-group">
		  <div class="col-md-4 col-md-offset-4">                     
			<input type="submit" class="form-control btn btn-primary" id="submit" name="submit" value="Submit"/>
		  </div>
		</div>

		</fieldset>

	</form>
	<div class="row">
		<div id="post-values" class="col-md-4 col-md-offset-4">
			<h2>Project: <?php echo $p ?></h2>
			<h2>Bucket: <?php echo $b ?></h2>
		</div>
	</div>
</content>
<footer class="container">
	<div class="errors">
		<?php
		if( isset( $storage_test ) ) {
		
			print_r( $storage_test->errors );
		
		}
		?>
	</div>
</footer>
