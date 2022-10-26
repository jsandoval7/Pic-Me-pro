#Import opencv using pip install opencv-python  on cmd
#Import pyzbar using pip install pyzbar  on cmd
#If file can't be found

import cv2
import numpy as np
from pyzbar.pyzbar import decode

cap = cv2.VideoCapture(0)
cap.set(3,640)
cap.set(4,480)


while True:

    success, img = cap.read()
    for barcode in decode(img):
        mydata = barcode.data.decode('utf-8')
        print(mydata)
        pts = np.array([barcode.polygon], np.int32)
        pts = pts.reshape((-1, 1, 2))
        cv2.polylines(img,[pts],True,(0,255,0), 5)
        pts2 = barcode.rect
        cv2.putText(img,mydata,(pts2[0], pts2[1]), cv2.FONT_HERSHEY_COMPLEX_SMALL, 0.9,(0,255,0), 2)
    cv2.imshow('Result', img)  
    key = cv2.waitKey(1)        
    if key == 27:  #Press esc to exit program
        break
