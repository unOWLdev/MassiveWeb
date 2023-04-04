<?php header('Content-Type: text/xml');
require_once 'includes/connect.php';
$sql = "SELECT * FROM Airbnb_Open_Data order by 'hostid'"; 
$res_data = mysqli_query($connect,$sql);

 ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc>https://dev1.unowl.com/</loc>
		<lastmod>2023-04-01T19:12:36+09:00</lastmod>
                <changefreq>Daily</changefreq>
                <priority>1</priority>
	</url>
	<?php while($row = mysqli_fetch_array($res_data)){
	    		$surl = preg_replace('/[^A-Za-z0-9 \-]/', '', $row['NAME']);
	    		$surl = strtolower($surl);
	    		$surl = str_replace(' ', '_', $surl);
	    		if ($row['NAME'] == "") {} else {
	    	 ?>
	<url>
		
		<loc>https://dev1.unowl.com/bnb/<?php echo $row['hostid']; ?>/<?php echo $surl; ?></loc>
		<lastmod>2021-11-16T13:21:20+09:00</lastmod>
                <changefreq>Daily</changefreq>
                <priority>0.8</priority>
	</url>
	<?php } } ?>
</urlset>