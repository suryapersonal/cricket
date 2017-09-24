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
                        Cricket originated in England hundreds of years ago but is now played across the world. It’s one of the world’s most popular sports, especially in countries like India, Australia, Pakistan and South Africa. It’s played mainly on a cricket field but it can be played in parks or even on the beach.

                        Some people see cricket as a relaxing hobby, others play it competitively at club, county or international level.
                        
                        Cricket is something one can neither associate nor dissociate with, because it is a game of utmost team spirit. Playing cricket on a ship’s deck is one unique experience.
                        
                        Gentleman Mariners around Kochi come together to play the gentleman's game. We seek to bring mariners together socially while keeping fit and having fun.
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
