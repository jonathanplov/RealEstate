import mysql.connector

databaseName = 'realestate'

class estateDB:
    def __init__(self, typeOfEstate, address, location, locationCode, price, priceSQM, imgURL):
        self.typeOfEstate = typeOfEstate
        self.address = address
        self.location = location
        self.locationCode = locationCode
        self.price = price
        self.priceSQM = priceSQM
        self.imgURL = imgURL

    def addToDB(self):

        databaseEstate = mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="",
        database=databaseName
        )

        databasecursor = databaseEstate.cursor()

        dataToInsert = "INSERT INTO estates (typeOfEstate, address, location, locationCode, price, priceSQM, imgURL) VALUES (%s, %s, %s, %s, %s, %s, %s)"
        values = (self.typeOfEstate,self.address,self.location,self.locationCode,self.price,self.priceSQM,self.imgURL)

        databasecursor.execute(dataToInsert,values)

        databaseEstate.commit()

    def estimatePrice(self):
        print('test')
    def setPrice(self):
        print('test')

        


