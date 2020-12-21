# Note:
# I have only changed in the file repeater.cpp the code  
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

# UltraVNC Repeater

## How to install UltraVNC Repeater for Linux (Debian)

## Get build packages
For Debian use:
```
sudo apt-get install linux-headers-`uname -r` libx11-6 libx11-dev x-window-system-core x-window-system libxtst6 psmisc build-essential
```

## Clone this repository, then 
```
sudo make
sudo chmod u+x ./install.sh
sudo make install;
sudo service uvncrepeater start
```

## Add a user for the service
```
useradd uvncrep
```
## Edit /etc/uvnc/uvncrepeater.ini according to your needs.
## Check the following parameters:
```
viewerport = 5901
maxsessions = 10
runasuser = uvncrep
logginglevel = 2
srvListAllow1 = 192.168.0.0 ;Allow network 192.168.x.x
srvListDeny0 = 127.0.0.1 ;Deny loopback
requirelistedserver=1
```
## Start the service

```
sudo service uvncrepeater start
```

Enjoy!

P.S. You can also check our post at:

http://forum.ultravnc.info/viewtopic.php?p=80701
