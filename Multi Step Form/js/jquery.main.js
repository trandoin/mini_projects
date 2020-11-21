$(function(){
    //original field values
    var field_values = {
            //id        :  value
            'phone'  : 'enter your phone',
            'datepicker'  : 'datepicker',
            'country' : 'country',
            'firstname'  : 'enter your full name',
			'city'  : 'enter city',
			'type'  : 'type',
			'website'  : 'e.g. http://www.',
            'email'  : 'enter your email address'
    };


    //inputfocus
    $('input#phone').inputfocus({ value: field_values['phone'] });
	$('input#type').inputfocus({ value: field_values['type'] });
    $('input#datepicker').inputfocus({ value: field_values['DD/MM/YYYY'] });
    $('input#country').inputfocus({ value: field_values['country'] }); 
    $('input#website').inputfocus({ value: field_values['website'] });
    $('input#firstname').inputfocus({ value: field_values['firstname'] });
    $('input#email').inputfocus({ value: field_values['email'] }); 



    //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');

    //first_step
    $('form').submit(function(){ return false; });
    $('#submit_first').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
        var fields = $('#first_step input[type=text], #first_step input[type=password]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==field_values[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if( $('#password').val() != $('#cpassword').val() ) {
                    $('#first_step input[type=password]').each(function(){
                        $(this).removeClass('valid').addClass('error');
                        $(this).effect("shake", { times:3 }, 50);
                    });
                    
                    return false;
            } else {   
                //update progress bar
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','113px');
                
                //slide steps
                $('#first_step').slideUp();
                $('#second_step').slideDown();     
            }               
        } else return false;
    });


    $('#submit_second').click(function(){
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#second_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('66% Complete');
                $('#progress').css('width','226px');
                
                //slide steps
                $('#second_step').slideUp();
                $('#third_step').slideDown();     
        } else return false;

    });


    $('#submit_third').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','239px');

        //prepare the fourth step
        var fields = new Array(
            $('#firstname').val(),
            $('#email').val(),
            $('#phone').val(),
            $('#country').val() + ' ' + $('#city').val(),
            $('#type').val(),
            $('#website').val()
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();            
    });


    $('#submit_fourth').click(function(){
        //send information to server
        $('.back').hide();
		$('#progress_bar').css('display', 'none');
		$('#fourth_step').slideUp();
        $('#finish_step').slideDown();
		$.post("send_enq.php?"+$("#online_booking").serialize(), {
		
			}, 
			function(response){
			
			if(response==1)
			{
				$("#finish_msg").after('<b>Thank you for online booking, We are working on your booking availibility<br>We will get back to you within max 2 Hrs.</b>');
			}
			else
			{
				$("#finish_msg").after('<font color=#ff6600>oops! Something wrong went or you not filled all details</font>');
			}
			
			
		});
		
    });
    
    
    //back button
   $('.back').click(function(){
        var container = $(this).parent('div'),
            previous  = container.prev();

        switch(previous.attr('id')) {
            case 'first_step' : $('#progress_text').html('0% Complete');
                                 $('#progress').css('width','0px');
                                 break;
            case 'second_step': $('#progress_text').html('33% Complete');
                                 $('#progress').css('width','113px');
                                 break;
            
            case 'third_step' : $('#progress_text').html('66% Complete');
                                 $('#progress').css('width','226px');
                                 break;
            
            default: break;
        }
            
        $(container).slideUp();
        $(previous).slideDown();
    });

});