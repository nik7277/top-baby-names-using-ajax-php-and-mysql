<?
    
    $sql='';
    if(!$_GET['year']&&!$_GET['gender']){
        $sql = "SELECT name,ranking,gender,year FROM BabyNames ORDER BY year, gender, ranking";
    }else if(strcmp($_GET['year'], 'all') == 0 && strcmp($_GET['gender'], 'B') == 0){
        $sql = "SELECT name,ranking,gender,year FROM BabyNames ORDER BY year, gender, ranking";
    }else if (strcmp($_GET['year'], 'all') == 0){
        $sql = "SELECT name,ranking,gender,year FROM BabyNames WHERE gender=\"".$_GET['gender']."\" ORDER BY year, gender, ranking";
    }else if(strcmp($_GET['gender'], 'B') == 0){
        $sql = "SELECT name,ranking,gender,year FROM BabyNames WHERE year= ".intval($_GET['year'])." ORDER BY year, gender, ranking";
    }else{
        $sql = "SELECT name,ranking,gender,year FROM BabyNames WHERE year= ".intval($_GET['year'])." and  gender=\"".$_GET['gender']."\" ORDER BY year, gender, ranking";
    }
  
    $con = mysqli_connect('localhost','root','root','ssa');
    $result = mysqli_query($con,$sql);
    echo "<table border='1'><tr><th>Name</th><th>Ranking</th><th>Gender</th><th>Year</th></tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['ranking'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>