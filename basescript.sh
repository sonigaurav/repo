#!/bin/sh
gituser=$user
gitpassword=$password
apt-get -y install tasksel
tasksel install lamp-server
cd /var/www 
ls
git clone  https://$gituser:$gitpassword@github.com/RajInternational/topic-pulse.git
cd topic-pulse
composer install
cd ..
chmod -R 777 topic-pulse/app/storage
/etc/init.d/apache2 restart


