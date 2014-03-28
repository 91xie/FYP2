#patrick
import serial
from datetime import datetime, date, time, timedelta

def strip_xb_header(astr):
    n = -1
    for x in range(len(astr)):
        achar = astr[x]
        if achar == "!":#change from ! to ?
            n=x
            break
    if n!=-1:
        return astr[(x+1):]
    else:
        return astr

def strip_xb_header2(astr):
    n = -1
    for x in range((len(astr)-1),0,-1):
        achar = astr[x]
        if achar == "!":
            n=x
            break
    if n!=-1:
        return astr[(x+1):]
    else:
        return astr


ser_xb = serial.Serial("/dev/ttyUSB0",115200)
ser_xb.flush()


line = ""
print "start"
while True:
    achar = ser_xb.read()
    if achar == "\n":
        print "print"
        #line = strip_xb_header(line)
        print str(datetime.now()) +":"+line
        line = ""
    else:
        line = line + achar
