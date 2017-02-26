Initial Setup

Step 1:
	Install Latest Wamp:
		wamp version 3.0.6
		Mysql version  5.7.14
		php version 5.6.25

	
Step 2:
	Create one directory under www folder and give the name "tution-management"
	Clone project into tution-management folder from bellow URL:
	https://YourUserName@bitbucket.org/MikinjMistry/tution.git
	
	Import database into phpmyadmin.
	No Need create database script automatic crate tution database.
	Database SQL file available in others_stuff Folder.
	
Step 3:
	Now you need to create virtual host for the same
	
	- Update Your Virtual Host Configuration File:
		Open C:\wamp64\bin\apache\apache2.4.23\conf\extra\httpd-vhosts.conf File and add following content.
		
			<VirtualHost *:80>
				ServerName tution.local
				DocumentRoot c:/wamp64/www/tution-management
				<Directory  "c:/wamp64/www/tution-management">
					Options +Indexes +Includes +FollowSymLinks +MultiViews
					AllowOverride All
					Require local
				</Directory>
			</VirtualHost>
		
	- Update Your Windows Hosts File:
		Open your Windows hosts file located in C:\Windows\System32\drivers\etc\hosts File and Following content
		
			127.0.0.1       tution.local
		
	- Restart your wamp server
	
Setp 4:
	Now you can access system from the bellow URL
	http://tution.local
	

		
	
	
	