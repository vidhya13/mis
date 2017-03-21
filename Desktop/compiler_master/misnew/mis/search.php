<?php
//include('connect-db.php');
$connection = mysqli_connect('localhost','root','','cc_db');
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
    $strSQL_Result = mysqli_query($connection,"select id,username,email from cc_users where username like '%$q%' or email like '%$q%' order by id LIMIT 5");
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $username   = $row['username'];
        $email      = $row['email'];
        $b_username = '<strong>'.$q.'</strong>';
        $b_email    = '<strong>'.$q.'</strong>';
        $final_username = str_ireplace($q, $b_username, $username);
        $final_email = str_ireplace($q, $b_email, $email);
        ?>
            <div class="show" align="left">
				
                <span class="name"><?php echo $final_username; ?></span>&nbsp;<br/>
				<?php echo "<a href=$row[email]>"?> <?php echo $final_email; ?><br/>
            </div>
        <?php
    }
}

?>
