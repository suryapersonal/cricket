<?php include_once('header.php'); ?>
	<div class='main-content'>
    	<section class='inner-container'>        	
        	<form action='../controller/controller.php' method='post' name='form-view-match-details' id='form-view-match-details'>
              <?php $matchType = $_GET['match_type'] ?>
              <input type="hidden" name="match-type-name" id="match-type-name" value="<?php echo $matchType ?>">
              <?php 
                switch ($matchType) {
                  case 'super_saturday': $title = 'Super Saturday';
                                         break;
                  case 'friendly': $title = 'Friendly';
                                         break;
                  case 'tournament': $title = 'Tournament';
                                         break;
                  case 'big_bash': $title = 'Big Bash';
                                         break;
                }
              ?>
              <h3 class="table-head"><?php echo $title ?> Matches</h3>
              <div class="match-table-wrapper">
                <table class='player-matches-tbl inner-table'>
                  <thead>
                    <th>Match Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Teams</th>
                    <th>Winner</th>
                  </thead>
                  <tbody class='game-list-tbody'>                  
                  </tbody>
                </table>
              </div>            	
            </form>
        </section>
    </div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('.add-match-li a').addClass('current-page');
</script>
