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
							$matchValue = $_POST['match-value'];
							$innsValue = $_POST['inns-value'];
							$notOutValue = $_POST['not-out-value'];
							$battingRuns = $_POST['batting-runs-value'];
							$bowlsValue = $_POST['bowls-value-batsman'];
							$strikeRateValue = $_POST['strike-rate-value'];
							$batAverage = $_POST['bat-average-value'];
							$foursValue = $_POST['fours-value'];
							$sixsValue = $_POST['sixs-value'];
							$fiftysValue = $_POST['fiftys-value'];
							$centuryValue = $_POST['centuary-value'];
							$isAdded = addToBatsmanDetails($playerId, $battingStyle, $matchValue, $innsValue, $notOutValue, $battingRuns, $bowlsValue, $strikeRateValue, $batAverage, $foursValue, $sixsValue, $fiftysValue, $centuryValue);
							break;
						case '2':
							$bowlingType = $_POST['bowling-type'];
							$matchValue = $_POST['match-value-bowling'];
							$overValue = $_POST['over-value'];
							$bowllingRuns = $_POST['bowling-run-value'];
							$battingRuns = $_POST['batting-runs-value-bowler'];
							$wicketValue = $_POST['wicket-value'];
							$bowAvlValue = $_POST['bow-avl-value'];
							$ecoValue = $_POST['eco-value'];
							$isAdded = addToBowlerDetails($playerId, $bowlingType, $matchValue, $overValue, $bowllingRuns, $battingRuns, $wicketValue, $bowAvlValue, $ecoValue);
							break;
						case '3':
							$wicketMatchValue = $_POST['match-value-wicket'];
							$wicketInnsValue = $_POST['inns-value-wicket'];
							$wicketNotOutValue = $_POST['not-out-value-wicket'];
							$wicketBattingRuns = $_POST['batting-runs-value-wicket'];
							$wicketBowls = $_POST['bowls-value-wicket'];
							$wicketstrikeRate = $_POST['strike-rate-value-wicket'];
							$wicketBatAvg = $_POST['bat-average-value-wicket'];
							$wicketFours = $_POST['fours-value-wicket'];
							$wicketSixs = $_POST['sixs-value-wicket'];
							$wicketFiftys = $_POST['fiftys-value-wicket'];
							$wicketCentury = $_POST['centuary-value-wicket'];
							$wicketStumping = $_POST['stump-value-wicket'];
							$wicketCatches = $_POST['catch-value-wicket'];
							$isAdded = addToWicketKeeperDetails($playerId, $wicketMatchValue, $wicketInnsValue, $wicketNotOutValue, $wicketBattingRuns, $wicketBowls, $wicketstrikeRate, $wicketBatAvg, $wicketFours, $wicketSixs, $wicketFiftys, $wicketCentury, $wicketStumping, $wicketCatches);
							echo 4;
							break;
						case '4':
							$battingStyle = $_POST['batting-style'];
							$matchValue = $_POST['match-value'];
							$innsValue = $_POST['not-out-value'];
							$notOutValue = $_POST['not-out-value'];
							$battingRuns = $_POST['batting-runs-value'];
							$bowlsValue = $_POST['bowls-value'];
							$strikeRateValue = $_POST['strike-rate-value'];
							$batAverage = $_POST['bat-average-value'];
							$foursValue = $_POST['fours-value'];
							$sixsValue = $_POST['sixs-value'];
							$fiftysValue = $_POST['fiftys-value'];
							$centuryValue = $_POST['centuary-value'];
							$isAdded = addToBatsmanDetails($playerId, $battingStyle, $matchValue, $innsValue, $notOutValue, $battingRuns, $bowlsValue, $strikeRateValue, $batAverage, $foursValue, $sixsValue, $fiftysValue, $centuryValue);
							$bowlingType = $_POST['bowling-type'];
							$matchValue = $_POST['match-value-bowling'];
							$overValue = $_POST['over-value'];
							$bowllingRuns = $_POST['bowling-run-value'];
							$battingRuns = $_POST['batting-runs-value'];
							$wicketValue = $_POST['wicket-value'];
							$bowAvlValue = $_POST['bow-avl-value'];
							$ecoValue = $_POST['eco-value'];
							$isAdded = addToBowlerDetails($playerId, $bowlingType, $matchValue, $overValue, $bowllingRuns, $battingRuns, $wicketValue, $bowAvlValue, $ecoValue);
							break;						
					}					
				}
			}
		}
		header('Location: ../views/add-player.php?success=' . $isAdded, true);
	}
	
	if (isset($_POST['match-submit'])) {
		$matchNumber = $_POST['match-number'];
		$gameType = $_POST['game-type'];
		$matchDate = $_POST['match-date'];
		$matchTime = $_POST['match-time'];
		$matchVenue = $_POST['match-venue'];
		$firstTeam = $_POST['match-first-team'];
		$secondTeam = $_POST['match-second-team'];
		$winnerTeam = $_POST['match-result'];
		$isAddMatch = addMatch($matchNumber,$gameType,$matchDate,$matchTime,$matchVenue,$firstTeam,$secondTeam,$winnerTeam);
		if(!$isAddMatch) die('Error in adding match. Please refresh the page and try again later.');
		$matchId = getCurrentMatchId();
		$isAddFirstTeamPlayers = addTeamPlayers('first',$matchId,$firstTeam);
		$isAddSecondTeamPlayers = addTeamPlayers('second',$matchId,$secondTeam);
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

		if(move_uploaded_file($temp_name, $target_path)) {
			if(!insertPhoto($target_path)) return false;		 
		}else{
			return false;
		   exit("Error While uploading image on the server");
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