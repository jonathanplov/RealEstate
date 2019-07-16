import urllib.request as urllib2
from bs4 import BeautifulSoup
import xml_calls
import re
import database_setup
import database_calls


data = []
primaryList = []
secondaryList = []
types = ['villa','raekkehus','ejerlejlighed']
estateBool = False

"""Url looks like this siteurl/type-city-postcode"""

site_url = 'https://www.boliga.dk/indeks/til-salg/'

page = urllib2.urlopen(site_url)
soup = BeautifulSoup(page, 'html.parser')

#Get data class

class getData:
    def __init__(self,iterationIternal,iteration,primary,secondary,thumbnail,eBool):
        self.iterationIternal = iterationIternal
        self.iteration = iteration
        self.primary = primary
        self.secondary = secondary
        self.thumbnail = thumbnail
        self.eBool = eBool
    def getPrice(self):
        return self.primary[self.iteration+1].text.strip()
    def getAddress(self):
        return self.secondary[self.iteration].text.strip()
    def getPriceSQM(self):
        return self.secondary[self.iteration+1].text.strip()
    def getImageUrl(self):
        try:
            return str(self.thumbnail).split("style=\"background-image:url('")[self.iterationIternal+1].split("')")[0]
        except:
            return 'placeholder.png'

        



def logEstates():
    
    #Run database_setup file

    try:
        database_setup.run()
    except:
        print('Database run error')

    estateAmnt = 0
    iType = 0

    while iType < len(types):
        estateType = types[iType]

        iXml = 0
        while iXml < xml_calls.getDataAmnt():

            instance = xml_calls.getXmlData(iXml)
            url = site_url  + estateType + '-' + instance.getDesc() + '-' + instance.getCode()
            page = urllib2.urlopen(url)
            soup = BeautifulSoup(page, 'html.parser')

            allOccPrimary = soup.findAll('span', attrs={'class': 'primary-value'})
            allOccSecondary = soup.findAll('span', attrs={'class': 'secondary-value'})
            allOccThumbnail = soup.findAll('div', attrs={'class': 'thumbnail'})

            for elem in allOccPrimary:
                primaryList.append(elem)

             
            print('[Number of type: ' + estateType + ' in ' + instance.getDesc() + ': ' + str(len(primaryList)/2) + ']')

            iEstate = 0
            iEstateInternal = 0
            estateBool = False

            while iEstate < len(primaryList):

                if(iEstate % 2 == 0):

                    dataPoint = getData(iEstateInternal,iEstate,allOccPrimary,allOccSecondary,allOccThumbnail,estateBool)
 
                    dbInstance = database_calls.estateDB(estateType, dataPoint.getAddress(), instance.getDesc(), instance.getCode(), dataPoint.getPrice(), dataPoint.getPriceSQM(), dataPoint.getImageUrl())
                    dbInstance.addToDB()

                    iEstateInternal += 1

                    if estateBool == True:
                        estateBool = False
                    else:
                        estateBool = True
                
                iEstate += 1
                estateAmnt +=1

                

            primaryList.clear()
            secondaryList.clear()
            iXml += 1

        iType += 1
        print("Total amount of estates counted: ")
        print(estateAmnt/2)
        

logEstates()
