<?php 
	include_once('header.php');
	include_once('../controller/controller.php');
?>
	<div class='main-content'>
    	<section class='inner-container'>        	
        	<form action='../controller/controller.php' method='post' name='form-add-match' id='form-add-match'>
            <span class="validation-error-msg"></span>
              <div class='match-details-sec'>                
            	<div class='form-group'>
                	<label>Match No.:<span class='required'>*</span></label>
                    <select name='match-number' id='match-number' class='enter-data'>
                    	<option value='' selected>Select</option>                   	
                        <option value='One'>One</option>
                        <option value='Two'>Two</option>
                        <option value='Three'>Three</option>
                        <option value='Four'>Four</option>
                        <option value='Five'>Five</option>
                    </select>
                </div>
                <div class='form-group'>
                	<label>Game Type:<span class='required'>*</span></label>
                    <select name='game-type' id='game-type' class='enter-data'>
                    	<option value='' selected>Select</option>                   	
                        <option value='Super Saturday'>Super Saturday</option>
                        <option value='Friendly'>Friendly</option>
                        <option value='Tournament'>Tournament</option>
                        <option value='Big Bash'>Big Bash</option>
                    </select>
                </div>
                <div class='form-group'>
                	<label>Date:<span class='required'>*</span></label>
                    <input type='text' name='match-date' id='match-date' class='enter-data' placeholder='Select Date' readonly>
                </div>
                <div class='form-group'>
                	<label class='time-label'>Time:<span class='required'>*</span></label>
                    <select name='match-time-hh' id='match-time-hh' class='enter-data time-drop'>                        
                        <?php for ($i = 1; $i <= 12; $i++) : ?>
       						<option value="<?php echo $i; ?>">
         						<?php echo sprintf("%02d", $i); ?>
       						</option>
						<?php endfor; ?>
                    </select>
                     <select name='match-time-min' id='match-time-min' class='enter-data time-drop'>
                        <?php for ($i = 0; $i <= 59; $i++) : ?>
       						<option value="<?php echo $i; ?>">
         						<?php echo sprintf("%02d", $i); ?>
       						</option>
						<?php endfor; ?>
                    </select>
                    <select name='match-time-md' id='match-time-md' class='enter-data time-drop'>
                    	<option value='AM' selected>AM</option>
                        <option value='PM' selected>PM</option>
                    </select>
                    <input type='hidden' name='match-time' id='match-time' class='enter-data' placeholder='Select Time' readonly>
                </div>
                <div class='form-group'>
                	<label>Venue:<span class='required'>*</span></label>
                    <input type='text' name='match-venue' id='match-venue' class='enter-data' placeholder='Venue'>
                </div>
                <div class='form-group'>
                	<label>First Team:<span class='required'>*</span></label>
                    <input type='text' name='match-first-team' id='match-first-team' class='enter-data' placeholder='Team Name'>
                </div>
                <div class='form-group'>
                	<label>Second Team:<span class='required'>*</span></label>
                    <input type='text' name='match-second-team' id='match-second-team' class='enter-data' placeholder='Team Name'>
                </div>
                <div class='btn-wrapper'>
                	<button name='match-add-team-next' id='match-add-team-next' class='add-data-btn'>Add Team Details</button>
                </div>
                <div class='form-group'>
                	<label>Result:<span class='required'>*</span></label>
                    <input type='text' name='match-result' id='match-result' class='enter-data' placeholder='Enter Winner Team Name'>
                </div>
                <div class='btn-wrapper'>
                	<input type='submit' name='match-submit' id='match-submit' class='add-data-btn' value='Save'>
                </div>               
              </div>
              <div class='team-details-sec hidden-groups'>
              	<div class='col-sm-6 first-team-sec'>
                	<div class='form-group'>
                        <label>First Team:</label>
                        <input type='text' name='details-first-team' id='details-first-team' class='enter-data' placeholder='Team Name'>
                    </div>
                    <div class='form-group'>
                        <h5 class='sub-title'>Add Player</h5>
                    </div>
                    <?php
					   for ($i = 1; $i <= 15; $i++) {
					?>
                        <div class='team-player-list' id='fisrt-team-player-<?php echo $i;?>'>  
                            <h6 class='team-player-title'>Details of Player-<?php echo $i;?></h6>                
                            <div class='form-group'>
                                <label class='add-label'>Player Name:</label>
                                <input type='text' name='first-team-player-name-<?php echo $i;?>' id='first-team-player-name-<?php echo $i;?>' class='enter-data player-name-ip' placeholder='Player Name' list='player-names'>
                            </div>
                            <div class='form-group'>
                                <label class='add-label'>Player Type:</label>
                                <select name='first-team-player-type-<?php echo $i;?>' id='first-team-player-type-<?php echo $i;?>' class='enter-data player-type-selection'>
                                    <option value='' selected>Select</option>                   	
                                    <?php
                                        $playerTypes = getPlayerTypeOptions();
                                         foreach ($playerTypes as $value) {
                                             echo '<option value="'.$value.'">'.$value.'</option>';
                                         }
                                    ?>
                                </select>
                            </div>
                            <div class='form-group stat-row batting-stats hidden-groups'>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Batting Runs</label>
                                    <input type='text' name='first-team-bat-run-<?php echo $i;?>' id='first-team-bat-run-<?php echo $i;?>' class='enter-data batting-runs' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Balls</label>
                                    <input type='text' name='first-team-balls-<?php echo $i;?>' id='first-team-balls-<?php echo $i;?>' class='enter-data balls-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Strike Rate</label>
                                    <input type='text' name='first-team-strikerate-<?php echo $i;?>' id='first-team-strikerate-<?php echo $i;?>' class='enter-data strike-rate' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>4's</label>
                                    <input type='text' name='first-team-fours-<?php echo $i;?>' id='first-team-fours-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>6's</label>
                                    <input type='text' name='first-team-sixs-<?php echo $i;?>' id='first-team-sixs-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>50's</label>
                                    <input type='text' name='first-team-fiftys-<?php echo $i;?>' id='first-team-fours-<?php echo $i;?>' class='enter-data fiftys-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Centuries</label>
                                    <input type='text' name='first-team-centuries-<?php echo $i;?>' id='first-team-centuries-<?php echo $i;?>' class='enter-data centuries-ip' value='0'>
                                </div>                       
                            </div>
                            <div class='form-group stat-row bawling-stats hidden-groups'>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Overs</label>
                                    <input type='text' name='first-team-overs-<?php echo $i;?>' id='first-team-overs-<?php echo $i;?>' class='enter-data over-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Bowling Runs</label>
                          			<input type='text' name='first-team-bowling-runs-<?php echo $i;?>' id='first-team-bowling-runs-<?php echo $i;?>' class='enter-data bowling-run-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Maiden</label>
                                    <input type='text' name='first-team-maiden-<?php echo $i;?>' id='first-team-maiden-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Wicket</label>
                                    <input type='text' name='first-team-wicket-<?php echo $i;?>' id='first-team-wicket-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Eco</label>
                                    <input type='text' name='first-team-eco-<?php echo $i;?>' id='first-team-eco-<?php echo $i;?>' class='enter-data eco-ip' value='0'>
                                </div>                                              
                            </div>
                            <div class='form-group stat-row wicket-stats hidden-groups'>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Batting Runs</label>
                                    <input type='text' name='first-team-wicket-bat-run-<?php echo $i;?>' id='first-team-wicket-bat-run-<?php echo $i;?>' class='enter-data batting-runs' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Balls</label>
                                    <input type='text' name='first-team-wicket-balls-<?php echo $i;?>' id='first-team-wicket-balls-<?php echo $i;?>' class='enter-data balls-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Strike Rate</label>
                                    <input type='text' name='first-team-wicket-strikerate-<?php echo $i;?>' id='first-team-wicket-strikerate-<?php echo $i;?>' class='enter-data strike-rate' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>4's</label>
                                    <input type='text' name='first-team-wicket-fours-<?php echo $i;?>' id='first-team-wicket-fours-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>6's</label>
                                    <input type='text' name='first-team-wicket-sixs-<?php echo $i;?>' id='first-team-wicket-sixs-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>50's</label>
                                    <input type='text' name='first-team-wicket-fiftys-<?php echo $i;?>' id='first-team-wicket-fiftys-<?php echo $i;?>' class='enter-data fiftys-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Centuries</label>
                                    <input type='text' name='first-team-wicket-centuries-<?php echo $i;?>' id='first-team-wicket-centuries-<?php echo $i;?>' class='enter-data centuries-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Stumping</label>
                                    <input type='text' name='first-team-wicket-stumping-<?php echo $i;?>' id='first-team-wicket-stumping-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Catches</label>
                                    <input type='text' name='first-team-wicket-catches-<?php echo $i;?>' id='first-team-wicket-catches-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>                     
                            </div>
                            <div><button class='add-next-player-btn'>Add Next Player</button></div>                            
                    	</div>
                    <?php } ?>                            
                </div>
                <div class='col-sm-6 second-team-sec'>
                	<div class='form-group'>
                        <label>Second Team:</label>
                        <input type='text' name='details-second-team' id='details-second-team' class='enter-data' placeholder='Team Name'>
                    </div>
                    <div class='form-group'>
                        <h5 class='sub-title'>Add Player</h5>
                    </div>
                    <?php
					   for ($i = 1; $i <= 15; $i++) {
					?>
                        <div class='team-player-list' id='second-team-player-<?php echo $i;?>'>  
                            <h6 class='team-player-title'>Details of Player-<?php echo $i;?></h6>                
                            <div class='form-group'>
                                <label class='add-label'>Player Name:</label>
                                <input type='text' name='second-team-player-name-<?php echo $i;?>' id='second-team-player-name-<?php echo $i;?>' class='enter-data player-name-ip' placeholder='Player Name'  list='player-names'>
                            </div>
                            <div class='form-group'>
                                <label class='add-label'>Player Type:</label>
                                <select name='second-team-player-type-<?php echo $i;?>' id='second-team-player-type-<?php echo $i;?>' class='enter-data player-type-selection'>
                                    <option value='' selected>Select</option>                   	
                                    <?php
                                        $playerTypes = getPlayerTypeOptions();
                                         foreach ($playerTypes as $value) {
                                             echo '<option value="'.$value.'">'.$value.'</option>';
                                         }
                                    ?>
                                </select>
                            </div>
                            <div class='form-group stat-row batting-stats hidden-groups'>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Batting Runs</label>
                                    <input type='text' name='second-team-bat-run-<?php echo $i;?>' id='second-team-bat-run-<?php echo $i;?>' class='enter-data batting-runs' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Balls</label>
                                    <input type='text' name='second-team-balls-<?php echo $i;?>' id='second-team-balls-<?php echo $i;?>' class='enter-data balls-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Strike Rate</label>
                                    <input type='text' name='second-team-strikerate-<?php echo $i;?>' id='second-team-strikerate-<?php echo $i;?>' class='enter-data strike-rate' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>4's</label>
                                    <input type='text' name='second-team-fours-<?php echo $i;?>' id='second-team-fours-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>6's</label>
                                    <input type='text' name='second-team-sixs-<?php echo $i;?>' id='second-team-sixs-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>50's</label>
                                    <input type='text' name='second-team-fiftys-<?php echo $i;?>' id='second-team-fours-<?php echo $i;?>' class='enter-data fiftys-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Centuries</label>
                                    <input type='text' name='second-team-centuries-<?php echo $i;?>' id='second-team-centuries-<?php echo $i;?>' class='enter-data centuries-ip' value='0'>
                                </div>                       
                            </div>
                            <div class='form-group stat-row bawling-stats hidden-groups'>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Overs</label>
                                    <input type='text' name='second-team-overs-<?php echo $i;?>' id='second-team-overs-<?php echo $i;?>' class='enter-data over-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Bowling Runs</label>
                          			<input type='text' name='second-team-bowling-runs-<?php echo $i;?>' id='second-team-bowling-runs-<?php echo $i;?>' class='enter-data bowling-run-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Maiden</label>
                                    <input type='text' name='second-team-maiden-<?php echo $i;?>' id='second-team-maiden-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Wicket</label>
                                    <input type='text' name='second-team-wicket-<?php echo $i;?>' id='second-team-wicket-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Eco</label>
                                    <input type='text' name='second-team-eco-<?php echo $i;?>' id='second-team-eco-<?php echo $i;?>' class='enter-data eco-ip' value='0'>
                                </div>                                              
                            </div>
                            <div class='form-group stat-row wicket-stats hidden-groups'>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Batting Runs</label>
                                    <input type='text' name='second-team-bat-run-<?php echo $i;?>' id='second-team-bat-run-<?php echo $i;?>' class='enter-data batting-runs' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Balls</label>
                                    <input type='text' name='second-team-balls-<?php echo $i;?>' id='second-team-balls-<?php echo $i;?>' class='enter-data balls-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Strike Rate</label>
                                    <input type='text' name='second-team-strikerate-<?php echo $i;?>' id='second-team-strikerate-<?php echo $i;?>' class='enter-data strike-rate' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>4's</label>
                                    <input type='text' name='second-team-fours-<?php echo $i;?>' id='second-team-fours-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>6's</label>
                                    <input type='text' name='second-team-sixs-<?php echo $i;?>' id='second-team-sixs-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>50's</label>
                                    <input type='text' name='second-team-fiftys-<?php echo $i;?>' id='second-team-fours-<?php echo $i;?>' class='enter-data fiftys-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Centuries</label>
                                    <input type='text' name='second-team-centuries-<?php echo $i;?>' id='second-team-centuries-<?php echo $i;?>' class='enter-data centuries-ip' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Stumping</label>
                                    <input type='text' name='second-team-stumping-<?php echo $i;?>' id='second-team-stumping-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>
                                <div class='col-sm-3 stat-column'>
                                    <label class='stat-label'>Catches</label>
                                    <input type='text' name='second-team-catches-<?php echo $i;?>' id='second-team-catches-<?php echo $i;?>' class='enter-data' value='0'>
                                </div>                     
                            </div>
                            <div>
                                <button class='add-next-player-btn'>Add Next Player</button>
                            </div>                            
                    	</div>
                    <?php } ?>
                </div>
                <div class="btn-wrapper players-team-btn-wrapper">
                	<button name="add-players-to-team" id="add-players-to-team" class="add-data-btn">Add</button>
                </div>
              </div>
            </form>
        </section>
    </div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('.match-link').addClass('current-page');
	$('#match-date').datepicker({format: 'dd-mm-yyyy'});
</script>
