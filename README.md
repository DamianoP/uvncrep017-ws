# uvnc-repeater-server-status-viewer-in-php
I developed a web page that allows you to see which servers are connected to your uvnc repeater (for linux only)

Step 1 - You must recompile your repeater for linux, or you must reinstall your repeater
Download the folder "uvncRepeater"

Step 2 - Recompile and reinstall the repeater in linux, this operation will not change your uvncrepeater.ini file:
```
sudo service uvncrepeater stop
# in the folder with the repeater.cpp type
sudo make; make install
```
Step 3 -
make sure you have assigned the correct read permissions to the following files for example
```
sudo chmod 777 /var/log/uvncrepeater.log
sudo chmod 777 /etc/uvnc/uvncrepeater.ini
```
Download and use my webpage.php with your apache server

Tips:
You can customize some alias for the servers in the uvncrepeater.ini
Generally in the uvncrepeater.ini, servers are indicated with this kind of structure:
```
idlistN=serverID;
```

If you want, you can add an alias as server name after the ;
The alias will user in the WebPage
For example:

```
idlist0=12345;gamingPC
idlist1=12346;Alex
idlist1=12347;kitchenPC
```




