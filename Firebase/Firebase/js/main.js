var root = new Firebase('https://dazzling-heat-5686.firebaseio.com/');

var chatRoom = root.child('chatRoom');

var bodyTemplateSrc = $('#body-template').html();
var bodyTemplate = Handlebars.compile(bodyTemplateSrc);
var userName = 'Guest';
var userAvatar = 'http://img-9gag-ftw.9cache.com/photo/agynPn6_700b.jpg';

var messages = {};

$(document).ready(function(){
	renderTemplate();
	setupMessageLoader();
});

function setupMessageLoader(){
	chatRoom.on('value', function (snapshot){
		var newMessages = snapshot.val();
		messages = newMessages;
		renderTemplate();
	});
}

function renderTemplate(){
	var context = {
		userName : userName,
		messages: messages
	};

	var newHtlml = bodyTemplate(context);

	$('#body-template-view').html(newHtlml);

	setupListeners();
	fbLogin();
}

function setupListeners(){
	$('#chat-box').focus().keypress(function (e){
		//console.log(e);
		var key = e.which;
		if(key == 13) {   //13 is Enter key
			var msgText = $(e.target).val();

			if(msgText != ''){ 
				sendMessage(msgText);
			}

			$(e.target).val('');

		}
			fbLogin();

	});
}

function fbLogin(){
	$('#fb-login').click(function(){
			root.authWithOAuthPopup('facebook', function(err, authData){
				loginWithData(authData);
			});
		});
}

function loginWithData(authData){
			//console.log(authData);
			userName = authData.facebook.displayName;
			userAvatar = authData.facebook.cachedUserProfile.picture.data.url;
			renderTemplate();
}



function sendMessage(msgText){
	//alert("Sending message..."+msgText);
	chatRoom.push({
		msgText: msgText,
		userName: userName,
		userAvatar: userAvatar
	});
}