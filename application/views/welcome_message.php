<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <body>
  <div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
		// init the FB JS SDK
		FB.init({
		  appId      : '332935536816580', // App ID from the App Dashboard
		  channelUrl : 'http://localhost/', // Channel File for x-domain communication
		  status     : true, // check the login status upon init?
		  cookie     : true, // set sessions cookies to allow your server to access the session?
		  xfbml      : true  // parse XFBML tags on this page?
		});

		// Additional initialization code such as adding Event Listeners goes here

	  };

	  // Load the SDK's source Asynchronously
	  // Note that the debug version is being actively developed and might 
	  // contain some type checks that are overly strict. 
	  // Please report such bugs using the bugs tool.
	  (function(d, debug){
		 var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement('script'); js.id = id; js.async = true;
		 js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
		 ref.parentNode.insertBefore(js, ref);
	   }(document, /*debug*/ false));
	</script>
    <?php if ($user) { ?>
      Your user profile is
      <pre>
        <?php print htmlspecialchars(print_r($user_profile, true)) ?>
      </pre>
      <?php //echo anchor($facebook->getLogoutUrl(), 'Logout'); ?>
    <?php } else { ?>
      <fb:login-button></fb:login-button>
    <?php } ?>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $facebook->getAppID() ?>',
          cookie: true,
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
  </body>
</html>