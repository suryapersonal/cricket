<?php include_once('header.php'); ?>
	<div class='main-content'>
    	<section class='inner-container'>        	
        	<form action='../controller/controller.php' method='post' name='form-player-type' id='form-player-type'>
                 <?php  
                        if (isset($_REQUEST['success'])) {
                            $resultStatus = $_REQUEST['success'];
                            if($resultStatus == 1) { 
                    ?>
                                <span class="success-msg">Player Type was successfully added</span>
                    <?php   
                            } else {
                    ?>
                                <span class="error-msg">Adding Failed. Try again later</span>
                    <?php 

                            }
                            

                        }
                    ?>
            	<div class='form-group'>
                	<label>Add Player Type:</label>
                    <input type='text' name='player-type' id='player-type' class='enter-data' placeholder='Player Type'>
                </div>
                <div class='btn-wrapper'>                   
                	<input type='submit' name='player-type-submit' id='player-type-submit' class='add-data-btn' value='Add'>
                </div>
            </form>
        </section>
    </div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('.add-player-type-link').addClass('current-page');
</script>
