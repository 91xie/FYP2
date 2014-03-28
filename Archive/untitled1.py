import MySQLdb

db= MySQLdb.connect("localhost","root","raspberry","ua_2")

cursor = db.cursor()

sql = """insert into u (mean, max, min, std)
        values (1.3,452.2,0.3,5)"""

try:
    cursor.execute(sql)
    db.commit()
except:
    db.rollback()

db.close()
