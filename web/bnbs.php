<?php
require_once 'includes/connect.php';
require_once 'includes/header.php';
require_once 'includes/paging.php';

 ?>
<?php
 $totalRecordsPerPage=15;
 $tableName='Airbnb_Open_Data';
 $paginationData=pagination_records($totalRecordsPerPage,$tableName);
 $sn=pagination_records_counter($totalRecordsPerPage);
 $pagination=pagination($totalRecordsPerPage,$tableName);
?>
<div class="row"  style="margin-top: 60px;">
	
	<div class="col-md-8">
	    <p>
	    	<?php foreach ($paginationData as $row) {
	    		$surl = preg_replace('/[^A-Za-z0-9 \-]/', '', $row['NAME']);
	    		$surl = strtolower($surl);
	    		$surl = str_replace(' ', '_', $surl);
	    		if ($row['NAME'] == "") {} else {
	    	 ?>
	    		<h4><a href="/bnb/<?php echo $row['hostid']; ?>/<?php echo $surl; ?>"><?php echo $row['NAME']; ?></a> <small>(<?php  echo $row['neighbourhood'] . ', ' ; ?><?php echo $row['price']; ?>)</small></h4>
	    	<?php } $sn++; } ?>
			</p>
			<nav aria-label="Page navigation example">
  <ul class="pagination">
			<?php echo $pagination; ?>
			</ul>
</nav>
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