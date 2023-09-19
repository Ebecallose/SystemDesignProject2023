<?php
include "header5.php";
        ?>
        
<div id="MasterScheduleContainer">
<div id="main">
<section class="wrapper2">
<form action="ResMajorGpa.php" method="POST">
<select name ="majorid">
  <option value="1112">Calculus</option>
  <option value="1113">Trigonometry</option>
  <option value="1114">Business</option>
  <option value="1115">Economics</option>
  <option value="1116">Accounting</option>
  <option value="1117">Biochemistry</option>
  <option value="1122">Comp Sci B.S.</option>
  <option value="1123">Comp Sci B.A.</option>
 
</select>
    <input type="Submit" name="Submit" value ="Submit"></form>
<?php

if(isset($_POST['Submit'])){
    $maj = $_POST['majorid'];
   
$sql = "SELECT DISTINCT major.*, user.* FROM major, undergraduate, history, user WHERE major.Major_ID = undergraduate.MajorID and undergraduate."
        . "UG_StudentID = user.User_ID AND major.Major_ID = ?";
    $select1 = $conn->prepare($sql);
$select1->bind_param('i', $maj);
$select1->execute();
$result=$select1->get_result();

if ($result->num_rows > 0){
    echo "<table>";
    echo "<th>Major</th>";
 
    $rownumber = 0;
    $gpatemp = 0;
    while($row=$result->fetch_assoc()){
       echo "<tr>";
                    
                    echo"<td>" . $row['M_Name'] . "</td>";
                    $rownumber += 1;
                    $test = $row['User_ID'];
                    
                    
                   
                    echo"</tr>";
                    
                    
                    }
                    
    }
    echo"</table>";
    echo"<table>";
    echo"<tr>There are currently" . ' ' . $rownumber . ' '. "entries in this major<tr>";
     echo"</table>";
}

?>
</section>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
