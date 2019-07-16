from xml.dom import minidom

xmlDoc = minidom.parse('postcodeData.xml')

postcodes = xmlDoc.getElementsByTagName('code')
desc = xmlDoc.getElementsByTagName('desc')

def getDataAmnt():
    
    dataAmnt = 0

    for elem in postcodes:
        dataAmnt += 1

    return dataAmnt


class getXmlData:
    def __init__(self,num):
        self.num = num
    def getCode(self):
        return postcodes[self.num].firstChild.data
    def getDesc(self):
        return desc[self.num].firstChild.data


