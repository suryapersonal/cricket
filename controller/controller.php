<?php 
	include_once('../model/queries.php'); 
	if(isset($_POST['player-type-submit'])) {
		$playerType = $_POST['player-type'];
		if($playerType !=  null) {
			$isAdded = addPlayerType($playerType);
			header('Location: ../views/add-player-type.php?success=' . $isAdded, true);
			exit;		  	
		}
	}
	
	if(isset($_POST['login-submit'])) {
		$uname = $_POST['uname'];
		$password = $_POST['password'];
		$encryptedPassword = encryptString($password);
		if($uname !=  null & $password !=  null) {
			$isLogin = login($uname, $encryptedPassword);
			if ($isLogin) {				
				setcookie('login_user', $uname, time() + (86400 * 30), "/");
				header('Location: ../index.php?login=success', true);
			} else {
				header('Location: ../index.php?login=failed', true);
			}
			
			exit;		  	
		}
	}
	
	if(isset($_POST['logout-submit'])) {
		// unset cookies
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$user = trim($parts[0]);
				setcookie($user, '', time()-1000);
				setcookie($user, '', time()-1000, '/');
			}
		}	
		
		//die($_COOKIE['login_user']);
		header('Location: ../index.php?logout=1', true);
		exit;
	}
	
	if(isset($_POST['add-player-submit'])) {
		$name = $_POST['player-name'];
		$playerType = $_POST['player-type'];
		$isphotoUpload = photoUpload();
		if(!$isphotoUpload) {
			die ('error in upload');			
		}
		else {
			$picId  =  getPicId();
			$playerTypeId = getPlayeTypeId($playerType);
			if(!$picId || !$playerTypeId) return false;
			else {
				$isAddPlayer = addPlayer($name, $playerTypeId, $picId);
				if(!$isAddPlayer) return false;
				else {
					$playerId = getPlayerId();
					switch($playerTypeId) {
						case '1': 
							$battingStyle = $_POST['batting-style'];
							$matchValue1 = $_POST['match-value-1'];
							$innsValue1 = $_POST['inns-value-1'];
							$notOutValue1 = $_POST['not-out-value-1'];
							$battingRuns1 = $_POST['batting-runs-value-1'];
							$bowlsValue1 = $_POST['bowls-value-batsman-1'];
							$strikeRateValue1 = $_POST['strike-rate-value-1'];
							$batAverage1 = $_POST['bat-average-value-1'];
							$foursValue1 = $_POST['fours-value-1'];
							$sixsValue1 = $_POST['sixs-value-1'];
							$fiftysValue1 = $_POST['fiftys-value-1'];
							$centuryValue1 = $_POST['centuary-value-1'];
							$season = 'season 1';
							$isAdded = addToBatsmanDetails($playerId, $battingStyle, $matchValue1, $innsValue1, $notOutValue1, $battingRuns1, $bowlsValue1, $strikeRateValue1, $batAverage1, $foursValue1, $sixsValue1, $fiftysValue1, $centuryValue1, $season);

							$matchValue2 = $_POST['match-value-2'];
							$innsValue2 = $_POST['inns-value-2'];
							$notOutValue2 = $_POST['not-out-value-2'];
							$battingRuns2 = $_POST['batting-runs-value-2'];
							$bowlsValue2 = $_POST['bowls-value-batsman-2'];
							$strikeRateValue2 = $_POST['strike-rate-value-2'];
							$batAverage2 = $_POST['bat-average-value-2'];
							$foursValue2 = $_POST['fours-value-2'];
							$sixsValue2 = $_POST['sixs-value-2'];
							$fiftysValue2 = $_POST['fiftys-value-2'];
							$centuryValue2 = $_POST['centuary-value-2'];
							$season = 'season 2';
							$isAdded = addToBatsmanDetails($playerId, $battingStyle, $matchValue2, $innsValue2, $notOutValue2, $battingRuns2, $bowlsValue2, $strikeRateValue2, $batAverage2, $foursValue2, $sixsValue2, $fiftysValue2, $centuryValue2, $season);
							break;
						case '2':
							$bowlingType = $_POST['bowling-type-1'];
							$matchValue1 = $_POST['match-value-bowling-1'];
							$overValue1 = $_POST['over-value-1'];
							$bowllingRuns1 = $_POST['bowling-run-value-1'];
							$battingRuns1 = $_POST['batting-runs-value-bowler-1'];
							$wicketValue1 = $_POST['wicket-value-1'];
							$bowAvlValue1 = $_POST['bow-avl-value-1'];
							$ecoValue1 = $_POST['eco-value-1'];
							$season = 'season 1';
							$isAdded = addToBowlerDetails($playerId, $bowlingType, $matchValue1, $overValue1, $bowllingRuns1, $battingRuns1, $wicketValue1, $bowAvlValue1, $ecoValue1, $season);

							$matchValue2 = $_POST['match-value-bowling-2'];
							$overValue2 = $_POST['over-value-2'];
							$bowllingRuns2 = $_POST['bowling-run-value-2'];
							$battingRuns2 = $_POST['batting-runs-value-bowler-2'];
							$wicketValue2 = $_POST['wicket-value-2'];
							$bowAvlValue2 = $_POST['bow-avl-value-2'];
							$ecoValue2 = $_POST['eco-value-2'];
							$season = 'season 2';
							$isAdded = addToBowlerDetails($playerId, $bowlingType, $matchValue2, $overValue2, $bowllingRuns2, $battingRuns2, $wicketValue2, $bowAvlValue2, $ecoValue2, $season);
							break;
						case '3':
							$wicketMatchValue1 = $_POST['match-value-wicket-1'];
							$wicketInnsValue1 = $_POST['inns-value-wicket-1'];
							$wicketNotOutValue1 = $_POST['not-out-value-wicket-1'];
							$wicketBattingRuns1 = $_POST['batting-runs-value-wicket-1'];
							$wicketBowls1 = $_POST['bowls-value-wicket-1'];
							$wicketstrikeRate1 = $_POST['strike-rate-value-wicket-1'];
							$wicketBatAvg1 = $_POST['bat-average-value-wicket-1'];
							$wicketFours1 = $_POST['fours-value-wicket-1'];
							$wicketSixs1 = $_POST['sixs-value-wicket-1'];
							$wicketFiftys1 = $_POST['fiftys-value-wicket-1'];
							$wicketCentury1 = $_POST['centuary-value-wicket-1'];
							$wicketStumping1 = $_POST['stump-value-wicket-1'];
							$wicketCatches1 = $_POST['catch-value-wicket-1'];
							$season = 'season 1';
							$isAdded = addToWicketKeeperDetails($playerId, $wicketMatchValue1, $wicketInnsValue1, $wicketNotOutValue1, $wicketBattingRuns1, $wicketBowls1, $wicketstrikeRate1, $wicketBatAvg1, $wicketFours1, $wicketSixs1, $wicketFiftys1, $wicketCentury1, $wicketStumping1, $wicketCatches1, $season);

							$wicketMatchValue2 = $_POST['match-value-wicket-2'];
							$wicketInnsValue2 = $_POST['inns-value-wicket-2'];
							$wicketNotOutValue2 = $_POST['not-out-value-wicket-2'];
							$wicketBattingRuns2 = $_POST['batting-runs-value-wicket-2'];
							$wicketBowls2 = $_POST['bowls-value-wicket-2'];
							$wicketstrikeRate2 = $_POST['strike-rate-value-wicket-2'];
							$wicketBatAvg2 = $_POST['bat-average-value-wicket-2'];
							$wicketFours2 = $_POST['fours-value-wicket-2'];
							$wicketSixs2 = $_POST['sixs-value-wicket-2'];
							$wicketFiftys2 = $_POST['fiftys-value-wicket-2'];
							$wicketCentury2 = $_POST['centuary-value-wicket-2'];
							$wicketStumping2 = $_POST['stump-value-wicket-2'];
							$wicketCatches2 = $_POST['catch-value-wicket-2'];
							$season = 'season 2';
							$isAdded = addToWicketKeeperDetails($playerId, $wicketMatchValue2, $wicketInnsValue2, $wicketNotOutValue2, $wicketBattingRuns2, $wicketBowls2, $wicketstrikeRate2, $wicketBatAvg2, $wicketFours2, $wicketSixs2, $wicketFiftys2, $wicketCentury2, $wicketStumping2, $wicketCatches2, $season);
							echo 4;
							break;
						case '4':							
							$battingStyle = $_POST['batting-style'];
							$matchValue1 = $_POST['match-value-1'];
							$innsValue1 = $_POST['inns-value-1'];
							$notOutValue1 = $_POST['not-out-value-1'];
							$battingRuns1 = $_POST['batting-runs-value-1'];
							$bowlsValue1 = $_POST['bowls-value-batsman-1'];
							$strikeRateValue1 = $_POST['strike-rate-value-1'];
							$batAverage1 = $_POST['bat-average-value-1'];
							$foursValue1 = $_POST['fours-value-1'];
							$sixsValue1 = $_POST['sixs-value-1'];
							$fiftysValue1 = $_POST['fiftys-value-1'];
							$centuryValue1 = $_POST['centuary-value-1'];
							$season = 'season 1';
							$isAdded = addToBatsmanDetails($playerId, $battingStyle, $matchValue1, $innsValue1, $notOutValue1, $battingRuns1, $bowlsValue1, $strikeRateValue1, $batAverage1, $foursValue1, $sixsValue1, $fiftysValue1, $centuryValue1, $season);

							$matchValue2 = $_POST['match-value-2'];
							$innsValue2 = $_POST['inns-value-2'];
							$notOutValue2 = $_POST['not-out-value-2'];
							$battingRuns2 = $_POST['batting-runs-value-2'];
							$bowlsValue2 = $_POST['bowls-value-batsman-2'];
							$strikeRateValue2 = $_POST['strike-rate-value-2'];
							$batAverage2 = $_POST['bat-average-value-2'];
							$foursValue2 = $_POST['fours-value-2'];
							$sixsValue2 = $_POST['sixs-value-2'];
							$fiftysValue2 = $_POST['fiftys-value-2'];
							$centuryValue2 = $_POST['centuary-value-2'];
							$season = 'season 2';
							$isAdded = addToBatsmanDetails($playerId, $battingStyle, $matchValue2, $innsValue2, $notOutValue2, $battingRuns2, $bowlsValue2, $strikeRateValue2, $batAverage2, $foursValue2, $sixsValue2, $fiftysValue2, $centuryValue2, $season);

							$bowlingType = $_POST['bowling-type'];
							$matchValue1 = $_POST['match-value-bowling-1'];
							$overValue1 = $_POST['over-value-1'];
							$bowllingRuns1 = $_POST['bowling-run-value-1'];
							$battingRuns1 = $_POST['batting-runs-value-bowler-1'];
							$wicketValue1 = $_POST['wicket-value-1'];
							$bowAvlValue1 = $_POST['bow-avl-value-1'];
							$ecoValue1 = $_POST['eco-value-1'];
							$season = 'season 1';
							$isAdded = addToBowlerDetails($playerId, $bowlingType, $matchValue1, $overValue1, $bowllingRuns1, $battingRuns1, $wicketValue1, $bowAvlValue1, $ecoValue1, $season);

							$matchValue2 = $_POST['match-value-bowling-2'];
							$overValue2 = $_POST['over-value-2'];
							$bowllingRuns2 = $_POST['bowling-run-value-2'];
							$battingRuns2 = $_POST['batting-runs-value-bowler-2'];
							$wicketValue2 = $_POST['wicket-value-2'];
							$bowAvlValue2 = $_POST['bow-avl-value-2'];
							$ecoValue2 = $_POST['eco-value-2'];
							$season = 'season 2';
							$isAdded = addToBowlerDetails($playerId, $bowlingType, $matchValue2, $overValue2, $bowllingRuns2, $battingRuns2, $wicketValue2, $bowAvlValue2, $ecoValue2, $season);

							break;						
					}					
				}
			}
		}
		header('Location: ../views/add-player.php?success=' . $isAdded, true);
	}
	
	if (isset($_POST['match-submit'])) {
		$matchNumber = $_POST['match-number'];
		$season = $_POST['match-season'];
		$gameType = $_POST['game-type'];
		$matchDate = $_POST['match-date'];
		$matchTime = $_POST['match-time'];
		$matchVenue = $_POST['match-venue'];
		$firstTeam = $_POST['match-first-team'];
		$secondTeam = $_POST['match-second-team'];
		$winnerTeam = $_POST['match-result'];
		$isAddMatch = addMatch($matchNumber,$gameType,$matchDate,$matchTime,$matchVenue,$firstTeam,$secondTeam,$winnerTeam, $season);
		if(!$isAddMatch) die('Error in adding match. Please refresh the page and try again later.');
		$matchId = getCurrentMatchId();
		$isAddFirstTeamPlayers = addTeamPlayers('first',$matchId,$firstTeam,$season);
		$isAddSecondTeamPlayers = addTeamPlayers('second',$matchId,$secondTeam,$season);
		if($isAddFirstTeamPlayers && $isAddSecondTeamPlayers) $isAdded = true;
		else $isAdded = false;
		header('Location: ../views/matches.php?success=' . $isAdded, true);
	}

	if (isset($_POST['match_type'])) {
		$matchType = $_POST['match_type'];
		switch ($matchType) {
			case 'super_saturday': $matchKeyWord = 'Super Saturday';
			                     break;
			case 'friendly': $matchKeyWord = 'Friendly';
			                     break;
			case 'tournament': $matchKeyWord = 'Tournament';
			                     break;
			case 'big_bash': $matchKeyWord = 'Big Bash';
			                     break;
        }
        $matchList = getMatchList ($matchKeyWord);    
    	echo json_encode($matchList);
	}
	
	function encryptString($string) {	
		return md5($string);
	}
	
	function getPlayerTypeOptions() {
		$palyerTypes = getPlayerTypes();

		if (!$palyerTypes) {
			return null;
		} else {
			return $palyerTypes;
		}
	}
	
	function photoUpload() {
		function GetImageExtension($imagetype) {
			if(empty($imagetype)) return false;
			switch($imagetype) {
				case 'image/bmp': return '.bmp';
				case 'image/gif': return '.gif';
				case 'image/jpeg': return '.jpg';
				case 'image/png': return '.png';
				default: return false;
			}
		}
		
	if (!empty($_FILES['photo-upload']['name'])) {
		$file_name=$_FILES["photo-upload"]["name"];
		$temp_name=$_FILES["photo-upload"]["tmp_name"];
		$imgtype=$_FILES["photo-upload"]["type"];
		$ext= GetImageExtension($imgtype);
		$imagename=date("d-m-Y")."-".time().$ext;		
		
		$destination_path = realpath(__DIR__ . '/..');

		$target_path = $destination_path.'/assets/images/' . basename( $_FILES["photo-upload"]["name"]);		
		echo '$target_path: '.$target_path;
		if(move_uploaded_file($temp_name, $target_path)) {
			if(!insertPhoto($target_path)) return false;		 
		}else{
			//return false;
		   exit("Error While uploading image on the server");
		   return false;
		}
	}
	return true;
	}
	
	function addTeamPlayers ($team,$matchId,$teamName) {
		for ($i = 1; $i <= 15; $i ++) {
			$playerName = $_POST[$team.'-team-player-name-'.$i];
			if ($playerName == '' || $playerName == 'undefined' || $playerName == 'null') break;
			$playerId = getPlayerIdOfPlayerName ($playerName);
			$playerType = $_POST[$team.'-team-player-type-'.$i];
			$playerTypeId = getPlayeTypeId($playerType);
			$isAddMatchTeamPlayer = AddMatchTeamPlayer ($playerId,$matchId,$teamName,$playerTypeId);
			if(!$isAddMatchTeamPlayer) die('Error in add player to the match. Go back and try again later');
			switch($playerTypeId) {
				case 1: 
					$battingRuns = $_POST[$team.'-team-bat-run-'.$i];
					$balls = $_POST[$team.'-team-balls-'.$i];
					$strikerate = $_POST[$team.'-team-strikerate-'.$i];
					$fours = $_POST[$team.'-team-fours-'.$i];
					$sixs = $_POST[$team.'-team-sixs-'.$i];
					$fiftys = $_POST[$team.'-team-fiftys-'.$i];
					$centuries = $_POST[$team.'-team-centuries-'.$i];
					$isAdded = addMatchBatsmanDetails($playerId,$teamName,$matchId,$battingRuns,$balls,$strikerate,$fours,$sixs,$fiftys,$centuries);
					break;
				case 2:
					$overs = $_POST[$team.'-team-overs-'.$i];
					$bowlingRuns = $_POST[$team.'-team-bowling-runs-'.$i];
					$maiden = $_POST[$team.'-team-maiden-'.$i];
					$wicket = $_POST[$team.'-team-wicket-'.$i];
					$eco = $_POST[$team.'-team-eco-'.$i];
					$isAdded = addMatchBowlerDetails($playerId,$teamName,$matchId,$overs,$bowlingRuns,$maiden,$wicket,$eco);
					break;
				case 3: 
					$battingRuns = $_POST[$team.'-team-wicket-bat-run-'.$i];
					$balls = $_POST[$team.'-team-wicket-balls-'.$i];
					$strikerate = $_POST[$team.'-team-wicket-strikerate-'.$i];
					$fours = $_POST[$team.'-team-wicket-fours-'.$i];
					$sixs = $_POST[$team.'-team-wicket-sixs-'.$i];
					$fiftys = $_POST[$team.'-team-wicket-fiftys-'.$i];
					$centuries = $_POST[$team.'-team-wicket-centuries-'.$i];
					$stumping = $_POST[$team.'-team-wicket-stumping-'.$i];
					$catches = $_POST[$team.'-team-wicket-catches-'.$i];
					$isAdded = addMatchWicketKeeperDetails($playerId,$teamName,$matchId,$battingRuns,$balls,$strikerate,$fours,$sixs,$fiftys,$centuries,$stumping,$catches);
					break;
				case 4: 
					$battingRuns = $_POST[$team.'-team-bat-run-'.$i];
					$balls = $_POST[$team.'-team-balls-'.$i];
					$strikerate = $_POST[$team.'-team-strikerate-'.$i];
					$fours = $_POST[$team.'-team-fours-'.$i];
					$sixs = $_POST[$team.'-team-sixs-'.$i];
					$fiftys = $_POST[$team.'-team-fiftys-'.$i];
					$centuries = $_POST[$team.'-team-centuries-'.$i];
					$isAddedBatting = addMatchBatsmanDetails($playerId,$teamName,$matchId,$battingRuns,$balls,$strikerate,$fours,$sixs,$fiftys,$centuries);
					$overs = $_POST[$team.'-team-overs-'.$i];
					$bowlingRuns = $_POST[$team.'-team-bowling-runs-'.$i];
					$maiden = $_POST[$team.'-team-maiden-'.$i];
					$wicket = $_POST[$team.'-team-wicket-'.$i];
					$eco = $_POST[$team.'-team-eco-'.$i];
					$isAddedBalling = addMatchBowlerDetails($playerId,$teamName,$matchId,$overs,$bowlingRuns,$maiden,$wicket,$eco);
					if($isAddedBatting && $isAddedBalling) $isAdded = true;
					else $isAdded = false;
					break;
			}
		}
		if ($isAdded) return true;
		else return false;
	}
?>