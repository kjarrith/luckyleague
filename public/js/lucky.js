$(document).on('touchstart', '.phone-li.leaderboards', function(e) {

  if ($( '#left-sidebar' ).hasClass( 'show' )) {
    $('#left-sidebar').removeClass('show');
  } else {
    $('#left-sidebar').addClass('show');
  };

});

$(document).on('focus', '.event-bet-input', function() {
      $(this).addClass('selected');
});

$(document).on('blur', '.event-bet-input', function() {
      $(this).removeClass('selected');
    });

$(document).on('touchstart', '.phone-li.userinfo', function(e) {

  if ($( '#right-sidebar' ).hasClass( 'show' )) {
    $('#right-sidebar').removeClass('show');
  } else {
    $('#right-sidebar').addClass('show');
  };

});

$(document).on('click', '.opacity.closed', function(e) {
        e.preventDefault();

        $( "#attentionBox" )
              .text("Betting for this event has closed")
              .css("background-color", "#ef5350")
              .animate({ bottom: "0px" },1000)
              .delay(2500)
              .animate({ bottom: "-200px" }, 1000 )
    });

$(document).on('click', '.navlink.availablebets', function() {
        $('.navlink').removeClass('selected');
        $(this).addClass('selected');
        $('.secondsection').hide();
        $('.firstsection').show();
    });

$(document).on('click', '.navlink.placedbets', function() {
        $('.navlink').removeClass('selected');
        $(this).addClass('selected');
        $('.firstsection').hide();
        $('.secondsection').show();
    });

$(document).on('click', '.event-bet-option', function(e) {
        $('.chosen').removeClass('chosen');

        if($(this).hasClass('opacity')) {
          $( "#attentionBox" )
              .text("You can't bet twice on the same stuff!")
              .css("background-color", "#ef5350")
              .animate({ bottom: "0px" },1000)
              .delay(2500)
              .animate({ bottom: "-200px" }, 1000 )

        } else {
          var bet_odds = $(this).find('.event-bet-odds').text();
          var bet_title = $(this).attr('data-bet-title');

          console.log(bet_odds);
          console.log(bet_title);

          if ($(this).hasClass('chosen')) {
          } else {
              $(this).closest('.event-bet').find('.bet-actions').show();
              $(this).addClass('chosen');
          }
        };

        // $('.addEventForm').find('[name="startTime"]').val(startTime);
        // $('.addEventForm').find('[name="employee_id"]').val(employee_id);

  });

$(document).on('click', '.cancelbet', function() {
        $(this).closest('.event-bet').find('.chosen').find('.bet-title').show();
        $(this).closest('.event-bet').find('.chosen').find('.event-bet-input').hide();
        $(this).closest('.event-bet').find('.bet-actions').hide();
        $(this).closest('.event-bet').find('.chosen').removeClass('chosen');

        // $('.addEventForm').find('[name="startTime"]').val(startTime);
        // $('.addEventForm').find('[name="employee_id"]').val(employee_id);

});

$(document).on('click', '.placebet', function() {

        //Get the stake
        $(this).closest('.bet-actions').find('.fa-gavel').hide();
        $(this).closest('.bet-actions').find('.fa-circle-o-notch').show();

        //create a local variable for this to use in Ajax call
        var $thisel = $(this);

        //Get the stake
        var betstake = $(this).closest('.bet-actions').find('.event-bet-input').val();

        //Get the betling id
        var betlingid = $(this).closest('.event-bet').find('.chosen').attr('data-betling-id');

        //Get the bet id
        var betid = $(this).closest('.event-bet').find('.chosen').attr('data-bet-id');

        //Get the odds
        var betodds = $(this).closest('.event-bet').find('.chosen').find('.event-bet-odds').text();

        //calculate balance after transaction to check if bet is eligable
        var $el = $(".currentUserBalance"),
        originalColor = $el.css("color");

        var currentBalance = parseFloat($el.text());

        var newBalance = currentBalance - betstake;

        //Calculate new xp after transaction to act on
        var $el2 = $(".current-xp"),
        originalColor2 = $el2.css("color");

        var currentXp = parseFloat($el2.text());

        var $el3 = $(".count-inner")
        var currentCount = parseFloat($el3.text());

        var $el4 = $(".needed-xp")
        var neededXP = parseFloat($el4.text());

        var newXp = currentXp + 5;

        var newxpBarLength = (newXp / neededXP) * 100;

        //log for debugging
        console.log(betstake);
        console.log(betodds);
        console.log(betid);
        console.log(betlingid);

        if (betstake == 0) {

            //IF BALANCE IS LESS THAN 0 AFTER TRANSACTION, ECCO ATTENTIONBOX
            $( "#attentionBox" )
              .text("You can't bet 0 coins")
              .css("background-color", "#ef5350")
              .animate({ bottom: "0px" },1000)
              .delay(2500)
              .animate({ bottom: "-200px" }, 1000 )

        } else if (newBalance >= 0) {

          //INITIATE AJAX IF BALANCE IS MORE THAN 0 AFTER TRANSACTION
          $.ajax({
            type: "POST",
            url: "/createBet",
            data: {
              stake : betstake,
              odds : betodds,
              betId : betid,
              betlingId : betlingid
            },
            success: function(data){

              $thisel.closest('.bet-actions').find('.fa-circle-o-notch').hide();
              $thisel.closest('.bet-actions').find('.fa-gavel').show();

              if(data=='true'){
                //MAKE CHANGES TO DOM
                console.log('success');

                $thisel.closest('.event-bet').find('.bet-actions').hide();
                $thisel.closest('.event-bet').find('.chosen').addClass('opacity');
                $thisel.closest('.event-bet').find('.chosen').removeClass('chosen');

                $el.css("color", "red");
                setTimeout(function(){
                  $el.css("color", originalColor);
                }, 3000);

                if ($.isNumeric(currentCount)) {
                  $('.count-inner').text(currentCount + 1);
                };

                $('.currentUserBalance').text(newBalance);
                $('.current-xp').text(newXp);

                $( ".profile-xp" ).animate({
                  width: newxpBarLength + "%"
                });

                $('#profile-new-xp')
                .text('+ ' + newXp + ' xp')
                .fadeIn(500)
                .delay(2000)
                .fadeOut(500)

                $( "#attentionBox" )
                .text('Bet Placed!')
                .css("background-color", "#81C784")
                .animate({ bottom: "0px" },1000)
                .delay(2500)
                .animate({ bottom: "-200px" }, 1000 )

                //LEVEL UP AJAX CALL
                if(newXp >= neededXP) {
                  $.ajax({
                    type: "POST",
                    url: "/levelUp",
                    data: {i : 1},
                    success: function(data){
                      var response = jQuery.parseJSON(data);

                      $('.profile-level').text('Level ' + response.level);
                      $('.needed-xp').text(response.xp_limit);
                      $('#current-bet-limit').text(response.bet_limit);

                      var newneededXP = parseFloat(response.xp_limit);

                      var newxpBarLength = (newXp / newneededXP) * 100;

                      $( ".profile-xp" ).animate({
                        width: newxpBarLength + "%"
                      });

                      $( "#attentionBox" )
                      .text('LEVEL UP!')
                      .css("background-color", "#81C784")
                      .animate({ bottom: "0px" },1000)
                      .delay(2500)
                      .animate({ bottom: "-200px" }, 1000 )
                    } // LEVEL UP SUCCESS FUNCTION ENDS
                  },"json"); // LEVEL UP AJAX ENDS
                } // IF LEVEL UP ENDS
              } else {
                  //User is messing with DOM data
                  $( "#attentionBox" )
                    .text(data)
                    .css("background-color", "#ef5350")
                    .animate({ bottom: "0px" },1000)
                    .delay(2500)
                    .animate({ bottom: "-200px" }, 1000 )

              } //ELSE DATA = TRUE ENDS
            } // PLACEBET SUCCESS FUNCTION ENDS
          },"json"); // PLACEBET AJAX CALL ENDS

        }else {

          //IF BALANCE IS LESS THAN 0 AFTER TRANSACTION, ECCO ATTENTIONBOX
            $( "#attentionBox" )
              .text('You need more coins!')
              .css("background-color", "#ef5350")
              .animate({ bottom: "0px" },1000)
              .delay(2500)
              .animate({ bottom: "-200px" }, 1000 )
        };

});

$(document).on('keydown', '.event-bet-input', function(event) {

    $('.inUse').removeClass('inUse');
    $(this).addClass('inUse');

    //initiate
    var key = event.keyCode || event.charCode;

    var node = $('#current-bet-limit');

    var bet_stake = parseFloat(this.value);

    var bet_limit = node.text();

    if (bet_stake>bet_limit ) {
      if (key == 8 || key == 46) {} else {
        event.preventDefault();
          $(this).css( "color", "red" );

          $( "#attentionBox" )
            .text('Watch your bet limit!')
            .css("background-color", "#ef5350")
            .animate({ bottom: "0px" },1000)
            .delay(2500)
            .animate({ bottom: "-200px" }, 1000 )
      }
    } else {
      $(this).css( "color", "#555" );
    }

    console.log(bet_limit);

});

$(document).on('click', '.addtobetslip', function() {

        var bet_odds = $(this).find('.event-bet-odds').text();
        var bet_title = $(this).attr('data-bet-title');

        var form = '<form method="POST" action="" accept-charset="UTF-8" data-async="data-async" name="add_to_betslip"> <input placeholder="Your stake" class="betslip-input" name="stake" type="text"> <button type="submit" class="betslip-submit"> <i class="fa fa-gavel"></i> </button> </form>';


        console.log(bet_odds);
        console.log(bet_title);


        if ($(this).hasClass('chosen')) {
            $(this).toggleClass('chosen');
        } else {
            $(this).toggleClass('chosen');
        }

         $('.betslip-ul').append('<span class="betslip-li-wrap"> <li class ="betslip-li"> <span class="betslip-title">Manchester wins</span> <span class="remove-from-betslip"><i class="fa fa-times"></i></span><br/> <span class="to-win">To Win: <span class="reward"> enter a stake</span> </span><span class ="betslip-odds">14/1</span> </li> <div class="betslip-stake"> '+form+'</div> </span>');

        // $('.addEventForm').find('[name="startTime"]').val(startTime);
        // $('.addEventForm').find('[name="employee_id"]').val(employee_id);

  });

  $(document).on('click', '.remove-from-betslip', function() {

    $(this).closest('.betslip-li-wrap').hide();

    $('.event-bet-option').removeClass('chosen');

  });

    $('.betslip-ul').on('keyup', '.betslip-input', function() {

        $('.inUse').removeClass('inUse');
        $(this).addClass('inUse');

        //initiate

        var to_win = "";

        var bet_stake = parseFloat(this.value);
        var bet_odds = parseFloat($(this).parents('.betslip-li-wrap').find('.betslip-odds').text());

        if (bet_stake>50 ) {
          $(this).css( "color", "red" );
          $('.betslip-totalstake').html('Check your bet limit!');
        } else {
          $(this).css( "color", "#555" );
          $('.betslip-totalstake').html('Total Stake : ' + bet_stake +' coins');
        }

        to_win = bet_stake * bet_odds;

        console.log(bet_stake);
        console.log(bet_odds);
        console.log(to_win);

         $(this).parents('.betslip-li-wrap').find('.reward').text(to_win);

         if( $(this).val().length === 0 ) {
          $('.betslip-totalstake').html('No stake... again');
          $(this).parents('.betslip-li-wrap').find('.reward').text('enter a stake');
        }

  });

    $(document).on('submit', 'form[data-async]', function(e) {


      var form = $(this);

      var method = form.find('input[name="_method"]').val() || 'POST';

      var url = form.prop('action');

      var bet_stake = form.find('input[name="stake"]').val();

      if (bet_stake > 50) {
          $('.betslip-totalstake').html('Lower your stake');
      } else {
        //INITIATE AJAX
        $.ajax({

          type: method,

          url: url,

          data: form.serialize(),

          success: function(){

            $(form).closest('.betslip-li-wrap').find('.betslip-stake').hide();

          }

        });

      };

      e.preventDefault();


    });
