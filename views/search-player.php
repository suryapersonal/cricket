<?php include_once('header.php'); ?>
	<div class='main-content'>
    	<section class='inner-container search-player-container'>        	
        	<form action='../controller/controller.php' method='post' name='search-player' id='search-player'>
            	<div class='form-group'>
                	<label>Enter player name to view the details:</label>
                    <input type='text' name='search-player-name' id='search-player-name' class='enter-data player-name-ip' placeholder='Player Name' list='player-names'>
                </div>
                <div class='btn-wrapper'>
                	<input type='submit' name='search-player-submit' id='search-player-submit' class='add-data-btn' value='Search'>
                </div>
            </form>
            <table class='player-detail-table hidden-groups'>
                <tbody>
                    <tr>
                        <td colspan='2' class='photo-name'>
                            <h3 class='table-head'>Player Details</h3>
                        </td>
                    </tr>
                	<tr>
                    	<td colspan='2' class='photo-name'>
                        	<img src='' class='profile-pic'>
                            <h3 class='player-name'></h3>
                        </td>
                    </tr>
                    <tr>
                    	<td class='td-label'>Player Type:</td>
                        <td class='td-value player-type-td'></td>
                    </tr>
                    <tr>
                    	<td class='td-label'>Total Matches:</td>
                        <td class='td-value total-match-count'></td>
                    </tr>
                    <tr>
                    	<td colspan='2' class='inner-table-container'>
                        	<table class='batting-details inner-table hidden-groups'>
                                <tr>
                                    <td class='td-label'>Batting Style:</td>
                                    <td class='td-value batting-style-value'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total inns:</td>
                                    <td class='td-value batting-total-inns'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total not out:</td>
                                    <td class='td-value batting-total-notout'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Batting Runs:</td>
                                    <td class='td-value batting-total-runs'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Balls:</td>
                                    <td class='td-value batting-total-balls'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Strike Rate:</td>
                                    <td class='td-value batting-strike-rate'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Bat Average:</td>
                                    <td class='td-value batting-bat-average'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Fours:</td>
                                    <td class='td-value batting-fours'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Sixs:</td>
                                    <td class='td-value batting-sixs'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Fifties:</td>
                                    <td class='td-value batting-fiftys'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Centuries:</td>
                                    <td class='td-value batting-centuries'></td>
                                </tr>
                            </table>                           
                            <table class='bowling-details inner-table hidden-groups'>
                            	<tr>
                                    <td class='td-label'>Bowling Type:</td>
                                    <td class='td-value bowling-type-value'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Overs:</td>
                                    <td class='td-value bowling-overs'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Bowling Runs:</td>
                                    <td class='td-value bowling-runs'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Batting Runs:</td>
                                    <td class='td-value bowler-batting-runs'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Wickets:</td>
                                    <td class='td-value bowler-wickets'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Bow Avl:</td>
                                    <td class='td-value bowler-bow-avl'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Maiden:</td>
                                    <td class='td-value bowler-maiden'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total ECO:</td>
                                    <td class='td-value bowler-eco'></td>
                                </tr>
                            </table>
                            <table class='wicket-keeper-details inner-table hidden-groups'>                            	
                                <tr>
                                    <td class='td-label'>Total inns:</td>
                                    <td class='td-value wkt-total-inns'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total not out:</td>
                                    <td class='td-value wkt-total-notout'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Batting Runs:</td>
                                    <td class='td-value wkt-batting-run'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Balls:</td>
                                    <td class='td-value wkt-balls'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Strike Rate:</td>
                                    <td class='td-value wkt-strike-rate'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Bat Average:</td>
                                    <td class='td-value wkt-bat-average'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Fours:</td>
                                    <td class='td-value wkt-total-fours'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Sixs:</td>
                                    <td class='td-value wkt-total-six'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Fifties:</td>
                                    <td class='td-value wkt-fifties'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Centuries:</td>
                                    <td class='td-value wkt-centuries'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Stumping:</td>
                                    <td class='td-value wkt-stumping'></td>
                                </tr>
                                <tr>
                                    <td class='td-label'>Total Catches:</td>
                                    <td class='td-value wkt-catches'></td>
                                </tr>                                
                                
                            </table>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan='2' class='inner-table-container'>
                            <div class='match-details-tbl-wrapper'>
                                <table class='match-details-tbl inner-table'>
                                    <tr>
                                      <td class="player-matches-td" colspan="2">
                                          <table class='player-matches-tbl'>
                                            <thead>
                                              <th>Match Number</th>
                                              <th>Game Type</th>
                                              <th>Date</th>
                                              <th>Time</th>
                                              <th>Venue</th>
                                              <th>Team</th>
                                              <th>Winner</th>
                                            </thead>
                                            <tbody class="player-match-detail-list-tbody">
                                                                                    
                                            </tbody>
                                          </table>
                                      </td>
                                    </tr>                               
                                </table> 
                            </div>
                        	
                        </td>
                    </tr>                    
                </tbody>
            </table>
        </section>
    </div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('.search-player-link').addClass('current-page');
</script>
