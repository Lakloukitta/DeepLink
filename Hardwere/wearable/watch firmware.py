from microbit import *
import random

# Set up UART with default pins (TX=pin0, RX=pin1) and baudrate
uart.init(baudrate=9600, tx=pin0, rx=pin1)

# State variable: True = normal, False = abnormal
normal_mode = True

while True:
    # Check buttons
    if button_a.was_pressed():
        normal_mode = True
    if button_b.was_pressed():
        normal_mode = False

    if normal_mode:
        # Normal healthy values
        oxygen_saturation = random.randint(95, 100)   # Higher O₂
        heart_rate = random.randint(60, 90)           # Normal heart rate
        display.show(Image.HAPPY)
    else:
        # Abnormal values
        oxygen_saturation = random.randint(80, 90)    # Lower O₂ (bad)
        heart_rate = random.randint(110, 160)         # High heart rate (bad)
        display.show(Image.SAD)

    # Create a message string
    message = "O2:{}% HR:{}bpm\n".format(oxygen_saturation, heart_rate)

    display.show(Image.ARROW_N)
    uart.write(message)
    sleep(500)
    if normal_mode:
        display.show(Image.HAPPY)
    else:
        display.show(Image.SAD)


    sleep(4500)  # Send data every ~5 seconds
