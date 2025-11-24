<form class="form-inline my-2 my-lg-0">
       	<!-- <button class="btn btn-outline-success">Welecome Manager</button> -->
         <!-- 👤 Round Profile Image -->
         <!-- <img src="<?php echo $userData['profile']; ?>" 
         alt="Profile" 
         class="rounded-circle mr-2" 
         style="width: 40px; height: 40px; object-fit: cover; border: 2px solid #28a745;"> -->
         <!-- 👤 Clickable Profile Image + Name -->
        <a href="manager_profile.php" class="d-flex align-items-center text-decoration-none">
          <img src="<?php echo $userData['profile'] ?? 'images/mprofile.jpg'; ?>" 
             alt="Profile" 
             class="rounded-circle mr-2" 
             style="width: 40px; height: 40px; object-fit: cover; border: 2px solid #28a745;">
        </a>




        <a href="logout.php" data-toggle="tooltip" title="Logout" class="btn btn-outline-danger mx-1" ><i class="fa fa-sign-out fa-fw"></i></a>    
</form>