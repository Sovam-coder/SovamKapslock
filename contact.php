<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $sub=$_POST['sub'];
    $message=$_POST['message'];
    
   
    
    
    $con=mysqli_connect('localhost','root','','kapslock');
    if($con==false)
    {
        echo "Error in database connection!!";
    }
    else{
        $select="SELECT * FROM `contact` WHERE `email`='$emailid'";
        $result=mysqli_query($con,$select);
        $num=mysqli_num_rows($result);
        if($num>0)
        {
            ?>
            <script> alert("Emailid already exists! Register with different email");
            window.open('contact.html','_self');</script>
            <?php
            
        }
        else{
            $insert="INSERT INTO `contact`(`name`, `email`,`sub`,`message` ) VALUES ('$name','$email','$sub','$message')";
            $row=mysqli_query($con,$insert);
            if($row==true)
            {
            ?>
                <script> alert("Message Placed We ComeBack Shortly");
                window.open('index.html','_self');</script>
            <?php
            }
            else{
                echo "error";
            }
        }
    }
        
}
?>
    