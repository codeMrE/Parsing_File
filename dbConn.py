import mysql.connector
import numpy as np
conn= mysql.connector.connect(user="root",password="",host="localhost",database="videojs")

# prepare a cursor object using cursor() method
cursor = conn.cursor()

def read_from_db():
    
    cursor.execute("select time_arr from info where id ='49'")
    #actually datatype oftime_arr in db is varchar 
    data=cursor.fetchall()
    #value in data is ('74,169,209,211,',)
    
     
read_from_db()

#output should be like:
#74
#169
#209
#211
