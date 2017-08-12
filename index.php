<?php include('views/header.php'); ?>
	<div class='main-content'>
    	<section class='inner-container'>
        	<?php 
			if(isset($_COOKIE['login_user']) && $_COOKIE['login_user'] == 'admin') { ?>
            	
                <div class='login-container'>
                    <h3 class='box-title'>
                        Admin
                    </h3>
                    <span>Admin is logined now. Click button to logout.</span>
                    <form method='post' action='controller/controller.php' name='login-form' id='login-form'>                     
                        <input type='submit' name='logout-submit' id='logout-submit' class='add-data-btn login-btn' value='Logout'>
                    </form>                
                </div>
            <?php } else { ?>
            	<div class='login-container'>
                    <h3 class='box-title'>
                        Sign In
                    </h3>                    
                    <form method='post' action='controller/controller.php' name='login-form' id='login-form'>
                        <?php 
                            if (isset($_REQUEST['login'])) {
                                if ($_REQUEST['login'] == 'failed') { 
                        ?>
                                    <span class="error-msg">Invalid login</span>
                        <?php
                                }
                            }                        
                        ?>
                        <input type='text' name='uname' id='unamee' class='enter-data login-ip' placeholder='User Name'>
                        <input type='password' name='password' id='password' class='enter-data login-ip' placeholder='Password'>
                        <input type='submit' name='login-submit' id='login-submit' class='add-data-btn login-btn' value='Login'>
                    </form>                
                </div>
			<?php } ?>
            <div class='mocc-intro'>
            	<div class='mocc-details'>
                	<h1 class='mocc-head'>Introduction</h1>
                    <p class='mocc-description'>
                    	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec est nulla, imperdiet in arcu vitae,
                        consectetur elementum mi. Pellentesque vitae arcu ornare, sagittis enim sed, rutrum dolor. Donec 
                        euismod dui ac auctor sagittis. Pellentesque sit amet porttitor arcu. Pellentesque gravida mauris 
                        orci, eget ullamcorper eros lacinia vitae. Aenean sollicitudin lacus nec ipsum sagittis, non 
                        malesuada mauris iaculis. Aenean in eros neque. Quisque vulputate luctus pharetra. Aliquam lobortis, 
                        mi sed molestie lacinia, lacus ex condimentum urna, id ultrices est nunc nec nisi. Sed tempor 
                        tincidunt arcu sit amet pharetra. Proin luctus felis lectus, at feugiat quam facilisis in. Nulla 
                        facilisi.
					</p>
                </div>
                <div class='mocc-pic'>
                	<div class='col-sm-4'>
                    	<img src='assets/images/mocc-pic1.jpg' class='mocc-image'>
                    </div>                	
                    <div class='col-sm-4'>
                    	<img src='assets/images/mocc-pic2.jpg' class='mocc-image'>
                    </div>                    
                    <div class='col-sm-4'>
                    	<img src='assets/images/mocc-pic3.jpg' class='mocc-image'>
                    </div>                   
                </div>
            </div>
        </section>
    </div>
<?php include('views/footer.php'); ?>
<script type="text/javascript">
	$('.home-link').addClass('current-page');
</script>
