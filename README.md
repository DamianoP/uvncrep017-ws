# Web page to view the servers connected to your repeater

I developed a web page that allows you to see which servers are connected to your uvnc repeater (for linux only)

# Step 1 - You must recompile and reinstall your repeater for linux, or you must install your repeater
# Get build packages
For Debian use:
```
sudo apt-get install linux-headers-`uname -r` libx11-6 libx11-dev x-window-system-core x-window-system libxtst6 psmisc build-essential
```

# Clone this repository and install it 
```
git clone https://github.com/DamianoP/uvncrep017-ws.git
cd uvncrep017-ws/uvncRepeater
sudo make
sudo chmod u+x ./install.sh
sudo make install;
sudo service uvncrepeater start
```
# Tips:
# Add a user for the service
```
useradd uvncrep
```
# Edit /etc/uvnc/uvncrepeater.ini according to your needs.
# Check the following parameters:
```
viewerport = 5901
maxsessions = 10
runasuser = uvncrep
logginglevel = 2
srvListAllow1 = 192.168.0.0 ;Allow network 192.168.x.x
srvListDeny0 = 127.0.0.1 ;Deny loopback
requirelistedserver=1
```
# Restart the service

```
sudo service uvncrepeater restart
```

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

The alias will be used inside the WebPage

For example:

```
idlist0=12345;gamingPC
idlist1=12346;Alex
idlist1=12347;kitchenPC
```

# Example Image:
<img width="600" height="290" src="example.png?raw=true">


# Note:
# I have changed in the original file repeater.cpp a little piece of code and created the webpage
```
if (requireListedId) {
  if (!isCodeInIdList(code)) {
    debug(LEVEL_2,"acceptConnection(): Id code does not match codes in list, closing connection\n", code);
    close(connection);
    return;
}
```
# with
```
if (requireListedId) {
  if (!isCodeInIdList(code)) {
    debug(LEVEL_2,"acceptConnection(): Id code does not match codes in list, closing connection\n", code);
    close(connection);
    return;
  }else{
      if(connectionFrom == CONNECTION_FROM_SERVER){
        debug(LEVEL_0, "vncWebInterface: ID >>%ld\n", code);
      } 
  }
}
```

