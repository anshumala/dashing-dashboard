<!Doctype html>
<html>
<?php
  require 'gapi.class.php';
  define('ga_profile_id','123947637');

  $ga = new gapi("anshumalab@versatile-lotus-134309.iam.gserviceaccount.com", "example-c1728edf3d80.p12");

 
  $dimension1=($_GET["dimension1"]);
  $dimension2=($_GET["dimension2"]);
  $metric1=($_GET["metric1"]);
  $metric2=($_GET["metric2"]);
  $start_date=($_GET["start_date"]);
  $end_date=($_GET["end_date"]);

  //$filter = 'country == India';

  $ga->requestReportData(ga_profile_id,array($dimension1,$dimension2),array($metric1,$metric2), $start_date, $end_date);
?>
<?php 
  function findMetric($metricx)
  {
    if(strcmp($metricx,"pageviews")==0)
    {
      $resmetric1=$result->getPageviews();
      //$gametric1=$ga->getPageviews();
    }
    else if(strcmp($metricx,"sessions")==0)
    {
      $resmetric1=$result->getSessions();
      //$gametric1=$ga->getSessions();
    }
    else if(strcmp($metricx,"users")==0)
    {
      $resmetric1=$result->getUsers();
      //$gametric1=$ga->getUsers();
    }
    else if(strcmp($metricx,"avgSessionDuration")==0)
    {
      $resmetric1=$result->getAvgSessionDuration();
      //$gametric1=$ga->getAvgSessionDuration();
    }
    else if(strcmp($metricx,"bounceRate")==0)
    {
      $resmetric1=$result->getBounceRate();
      //$gametric1=$ga->getBounceRate();
    }
    else if(strcmp($metricx,"pageviewsPerSession")==0)
    {
      $resmetric1=$result->getPageviewsPerSession();
      //$gametric1=$ga->getPageviewsPerSession();
    }
  }
?>
<table border=1px>
  <tr>
    <th><?php echo $dimension1 ."  ". $dimension2; ?> </th>
    <th><?php echo $metric1; ?> </th>
    <th><?php echo $metric2; ?></th>
  </tr>
  <?php
    foreach($ga->getResults() as $result):
      findMetric($metric1);
      findMetric($metric2);
  ?>
  <tr>
    <td><?php echo $result ?></td>
    <td><?php echo $resmetric1 ?></td>
    <td><?php echo $resmetric2 ?></td>
  </tr>
  <?php
    endforeach
  ?>
</table>

<table border=5px>
  <tr>
    <th>Total Results</th>
    <td><?php echo $ga->getTotalResults() ?></td>
  </tr>
  <tr>
    <th><?php echo "Total ".$metric1;?></th>
    <td><?php echo $metric1 ?>
  </tr>
  <tr>
    <th><?php echo "Total ".$metric2;?></th>
    <td><?php echo $metric2 ?></td>
  </tr>
  <tr>
    <th>Result Date Range</th>
    <td><?php echo $ga->getStartDate() ?> to <?php echo $ga->getEndDate() ?></td>
  </tr>
</table>

</html>