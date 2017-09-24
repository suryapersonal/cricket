<?php include_once('header.php'); ?>
	<div class='main-content'>
    	<section class='inner-container'>        	
            <div class='col-xs-12 leader-board-table-wrapper'>
                <h2>Leader's Board</h2>
                <div class='col-sm-6'>
                    <h5>Leading Batting Runs</h2>
                    <div class='form-group'>
                        <label class='add-label'>Season:</label>
                        <select name='season-lead-batting-runs' id='season-lead-batting-runs' class='enter-data'>
                            <option value='All Time' selected>All Time</option>
                            <option value='season 1'>Season 1</option>
                            <option value='season 2'>Season 2</option>
                            <option value='season 3'>Season 3</option>
                            <option value='season 4'>Season 4</option>
                            <option value='season 5'>Season 5</option>
                            <option value='season 6'>Season 6</option>
                        </select>                        
                    </div>
                    <table class='leader-board-table season-lead-batting-table'>
                        <thead>
                            <tr>
                               <th>Rank</th>
                               <th>Name</th>
                               <th>Batting Runs</th> 
                            </tr>                       
                        </thead>
                        <tbody class='season-lead-batting-tbody'>                            
                        </tbody>
                    </table>
                </div>
                <div class='col-sm-6'>
                    <h5>Leading Wickets</h2>
                    <div class='form-group'>
                        <label class='add-label'>Season:</label>
                        <select name='season-lead-wickets' id='season-lead-wickets' class='enter-data'>
                            <option value='All Time' selected>All Time</option>
                            <option value='season 1'>Season 1</option>
                            <option value='season 2'>Season 2</option>
                            <option value='season 3'>Season 3</option>
                            <option value='season 4'>Season 4</option>
                            <option value='season 5'>Season 5</option>
                            <option value='season 6'>Season 6</option>
                        </select>                        
                    </div>
                    <table class='leader-board-table season-lead-wicket-table'>
                        <thead>
                            <tr>
                               <th>Rank</th>
                               <th>Name</th>
                               <th>Batting Runs</th> 
                            </tr>                       
                        </thead>
                        <tbody class='season-lead-wicket-tbody'>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('.leader-board-link').addClass('current-page');
</script>

