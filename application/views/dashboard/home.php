<section class="section gray-bg">
          <div class="container mt-30 table-responsive">
          <a href=<?= base_url('auth/logout');?> class="pull-right"> Logout ||</a>
          <a href=<?= base_url('auth/create_account');?> class="pull-right">|| Add Admins ||</a>



            <h2>ORDERS RECEIVED</h2>

            <table class="table table-hover table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Product</th>
                        <th>Number of Crates</th>
                        <th>Collection Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>                      
                    <?php        
                            $output = '';
                            $this->load->database();
                            $conn = mysqli_connect ("localhost","root","","kuguru");
                            $query = "SELECT * from orders";
                            $result = $conn-> query($query);
                                    
                            if ($result -> num_rows > 0)
                            {
                                while ($row = $result-> fetch_assoc())
                                {
                                  echo "<tr><td>". $row["Order_id"]. "</td><td>". $row["Name"]. "</td><td>". $row["Email"]. "</td><td>". $row["Product"]. "</td><td>". $row["Quantity"]."</td><td>". $row["Collection_date"]. "</td><td>Completed</td>";
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
