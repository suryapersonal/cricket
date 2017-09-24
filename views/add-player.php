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
                <!-- <div class='col-sm-6 col-xs-12 add-player-season-column hidden-groups'>
                    <h2>Season 1</h2>
                </div>
                <div class='col-sm-6 col-xs-12 add-player-season-column hidden-groups'>
                    <h2>Season 2</h2>
                </div> -->

                <div class='batting-style-sec hidden-groups col-sm-12'>
                	<div class='form-group'>
                        <label class='add-label'>Batting style:</label>
                        <select name='batting-style' id='batting-style' class='enter-data'>                    	
                            <option value='' selected>Select</option>
                            <option value='Left handed' selected>Left handed</option>
                            <option value='Right handed' selected>Right handed</option>
                        </select>
                    </div>
                    <div class='col-sm-6 col-xs-12 add-player-season-column'>
                        <h2>Season 1</h2>
                        <div class='form-group stat-row'>
                        	<h4 class='input-title'>Batting stats</h4>
                            <div class='col-sm-6'>
                            	<label>Matches</label>
                                <input type='text' name='match-value-1' id='match-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>INNS</label>
                                <input type='text' name='inns-value-1' id='inns-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Not-Out</label>
                                <input type='text' name='not-out-value-1' id='not-out-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Batting Runs</label>
                                <input type='text' name='batting-runs-value-1' id='batting-runs-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Bowls</label>
                                <input type='text' name='bowls-value-batsman-1' id='bowls-value-batsman-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Strike Rate</label>
                                <input type='text' name='strike-rate-value-1' id='strike-rate-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Bat Average</label>
                                <input type='text' name='bat-average-value-1' id='bat-average-value-1' class='enter-data' readonly>
                            </div>
                            <div class='col-sm-6'>
                            	<label>4's</label>
                                <input type='text' name='fours-value-1' id='fours-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>6's</label>
                                <input type='text' name='sixs-value-1' id='sixs-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>50's</label>
                                <input type='text' name='fiftys-value-1' id='fiftys-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Century </label>
                                <input type='text' name='centuary-value-1' id='centuary-value-1' class='enter-data' value='0'>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 col-xs-12 add-player-season-column'>
                        <h2>Season 2</h2>
                        <div class='form-group stat-row'>
                            <h4 class='input-title'>Batting stats</h4>
                            <div class='col-sm-6'>
                                <label>Matches</label>
                                <input type='text' name='match-value-2' id='match-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>INNS</label>
                                <input type='text' name='inns-value-2' id='inns-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Not-Out</label>
                                <input type='text' name='not-out-value-2' id='not-out-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Batting Runs</label>
                                <input type='text' name='batting-runs-value-2' id='batting-runs-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Bowls</label>
                                <input type='text' name='bowls-value-batsman-2' id='bowls-value-batsman-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Strike Rate</label>
                                <input type='text' name='strike-rate-value-2' id='strike-rate-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Bat Average</label>
                                <input type='text' name='bat-average-value-2' id='bat-average-value-2' class='enter-data' readonly>
                            </div>
                            <div class='col-sm-6'>
                                <label>4's</label>
                                <input type='text' name='fours-value-2' id='fours-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>6's</label>
                                <input type='text' name='sixs-value-2' id='sixs-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>50's</label>
                                <input type='text' name='fiftys-value-2' id='fiftys-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Century </label>
                                <input type='text' name='centuary-value-2' id='centuary-value-2' class='enter-data' value='0'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='bowling-type-sec hidden-groups col-sm-12'>
                	<div class='form-group'>
                        <label class='add-label'>Bowling Type:</label>
                        <select name='bowling-type-1' id='bowling-type-1' class='enter-data'>                	
                            <option value='Right Arm Fast'>Right Arm Fast</option>
                            <option value='Left Arm Fast'>Left Arm Fast</option>
                            <option value='Right Arm Medium'>Right Arm Medium</option>
                            <option value='Left Arm Medium'>Left Arm Medium</option>
                            <option value='Right Arm Spin'>Right Arm Spin</option>
                            <option value='Left Arm Spin'>Left Arm Spin</option>
                        </select>
                    </div>
                    <div class='col-sm-6 col-xs-12 add-player-season-column'>
                        <h2>Season 1</h2>
                        <div class='form-group stat-row'>                            
                            <h4 class='input-title'>Bowling stats</h4>
                            <div class='col-sm-6'>
                            	<label>Matches</label>
                                <input type='text' name='match-value-bowling-1' id='match-value-bowling-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Overs</label>
                                <input type='text' name='over-value-1' id='over-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Bowling Runs</label>
                                <input type='text' name='bowling-run-value-1' id='bowling-run-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Batting Runs</label>
                                <input type='text' name='batting-runs-value-bowler-1' id='batting-runs-value-bowler-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Wickets</label>
                                <input type='text' name='wicket-value-1' id='wicket-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Bow/Avl</label>
                                <input type='text' name='bow-avl-value-1' id='bow-avl-value-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>ECO</label>
                                <input type='text' name='eco-value-1' id='eco-value-1' class='enter-data' value='0'>
                            </div>                       
                        </div>
                    </div>
                    <div class='col-sm-6 col-xs-12 add-player-season-column'>
                        <h2>Season 2</h2>
                        <div class='form-group stat-row'>                            
                            <h4 class='input-title'>Bowling stats</h4>
                            <div class='col-sm-6'>
                                <label>Matches</label>
                                <input type='text' name='match-value-bowling-2' id='match-value-bowling-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Overs</label>
                                <input type='text' name='over-value-2' id='over-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Bowling Runs</label>
                                <input type='text' name='bowling-run-value-2' id='bowling-run-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Batting Runs</label>
                                <input type='text' name='batting-runs-value-bowler-2' id='batting-runs-value-bowler-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Wickets</label>
                                <input type='text' name='wicket-value-2' id='wicket-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Bow/Avl</label>
                                <input type='text' name='bow-avl-value-2' id='bow-avl-value-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>ECO</label>
                                <input type='text' name='eco-value-2' id='eco-value-2' class='enter-data' value='0'>
                            </div>                       
                        </div>
                    </div>
                </div>
                <div class='col-sm-6 col-xs-12 add-player-season-column'>
                    <div class='wicket-stat-sec hidden-groups col-sm-12'>               	<h2>Season 1</h2>
                        <div class='form-group stat-row'>
                        	<h4 class='input-title'>Wicket Stats</h4>
                            <div class='col-sm-6'>
                            	<label>Matches</label>
                                <input type='text' name='match-value-wicket-1' id='match-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>INNS</label>
                                <input type='text' name='inns-value-wicket-1' id='inns-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Not-Out</label>
                                <input type='text' name='not-out-value-wicket-1' id='not-out-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Batting Runs</label>
                                <input type='text' name='batting-runs-value-wicket-1' id='batting-runs-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Bowls</label>
                                <input type='text' name='bowls-value-wicket-1' id='bowls-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Strike Rate</label>
                                <input type='text' name='strike-rate-value-wicket-1' id='strike-rate-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Bat Average</label>
                                <input type='text' name='bat-average-value-wicket-1' id='bat-average-value-wicket-1' class='enter-data' value='0' readonly>
                            </div>
                            <div class='col-sm-6'>
                            	<label>4's</label>
                                <input type='text' name='fours-value-wicket-1' id='fours-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>6's</label>
                                <input type='text' name='sixs-value-wicket-1' id='sixs-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>50's</label>
                                <input type='text' name='fiftys-value-wicket-1' id='fiftys-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Century </label>
                                <input type='text' name='centuary-value-wicket-1' id='centuary-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Stumping</label>
                                <input type='text' name='stump-value-wicket-1' id='stump-value-wicket-1' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                            	<label>Catches </label>
                                <input type='text' name='catch-value-wicket-1' id='catch-value-wicket-1' class='enter-data' value='0'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-6 col-xs-12 add-player-season-column'>
                    <div class='wicket-stat-sec hidden-groups col-sm-12'>    
                    <h2>Season 2</h2>             
                        <div class='form-group stat-row'>
                            <h4 class='input-title'>Wicket Stats</h4>
                            <div class='col-sm-6'>
                                <label>Matches</label>
                                <input type='text' name='match-value-wicket-2' id='match-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>INNS</label>
                                <input type='text' name='inns-value-wicket-2' id='inns-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Not-Out</label>
                                <input type='text' name='not-out-value-wicket-2' id='not-out-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Batting Runs</label>
                                <input type='text' name='batting-runs-value-wicket-2' id='batting-runs-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Bowls</label>
                                <input type='text' name='bowls-value-wicket-2' id='bowls-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Strike Rate</label>
                                <input type='text' name='strike-rate-value-wicket-2' id='strike-rate-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Bat Average</label>
                                <input type='text' name='bat-average-value-wicket-2' id='bat-average-value-wicket-2' class='enter-data' value='0' readonly>
                            </div>
                            <div class='col-sm-6'>
                                <label>4's</label>
                                <input type='text' name='fours-value-wicket-2' id='fours-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>6's</label>
                                <input type='text' name='sixs-value-wicket-2' id='sixs-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>50's</label>
                                <input type='text' name='fiftys-value-wicket-2' id='fiftys-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Century </label>
                                <input type='text' name='centuary-value-wicket-2' id='centuary-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Stumping</label>
                                <input type='text' name='stump-value-wicket-2' id='stump-value-wicket-2' class='enter-data' value='0'>
                            </div>
                            <div class='col-sm-6'>
                                <label>Catches </label>
                                <input type='text' name='catch-value-wicket-2' id='catch-value-wicket-2' class='enter-data' value='0'>
                            </div>
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
