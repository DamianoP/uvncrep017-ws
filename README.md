# Web page to view the servers connected to your repeater

I developed a web page that allows you to see which servers are connected to your uvnc repeater (for linux only)

# Step 1 - You must recompile and reinstall your repeater for linux, or you must install your repeater
Download the folder "uvncRepeater" and follow the istruction in the original readme

# Step 2 - make sure you have assigned the correct read permissions to the following files for example

```
sudo chmod 644 /var/log/uvncrepeater.log
sudo chmod 644 /etc/uvnc/uvncrepeater.ini
```
Download and use my webpage.php with your apache server

# Tips:
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

# Example Image:
<img width="600" height="290" src="example.png?raw=true">

