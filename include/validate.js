$(document).ready(function(){
// ====================================================== //

var jVal = {
	'fullName' : function() {
	
		$('body').append('<div id="nameInfo" class="info"></div>');
		
		var nameInfo = $('#nameInfo');
		var ele = $('#fullname');
		var pos = ele.offset();
		
		nameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length <1) {
			jVal.errors = true;
				nameInfo.removeClass('correct').addClass('error').html('&larr; Thise Filed should be required!').show();
				ele.removeClass('normal').addClass('wrong');				
		} else {
				nameInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
        'mname' : function() {
	
		$('body').append('<div id="mnameInfo" class="info"></div>');
		
		var mnameInfo = $('#mnameInfo');
		var ele = $('#mname');
		var pos = ele.offset();
		
		mnameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 1) {
			jVal.errors = true;
				mnameInfo.removeClass('correct').addClass('error').html('&larr; Thise Filed should be required!').show();
				ele.removeClass('normal').addClass('wrong');				
		} else {
				mnameInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
        'lname' : function() {
	
		$('body').append('<div id="lnameInfo" class="info"></div>');
		
		var lnameInfo = $('#lnameInfo');
		var ele = $('#lname');
		var pos = ele.offset();
		
		lnameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 1) {
			jVal.errors = true;
				lnameInfo.removeClass('correct').addClass('error').html('&larr; Thise Filed should be required!').show();
				ele.removeClass('normal').addClass('wrong');				
		} else {
				lnameInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
         'list' : function() {
	
		$('body').append('<div id="listInfo" class="info"></div>');
		
		var listInfo = $('#listInfo');
		var ele = $('#list');
		var pos = ele.offset();
		
		listInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val()==0) {
			jVal.errors = true;
				listInfo.removeClass('correct').addClass('error').html('&larr; Thise Filed should be required!').show();
				ele.removeClass('normal').addClass('wrong');				
		} else {
				listInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
        'aboutmyself' : function() {
	
		$('body').append('<div id="aboutmyselfInfo" class="info"></div>');
	
		var aboutmyselfInfo = $('#aboutmyselfInfo');
		var ele = $('#aboutmyself');
		var pos = ele.offset();
		
		aboutmyselfInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 75) {
			jVal.errors = true;
				aboutmyselfInfo.removeClass('correct').addClass('error').html('&larr; come on, tell me a little bit more!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				aboutmyselfInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
        'vehicle' : function (){
	
		$('body').append('<div id="vehicleInfo" class="info"></div>');
	
		var vehicleInfo = $('#vehicleInfo');
		var ele = $('#ship');
		var pos = ele.offset();
		
		vehicleInfo.css({
			top: pos.top-10,
			left: pos.left+ele.width()+40
		});
		
		if($('input[name="vehicle"]:checked').length <= 1) {
			jVal.errors = true;
				vehicleInfo.removeClass('correct').addClass('error').html('&larr; I\'m sure you have at least two!').show();
				ele.removeClass('normal').addClass('wrong');		
		} else {
				vehicleInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}	
	},
	
	'birthDate' : function (){
		
		$('body').append('<div id="birthInfo" class="info"></div>');

		var birthInfo = $('#birthInfo');
		var ele = $('#birthday');
		var pos = ele.offset();
		
		birthInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/i;
		
		if(!patt.test(ele.val())) {
			jVal.errors = true;
				birthInfo.removeClass('correct').addClass('error').html('&larr; type in date in correct format').show();
				ele.removeClass('normal').addClass('wrong');					
		} else {
				birthInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}	
	},
	
	'gender' : function (){
		
		$('body').append('<div id="genderInfo" class="info"></div>');
	
		var genderInfo = $('#genderInfo');
		var ele = $('#woman');
		var pos = ele.offset();
		
		genderInfo.css({
			top: pos.top-10,
			left: pos.left+ele.width()+60
		});
		
		if($('input[name="gender"]:checked').length === 0) {
			jVal.errors = true;
				genderInfo.removeClass('correct').addClass('error').html('&larr; are you a man or a woman?').show();
				ele.removeClass('normal').addClass('wrong');		
		} else {
				genderInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}	
	},
        
  

	
	'email' : function() {
	
		$('body').append('<div id="emailInfo" class="info"></div>');
	
		var emailInfo = $('#emailInfo');
		var ele = $('#email');
		var pos = ele.offset();
		
		emailInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		
		if(!patt.test(ele.val())) {
			jVal.errors = true;
				emailInfo.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
				ele.removeClass('normal').addClass('wrong');					
		} else {
				emailInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'about' : function() {
	
		$('body').append('<div id="aboutInfo" class="info"></div>');
	
		var aboutInfo = $('#aboutInfo');
		var ele = $('#about');
		var pos = ele.offset();
		
		aboutInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 75) {
			jVal.errors = true;
				aboutInfo.removeClass('correct').addClass('error').html('&larr; come on, tell me a little bit more!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				aboutInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'sendIt' : function (){
		if(!jVal.errors) {
			$('#jform').submit();
		}
	}
};

// ====================================================== //

$('#send').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#jform').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.fullName();
                jVal.mname();
                jVal.lname();
              jVal.list();
             jVal.aboutmyself();
               jVal.birthDate();
		jVal.gender();
		jVal.vehicle();
		jVal.email();
		jVal.about();
		jVal.sendIt();
	});
	return false;
});

$('#fullname').change(jVal.fullName);
$('#mname').change(jVal.mname);
$('#lname').change(jVal.lname);
$('#list').change(jVal.list);
$('#aboutmyself').change(jVal.aboutmyself);
$('#birthday').change(jVal.birthDate);
$('input[name="gender"]').change(jVal.gender);
$('input[name="vehicle"]').change(jVal.vehicle);
$('#email').change(jVal.email);
$('#about').change(jVal.about);

// ====================================================== //
});