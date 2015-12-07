<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//JP"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="jp" lang="jp" dir="ltr" class="uk-height-1-1">
<head>
  <title>Emirates Wi-Fi Welcome Page</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- UIKit Styles -->
  <link rel="stylesheet" href="css/uikit.active.css" />
  <link rel="stylesheet" href="css/custom.css" />
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/uikit.min.js"></script>
  <!-- End UIKit Styles -->
</head>

<body class="uk-height-1-1">
  <!-- PHP Script -->

  <?php
      $base_grant_url = urldecode($_GET['base_grant_url']);
      $user_continue_url = urldecode($_GET['user_continue_url']);
      $override_continue_url = 'http://www.emirates.com/bh/arabic/';
      
      $override_the_users_request = true;
      if ($override_the_users_request) {
        $grant_url = $base_grant_url . "?continue_url=" . urlencode($override_continue_url);
      } else {
        $grant_url = $base_grant_url . "?continue_url=" . urlencode($user_continue_url) . "$duration=1800";
      }

      // The following parameters may be used for tracking purposes. They are not necessary for authentication.
      $node_id = urldecode($_GET['node_id']);
      $gateway_id = urldecode($_GET['gateway_id']);
      $client_ip = urldecode($_GET['client_ip']);
    ?>

<!-- see README.txt for HTML customization instructions -->
	<div class="uk-vertical-align uk-text-center uk-height-1-1"><!-- Open Display Panel -->
		<div class="uk-vertical-align-middle" style="width: 320px;"> <!-- Set the column width here -->
			<div class="uk-container-center">

				<div class="uk-panel uk-panel-divider">&nbsp</div> 
                
                <div class="uk-animation-scale-up">
					<!-- Logo Panel and Welcome Text -->
					<div class="uk-panel-box uk-panel-box-secondary">
						<span>&nbsp</span>
						<div class="uk-panel-teaser">
							<img src="images/logo.png" alt="Your Logo" />
						</div>
						<span class="uk-text-large"><b>Welcome to Emirates</b> <br/><b>Complementary WiFi Service!<br/></span>
					</div> <!-- Close Logo Panel -->
				
					<div class="uk-panel uk-panel-divider">&nbsp</div> 

					<!-- UniFi Portal Forms Panel -->
				
					<div class="uk-panel-box uk-panel-box-secondary">

						<!-- IF NO AUTHENTICATION -->
						<unifi if="auth_none">
							<form name="input" id="submit-form" method="post" action="<?php print $grant_url ?>" class="uk-form">
								<div class="uk-panel-box uk-panel-box-secondary">
								<!-- Terms of Use Panel -->
									<h3 class="uk-panel-title"><i class="uk-icon-legal"></i> Terms of Use</h3>
									<p>By proceeding, you confirm you have read, understand and accept the <a href="#termsmodal" data-uk-modal >Terms of Use</a></p>
								</div> 
								<!-- Close Terms of Use Panel -->
								<p></p>
								<!-- A Lonely Connect Button -->
								<div>  
									<input name="connect" type="submit" value="Connect & Visit" id="connect" class="uk-button-large uk-button-primary uk-width-1-1" />
								</div>
							</form>
						</unifi>
					</div> <!-- Close UniFi Portal Forms Panel -->
				</div>

				<div class="uk-panel uk-panel-divider">&nbsp</div>

				<!-- Plug for Operator or Installer (Optional) - Remember to add website IP
				to allowed 	list in Guest Portal config for Unauthorized Access to sites
				linked here.  You can also just delete/comment the next 6 lines -->
				<div class="uk-animation-scale-up">
					<div class="uk-panel">
						<div class="uk-panel-teaser">
							<a href="http://www.datagridinternational.com/" target="_blank"><img src="images/operator.png" alt="Wireless Network by DataGrid International" /></a>
						</div>
						<span class="uk-text-small"><a href="http://www.datagridinternational.com/" target="_blank">Wireless Network by DataGrid International</a></span>
					</div> <!-- Close Plug Panel -->
				</div>
			</div>
		</div>	
	</div> <!-- Main Display Panel is now Closed -->

	<!-- This is the Modal Popup box for Terms of Use -->
	<div class="uk-modal" id="termsmodal">
		<div class="uk-modal-dialog">
			<a class="uk-modal-close uk-close"></a>
			<h3><i class="uk-icon-legal"></i> Terms of Use</h3>
			<p>By accessing the wireless network, you acknowledge that you're of legal age, you have read and understood and agree to be bound by this agreement</p>
			<ul>
				<li>The wireless network service is provided by the property owners and is completely at their discretion. Your access to the network may be blocked, suspended, or terminated at any time for any reason.</li>
				<li>You agree not to use the wireless network for any purpose that is unlawful and take full responsibility of your acts.</li>
				<li>The wireless network is provided &quot;as is&quot; without warranties of any kind, either expressed or implied. </li>
			</ul>
		</div>
	</div>	

</body>
</html>