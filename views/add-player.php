<?php 
	include_once('header.php'); 
	include_once('../controller/controller.php');
?>
 
	<div class='main-content'>
    	<section class='inner-container add-player-sec'>        	
        	<form action='../controller/controller.php' enctype="multipart/form-data"  method='post' name='form-add-player' id='form-add-player'>
                <?php  
                        if (isset($_REQUEST['success'])) {
                            $resultStatus = $_REQUEST['success'];
                            if($resultStatus == 1) { 
                    ?>
                                <span class="success-msg">Player was successfully added</span>
                    <?php   
                            } else {
                    ?>
                                <span class="error-msg">Adding Failed. Try again later</span>
                    <?php 

                            }
                            

                        }
                    ?>
                <span class="validation-error-msg"></span>
            	<div class='form-group'>
                	<label class='add-label'>Player Name:</label>
                    <input type='text' name='player-name' id='player-name' class='enter-data' placeholder='Player Name'>
                </div>
                <div class='form-group'>
                	<label class='add-label'>Player Type:</label>
                    <select name='player-type' id='player-type' class='enter-data'>
                    	<option value='' selected>Select</option>                   	
                        <?php
							$playerTypes = getPlayerTypeOptions();
							 foreach ($playerTypes as $value) {
								echo '<option value="'.$value.'">'.$value.'</option>';
							 }
						?>
                    </select>
                </div>
                <div class='batting-style-sec hidden-groups col-sm-12'>
                	<div class='form-group'>
                        <label class='add-label'>Batting style:</label>
                        <select name='batting-style' id='batting-style' class='enter-data'>                    	
                            <option value='' selected>Select</option>
                            <option value='Left handed' selected>Left handed</option>
                            <option value='Right handed' selected>Right handed</option>
                        </select>
                    </div>
                    <div class='form-group stat-row'>
                    	<h4 class='input-title'>Batting stats</h4>
                        <div class='col-sm-3'>
                        	<label>Matches</label>
                            <input type='text' name='match-value' id='match-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>INNS</label>
                            <input type='text' name='inns-value' id='inns-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Not-Out</label>
                            <input type='text' name='not-out-value' id='not-out-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Batting Runs</label>
                            <input type='text' name='batting-runs-value' id='batting-runs-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Bowls</label>
                            <input type='text' name='bowls-value-batsman' id='bowls-value-batsman' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Strike Rate</label>
                            <input type='text' name='strike-rate-value' id='strike-rate-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Bat Average</label>
                            <input type='text' name='bat-average-value' id='bat-average-value' class='enter-data' readonly>
                        </div>
                        <div class='col-sm-3'>
                        	<label>4's</label>
                            <input type='text' name='fours-value' id='fours-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>6's</label>
                            <input type='text' name='sixs-value' id='sixs-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>50's</label>
                            <input type='text' name='fiftys-value' id='fiftys-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Century </label>
                            <input type='text' name='centuary-value' id='centuary-value' class='enter-data' value='0'>
                        </div>
                    </div>
                </div>
                <div class='bowling-type-sec hidden-groups col-sm-12'>
                	<div class='form-group'>
                        <label class='add-label'>Bowling Type:</label>
                        <select name='bowling-type' id='bowling-type' class='enter-data'>                    	
                            <option value='' selected>Select</option>
                            <option value='Right Arm Fast'>Right Arm Fast</option>
                            <option value='Left Arm Fast'>Left Arm Fast</option>
                            <option value='Right Arm Medium'>Right Arm Medium</option>
                            <option value='Left Arm Medium'>Left Arm Medium</option>
                            <option value='Right Arm Spin'>Right Arm Spin</option>
                            <option value='Left Arm Spin'>Left Arm Spin</option>
                        </select>
                    </div>
                    <div class='form-group stat-row'>
                        <h4 class='input-title'>Bowling stats</h4>
                        <div class='col-sm-3'>
                        	<label>Matches</label>
                            <input type='text' name='match-value-bowling' id='match-value-bowling' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Overs</label>
                            <input type='text' name='over-value' id='over-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Bowling Runs</label>
                            <input type='text' name='bowling-run-value' id='bowling-run-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Batting Runs</label>
                            <input type='text' name='batting-runs-value-bowler' id='batting-runs-value-bowler' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Wickets</label>
                            <input type='text' name='wicket-value' id='wicket-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Bow/Avl</label>
                            <input type='text' name='bow-avl-value' id='bow-avl-value' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>ECO</label>
                            <input type='text' name='eco-value' id='eco-value' class='enter-data' value='0'>
                        </div>                       
                    </div>
                </div>
                <div class='wicket-stat-sec hidden-groups col-sm-12'>                	
                    <div class='form-group stat-row'>
                    	<h4 class='input-title'>Wicket Stats</h4>
                        <div class='col-sm-3'>
                        	<label>Matches</label>
                            <input type='text' name='match-value-wicket' id='match-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>INNS</label>
                            <input type='text' name='inns-value-wicket' id='inns-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Not-Out</label>
                            <input type='text' name='not-out-value-wicket' id='not-out-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Batting Runs</label>
                            <input type='text' name='batting-runs-value-wicket' id='batting-runs-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Bowls</label>
                            <input type='text' name='bowls-value-wicket' id='bowls-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Strike Rate</label>
                            <input type='text' name='strike-rate-value-wicket' id='strike-rate-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Bat Average</label>
                            <input type='text' name='bat-average-value-wicket' id='bat-average-value-wicket' class='enter-data' value='0' readonly>
                        </div>
                        <div class='col-sm-3'>
                        	<label>4's</label>
                            <input type='text' name='fours-value-wicket' id='fours-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>6's</label>
                            <input type='text' name='sixs-value-wicket' id='sixs-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>50's</label>
                            <input type='text' name='fiftys-value-wicket' id='fiftys-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Century </label>
                            <input type='text' name='centuary-value-wicket' id='centuary-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Stumping</label>
                            <input type='text' name='stump-value-wicket' id='stump-value-wicket' class='enter-data' value='0'>
                        </div>
                        <div class='col-sm-3'>
                        	<label>Catches </label>
                            <input type='text' name='catch-value-wicket' id='catch-value-wicket' class='enter-data' value='0'>
                        </div>
                    </div>
                </div>
                <div class='form-group col-sm-12'>
                	<label class='add-label'>Upload Photo:</label>
                	<input type='file' name='photo-upload' id='photo-upload'>
                </div>             
                <div class='btn-wrapper col-sm-12'>
                	<input type='submit' name='add-player-submit' id='add-player-submit' class='add-data-btn' value='Add'>
                </div>
            </form>
        </section>
    </div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('.add-player-link').addClass('current-page');
</script>
