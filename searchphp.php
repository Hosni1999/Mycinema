<?php
include 'accessToDataBase.php';
$searchErr ='';
$data='';
$data2='';
$data3='';
$data4='';





if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $bdd->query("select movie.title from movie,genre,movie_genre
        where movie.id=movie_genre.id_movie and movie_genre.id_genre=genre.id
        and genre.name='".$search."'");

        $stmt2 = $bdd->query("select movie.title from movie,distributor
        where movie.id_distributor=distributor.id
        and distributor.name='".$search."'");
        
        $stmt3 = $bdd->query("select title from movie
        where movie.title='".$search."'");

        $stmt4 = $bdd->query("select * from user
where user.firstname='".$search."' or user.lastname='".$search."'");
$data4 = $stmt4->execute();

$data4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
     

        $data = $stmt->execute();
        $data2 = $stmt2->execute();
        $data3 = $stmt3->execute();
        $data4 = $stmt4->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $data3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $data4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

       


         
    }
    else
    {
        $searchErr = "NO infromation inserted";
    }
    
}
 
?>
<html>
<head>
<title>My cinema</title>
<style>

  <?php include 'style.css' ?>
</style>
</head>
<div class="topnav">
    <h1><u>MyCinéma</u></h1>
    <br/>
    <br/>
</div>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="navbar">
          <ul class="menu">
            <li><input  type="text" class="form-control" name="search" size=50 placeholder="search Your Movie Or Users"><button  type="submit" name="save" class="btn btn-success btn-sm" >SEARCH</button></span></li>
           

            <a href="subcription.php"><li>SUBSCRIPTION</li></a>
            <a href="history.php"><li>HISTORY</li></a>  
            <a href="schedule.php"><li>SCHEDULE</li></a>   
          </ul>
        </div>
<body>

        <div class="form-group">
            <span class="error" style="color:red;"> <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <br/>
    <br/>
    <div class="table-responsive">          
      <table class="table">
    
          <tr>
         <th style="color:white;" >Results :</th>
           </tr>
    

        <div class="data">
                <?php
                
                 if(!$data && !$data2 && !$data3 && !$data4  )
                 {
                    echo '<tr><h2>No data found</h2></tr>';
                 }
                 
                 else{
                   
                    foreach($data as $key=>$value)
                    
                    {
                        ?>
                    <tr>
                         
                        <td style="color:white ;" ><?php echo $value['title'];?></td>
    
                        
        
                    </tr>
                         
                        <?php
                    }
                    foreach($data2 as $key=>$value)
                    
                    {
                        ?>
                    <tr>
                         
                        <td style="color:white ;" ><?php echo $value['title'];?></td>
                    
                    </tr>
                        </div> 
                        <?php
                       
                    }
                    
                    foreach($data3 as $key=>$value)
                    
                    {
                        ?>
                    <tr>
                         
                        <td style="color:white ;" ><?php echo $value['title'];?></td>
                    
                   
                        
        
                    </tr>
                         
                        <?php
                    }
                    foreach($data4 as $key=>$value)
                    
                    {
                        ?>
                    <tr>
                         
                        <td style="color:white ;" ><?php echo $value['email'];?></td>
                        <td style="color:white ;" ><?php echo $value['address'];?></td>
                        <td style="color:white ;" ><?php echo $value['birthdate'];?></td>
                        <td style="color:white ;" ><?php echo $value['zipcode'];?></td>
                        <td style="color:white ;" ><?php echo $value['city'];?></td>
                        <td style="color:white ;" ><?php echo $value['country'];?></td>




                    
                   
                        
        
                    </tr>
                         
                        <?php
                    }
                
                
                 }
               ?>
             
      
      </table>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>