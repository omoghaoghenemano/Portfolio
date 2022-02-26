<?php

if (!empty( $_POST))
 {
     $my_db_conn = new mysqli("localhost", "root", "root", "CyplusMega");
     if (mysqli_connect_errno()) 
     {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
     } 
     
     $sql = "SELECT * FROM infouser WHERE email ='".$_POST["email"]."';";
     $res = mysqli_query($my_db_conn, $sql);

     if(mysqli_affected_rows($my_db_conn) > 0)
     {
           while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) 
           {
               $userid  = $newArray['inforuser'];
               $uemail = $newArray['email'];
               $password = $newArray['infouserpass'];
               $firstname = $newArray['firstname'];
               $lastname = $newArray['lastname'];
       			
              				
           } 
           
           $entered_pword = hash('sha256', $_POST["password"]);
           $nothashed = $_POST["password"];
           mysqli_free_result($res);
           mysqli_close($my_db_conn);

           if ( $entered_pword == $nothashed)
           {
               $_SESSION["user_id"] = $userid;
               $_SESSION["username"]=$uname;
               $_SESSION["password"]=$password;
             	
               header('Location:mainpage.php');
           }
           else
           {
             echo "<p> Wrong Password";
           
           }
     }
     else
     {	  
           echo "<p>No such user !!!</p>";
           mysqli_free_result($res);
           mysqli_close($my_db_conn);
          
     }  
 }
?>