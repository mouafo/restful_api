
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>Etna-alternance / OpenId /</title>
        <link media="all" rel="stylesheet" type="text/css" href="/new_style/all.css" />
        <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="/public/new_style/ie.css" media="screen"/><![endif]-->
        <link rel="openid.server" href="https://openid.etna-alternance.net" />
        <script type='text/javascript' src="/js/cookies.js"></script>
                        <style type="text/css">
<!--
    @import "/js/dojo/dojo-release-1.3.1/dijit/themes/tundra/tundra.css";
-->
</style>
<script type="text/javascript">
//<!--
    var djConfig = {"usePlainJson":true};
//-->
</script>
<script type="text/javascript" src="/js/dojo/dojo-release-1.3.1/dojo/dojo.js"></script>

<script type="text/javascript">
//<!--
dojo.require("dojo.data.ItemFileReadStore");
dojo.addOnLoad(            function (){
        
		dojo.connect(dijit.byId('userId'), 'onKeyUp', function change(ev) {
			if ((ev.keyCode > 65 && ev.keyCode < 90) || ev.keyCode == 109 || ev.keyCode == 224) {
				dijit.byId('userId').store = new dojo.data.ItemFileReadStore({ url: 'login/userlist/user/' + dojo.byId('role').value + ':' + dojo.byId('userId').value });
			}
		});
		dojo.connect(dijit.byId('userId'), 'onKeyPress', function change(ev) {
			if (ev.keyCode == 13) {
				dojo.byId('form_logas').submit();
			}
		});
                }
        );
//-->

</script></head>
    <body class="login-page">
        <div id="wrapper">
            <div class="page">
                <div class="page-t">
                    <div class="page-b">
                        <div id="header">
                            <strong class="logo"><a href="">Etna la nouvelle alternance en informatique</a></strong>
                                                    </div>
                        
<script language="javascript">
  window.onload = function () {
    if (LireCookie('role') !== null) {
      document.getElementById('role').selectedIndex = LireCookie('role');
    }
  }
</script>


<div id="main">
	<div id="login">
		<h1>OpenID Login : </h1>
		<div class="section">
			<form enctype="application/x-www-form-urlencoded" action="/login" method="post" name="login" class="login-form">
				<input type="hidden" name="openId" value="serveur" id="openId">
				<div class="row">
					<label class="float_left" for="role">R&ocirc;le :</label>
					<select class="float_right" name="role" id="role" onChange="EcrireCookie('role', this.selectedIndex);">
											            					            	<option value="student" label="Etudiant">Etudiant</option>
					            					            	<option value="adm" label="Administration">Administration</option>
					            					            	<option value="prof" label="Prof">Prof</option>
					            					            	<option value="tutor" label="Tuteur">Tuteur</option>
					            					            	<option value="istm" label="istm">istm</option>
					            				        						</select>
				</div>
				<div class="row">
					<label class="float_left" accesskey="L" for="login-text">Login :</label>
					<input class="float_right" name="login" id="login-text" type="text" class="text" value=""/>
				</div>
				<div class="row">
					<label class="float_left" for="password">Password :</label>
					<input class="float_right" id="password" name="password" type="password" class="text" />
				</div>
				<input class="submit" type="submit" value="Valider" title="Valider" />
			</form>
			<strong class="logo2">Open ID</strong>
		</div>
	</div>
</div>

<script type="text/javascript">
			document.login.login.focus();
	</script>                    </div>
                </div>
            </div>
            <div id="footer">
                <p>&copy; 2009-2015 ETNA SARL. All rights reserved.</p>
            </div>
        </div>
        <a href="#wrapper" class="skip">Back to top</a>
    </body>
</html>
