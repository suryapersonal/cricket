<?php 
  include_once('db-connection.php');   
  function addPlayerType($playerType) {
    $con = dbConnection();
    $sql = 'INSERT INTO player_type (player_type) VALUES ("' . $playerType . '")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function enterAdminPassword($encrypted_string) {
    $con = dbConnection();
    $sql = 'UPDATE login SET password="' . $encrypted_string . '" WHERE user_name="admin"';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);    
  }
  
  function login($uname, $encrypted_pswd) {
    $con = dbConnection();
    $sql = 'SELECT * from login WHERE user_name="' . $uname . '"and password="' . $encrypted_pswd.'"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      return true;
    }
    mysql_close($con);  
  }
  
  function getPlayerTypes() {
    $con = dbConnection();
    $sql = 'SELECT * from player_type';
    $playerTypes = array();
    $i = 0;
    $result = mysqli_query($con, $sql);   
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $playerTypes[$i++] = $row['player_type'];
      }
      return $playerTypes;
    }
    mysql_close($con);
  }
  
  function insertPhoto($target_path) {
    $con = dbConnection();
    $sql = "INSERT into user_photos(images_path,submission_date)VALUES('".$target_path."','".date("Y-m-d")."')";
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {      
      return true;
    } else {
      return false;
    }
    mysql_close($con); 
  }
  
  function getPicId() {
    $con = dbConnection();
    $sql = 'SELECT * FROM user_photos WHERE image_id = (SELECT MAX(image_id) FROM user_photos)';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $picId = $row['image_id'];
      return $picId;
    }
    mysql_close($con);  
  
  }
  
  function getPlayeTypeId($playerType) {
      $con = dbConnection();
    $sql = 'SELECT * FROM player_type WHERE player_type="'. $playerType . '"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $playerTypeId = $row['player_type_id'];
      return $playerTypeId;
    }
    mysql_close($con);
  }
  
  function addPlayer($name, $playerTypeId, $picId) {
    $con = dbConnection();
    $sql = 'INSERT INTO player (player_name, photo_id, player_type_id) VALUES ("' . $name . '", "'. $picId .'", "'. $playerTypeId .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function getPlayerId() {
      $con = dbConnection();
    $sql = 'SELECT * FROM player WHERE player_id = (SELECT MAX(player_id) FROM player)';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $playerId = $row['player_id'];
      return $playerId;
    }
    mysql_close($con);  
  }
  
  function addToBatsmanDetails($playerId, $battingStyle, $matchValue, $innsValue, $notOutValue, $battingRuns, $bowlsValue, $strikeRateValue, $batAverage, $foursValue, $sixsValue, $fiftysValue, $centuryValue, $season) {
    $con = dbConnection();
    $sql = 'INSERT INTO batsman_details(player_id, batting_style, matches, inns, not_out, batting_runs, bowls, strike_rate, bat_average, fours, sixs, fiftys, centurys, season) VALUES ("' . $playerId . '", "'. $battingStyle .'", "'. $matchValue .'", "'. $innsValue .'", "'. $notOutValue .'", "'. $battingRuns .'", "'. $bowlsValue .'", "'. $strikeRateValue .'", "'. $batAverage .'", "'. $foursValue .'", "'. $sixsValue .'", "'. $fiftysValue .'", "'. $centuryValue .'", "'. $season .'")';
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
   function addToBowlerDetails($playerId, $bowlingType, $matchValue, $overValue, $bowllingRuns, $battingRuns, $wicketValue, $bowAvlValue, $ecoValue, $season) {
    $con = dbConnection();
    $sql = 'INSERT INTO bowler_details(player_id, bowling_type, matches, overs, bowling_runs, batting_runs, wickets, bow_avl, eco, season) VALUES ("' . $playerId . '", "'. $bowlingType .'", "'. $matchValue .'", "'. $overValue .'", "'. $bowllingRuns .'", "'. $battingRuns .'", "'. $wicketValue .'", "'. $bowAvlValue .'", "'. $ecoValue .'", "'. $season .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function addToWicketKeeperDetails ($playerId, $wicketMatchValue, $wicketInnsValue, $wicketNotOutValue, $wicketBattingRuns, $wicketBowls, $wicketstrikeRate, $wicketBatAvg, $wicketFours, $wicketSixs, $wicketFiftys, $wicketCentury, $wicketStumping, $wicketCatches, $season) {
    $con = dbConnection();
    $sql = 'INSERT INTO wicket_keeper_details(player_id, matches, inns, not_out, batting_runs, bowls, strike_rate, bat_average, fours, sixs, fiftys, century, stumping, catches, season) VALUES ("' . $playerId . '", "'. $wicketMatchValue .'", "'. $wicketInnsValue .'", "'. $wicketNotOutValue .'", "'. $wicketBattingRuns .'", "'. $wicketBowls .'", "'. $wicketstrikeRate .'", "'. $wicketBatAvg .'", "'. $wicketFours .'", "'. $wicketSixs .'", "'. $wicketFiftys .'", "'. $wicketCentury .'", "'. $wicketStumping .'", "'. $wicketCatches .'", "'. $season .'")';
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function searchPlayer ($searchTerm) {
    $con = dbConnection();
    $sql = 'SELECT * FROM player WHERE player_name LIKE "%'.$searchTerm.'%" ORDER BY player_name ASC';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
    return false;
    }
    else {
      while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
      $playerName [] = $row['player_name'];
    }     
      return $playerName;
    }
    mysql_close($con);    
  }
  
  function addMatch($matchNumber,$gameType,$matchDate,$matchTime,$matchVenue,$firstTeam,$secondTeam,$winnerTeam, $season) {
    $con = dbConnection();
    $sql = 'INSERT INTO matches (match_number, game_type, date, time, venue, first_team_name, second_team_name, winner_team_name, season) VALUES ("' . $matchNumber . '", "'. $gameType .'", "'. $matchDate .'", "'. $matchTime .'", "'. $matchVenue .'", "'. $firstTeam .'", "'. $secondTeam .'", "'. $winnerTeam .'","'.$season.'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function getCurrentMatchId () {
      $con = dbConnection();
    $sql = 'SELECT * FROM matches WHERE match_id = (SELECT MAX(match_id) FROM matches)';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $matchId = $row['match_id'];
      return $matchId;
    }
    mysql_close($con);
  }
  
  function getPlayerIdOfPlayerName ($playerName) {
      $con = dbConnection();
    $sql = 'SELECT * FROM player WHERE player_name = "'. $playerName . '"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $playerId = $row['player_id'];
      return $playerId;
    }
    mysql_close($con);
  }
  
  function AddMatchTeamPlayer ($playerId,$matchId,$teamName,$playerTypeId,$season) {
    $con = dbConnection();
    $sql = 'INSERT INTO match_players (player_id, match_id, team_name, player_type_id, season) VALUES ("' . $playerId . '", "'. $matchId .'", "'. $teamName .'", "'. $playerTypeId .'", "'. $season .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function addMatchBatsmanDetails($playerId,$teamName,$matchId,$battingRuns,$balls,$strikerate,$fours,$sixs,$fiftys,$centuries) {
    $con = dbConnection();
    $sql = 'INSERT INTO match_batsman_details (player_id, team_name, match_id, batting_runs, balls, strike_rate, fours, sixs, fiftys, centuries) VALUES ("' . $playerId . '", "'. $teamName .'", "'. $matchId .'", "'. $battingRuns .'", "'. $balls .'", "'. $strikerate .'", "'. $fours .'", "'. $sixs .'", "'. $fiftys .'", "'. $centuries .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function addMatchBowlerDetails($playerId,$teamName,$matchId,$overs,$bowlingRuns,$maiden,$wicket,$eco) {
    $con = dbConnection();
    $sql = 'INSERT INTO match_bowler_details (player_id, team_name, match_id, overs, bowling_runs, maiden, wicket, eco) VALUES ("' . $playerId . '", "'. $teamName .'", "'. $matchId .'", "'. $overs .'", "'. $bowlingRuns .'", "'. $maiden .'", "'. $wicket .'", "'. $eco .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function addMatchWicketKeeperDetails($playerId,$teamName,$matchId,$battingRuns,$balls,$strikerate,$fours,$sixs,$fiftys,$centuries,$stumping,$catches) {
    $con = dbConnection();
    $sql = 'INSERT INTO match_wicket_keeper_details (player_id, team_name, match_id, batting_runs, balls, strike_rate, fours, sixs, fiftys, centuries, stumping, catches) VALUES ("' . $playerId . '", "'. $teamName .'", "'. $matchId .'", "'. $battingRuns .'", "'. $balls .'", "'. $strikerate .'", "'. $fours .'", "'. $sixs .'", "'. $fiftys .'", "'. $centuries .'", "'. $stumping .'", "'. $catches .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function getPlayerDetails ($playerName, $season) {
    $con = dbConnection();
    $playerDetails = array();
    $sql = 'SELECT * FROM player WHERE player_name = "'. $playerName . '"';
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $battingDetails = '';
      $bowlingDetails = '';
      $wicketDetails = '';
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $playerId = $row['player_id'];
      $name = $row['player_name'];
      $photoId  = $row['photo_id'];
      $photoUrl = getPlayerPicUrl($photoId);
      $playerTypeId = $row['player_type_id'];
      $playerTypeName = getPlayerTypeName($playerTypeId);
      switch ($playerTypeId) {
        case '1':
          /*$matchesTotalCount = getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', $season);*/
          $battingDetails = getBatsmanDetails ($playerId, $season);



          if ($season == 'All Time') {
            $matchesTotalCount = (int)getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', 'season 1') + (int)getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', 'season 2');
          } else if ($season == 'season 1' || $season == 'season 2') {
            $matchesTotalCount = (int)getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', $season);
          }
          break;
        case '2':
          /*$matchesTotalCount = getMatchTotalCount($playerTypeId, $playerId, 'bowler_details', $season);*/ 
          $bowlingDetails = getBowlingDetails ($playerId, $season);
          

          if ($season == 'All Time') {
            $matchesTotalCount = (int)getMatchTotalCount($playerTypeId, $playerId, 'bowler_details', 'season 1') + (int)getMatchTotalCount($playerTypeId, $playerId, 'bowler_details', 'season 2');
          } else if ($season == 'season 1' || $season == 'season 2') {
            $matchesTotalCount = (int)getMatchTotalCount($playerTypeId, $playerId, 'bowler_details', $season);
          }
          break;
        case '3':
          /*$matchesTotalCount = getMatchTotalCount ($playerTypeId, $playerId, 'wicket_keeper_details', $season);*/
          $wicketDetails = getWicketDetails ($playerId, $season);

          if ($season == 'All Time') {
            $matchesTotalCount = (int)getMatchTotalCount ($playerTypeId, $playerId, 'wicket_keeper_details', 'season 1') + (int)getMatchTotalCount ($playerTypeId, $playerId, 'wicket_keeper_details', 'season 2');
          } else if ($season == 'season 1' || $season == 'season 2') {
            $matchesTotalCount = (int)getMatchTotalCount ($playerTypeId, $playerId, 'wicket_keeper_details', $season);
          }


          break;
        case '4':
          /*$matchesCount1 = getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', $season);
          $matchesCount2 = getMatchTotalCount ($playerTypeId, $playerId, 'bowler_details', $season);*/
          $battingDetails = getBatsmanDetails ($playerId, $season);
          $bowlingDetails = getBowlingDetails ($playerId, $season);


          if ($season == 'All Time') {
            /*$matchesTotalCount = getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', 'season 1') + getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', 'season 2');*/
            $matchesCount1 = (int)getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', 'season 1') + (int)getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', 'season 2');
            $matchesCount2 = (int)getMatchTotalCount ($playerTypeId, $playerId, 'bowler_details', 'season 1') + (int)getMatchTotalCount ($playerTypeId, $playerId, 'bowler_details', 'season 2');
          } else if ($season == 'season 1' || $season == 'season 2') {
            $matchesCount1 = (int)getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details', $season);
            $matchesCount2 = (int)getMatchTotalCount ($playerTypeId, $playerId, 'bowler_details', $season);
          }


          $matchesTotalCount = $matchesCount1 + $matchesCount2;
          break;
      }

      if ($season == 'All Time') {
        $moccMatchCount = (int)getMoccMatchCount($playerId);
        $playerTotalMatchCount = (int)$matchesTotalCount + (int)$moccMatchCount;
      } else if ($season == 'season 1' || $season == 'season 2') {
        $playerTotalMatchCount = (int)$matchesTotalCount;
      } else {
        $playerTotalMatchCount = (int)getMoccSeasonMatchCount($playerId, $season);
      }
      
      $matchesWithMoccDetails = checkMatchesWithMocc($playerId, $season);
      $moccMatchBattings = getMoccMatchBattings($playerId, $season);
      $moccMatchBowlings = getMoccMatchBowlings($playerId, $season);
      $moccMatchWickets = getMoccMatchWickets($playerId, $season);
      $playerDetails[] = array('name' => "$name",'photoUrl' => "$photoUrl",'playerTypeName' => "$playerTypeName", 'matchesTotalCount' => "$playerTotalMatchCount");
      $playerDetails['battingDetails'] = $battingDetails;
      $playerDetails['bowlingDetails'] = $bowlingDetails;
      $playerDetails['wicketKeeperDetails'] = $wicketDetails;
      $playerDetails['moccMatchDatas'] = $matchesWithMoccDetails;
      $playerDetails['moccMatchBattings'] = $moccMatchBattings;
      $playerDetails['moccMatchBowlings'] = $moccMatchBowlings;
      $playerDetails['moccMatchWickets'] = $moccMatchWickets;
      return $playerDetails;
    }
        
    mysql_close($con);
  }
  
  function getPlayerTypeName ($playerTypeId) {
      $con = dbConnection();
    $sql = 'SELECT * FROM player_type WHERE player_type_id="'. $playerTypeId . '"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $playerTypeName = $row['player_type'];
      return $playerTypeName;
    }
    mysql_close($con);
  }
  
  function getPlayerPicUrl($photoId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM user_photos WHERE image_id="'. $photoId . '"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $playerpicUrl = $row['images_path'];
      return $playerpicUrl;
    }
    mysql_close($con);
  }

  function getMatchTotalCount($playerTypeId, $playerId, $matchTableName, $season) {
    $con = dbConnection();
    $sql = 'SELECT * FROM '. $matchTableName .' WHERE player_id="'. $playerId . '"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $matchescount = $row['matches'];
      return $matchescount;
    }
    mysql_close($con);
  }

  function getMoccMatchCount($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM match_players WHERE player_id="'. $playerId . '"';
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
    mysql_close($con);
  }

  function getMoccSeasonMatchCount($playerId, $season) {
    $con = dbConnection();
    $sql = 'SELECT * FROM match_players WHERE player_id="'. $playerId . '"and season="' . $season.'"';
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
    mysql_close($con);
  }

  function getBatsmanDetails ($playerId, $season) {
    $con = dbConnection();
    /*$sql = 'SELECT * FROM batsman_details WHERE player_id="'. $playerId . '"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQL_ASSOC);
      $battingStyle = $row['batting_style'];
      $totalInns = $row['inns'];
      $totalnotout = $row['not_out'];
      $battingRuns = $row['batting_runs'];
      $bowls = $row['bowls'];
      $strikeRate = $row['strike_rate'];
      $totalBatAverage = $row['bat_average'];
      $fours = $row['fours'];
      $sixs = $row['sixs'];
      $fiftys = $row['fiftys'];
      $centurys = $row['centurys'];
      $battingDetails[] = array('battingStyle' => "$battingStyle",'totalInns' => "$totalInns",'totalnotout' => "$totalnotout", 'battingRuns' => "$battingRuns",'bowls' => "$bowls",'strikeRate' => "$strikeRate",'totalBatAverage' => "$totalBatAverage", 'fours' => "$fours",'sixs' => "$sixs",'fiftys' => "$fiftys", 'centurys' => "$centurys");       
      return $battingDetails;
    }*/

    if ($season == 'All Time') { //add code for season 1 and 2
      $sql = 'SELECT * FROM batsman_details WHERE player_id="'. $playerId . '"and season="season 1"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $battingStyle = $row['batting_style'];
        $totalInns1 = $row['inns'];
        $totalnotout1 = $row['not_out'];
        $battingRuns1 = $row['batting_runs'];
        $bowls1 = $row['bowls'];
        $strikeRate1 = $row['strike_rate'];
        $totalBatAverage1 = $row['bat_average'];
        $fours1 = $row['fours'];
        $sixs1 = $row['sixs'];
        $fiftys1 = $row['fiftys'];
        $centurys1 = $row['centurys'];
        
      }

      $sql = 'SELECT * FROM batsman_details WHERE player_id="'. $playerId . '"and season="season 2"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $totalInns2 = $row['inns'];
        $totalnotout2 = $row['not_out'];
        $battingRuns2 = $row['batting_runs'];
        $bowls2 = $row['bowls'];
        $strikeRate2 = $row['strike_rate'];
        $totalBatAverage2 = $row['bat_average'];
        $fours2 = $row['fours'];
        $sixs2 = $row['sixs'];
        $fiftys2 = $row['fiftys'];
        $centurys2 = $row['centurys'];      
      }

      $totalInns = (int)$totalInns1 + (int)$totalInns2;
      $totalnotout = (int)$totalnotout1 + (int)$totalnotout2;
      $battingRuns = (int)$battingRuns1 + (int)$battingRuns2;
      $bowls = (int)$bowls1 + (int)$bowls2;
      $strikeRate = (int)$strikeRate1 + (int)$strikeRate2;
      $totalBatAverage = (int)$totalBatAverage1 + (int)$totalBatAverage2;
      $fours = (int)$fours1 + (int)$fours2;
      $sixs = (int)$sixs1 + (int)$sixs2;
      $fiftys = (int)$fiftys1 + (int)$fiftys2;
      $centurys = (int)$centurys1 + (int)$centurys2;
      $battingDetails[] = array('battingStyle' => "$battingStyle",'totalInns' => "$totalInns",'totalnotout' => "$totalnotout", 'battingRuns' => "$battingRuns",'bowls' => "$bowls",'strikeRate' => "$strikeRate",'totalBatAverage' => "$totalBatAverage", 'fours' => "$fours",'sixs' => "$sixs",'fiftys' => "$fiftys", 'centurys' => "$centurys");       
      return $battingDetails;
    } else if ($season == 'season 1' || $season == 'season 2') {
      $sql = 'SELECT * FROM batsman_details WHERE player_id="'. $playerId . '"and season="' . $season.'"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $battingStyle = $row['batting_style'];
        $totalInns = $row['inns'];
        $totalnotout = $row['not_out'];
        $battingRuns = $row['batting_runs'];
        $bowls = $row['bowls'];
        $strikeRate = $row['strike_rate'];
        $totalBatAverage = $row['bat_average'];
        $fours = $row['fours'];
        $sixs = $row['sixs'];
        $fiftys = $row['fiftys'];
        $centurys = $row['centurys'];
        $battingDetails[] = array('battingStyle' => "$battingStyle",'totalInns' => "$totalInns",'totalnotout' => "$totalnotout", 'battingRuns' => "$battingRuns",'bowls' => "$bowls",'strikeRate' => "$strikeRate",'totalBatAverage' => "$totalBatAverage", 'fours' => "$fours",'sixs' => "$sixs",'fiftys' => "$fiftys", 'centurys' => "$centurys");       
        return $battingDetails;
      }
    }

    mysql_close($con);
  }

  function getBowlingDetails ($playerId, $season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'SELECT * FROM bowler_details WHERE player_id="'. $playerId . '" and season="season 1"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $bowlingType = $row['bowling_type'];
        $overs1 = $row['overs'];
        $bowlingRuns1 = $row['bowling_runs'];
        $battingRuns1 = $row['batting_runs'];
        $wickets1 = $row['wickets'];
        $bowAvl1 = $row['bow_avl'];
        $eco1 = $row['eco'];
      }
      $sql = 'SELECT * FROM bowler_details WHERE player_id="'. $playerId . '" and season="season 2"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $overs2 = $row['overs'];
        $bowlingRuns2 = $row['bowling_runs'];
        $battingRuns2 = $row['batting_runs'];
        $wickets2 = $row['wickets'];
        $bowAvl2 = $row['bow_avl'];
        $eco2 = $row['eco'];        
      }
      $overs = (int)$overs1 + (int)$overs2;
      $bowlingRuns = (int)$bowlingRuns1 + (int)$bowlingRuns2;
      $battingRuns = (int)$battingRuns1 + (int)$battingRuns2;
      $wickets = (int)$wickets1 + (int)$wickets2;
      $bowAvl = (int)$bowAvl1 + (int)$bowAvl2;
      $eco = (int)$eco1 + (int)$eco2;
      $bowlingDetails[] = array('bowlingType' => "$bowlingType",'overs' => "$overs",'bowlingRuns' => "$bowlingRuns", 'battingRuns' => "$battingRuns",'wickets' => "$wickets",'bowAvl' => "$bowAvl",'eco' => "$eco");       
      return $bowlingDetails;
    } else if ($season == 'season 1' || $season == 'season 2') {
      $sql = 'SELECT * FROM bowler_details WHERE player_id="'. $playerId . '" and season="'. $season . '"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $bowlingType = $row['bowling_type'];
        $overs = $row['overs'];
        $bowlingRuns = $row['bowling_runs'];
        $battingRuns = $row['batting_runs'];
        $wickets = $row['wickets'];
        $bowAvl = $row['bow_avl'];
        $eco = $row['eco'];
        $bowlingDetails[] = array('bowlingType' => "$bowlingType",'overs' => "$overs",'bowlingRuns' => "$bowlingRuns", 'battingRuns' => "$battingRuns",'wickets' => "$wickets",'bowAvl' => "$bowAvl",'eco' => "$eco");       
        return $bowlingDetails;
      }
    }
        
    mysql_close($con);
  }

  function getWicketDetails ($playerId, $season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'SELECT * FROM wicket_keeper_details WHERE player_id="'. $playerId . '" and season="season 1"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $totalInns1 = $row['inns'];
        $totalnotout1 = $row['not_out'];
        $battingRuns1 = $row['batting_runs'];
        $bowls1 = $row['bowls'];
        $strikeRate1 = $row['strike_rate'];
        $totalBatAverage1 = $row['bat_average'];
        $fours1 = $row['fours'];
        $sixs1 = $row['sixs'];
        $fiftys1 = $row['fiftys'];
        $centurys1 = $row['century'];
        $stumping1 = $row['stumping'];
        $catches1 = $row['catches'];        
      }
      $sql = 'SELECT * FROM wicket_keeper_details WHERE player_id="'. $playerId . '" and season="season 2"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $totalInns2 = $row['inns'];
        $totalnotout2 = $row['not_out'];
        $battingRuns2 = $row['batting_runs'];
        $bowls2 = $row['bowls'];
        $strikeRate2 = $row['strike_rate'];
        $totalBatAverage2 = $row['bat_average'];
        $fours2 = $row['fours'];
        $sixs2 = $row['sixs'];
        $fiftys2 = $row['fiftys'];
        $centurys2 = $row['century'];
        $stumping2 = $row['stumping'];
        $catches2 = $row['catches'];           
      }
      $totalInns = (int)$totalInns1 + (int)$totalInns2;
      $totalnotout = (int)$totalnotout1 + (int)$totalnotout2;
      $battingRuns = (int)$battingRuns1 + (int)$battingRuns2;
      $bowls = (int)$bowls1 + (int)$bowls2;
      $strikeRate = (int)$strikeRate1 + (int)$strikeRate2;
      $totalBatAverage = (int)$totalBatAverage1 + (int)$totalBatAverage2;
      $fours =(int) $fours1 + (int)$fours2;
      $sixs = (int)$sixs1 + (int)$sixs2;
      $fiftys = (int)$fiftys1 + (int)$fiftys2;
      $centurys = (int)$centurys1 + (int)$centurys2;
      $stumping = (int)$stumping1 + (int)$stumping2;
      $catches = (int)$catches1 + (int)$catches2;
      $wicketKeeperDetails[] = array('totalInns' => "$totalInns",'totalnotout' => "$totalnotout", 'battingRuns' => "$battingRuns",'bowls' => "$bowls",'strikeRate' => "$strikeRate",'totalBatAverage' => "$totalBatAverage", 'fours' => "$fours",'sixs' => "$sixs",'fiftys' => "$fiftys", 'centurys' => "$centurys", 'stumping' => "$stumping", 'catches' => "$catches");    
      return $wicketKeeperDetails;
    } else if ($season == 'season 1' || $season == 'season 2') {
      $sql = 'SELECT * FROM wicket_keeper_details WHERE player_id="'. $playerId . '" and season="'. $season . '"';
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $totalInns = $row['inns'];
        $totalnotout = $row['not_out'];
        $battingRuns = $row['batting_runs'];
        $bowls = $row['bowls'];
        $strikeRate = $row['strike_rate'];
        $totalBatAverage = $row['bat_average'];
        $fours = $row['fours'];
        $sixs = $row['sixs'];
        $fiftys = $row['fiftys'];
        $centurys = $row['century'];
        $stumping = $row['stumping'];
        $catches = $row['catches'];
        $wicketKeeperDetails[] = array('totalInns' => "$totalInns",'totalnotout' => "$totalnotout", 'battingRuns' => "$battingRuns",'bowls' => "$bowls",'strikeRate' => "$strikeRate",'totalBatAverage' => "$totalBatAverage", 'fours' => "$fours",'sixs' => "$sixs",'fiftys' => "$fiftys", 'centurys' => "$centurys", 'stumping' => "$stumping", 'catches' => "$catches");    
        return $wicketKeeperDetails;
      }    
    }   
    mysql_close($con);
  }

  function checkMatchesWithMocc ($playerId, $season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'SELECT * from match_players where player_id="'. $playerId . '"';
    }
    else {
      $sql = 'SELECT * from match_players where player_id="'. $playerId . '" and season="'. $season . '"';
    }
    $moccMatchDetails = array();
    $i = 0;
    $result = mysqli_query($con, $sql);   
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      while($row = mysqli_fetch_assoc($result)) {
         $matcharray = array('matchId'=>$row['match_id'],'teamNAme'=>$row['team_name']);

        $sql1 = 'SELECT * FROM matches WHERE match_id="'. $row['match_id'] . '"';
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1)==0) {
        }
        else {
          $rowInner = mysqli_fetch_array($result1, MYSQL_ASSOC);
          $matcharray['matchNumber'] = $rowInner['match_number'];
          $matcharray['gameType'] = $rowInner['game_type'];
          $matcharray['date'] = $rowInner['date'];
          $matcharray['time'] = $rowInner['time'];
          $matcharray['venue'] = $rowInner['venue'];
          $matcharray['winnerTeam'] = $rowInner['winner_team_name'];
        }
        $moccMatchDetails[$i] = $matcharray;
        $i = $i + 1;
      }
      return $moccMatchDetails;
    }
    mysql_close($con);
  }

  function getMoccMatchBattings ($playerId, $season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'SELECT * FROM match_batsman_details WHERE player_id="'.$playerId.'"';
    } else {
      $sql = 'SELECT * FROM match_batsman_details WHERE player_id="'.$playerId.'" and season="'.$season.'"';
    }
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
    return false;
    }
    else {
      $battingRuns = 0;
      $bowls = 0;
      $strikeRate = 0;
      $fours = 0;
      $sixs = 0;
      $fiftys = 0;
      $centurys = 0;
      while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $battingRuns = $battingRuns + $row['batting_runs'];
        $bowls = $bowls + $row['balls'];
        $strikeRate = $strikeRate + $row['strike_rate'];
        $fours = $fours + $row['fours'];
        $sixs = $sixs + $row['sixs'];
        $fiftys = $fiftys + $row['fiftys'];
        $centurys = $centurys + $row['centuries'];
      }

    //get batting style
    $sqlbat = 'SELECT * FROM batsman_details WHERE player_id="'. $playerId . '"';
      $resultbat = mysqli_query($con, $sqlbat);
      if (mysqli_num_rows($resultbat)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($resultbat, MYSQL_ASSOC);
        $battingStyle = $row['batting_style'];
      }

      $matchBatDatas = array('battingStyle' => $battingStyle,'battingRuns' => $battingRuns,'bowls' => $bowls,'strikeRate' => $strikeRate,'fours' => $fours,'sixs' => $sixs,'fiftys' => $fiftys,'centurys' => $centurys); 
      return $matchBatDatas;
    }
    mysql_close($con);
  }

  function getMoccMatchBowlings ($playerId, $season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'SELECT * FROM match_bowler_details WHERE player_id="'.$playerId.'"';
    } else {
      $sql = 'SELECT * FROM match_bowler_details WHERE player_id="'.$playerId.'" and season="'.$season.'"';
    }
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
    return false;
    }
    else {
      $overs = 0;
      $bowling_runs = 0;
      $maiden = 0;
      $wicket = 0;
      $eco = 0;
      while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $overs = $overs + $row['overs'];
        $bowling_runs = $bowling_runs + $row['bowling_runs'];
        $maiden = $maiden + $row['maiden'];
        $wicket = $wicket + $row['wicket'];
        $eco = $eco + $row['eco'];
      }

      //get bowling style
      $sqlbowl = 'SELECT * FROM bowler_details WHERE player_id="'. $playerId . '"';
      $resultbowl = mysqli_query($con, $sqlbowl);
      if (mysqli_num_rows($resultbowl)==0) {
        return false;
      }
      else {
        $row = mysqli_fetch_array($resultbowl, MYSQL_ASSOC);
        $bowlingType = $row['bowling_type'];
      }

      $matchBallDatas = array('bowlingType' => $bowlingType, 'overs' => $overs,'bowling_runs' => $bowling_runs,'maiden' => $maiden,'wicket' => $wicket,'eco' => $eco); 
      return $matchBallDatas;
    }
    mysql_close($con);
  }

  function getMoccMatchWickets ($playerId, $season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'SELECT * FROM match_wicket_keeper_details WHERE player_id="'.$playerId.'"';
    } else {
      $sql = 'SELECT * FROM match_wicket_keeper_details WHERE player_id="'.$playerId.'" and season="'.$season.'"';
    }
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $battingRuns = 0;
      $bowls = 0;
      $strikeRate = 0;
      $fours = 0;
      $sixs = 0;
      $fiftys = 0;
      $centurys = 0;
      $stumping = 0;
      $catches = 0;
      while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $battingRuns = (int)$battingRuns + (int)$row['batting_runs'];
        $bowls = (int)$bowls + (int)$row['balls'];
        $strikeRate = (int)$strikeRate + (int)$row['strike_rate'];
        $fours = (int)$fours + (int)$row['fours'];
        $sixs = (int)$sixs + (int)$row['sixs'];
        $fiftys = (int)$fiftys + (int)$row['fiftys'];
        $centurys = (int)$centurys + (int)$row['centuries'];
        $stumping = (int)$stumping + (int)$row['stumping'];
        $catches = (int)$catches + (int)$row['catches'];
      }
      $matchWicketDatas = array('battingRuns' => $battingRuns,'bowls' => $bowls,'strikeRate' => $strikeRate,'fours' => $fours,'sixs' => $sixs,'fiftys' => $fiftys,'centurys' => $centurys,'stumping' => $stumping,'catches' => $catches); 
      return $matchWicketDatas;
    }
    mysql_close($con);
  }

  function getMatchList ($matchKeyWord) {
    $con = dbConnection();
    $matchList = array();
    $sql = 'SELECT * FROM matches WHERE game_type="'.$matchKeyWord.'"';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      $i = 0;
      while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $gameData = array ();
        $gameData ['matchNumber'] = $row['match_number'];
        $gameData ['date'] = $row['date'];
        $gameData ['time'] = $row['time'];
        $gameData ['venue'] = $row['venue'];
        $gameData ['firstTeamName'] = $row['first_team_name'];
        $gameData ['secondTeamName'] = $row['second_team_name'];
        $gameData ['winnerTeamName'] = $row['winner_team_name'];
        $matchList[$i] = $gameData;
        $i++;
      }     
      return $matchList;
    }
    mysql_close($con);
  }

  function getBattingRunsList ($season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'select player_id,sum(batting_runs) total from (select player_id,batting_runs from batsman_details union all select player_id,batting_runs from bowler_details union all select player_id,batting_runs from match_batsman_details) t group by player_id ORDER BY total DESC LIMIT 20';
    } else {
      $sql = 'select player_id,sum(batting_runs) total from (select player_id,batting_runs from batsman_details where season="'.$season.'" union all select player_id,batting_runs from bowler_details where season="'.$season.'" union all select player_id,batting_runs from match_batsman_details where season="'.$season.'") t group by player_id ORDER BY total DESC LIMIT 20';
    }

    $leadersList = array();
    $i = 0;
    $result = mysqli_query($con, $sql);   
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      while($row = mysqli_fetch_assoc($result)) {
        $leaderArray = array('playerId'=>$row['player_id'],'battingRuns'=>$row['total']); 

        $sqlName = 'select player_name from player where player_id="'.$row['player_id'].'"';


        $resultName = mysqli_query($con, $sqlName);
        if (mysqli_num_rows($resultName)==0) {
          return false;
        }
        else {
          $rowName = mysqli_fetch_assoc($resultName);
          $playerName = $rowName['player_name'];
        }
        $leaderArray['playerName'] = $playerName;
        $leadersList[$i] = $leaderArray;
        $i = $i + 1;
      }
      return $leadersList;
    }
  }

  function getWicketsList ($season) {
    $con = dbConnection();
    if ($season == 'All Time') {
      $sql = 'select player_id,sum(wickets) total from (select player_id,wickets from bowler_details union all select player_id,wicket from match_bowler_details) t group by player_id ORDER BY total DESC LIMIT 20';
    } else {
      $sql = 'select player_id,sum(wickets) total from (select player_id,wickets from bowler_details where season="'.$season.'" union all select player_id,wicket from match_bowler_details where season="'.$season.'") t group by player_id ORDER BY total DESC LIMIT 20';
    }


    $leadersList = array();
    $i = 0;
    $result = mysqli_query($con, $sql);   
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      while($row = mysqli_fetch_assoc($result)) {
        $leaderArray = array('playerId'=>$row['player_id'],'wickets'=>$row['total']);

        $sqlName = 'select player_name from player where player_id="'.$row['player_id'].'"';

        $resultName = mysqli_query($con, $sqlName);
        if (mysqli_num_rows($resultName)==0) {
          return false;
        }
        else {
          $rowName = mysqli_fetch_assoc($resultName);
          $playerName = $rowName['player_name'];
        }
        $leaderArray['playerName'] = $playerName;
            
        $leadersList[$i] = $leaderArray;
        $i = $i + 1;
      }
      return $leadersList;
    }
  }
?>