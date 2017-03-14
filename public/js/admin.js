$(document).on('click', '.addBet', function(e) {
    
    e.preventDefault();

    $( "#addtoDiv" ).append( '<div class="container-fluid container-fixed-lg bg-white"> <div class="row"> <div class="col-sm-5"> <!-- START PANEL --> <div class="panel panel-transparent"> <div class="panel-heading"> <div class="panel-title">You are editing an event </div> </div> <div class="panel-body"> <h3>Event Name</h3> <p>Remember to never skip any details.</p> <br> </div> </div> <!-- END PANEL --> </div> <div class="col-sm-7"> <!-- START PANEL --> <div class="panel panel-transparent"> <div class="panel-body"> <form id="form-project" role="form" method="POST" autocomplete="off" action="" name="new_event"> <p>Bet Information</p> <div class="form-group-attached"> <div class="form-group form-group-default required"> <label>Description (100 letters max)</label> <input type="text" class="form-control" name="eventName" required> </div> </div> <br> <form class="m-t-10" role="form"> <div class="form-group form-group-default form-group-default-select2 required"> <label class="">Type</label> <select class="full-width select2" data-placeholder="Select Country" data-init-plugin="select2"> <optgroup label="All Categories"> <option value="AK">Bet has 1 option</option> <option value="HI">Bet has 2 options</option> <option value="HI">Bet has 3 options</option> <option value="HI">Bet has 3+ options</option> <option value="HI">Bet has 8+ options</option> </optgroup> </select> </div> </form> <br> <button class="btn btn-success" type="submit">Submit</button> <button class="btn btn-default"><i class="pg-close"></i> Clear</button> </form> </div> </div> <!-- END PANEL --> </div> </div> </div> <!-- END CONTAINER FLUID --> <br>' );

    $(".content").select2('data', {id: '2', text: '2'});  

  });

$(document).on('click', '.betlingbutton', function(e) {
    
    e.preventDefault();

    var betlingID = $(this).attr('data-betlingID');

    var betID = $(this).attr('data-betID');

    var method = 'POST';

    if ($(this).is('.winner')) {

      var url = 'betRemoveWinner';

      $(this).removeClass('winner');

      //AJAX IF MARKED AS WINNER
      $.ajax({

        type: method,

        url: url,

        data: { betlingID : betlingID, betID : betID },

        success: function(data){

          alert('Allar breytingar vistaðar');

        }

      });

    } else {
      //AJAX IF NOT MARKED AS WINNER

      $(this).addClass('winner');

      var url = 'betWinner';

      $.ajax({

        type: method,

        url: url,

        data: { betlingID : betlingID, betID : betID },

        success: function(data){

          alert('Allar breytingar vistaðar');

        }

      });
    }

  });

$(document).on('submit', 'form[data-newBet]', function(e) { 

    
      var form = $(this);

      var method = form.find('input[name="_method"]').val() || 'POST';

      var url = form.prop('action');

      var betName = form.find('input[name="betName"]').val();

      var eventID = form.find('input[name="eventID"]').val();

        //INITIATE AJAX
        $.ajax({

          type: method,

          url: url,

          data: form.serialize(),

          success: function(data){

            $(form).closest('.panel-body').html('<div class="currentBetlings"></div><br/><form id="form-project" role="form" method="POST" autocomplete="off" action="createNewBetling" name="new_event" data-newBetling="data-newBetling"> <p>Betling Information</p> <div class="form-group-attached"> <div class="form-group form-group-default required"> <label>Title (60 letters max)</label> <input type="text" class="form-control" name="betlingTitle" required> </div> </div> <br> <div class="form-group-attached"> <div class="form-group form-group-default required"> <label>Odds (numerical)</label> <input type="text" class="form-control" name="betlingOdds" required> </div> </div> <br> <input type="hidden" name="eventID" value="'+eventID+'"><input type="hidden" name="betID" value="'+data+'"><button class="btn btn-success" type="submit">Submit</button> <button class="btn btn-default"><i class="pg-close"></i> Clear</button><br/><br/> </form>').closest('.row').find('.bet-name').html(betName); }

        });

      e.preventDefault();


    });

$(document).on('submit', 'form[data-newBetling]', function(e) { 

      var form = $(this);

      var method = form.find('input[name="_method"]').val() || 'POST';

      var url = form.prop('action');

      var betlingTitle = form.find('input[name="betlingTitle"]').val();

      var betlingOdds = form.find('input[name="betlingOdds"]').val();

      var betID = form.find('input[name="betID"]').val();

    //INITIATE AJAX
    $.ajax({

          type: method,

          url: url,

          data: form.serialize(),

          success: function(data){

            $(form).closest('.panel-body').find('.currentBetlings').append('<div class="btn-group sm-m-t-10"> <button type="button" class="btn btn-default btnToggleSlideUpSize" data-title="'+betlingTitle+'" data-odds="'+betlingOdds+'" data-betlingID="'+data+'"><i class="fa fa-pencil-square-o"></i> </button> <button type="button" class="btn btn-default"><i class="fa fa-trash"></i> </button> </div> <div class="btn betlingbutton " data-betlingID="'+data+'" data-betID="'+betID+'">'+betlingTitle+' @ '+betlingOdds+'</div><br> '); 
          }
    });

    e.preventDefault();

});

$(document).on('click', '.addBetling', function(e) {
    
    e.preventDefault();

    var eventID = $(this).attr('data-eventid');

    var betID = $(this).attr('data-betid');

    $(this).closest('.panel').find('.panel-body').append('<form id="form-project" role="form" method="POST" autocomplete="off" action="createNewBetling" name="new_event" data-newBetling="data-newBetling"> <p>Betling Information</p> <div class="form-group-attached"> <div class="form-group form-group-default required"> <label>Title (60 letters max)</label> <input type="text" class="form-control" name="betlingTitle" required> </div> </div> <br> <div class="form-group-attached"> <div class="form-group form-group-default required"> <label>Odds (numerical)</label> <input type="text" class="form-control" name="betlingOdds" required> </div> </div> <br> <input type="hidden" name="eventID" value="'+eventID+'"><input type="hidden" name="betID" value="'+betID+'"><button class="btn btn-success" type="submit">Submit</button> <button class="btn btn-default"><i class="pg-close"></i> Clear</button><br/><br/> </form>'); 

});