<?php
require_once 'includes/connect.php';
require_once 'includes/header.php';
$sql = "SELECT * FROM Airbnb_Open_Data order by RAND() LIMIT 10"; 
$res_data = mysqli_query($connect,$sql);
 ?>

<div class="row"  style="margin-top: 60px;">
	
	<div class="col-md-8">
	    <p>
	    	<?php while($row = mysqli_fetch_array($res_data)){
	    		$surl = preg_replace('/[^A-Za-z0-9 \-]/', '', $row['NAME']);
	    		$surl = strtolower($surl);
	    		$surl = str_replace(' ', '_', $surl);
	    	 ?>
	    		<h4><a href="/bnb/<?php echo $row['hostid']; ?>/<?php echo $surl; ?>"><?php echo $row['NAME']; ?></a> <small>(<?php  echo $row['neighbourhood'] . ', ' ; ?><?php echo $row['price']; ?>)</small></h4>
	    	<?php } ?>
			</p>
		<p>
			<h3><span class="pull-right"><a href="/bnbs/1">more...</a></span></h3>
		</p>

<br><br>
	</div>
	<div class="col-md-4">
		<div class="col-md-12">
			<?php require_once 'includes/sidebar.php'; ?>
		</div>
	</div>
</div>

<?php
require_once 'includes/footer.php';
	?>