<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "test");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  select * from filedownload where filename like '%$search%'
 ";
}
//else
//{
// $query = "
//  SELECT * FROM tbl_customer ORDER BY CustomerID
// ";
//}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '';
 while($row = mysqli_fetch_array($result))
 {
  $output .= ' 
   <a href="download.php?file='.$row['filename'].' " ><img src="pdflogo.jpg"  class="pdf"></a>
   <p class = "filename">'.$row["filename"].'</p><br>
  ';
 }
 echo $output;
}
else
{
 echo ' ';
}

?>
