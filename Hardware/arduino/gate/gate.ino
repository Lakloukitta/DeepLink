#include <Servo.h>

Servo myServo;  // Create a servo object

const int servoPin = 9;  // Connect your servo signal wire to pin 9

void setup() {
  Serial.begin(9600);  // Start serial communication at 9600 baud
  myServo.attach(servoPin);  // Attach the servo to the pin
  Serial.println("Waiting for commands: 'open' or 'close'");
}

void loop() {
  if (Serial.available() > 0) {
    String command = Serial.readStringUntil('\n'); // Read input until newline
    command.trim(); // Remove any trailing whitespace

    if (command.equalsIgnoreCase("open")) {
      myServo.write(90); // Move servo to 90 degrees
      Serial.println("Servo opened");
    } else if (command.equalsIgnoreCase("close")) {
      myServo.write(0); // Move servo to 0 degrees
      Serial.println("Servo closed");
    } else {
      Serial.println("Unknown command. Use 'open' or 'close'.");
    }
  }
}