<?php 
	if($this->session->flashdata('msg') !== NULL){
		echo $this->session->flashdata('msg')['content'];
	}
?>
<?= validation_errors('<div class="alert alert-danger" >', '</div>');?>

<!-- Page Content -->
<div class="content">
<section class="section gray-bg">
          <div class="container mt-30 table-responsive">
            <h2>USERS</h2>

            <table class="table table-hover table-bordered" id="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                    </tr>
                </thead>
                <tbody>                      
                    <?php        
                            $output = '';
                            $this->load->database();
                            $conn = mysqli_connect ("localhost","root","","kuguru");
                            $query = "SELECT user_id,first_name,last_name,email,user_type from users";
                            $result = $conn-> query($query);
                                    
                            if ($result -> num_rows > 0)
                            {
                                while ($row = $result-> fetch_assoc())
                                {
                                  echo "<tr><td>". $row["user_id"]. "</td><td>". $row["first_name"]. "</td><td>". $row["last_name"]. "</td><td>". $row["email"]. "</td><td>". $row["user_type"]."</td>";
                                }
                                
                                echo "</table>";
                            }
                            else
                            {
                                echo "0 result";
                            }
                    ?>
                </tbody>
            </table><br><br><br><br><br><br><br><br><br><br><br>

          </div>
        </section>          

</div>
<!-- END Page Content -->