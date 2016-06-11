  <?php $this->load->view('shared/user_nav');?>

<div class="login_text">
    <h2>Welcome To Our Perfume Shop User Login Panel</h2>
    <h1>Thanks For Login In our Website</h1>


<div class="clear"></div>
        <table width="500px" style="padding:15px 0;">
            <tr>
                <th>Your Name:</th>
                <td><?if($info['user_first_name']!=''){echo $info['user_first_name'].' '.$info['user_last_name'];}else{echo "Not Available";}?></td>

            </tr>

            <tr>
                <th>Email:</th>
                <td><?if($info['user_email']!=''){echo $info['user_email'];}else{echo "Not Available";}?></td>

            </tr>

            <tr>
                <th>Phone No:</th>
                <td><?if($info['phone_no']!=''){echo $info['phone_no'];}else{echo "Not Available";}?></td>

            </tr>

             <tr>
                <th>Address:</th>
                <td><?if($info['address']!=''){echo $info['address'];}else{echo "Not Available";}?></td>

             </tr>
                
            <tr>
                <th>Post Code:</th>
                <td><?if($info['post_code']!=''){echo $info['post_code'];}else{echo "Not Available";}?></td>

            </tr>

            <tr>
                <th>Country:</th>
                <td><?if($info['country']!=''){echo $info['country'];}else{echo "Not Available";}?></td>

            </tr>

        
        </table>


</div>