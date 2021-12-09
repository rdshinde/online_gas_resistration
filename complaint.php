<?php
include_once 'public/base.php'
?>


<div class="container px-lg-2 my-5">
  <div class="p-1 p-lg-2 rounded-3">
    <h1 class="display-5 text-center">Customer Complaints</h1>
    <div class="m-1 m-lg-1">
      <section>
        <div
          class="
            container
            table-responsive
            shadow
            p-3
            rounded
            border
            col-lg-6 col-xxl-12 col-centered
            text-center
          "
        >
          <table class="table table-hover p-3">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th> 
                <th scope="col">Consumer ID</th> 
                <th scope="col">Customer Name</th> 
                <th scope="col">Complaint ID</th> 
                <th scope="col">Complaint Details</th> 
                <th scope="col">Status</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                    <?php
                    include_once 'includes/dbh.inc.php';
                    include_once 'includes/functions.inc.php';

                    
                    if(isset($_GET["complaint"])){
                        $id = $_GET["complaint"];
                        
                        $query = "SELECT * FROM Complaints WHERE consumer_id=$id"; 
                        $results = mysqli_query($conn,$query);
                        $resultCheck = mysqli_num_rows($results);
                        
                        if($resultCheck >0){
                        
                        $sr = 1;
                        while($row = mysqli_fetch_assoc($results)){
                            $userInfo = userData($conn , $id);
                            $name = $userInfo["consumer_name"];
                            $complaint = $row["complaint_details"];
                            $bookingID = $row["booking_id"];
                            $complaintID = $row["complaint_id"];
                            $status = $row["complaint_status"];
                            echo '
                            <th>'.$sr.'</th>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$complaintID.'</td>
                            <td>'.$complaint.'</td>
                            <td>'.$status.'</td>
                          </tr>
                          
                                    ';
                        $sr = $sr+1;
                        }
                        
                        }

                    }

                    ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>
<?php
    include_once 'public/footer.php';
?>
