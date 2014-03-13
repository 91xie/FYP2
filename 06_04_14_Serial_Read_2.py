#some python code

import serial
import time

def strip_xb_header(astr):
    n = -1    
    for x in range(len(astr)):
	achar = astr[x]
	#if ord(achar) == 1:
	if achar == "!":
    	    n = x
	    break
    if n!=-1:
#	print astr[(x+1):]
    	return astr[(x+1):]
    else:
	return astr
	





ser_xb = serial.Serial("/dev/ttyUSB0",115200) #XBmodule
#ser_xb.timeout = 1
afile = open('workfile.txt','r+')
line = ""
print "start"
while True:
    achar = ser_xb.read()
    if achar in ("\n"+chr(13)):
        line = strip_xb_header(line)
	print line
        afile.write(line+"\n")
	line = ""
    else:
	line = line + achar
