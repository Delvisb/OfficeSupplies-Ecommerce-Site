<?php 
    $query = "SELECT * FROM Customer WHERE userid = '" .$_SESSION['userId']. "'";
    $result = mysqli_query($dbConnect, $query);
    if ($result->num_rows > 0){
    	while ($row = mysqli_fetch_assoc($result)){
           $accountInfo = "<table>
                <tr>
                <td>
                Email: 
                </td>
                <td>
                ". $row['email']."
                </td>
                </tr>
                <tr>
                <td>
                Username: 
                </td>
                <td>
                ". $row['username']."
                </td>
            	</tr>
            	<td>
                Name: 
                </td>
                <td>
                ". $row['fName']. " ". $row['lName']."
                </td>
            	</tr>
            	<tr>
                <td>
                Address: 
                </td>
                <td>
                ". $row['address']. $row['aptNum'].  "
                 </td>
                </tr>
            	<tr>
                <td>
                City: 
               </td>
                <td>
                ". $row['city']."
                </td>
            	 </tr>
			    <tr>
    			    <td>
    			        Zip Code: 
    			     </td>
    			     <td>
    			        ". $row['zipCode']."
    			     </td>
			    </tr>
			    <tr>
    			    <td>
    			        State: 
    			     </td>
    			     <td>
    			        ". $row['state']."
    			     </td>
			    </tr>
			    <tr>
    			    <td>
    			        Country: 
    			     </td>
    			     <td>
    			        ". $row['country']."
    			     </td>
			    </tr>
                </table";                			   
                }
            }
            $result->free(); 
            $db->close();
?>