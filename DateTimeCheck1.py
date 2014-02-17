# keep adding a random number to a list of numbers
# if a timer constant is exceeded, process the data
# see what you get

from datetime import datetime, date, time, timedelta
import time
from random import randint

deltamin = 1
now  = datetime.now()
now_plus_delta = now + timedelta(minutes = deltamin)

print "now  " + str(now)
print "later" + str(now_plus_delta)

alist = []
while True:
    if datetime.now() < now_plus_delta:
        ##append values to a list
        print "if statement entered"
        print datetime.now()
        alist.append(randint(1,10))
    else:
        #process the list and then clear it.
        #seem straightforward enough.
        print "else statement entered"
        print alist
        alist = []

        now = now_plus_delta
        now_plus_delta = now + timedelta(minutes = deltamin)
    time.sleep(5)
