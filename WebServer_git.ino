#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <IRremote.h>


#ifndef STASSID
#define STASSID "SUA_REDE_WIFI"
#define STAPSK "SUA_SENHA"
#define ESP_HOSTNAME "ESP_31CFMYQ"
#endif

IPAddress local_IP(192, 168, 0, 201);
IPAddress gateway(192, 168, 0, 1);
IPAddress subnet(255, 255, 255, 0);
IPAddress primaryDNS(8, 8, 8, 8); //optional
IPAddress secondaryDNS(8, 8, 4, 4); //optional

#define IR_SEND_PIN 5
IRsend irsend(IR_SEND_PIN);

const char * ssid = STASSID;
const char * password = STAPSK;

ESP8266WebServer server(80);

void handleRoot() {
  handleNotFound();
}

void handleNotFound() {
  String message = "Nao encontrado\n\n";
  message += "URI: ";
  message += server.uri();
  message += "\nMetodo: ";
  message += (server.method() == HTTP_GET) ? "GET" : "POST";
  message += "\nArgumentos: ";
  message += server.args();
  message += "\n";
  for (uint8_t i = 0; i < server.args(); i++) {
    message += " " + server.argName(i) + ": " + server.arg(i) + "\n";
  }
  server.send(404, "text/plain", message);

}

void setup(void) {

  Serial.begin(115200);
  IrSender.begin(IR_SEND_PIN, DISABLE_LED_FEEDBACK);

  if (!WiFi.config(local_IP, gateway, subnet, primaryDNS, secondaryDNS)) {
    Serial.println("STA falhou ao configurar");
  }

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  Serial.println("");

  while (WiFi.status() != WL_CONNECTED) {
    delay(5000);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Conectado a rede: ");
  Serial.println(ssid);
  Serial.print("Endereco IP: ");
  Serial.println(WiFi.localIP());

  if (MDNS.begin(ESP_HOSTNAME)) {
    Serial.println("MDNS responder iniciou");
  }

  server.on("/", handleRoot);

  server.on("/remote", []() {
    for (uint8_t i = 0; i < server.args(); i++) {
      if (server.argName(i) == "code") {
        uint32_t code = strtoul(server.arg(i).c_str(), NULL, 10);
        char code_string[15];
        snprintf(code_string, sizeof(code_string), "0x%02X", code);
        Serial.println("");
        Serial.print("Enviando codigo IR: ");
        Serial.print(code, HEX);
        Serial.print("...");
        Serial.println("");
        IrSender.sendNECRaw(code, 0);
        delay(1000);
        String message = "Codigo enviado: ";
        message += code_string;
        message += "\n\n";
        server.send(200, "text/plain", message);
      }
    }

  });

  server.begin();
  Serial.println("HTTP server started");
}

void loop() {

  server.handleClient();
  MDNS.update();

}