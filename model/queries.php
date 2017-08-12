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
  
  function addToBatsmanDetails($playerId, $battingStyle, $matchValue, $innsValue, $notOutValue, $battingRuns, $bowlsValue, $strikeRateValue, $batAverage, $foursValue, $sixsValue, $fiftysValue, $centuryValue) {
    $con = dbConnection();
    $sql = 'INSERT INTO batsman_details(player_id, batting_style, matches, inns, not_out, batting_runs, bowls, strike_rate, bat_average, fours, sixs, fiftys, centurys) VALUES ("' . $playerId . '", "'. $battingStyle .'", "'. $matchValue .'", "'. $innsValue .'", "'. $notOutValue .'", "'. $battingRuns .'", "'. $bowlsValue .'", "'. $strikeRateValue .'", "'. $batAverage .'", "'. $foursValue .'", "'. $sixsValue .'", "'. $fiftysValue .'", "'. $centuryValue .'")';
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
   function addToBowlerDetails($playerId, $bowlingType, $matchValue, $overValue, $bowllingRuns, $battingRuns, $wicketValue, $bowAvlValue, $ecoValue) {
    $con = dbConnection();
    $sql = 'INSERT INTO bowler_details(player_id, bowling_type, matches, overs, bowling_runs, batting_runs, wickets, bow_avl,  eco) VALUES ("' . $playerId . '", "'. $bowlingType .'", "'. $matchValue .'", "'. $overValue .'", "'. $bowllingRuns .'", "'. $battingRuns .'", "'. $wicketValue .'", "'. $bowAvlValue .'", "'. $ecoValue .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    mysql_close($con);
  }
  
  function addToWicketKeeperDetails ($playerId, $wicketMatchValue, $wicketInnsValue, $wicketNotOutValue, $wicketBattingRuns, $wicketBowls, $wicketstrikeRate, $wicketBatAvg, $wicketFours, $wicketSixs, $wicketFiftys, $wicketCentury, $wicketStumping, $wicketCatches) {
    $con = dbConnection();
    $sql = 'INSERT INTO wicket_keeper_details(player_id, matches, inns, not_out, batting_runs, bowls, strike_rate, bat_average, fours, sixs, fiftys, century, stumping, catches) VALUES ("' . $playerId . '", "'. $wicketMatchValue .'", "'. $wicketInnsValue .'", "'. $wicketNotOutValue .'", "'. $wicketBattingRuns .'", "'. $wicketBowls .'", "'. $wicketstrikeRate .'", "'. $wicketBatAvg .'", "'. $wicketFours .'", "'. $wicketSixs .'", "'. $wicketFiftys .'", "'. $wicketCentury .'", "'. $wicketStumping .'", "'. $wicketCatches .'")';
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
  
  function addMatch($matchNumber,$gameType,$matchDate,$matchTime,$matchVenue,$firstTeam,$secondTeam,$winnerTeam) {
    $con = dbConnection();
    $sql = 'INSERT INTO matches (match_number, game_type, date, time, venue, first_team_name, second_team_name, winner_team_name) VALUES ("' . $matchNumber . '", "'. $gameType .'", "'. $matchDate .'", "'. $matchTime .'", "'. $matchVenue .'", "'. $firstTeam .'", "'. $secondTeam .'", "'. $winnerTeam .'")';
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
  
  function AddMatchTeamPlayer ($playerId,$matchId,$teamName,$playerTypeId) {
    $con = dbConnection();
    $sql = 'INSERT INTO match_players (player_id, match_id, team_name, player_type_id) VALUES ("' . $playerId . '", "'. $matchId .'", "'. $teamName .'", "'. $playerTypeId .'")';
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
  
  function getPlayerDetails ($playerName) {
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
          $matchesTotalCount = getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details');
          $battingDetails = getBatsmanDetails ($playerId);
          break;
        case '2':
          $matchesTotalCount = getMatchTotalCount($playerTypeId, $playerId, 'bowler_details'); 
          $bowlingDetails = getBowlingDetails ($playerId);
          break;
        case '3':
          $matchesTotalCount = getMatchTotalCount ($playerTypeId, $playerId, 'wicket_keeper_details');
          $wicketDetails = getWicketDetails ($playerId);
          break;
        case '4':
          $matchesCount1 = getMatchTotalCount ($playerTypeId, $playerId, 'batsman_details');
          $matchesCount2 = getMatchTotalCount ($playerTypeId, $playerId, 'bowler_details');
          $battingDetails = getBatsmanDetails ($playerId);
          $bowlingDetails = getBowlingDetails ($playerId);
          $matchesTotalCount = $matchesCount1 + $matchesCount2;
          break;
      }
      $moccMatchCount = getMoccMatchCount($playerId);
      $playerTotalMatchCount = $matchesTotalCount + $moccMatchCount;
      $matchesWithMoccDetails = checkMatchesWithMocc($playerId);
      $moccMatchBattings = getMoccMatchBattings($playerId);
      $moccMatchBowlings = getMoccMatchBowlings($playerId);
      $moccMatchWickets = getMoccMatchWickets($playerId);
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

  function getMatchTotalCount($playerTypeId, $playerId, $matchTableName) {
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

  function getBatsmanDetails ($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM batsman_details WHERE player_id="'. $playerId . '"';
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
    mysql_close($con);
  }

  function getBowlingDetails ($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM bowler_details WHERE player_id="'. $playerId . '"';
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
    mysql_close($con);
  }

  function getWicketDetails ($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM wicket_keeper_details WHERE player_id="'. $playerId . '"';
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
    mysql_close($con);
  }

  function checkMatchesWithMocc ($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * from match_players';
    $moccMatchDetails = array();
    $i = 0;
    $result = mysqli_query($con, $sql);   
    if (mysqli_num_rows($result)==0) {
      return false;
    }
    else {
      while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
         $matcharray = array('matchId'=>$row['match_id'],'teamNAme'=>$row['team_name']);

        $sql = 'SELECT * FROM matches WHERE match_id="'. $row['match_id'] . '"';
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)==0) {
          return false;
        }
        else {
          $rowInner = mysqli_fetch_array($result, MYSQL_ASSOC);
          $matcharray['matchNumber'] = $rowInner['match_number'];
          $matcharray['gameType'] = $rowInner['game_type'];
          $matcharray['date'] = $rowInner['date'];
          $matcharray['time'] = $rowInner['time'];
          $matcharray['venue'] = $rowInner['venue'];
          $matcharray['winnerTeam'] = $rowInner['winner_team_name'];
        }
        $moccMatchDetails[$i++] = $matcharray;
      }
      return $moccMatchDetails;
    }
    mysql_close($con);
  }

  function getMoccMatchBattings ($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM match_batsman_details WHERE player_id="'.$playerId.'"';
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
      $matchBatDatas = array('battingRuns' => $battingRuns,'bowls' => $bowls,'strikeRate' => $strikeRate,'fours' => $fours,'sixs' => $sixs,'fiftys' => $fiftys,'centurys' => $centurys); 
      return $matchBatDatas;
    }
    mysql_close($con);
  }

  function getMoccMatchBowlings ($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM match_bowler_details WHERE player_id="'.$playerId.'"';
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
      $matchBallDatas = array('overs' => $overs,'bowling_runs' => $bowling_runs,'maiden' => $maiden,'wicket' => $wicket,'eco' => $eco); 
      return $matchBallDatas;
    }
    mysql_close($con);
  }

  function getMoccMatchWickets ($playerId) {
    $con = dbConnection();
    $sql = 'SELECT * FROM match_wicket_keeper_details WHERE player_id="'.$playerId.'"';
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
        $battingRuns = $battingRuns + $row['batting_runs'];
        $bowls = $bowls + $row['balls'];
        $strikeRate = $strikeRate + $row['strike_rate'];
        $fours = $fours + $row['fours'];
        $sixs = $sixs + $row['sixs'];
        $fiftys = $fiftys + $row['fiftys'];
        $centurys = $centurys + $row['centuries'];
        $stumping = $stumping + $row['stumping'];
        $catches = $catches + $row['catches'];
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
?>