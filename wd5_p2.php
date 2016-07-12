<!DOCTYPE HTML>
<html>
<?php
require 'gapi.class.php';

define('ga_profile_id','123947637');

$ga = new gapi("anshumalab@versatile-lotus-134309.iam.gserviceaccount.com", "example-c1728edf3d80.p12");

 
 $dimension1=($_GET["dimension1"]);
 $dimension2=($_GET["dimension2"]);
 $start_date=($_GET["start_date"]);
 $end_date=($_GET["end_date"]);

 $start_date.$end_date;
//$filter = 'country == India';

$ga->requestReportData(ga_profile_id,array('country','city','month'),array('pageviews','sessions','users','avgSessionDuration','bounceRate','pageviewsPerSession'),null,null,"2016-07-01","2016-07-10");

  
  
?>
<table border=5px>
<tr>
  <th><?php echo "country, city and date"; ?> </th>
  <th><?php echo "Pageviews"; ?> </th>
  <th><?php echo "Sessions"; ?> </th>
  <th><?php echo "Users"; ?></th>
  <th><?php echo "Average Session Duartion";?></th>
  <th><?php echo "Bounce Rate %";?></th>
  <th><?php echo "Pageviews Per Session"; ?></th>
</tr>
<?php

foreach($ga->getResults() as $result):

?>
<tr>
  <td><?php echo $result ?></td>
  <td><?php echo $result->getPageviews() ?></td>
  <td><?php echo $result->getSessions()?></td>
  <td><?php echo $result->getUsers()?></td>
  <td><?php echo $result->getAvgSessionDuration()." min"?></td>
  <td><?php echo ($result->getBounceRate())." %"?></td>
  <td><?php echo $result->getPageviewsPerSession() ?></td>
</tr>
<?php
endforeach
?>
</table>
<br>
<hr>
<table border=2px >
<tr>
  <th>Total Results</th>
  <td><?php echo $ga->getTotalResults() ?></td>
</tr>
<tr>
  <th>Result Date Range</th>
  <td><?php echo $ga->getStartDate() ?> to <?php echo $ga->getEndDate() ?></td>
</tr>
</table>


</html>
