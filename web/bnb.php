<?php 
require_once 'includes/connect.php';
require_once 'includes/header.php';
$hid = $_GET["id"];
$sql = "SELECT * FROM `Airbnb_Open_Data` WHERE `hostid` = $hid";
$result = mysqli_query($connect, $sql);

?>
<div class="row"  style="margin-top: 60px;">
  
  <div class="col-md-8">
      <p>
        <?php while ($row = mysqli_fetch_row($result)) {
          $mapsurl = "https://www.google.com/maps/@".$row[7].",".$row[8].",17z";

         ?>
        <h1><?php echo $row[1]; ?>  <small><?php if ($row[3] == 'verified') { ?><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="blue" class="bi bi-check-circle-fill" viewBox="0 0 32 32">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg><?php } else { ?><?php }?></small></h1>
<p>
  This property located at <?php echo $row[6]; ?>, <?php echo $row[5]; ?>, USA it is owned and operated by <?php echo $row[4]; ?>. You get the <?php echo $row[13]; ?><?php if ($row[11] == "TRUE" ) { ?> and can be Instantly Booked<?php } else { ?><?php }?> and has a <?php echo $row[12]; ?> cancellation policy.

  <h4>Price <?php echo $row[15]; ?> / Service Fee <?php echo $row[16]; ?> / <a href="<?php echo $mapsurl; ?>" target="_blank">MAP(LOCATION)</a></h4>


</p>
        <?php } ?>
      </p>
    <p>
    </p>

<br><br>
  </div>
  <div class="col-md-4">
    <div class="col-md-12">
      <?php require_once 'includes/sidebar.php'; ?>
    </div>
    
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>