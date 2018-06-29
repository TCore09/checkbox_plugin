<!DOCTYPE html>
<html>
<head>
	<title>Checkbox plugin</title>
</head>
<body>
	<script>
    window.fbMessengerPlugins = window.fbMessengerPlugins || {
        init: function() {
            FB.init({
                appId: "1678638095724206",
                xfbml: true,
                version: "v2.6"
            });
        },
        callable: []
    };
    window.fbMessengerPlugins.callable.push(function() {
        var ruuid, fbPluginElements = document.querySelectorAll(".fb-messenger-checkbox[page_id='227201281337882']");
        if (fbPluginElements) {
            for (i = 0; i < fbPluginElements.length; i++) {
                ruuid = 'cf_' + (new Array(16).join().replace(/(.|$)/g, function() {
                    return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"]();
                }));
                fbPluginElements[i].setAttribute('user_ref', ruuid);
                fbPluginElements[i].setAttribute('origin', window.location.href);
                window.confirmOptIn = function() {
                    FB.AppEvents.logEvent('MessengerCheckboxUserConfirmation', null, {
                        app_id: "1678638095724206",
                        page_id: "227201281337882",
                        ref: "",
                        user_ref: ruuid
                    });
                };
            }
        }
    });
    window.fbAsyncInit = window.fbAsyncInit || function() {
        window.fbMessengerPlugins.callable.forEach(function(item) {
            item();
        });
        window.fbMessengerPlugins.init();
    };
    setTimeout(function() {
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    }, 0);
</script>
	<form>
		<div>
			First Name: <input type="text" name="fname"><br>
			Last Name: <input type="text" name="lname"><br>
			email: <input type="email" name="email">
		</div>
		<div class="fb-messenger-checkbox" 
		origin="" 
		page_id="227201281337882" 
		messenger_app_id="1678638095724206" 
		user_ref="" 
		prechecked="true" 
		allow_login="true" 
		size="xlarge">
		</div>
		<button type="submit" onclick="window.confirmOptIn()"name="submit">Submit</button>

</body>
</html>
