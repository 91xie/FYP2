#

def strip_dots (str1):
#searches the string from right to left. to find where "..." is and returns whatever is the right
    
    dots =  "..."
    str1 = str1[::-1]
    anindex = str1.find(dots)
    str2 = str1[:anindex]
    print(str2[::-1])


###################main##########
print "example"
str1 = "...wkefjij...213999129292"
strip_dots(str1)
