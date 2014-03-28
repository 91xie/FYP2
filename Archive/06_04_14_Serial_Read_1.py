#some python code

import serial

ser_xb = serial.Serial("/dev/ttyUSB0",115200) #XBmodule

afile = open('workfile.txt','r+')

print "start"
while True:
    aline = ser_xb.readline()
    print aline
    afile.write(aline)

