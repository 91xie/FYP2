import serial
from datetime import datetime, date, time, timedelta
import time
ser_xb = serial.Serial("/dev/ttyUSB1",115200)
ser_xb.timeout = 0.01
ser_xb.flush()
line = ""

while True:
    time.sleep(0.1)
    while ser_xb.inWaiting():
        achar = ser_xb.read()
        if achar == "\n":
            #line = strip_xb_header(line)
            print line
            line = ""
        else:
            line = line + achar
