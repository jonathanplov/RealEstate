import mysql.connector
import re


def run():

    SQLDatabaseList = []
    tableList = []
    databaseName = 'realestate'

    """First create localhost with SQL"""

    databaseEstate = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd=""
    )

    databasecursor = databaseEstate.cursor()

    """Check if database exists"""

    databasecursor.execute("SHOW DATABASES")

    for x in databasecursor:
        xString = re.sub("[()/',]", '', str(x))
        SQLDatabaseList.append(xString)

    print('Database list: ', SQLDatabaseList)

    """Create database if database doesn't already exist, or connect to the database"""

    if not databaseName in SQLDatabaseList:
        databasecursor.execute("CREATE DATABASE " + databaseName)
        print("Database '%s' created" % databaseName)
    
    databaseEstate = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database=databaseName
    )

    """Create the desired database table"""
        
    databasecursor = databaseEstate.cursor()

    databasecursor.execute("SHOW TABLES")
    for table in databasecursor:
        tableString = re.sub("[()/',]", '', str(table))
        tableList.append(tableString)

    if not 'estates' in tableList:
        databasecursor.execute("CREATE TABLE estates (id INT AUTO_INCREMENT PRIMARY KEY, typeOfEstate VARCHAR(255) , address VARCHAR(255), location VARCHAR(255) , locationCode VARCHAR(255), price VARCHAR(255), priceSQM VARCHAR(255), imgURL VARCHAR(255))")
        print("Table created in database")



    print("Database '%s' found and connection established" % databaseName)

