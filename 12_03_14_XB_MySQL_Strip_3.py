"""
ua#u,mean,max,min,std:-0.5693,0.1700,-1.2600,0.2994,#v,mean,max,min,std:-0.7851,-0.2500,-1.3100,0.2135,#w,mean,max,min,std:-0.1328,0.3300,-0.6400,0.2197,#t,mean,max,min,std:22.7489,23.1500,22.2600,0.1643,?ws1#u,mean,max,min,std:-0.7937,-0.7654,-0.8504,0.0401,#v,mean,max,min,std:1.9162,2.0531,1.8478,0.0968,#RH,mean,max,min,std:58.1339,58.3073,57.9605,0.1416,?ws2#Rain_mm:0.0
"""


import serial
from datetime import datetime, date, time, timedelta
import time
import numpy
import MySQLdb

class sqlvalue:
    

    def __init__ (self, dbname, line):
        
        self.dbname = dbname

        level1 = line
        level2 = filter(None,level1.split(":"))
        #if len(level2) != 2:
        if True:
            header = level2[0]
            header2 = filter(None,header.split(","))
            #print "header2" + str(header2)
            self.tablename=header2[0]
            self.columns = header2[1:]
            #print "self.columns" + str(self.columns)
            footer = level2[1]
            footer2 = filter(None,footer.split(","))

            self.values = footer2

    def display1(self):
        print "dbname:" + str(self.dbname)
        print "tablename:" + str(self.tablename)
        print "columns:" + str(self.columns)
        print "values:" + str(self.values)

    def sendtosql(self):
        sql = "insert into " +str(self.tablename)+ " " + self.formstrarray2str(self.columns) + " values "+ self.formstrarray2str(self.values)
        print sql
        if True:
            db = MySQLdb.connect("localhost","root","raspberry",self.dbname)
            cursor = db.cursor()
            try:
                cursor.execute(sql)
                db.commit()
                print "write success"
            except:
                db.rollback()
                print "write fail"
            db.close()
        

    def formstrarray2str(self, strarray):
        line = "("
        for astr in strarray:
            line = line + astr + ","
        line = line [:-1]
        line = line + ")"
        return line
        
        

ser_xb = serial.Serial("/dev/ttyUSB0",115200, parity = serial.PARITY_NONE)
#ser_xb.timeout = 0.01
ser_xb.flush()
time.sleep(0.1)
ser_xb.flush()
line = ""
print "start"
while True:
    time.sleep(0.1)
    while ser_xb.inWaiting():
        achar = ser_xb.read()
        if achar == "\n":
            print datetime.now()
            print line
            
                
            level3 = filter(None,line.split("#"))
            dbname = level3[0]
                
                
            if dbname == "ua":
                    
                dbtables = level3[1:]

                for atable in dbtables:
                    ansql = sqlvalue("ua",atable)
                    ansql.sendtosql()
                        
                    

            elif dbname == "ws":
                    
                dbtables = level3[1:]
                for atable in dbtables:
                    ansql = sqlvalue("ws",atable)
                    ansql.sendtosql()

                
            
                

            line = ""
        else:
            line = line + achar
