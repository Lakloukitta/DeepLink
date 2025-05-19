#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "CtrlAltElite";
const char* password = "_jrhvaBm-N!}4uwITdj";

#define LORA_RX_PIN 16  
#define LORA_TX_PIN 17 

HardwareSerial loraSerial(1); 
String receivedMessage = ""; 

void setup() {
  Serial.begin(115200);
  delay(1000); 

  loraSerial.begin(9600, SERIAL_8N1, LORA_RX_PIN, LORA_TX_PIN);  

  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println("Connected to WiFi!");
}


String urlEncode(const String &str) {
  String encodedStr = "";
  for (unsigned int i = 0; i < str.length(); i++) {
    char c = str.charAt(i);
    
    // If the character is an unreserved character, leave it as is
    if (isalnum(c) || c == '-' || c == '_' || c == '.' || c == '~') {
      encodedStr += c;
    }
    else {
      // Otherwise, convert the character to %XY form
      encodedStr += '%';
      encodedStr += String(c, HEX);  // Convert char to HEX
    }
  }
  return encodedStr;
}

void loop() {
  if (loraSerial.available()) {
    receivedMessage = loraSerial.readStringUntil('\n');  

    Serial.println("Received LoRa message: " + receivedMessage);
    String encodedName = urlEncode(receivedMessage);

    if (WiFi.status() == WL_CONNECTED) {
      HTTPClient http;

      receivedMessage.replace(" ", "");
      
      String serverUrl = "https://deeplink.host/api.php?message=" + encodedName;
      Serial.println(serverUrl);
      http.begin(serverUrl);  
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");

      int httpCode = http.GET();  

      if (httpCode > 0) {
        String payload = http.getString();  
        Serial.println("HTTP Response: " + payload);
      } else {
        Serial.println("Error in HTTP request");
      }

      http.end(); 
    } else {
      Serial.println("WiFi not connected");
    }
    delay(500);
  }
}
