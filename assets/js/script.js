// JavaScript Document
$(document).ready(function(e) {
  setTime();  
    $('.add-match-li').hover(
    function() {
      $(this).find('.sub-menu').addClass('active');
    }, function() {
      $(this).find('.sub-menu').removeClass('active');
    }
  );

  $('.add-next-player-btn').on('click', function (e) {
    e.preventDefault();
    $(this).closest('.team-player-list').next('.team-player-list').show();
  });

  $('#send-message-to-mocc').on('click', function() {
    window.location = 'https://www.facebook.com/pg/mocckeralaindia/about/?ref=page_internal'
  });
  
  $('#player-type').on('change', function() {
    var playerType = $(this).val();
    $('#form-add-player').find('.hidden-groups').removeClass('active');
    switch (playerType) {
      case 'Batsman': $('.batting-style-sec').addClass('active');
                      break;
      case 'Bowler': $('.bowling-type-sec').addClass('active');
                     break;
      case 'wicket-keeper': $('.wicket-stat-sec').addClass('active');
                            break;
      case 'All-rounder': $('.batting-style-sec, .bowling-type-sec').addClass('active');
                          break;
    }
  });
  
  $('#match-value, #batting-runs-value').on('change', function () {
    var runs = parseInt($('#batting-runs-value').val());
    var matches = parseInt($('#match-value').val());
    var average = runs / matches;
    $('#bat-average-value').val(average);
  });
  
  $('#match-value-wicket, #batting-runs-value-wicket').on('change', function () {
    var runs = parseInt($('#batting-runs-value-wicket').val());
    var matches = parseInt($('#match-value-wicket').val());
    var average = runs / matches;
    $('#bat-average-value-wicket').val(average);
  });
  
  $('#match-time-hh, #match-time-min, #match-time-md').on('change', function() {
    setTime();
  });
  
  $('.player-type-selection').on('change', function () {
    var playerType = $(this).val(),
      currentPlayerList = $(this).parents('.team-player-list');   
    currentPlayerList.find('.hidden-groups').removeClass('active');
    switch (playerType) {
      case 'Batsman': $(currentPlayerList).find('.batting-stats').addClass('active');
                      break;
      case 'Bowler': $(currentPlayerList).find('.bawling-stats').addClass('active');
                     break;
      case 'wicket-keeper': $(currentPlayerList).find('.wicket-stats').addClass('active');
                            break;
      case 'All-rounder': $(currentPlayerList).find('.batting-stats, .bawling-stats').addClass('active');
                          break;
    }
  });
  
  $('#match-add-team-next').on('click', function (e) {
    e.preventDefault();
    $('.match-details-sec').addClass('hidden-groups');
    $('.team-details-sec').addClass('active');
  });
  
  $('#add-players-to-team').on('click', function (e) {
    e.preventDefault();
    $('.team-details-sec').removeClass('active');
    $('.match-details-sec').removeClass('hidden-groups');
  }); 
    
  $('.player-name-ip').on('keyup',function () {
    var serachTerm = $(this).val();
    if(serachTerm.length > 0) {
      if($('.search-suggestions').length > 0)
        $('.search-suggestions').remove();
      var searchUl = document.createElement('datalist'),
          playerWrapper = $(this).closest('.form-group');
      $(searchUl).addClass('search-suggestions');
      $(searchUl).attr('id',  'player-names');        
      $(playerWrapper).append(searchUl); 
      $.ajax({ 
        url: '../controller/player-search.php',
        data: {search: serachTerm},
        type: 'post',
        success: function(searchList) {
          console.log('searchList:' + searchList);
          var suggestionList = JSON.parse(searchList),
              searchItem,
            optionsAll = '';          
          for(i = 0; i < suggestionList.length; i++) {
            searchItem = '<option value="' + suggestionList[i] + '">';
            optionsAll = optionsAll + searchItem;           
          }
          $(searchUl).html(optionsAll);
        }
            });
    }
  });
  
  $('#search-player-submit').on('click', function (e) {
    e.preventDefault();
    console.log('hi');
    var playerName = $('#search-player-name').val();
    if(playerName.length > 0) {             
      $.ajax({ 
        url: '../controller/player-details.php',
        data: {playerName: playerName},
        type: 'post',
        success: function(playerDetails) {
          debugger;
          console.log('playerDetails:' + playerDetails);
          var tableElement = $('.player-detail-table'),
              playerDetailsList = JSON.parse(playerDetails),
              name = playerDetailsList[0].name,
              photoUrl = playerDetailsList[0].photoUrl,
              playerType = playerDetailsList[0].playerTypeName,
              matchesTotalCount = playerDetailsList[0].matchesTotalCount,
              battingDetails = playerDetailsList.battingDetails[0],
              moccMatchBattingDetails = playerDetailsList.moccMatchBattings,
              bowlingDetails = playerDetailsList.bowlingDetails[0],
              moccBowlingDetails = playerDetailsList.moccMatchBowlings,
              wicketKeeperDetails = playerDetailsList.wicketKeeperDetails[0],
              moccWicketKeeperDetails = playerDetailsList.moccMatchWickets,
              moccMatchDatas = playerDetailsList.moccMatchDatas,
              playerMatchtrHtml = '',
              battingStyle, totalIns, totalNotout, battingRuns, balls, strikeRate, batAverage,
              totalFours, totalSixs, totalFiftys, totalCenturies, totalOvers, bowlingRuns,
              bowlerBatRuns, wickets, bowAvl, maiden, totalEco, totalStumping, totalCatches;
          tableElement.addClass('active');
          photoUrl = window.location.href.split("views")[0] + 'assets/' + photoUrl.replace(/\\\//g, "/").split("assets")[1];
          console.log('photoUrl:' + photoUrl);
          tableElement.find('.profile-pic').attr('src', photoUrl);
          tableElement.find('.player-name').html(name);
          tableElement.find('.player-type-td').html(playerType);
          tableElement.find('.total-match-count').html(matchesTotalCount);
          for (var i = 0; i < moccMatchDatas.length; i++) {
            var matchNumber = moccMatchDatas[i].matchNumber,
                playergameType = moccMatchDatas[i].gameType,
                playerMatchdate = moccMatchDatas[i].date.replace(/\\\//g, "/"),
                playerMatchTime = moccMatchDatas[i].time,
                playerMatchVenue = moccMatchDatas[i].venue,
                playerMatchTeam = moccMatchDatas[i].teamNAme,
                playerMatchWinnerTeam = moccMatchDatas[i].winnerTeam;
            playerMatchtrHtml = playerMatchtrHtml + '<tr><td>'+matchNumber+'</td>';
            playerMatchtrHtml = playerMatchtrHtml + '<td>'+playergameType+'</td>';
            playerMatchtrHtml = playerMatchtrHtml + '<td>'+playerMatchdate+'</td>';
            playerMatchtrHtml = playerMatchtrHtml + '<td>'+playerMatchTime+'</td>';
            playerMatchtrHtml = playerMatchtrHtml + '<td>'+playerMatchVenue+'</td>';
            playerMatchtrHtml = playerMatchtrHtml + '<td>'+playerMatchTeam+'</td>';
            playerMatchtrHtml = playerMatchtrHtml + '<td>'+playerMatchWinnerTeam+'</td>';
            playerMatchtrHtml = playerMatchtrHtml + '</tr>'        
          }
          $('.player-match-detail-list-tbody').html(playerMatchtrHtml);
          if ((battingDetails != 'false' && battingDetails != '' && battingDetails != undefined ) || 
            (moccMatchBattingDetails != 'false' && moccMatchBattingDetails != '' && moccMatchBattingDetails != undefined )) {
            $('.batting-details').addClass('active');
            tableElement.find('.batting-style-value').html(battingDetails.battingStyle);
            if (battingDetails != 'false' && battingDetails != '' && battingDetails != undefined) {
              battingStyle = battingDetails.battingStyle;
              totalIns = battingDetails.totalInns;
              totalNotout = battingDetails.totalnotout;
              battingRuns = battingDetails.battingRuns;
              balls = battingDetails.bowls;
              strikeRate = battingDetails.strikeRate;
              batAverage = battingDetails.totalBatAverage;
              totalFours = battingDetails.fours;
              totalSixs = battingDetails.sixs;
              totalFiftys = battingDetails.fiftys;
              totalCenturies = battingDetails.centurys;
            }
            if ((battingDetails != 'false' && battingDetails != '' && battingDetails != undefined) && 
            (moccMatchBattingDetails != 'false' && moccMatchBattingDetails != '' && moccMatchBattingDetails != undefined)) {
              battingRuns = battingRuns + moccMatchBattingDetails.battingRuns;
              balls = balls + moccMatchBattingDetails.bowls;
              strikeRate = strikeRate + moccMatchBattingDetails.strikeRate;
              totalFours = totalFours + moccMatchBattingDetails.fours;
              totalSixs = totalSixs + moccMatchBattingDetails.sixs;
              totalFiftys = totalFiftys + moccMatchBattingDetails.fiftys;
              totalCenturies = totalCenturies + battingDetails.centurys;
            }
            else if (moccMatchBattingDetails != 'false' && moccMatchBattingDetails != '' && moccMatchBattingDetails != undefined) {
              battingRuns = moccMatchBattingDetails.battingRuns;
              balls = moccMatchBattingDetails.bowls;
              strikeRate = moccMatchBattingDetails.strikeRate;
              totalFours = moccMatchBattingDetails.fours;
              totalFiftys = moccMatchBattingDetails.fiftys;
              totalCenturies = moccMatchBattingDetails.centurys;
            }
            $('.batting-style-value').html(battingStyle);
            $('.batting-total-inns').html(totalIns);
            $('.batting-total-notout').html(totalNotout);
            $('.batting-total-runs').html(battingRuns);
            $('.batting-total-balls').html(balls);
            $('.batting-strike-rate').html(strikeRate);
            $('.batting-bat-average').html(batAverage);
            $('.batting-fours').html(totalFours);
            $('.batting-sixs').html(totalSixs);
            $('.batting-fiftys').html(totalFiftys);
            $('.batting-centuries').html(totalCenturies);
          }

          if ((bowlingDetails != 'false' && bowlingDetails != '' && bowlingDetails != undefined) || 
            (moccBowlingDetails != 'false' && moccBowlingDetails != '' && moccBowlingDetails != undefined)) {
            $('.bowling-details').addClass('active');
            tableElement.find('.bowling-type-value').html(bowlingDetails.bowlingType);
            if (bowlingDetails != 'false' && bowlingDetails != '' && bowlingDetails != undefined) {             
              totalOvers = bowlingDetails.overs;
              bowlingRuns = bowlingDetails.bowlingRuns;
              bowlerBatRuns = bowlingDetails.battingRuns;
              wickets = bowlingDetails.wickets;
              bowAvl = bowlingDetails.bowAvl;
              totalEco = bowlingDetails.eco;
            }
            if ((bowlingDetails != 'false' && bowlingDetails != '' && bowlingDetails != undefined) && 
            (moccBowlingDetails != 'false' && moccBowlingDetails != '' && moccBowlingDetails != undefined)) {
              totalOvers = totalOvers + moccBowlingDetails.overs;
              bowlingRuns = bowlingRuns + moccBowlingDetails.bowling_runs;
              bowlerBatRuns = bowlerBatRuns + bowlingDetails.battingRuns;
              wickets = wickets + moccBowlingDetails.wicket;
              maiden = moccBowlingDetails.maiden;
              totalEco = totalEco + moccBowlingDetails.eco;
            }
            else if (moccBowlingDetails != 'false' && moccBowlingDetails != '' && moccBowlingDetails != undefined) {
              totalOvers = moccBowlingDetails.overs;
              bowlingRuns = moccBowlingDetails.bowling_runs;
              bowlerBatRuns = moccBowlingDetails.battingRuns;
              wickets = moccBowlingDetails.wickets;
              bowAvl = moccBowlingDetails.bowAvl;
              totalEco = moccBowlingDetails.eco;
            }
            $('.bowling-overs').html(totalOvers);
            $('.bowling-runs').html(bowlingRuns);
            $('.bowler-batting-runs').html(bowlerBatRuns);
            $('.bowler-wickets').html(wickets);
            $('.bowler-bow-avl').html(bowAvl);
            $('.bowler-maiden').html(maiden);
            $('.bowler-eco').html(totalEco);
          }

          if ((wicketKeeperDetails != 'false' && wicketKeeperDetails != '' && wicketKeeperDetails != undefined) || 
            (moccWicketKeeperDetails != 'false' && moccWicketKeeperDetails != '' && moccWicketKeeperDetails != undefined)) {
            $('.wicket-keeper-details').addClass('active');
            if (wicketKeeperDetails != 'false' && wicketKeeperDetails != '' && wicketKeeperDetails != undefined) {
              totalIns = wicketKeeperDetails.totalInns;
              totalNotout = wicketKeeperDetails.totalnotout;
              battingRuns = wicketKeeperDetails.battingRuns;
              balls = wicketKeeperDetails.bowls;
              strikeRate = wicketKeeperDetails.strikeRate;
              batAverage = wicketKeeperDetails.totalBatAverage;
              totalFours = wicketKeeperDetails.fours;
              totalSixs = wicketKeeperDetails.sixs;
              totalFiftys = wicketKeeperDetails.fiftys;
              totalCenturies = wicketKeeperDetails.centurys;
              totalStumping = wicketKeeperDetails.stumping;
              totalCatches = wicketKeeperDetails.catches;
            }
            if ((wicketKeeperDetails != 'false' && wicketKeeperDetails != '' && wicketKeeperDetails != undefined) && 
            (moccWicketKeeperDetails != 'false' && moccWicketKeeperDetails != '' && moccWicketKeeperDetails != undefined)) {
              battingRuns = battingRuns + moccWicketKeeperDetails.battingRuns;
              balls = balls + moccWicketKeeperDetails.bowls;
              strikeRate = strikeRate + moccWicketKeeperDetails.strikeRate;
              totalFours = totalFours + moccWicketKeeperDetails.fours;
              totalSixs = totalSixs + moccWicketKeeperDetails.sixs;
              totalFiftys = totalFiftys + moccWicketKeeperDetails.fiftys;
              totalCenturies = totalCenturies + moccWicketKeeperDetails.centurys;
              totalStumping = totalStumping + moccWicketKeeperDetails.stumping;
              totalCatches = totalCatches + moccWicketKeeperDetails.catches;
            }
            else if (moccWicketKeeperDetails != 'false' && moccWicketKeeperDetails != '' && moccWicketKeeperDetails != undefined) {
              battingRuns = moccWicketKeeperDetails.battingRuns;
              balls = moccWicketKeeperDetails.bowls;
              strikeRate = moccWicketKeeperDetails.strikeRate;
              totalFours = moccWicketKeeperDetails.fours;
              totalSixs = totalSixs + moccWicketKeeperDetails.sixs;
              totalFiftys = moccWicketKeeperDetails.fiftys;
              totalCenturies = moccWicketKeeperDetails.centurys;
              totalStumping = moccWicketKeeperDetails.stumping;
              totalCatches = moccWicketKeeperDetails.catches;
            }
            $('.wkt-total-inns').html(totalIns);
            $('.wkt-total-notout').html(totalNotout);
            $('.wkt-batting-run').html(battingRuns);
            $('.wkt-balls').html(balls);
            $('.wkt-strike-rate').html(strikeRate);
            $('.wkt-bat-average').html(batAverage);
            $('.wkt-total-fours').html(totalFours);
            $('.wkt-total-six').html(totalSixs);
            $('.wkt-fifties').html(totalFiftys);
            $('.wkt-centuries').html(totalCenturies);
            $('.wkt-stumping').html(totalStumping);
            $('.wkt-catches').html(totalCatches);
          }
        }
      });
    }
  });
  
  $('#match-first-team').on('change', function () {
    $('#details-first-team').val($('#match-first-team').val());
  });
  
  $('#details-first-team').on('change', function () {
    $('#match-first-team').val($('#details-first-team').val());
  });
  
  $('#match-second-team').on('change', function () {
    $('#details-second-team').val($('#match-second-team').val());
  });
  
  $('#details-second-team').on('change', function () {
    $('#match-second-team').val($('#details-second-team').val());
  });
  
  $('.batting-runs, .balls-ip').on('change', function () {
    var statRow = $(this).closest('.stat-row'),
      battingRuns = statRow.find('.batting-runs').val(),
      bowlingRuns = statRow.find('.balls-ip').val(),
      strikeRate = (parseInt(battingRuns) / parseInt(bowlingRuns)) * 100,
      fiftys,
      centuries;
    statRow.find('.strike-rate').val(strikeRate);
    if (battingRuns > 49 ) {
      centuries = battingRuns / 100;
      fiftys = (battingRuns % 100) / 50;
    }
    else {
      centuries = 0;
      fiftys = 0;
    }
    statRow.find('.centuries-ip').val(parseInt(centuries));
    statRow.find('.fiftys-ip').val(parseInt(fiftys));
  });
  
  $('.bowling-run-ip, .over-ip').on('change', function () {
    var statRow = $(this).closest('.stat-row'),
      bowlingRuns = statRow.find('.bowling-run-ip').val(),
      overs = statRow.find('.over-ip').val(),
      eco = parseInt(bowlingRuns) / parseInt(overs);
    statRow.find('.eco-ip').val(eco);
  });

  if($('#form-view-match-details').length > 0) {
    console.log('hi');
    var matchType = $('#match-type-name').val();
    if(matchType != null || matchType != undefined) {             
      $.ajax({ 
        url: '../controller/controller.php',
        data: {match_type: matchType},
        type: 'post',
        success: function(matchDetails) {
          if (matchDetails != 'false') {
            var gameDetailsList = JSON.parse(matchDetails);
            console.log('gameDetailsList:' + matchDetails);
            for (var i = 0; i < gameDetailsList.length; i++) {
              var gameData = gameDetailsList[i],
                  tablehtml = '<tr><td>'+gameData.matchNumber+'</td>';                  
                  tablehtml = tablehtml + '<td>'+gameData.date.replace(/\\\//g, "/")+'</td>';
                  tablehtml = tablehtml + '<td>'+gameData.time+'</td>';
                  tablehtml = tablehtml + '<td>'+gameData.venue+'</td>';
                  tablehtml = tablehtml + '<td>'+gameData.firstTeamName+' <span class="vs-icon">X</span> '+gameData.secondTeamName+'</td>';
                  tablehtml = tablehtml + '<td>'+gameData.winnerTeamName+'</td>';
                  tablehtml = tablehtml + '</tr>';
            }
            $('.game-list-tbody').append(tablehtml);
          }
          else {
            $('.game-list-tbody').append('<tr><td colspan="6" style="text-align:center">No matches available</td></tr>');
          }
          
        }
            });
    }
  }
  
  $('#add-player-submit').on('click', function (e) {
    var playerName = $('#player-name').val(),
        playerType = $('#player-type').val(),
        photoUpload = $('#photo-upload').val();
    if (playerName == '' || playerName == undefined ||
      playerType == '' || playerType == undefined ||
      photoUpload == '' || photoUpload == undefined) {
      $('.validation-error-msg').show();
      e.preventDefault();
      if (playerName == '' || playerName == undefined) 
        $('.validation-error-msg').html('Please enter player name');
      else if (playerType == '' || playerType == undefined)
        $('.validation-error-msg').html('Please select a player type');
      else if (photoUpload == '' || photoUpload == undefined)
        $('.validation-error-msg').html('Please upload a photo');
    } else {
      $('.validation-error-msg').hide();
    }    
  });

  $('#match-submit').on('click', function (e) {
    var matchNumber = $('#match-number').val(),
        gameType = $('#game-type').val(),
        matchDate = $('#match-date').val(),
        matchTime = $('#match-time').val(),
        venue = $('#match-venue').val(),
        firstTeam = $('#match-first-team').val(),
        secondTeam = $('#match-second-team').val(),
        matchResult = $('#match-result').val();
    if (matchNumber == '' || matchNumber == undefined ||
      gameType == '' || gameType == undefined ||
      matchDate == '' || matchDate == undefined ||
      matchTime == '' || matchTime == undefined ||
      venue == '' || venue == undefined ||
      firstTeam == '' || firstTeam == undefined ||
      secondTeam == '' || secondTeam == undefined ||
      matchResult == '' || matchResult == undefined) {
      $('.validation-error-msg').html('Please fill all required fields').show();
      e.preventDefault();
    } else {
      $('.validation-error-msg').hide();
    }    
  });


  function setTime() {
    var hours = $('#match-time-hh').val(),
      minutes = $('#match-time-min').val(),
      meridiem = $('#match-time-md').val();
    $('#match-time').val(hours + ':' + minutes + ' ' + meridiem);
  }
});