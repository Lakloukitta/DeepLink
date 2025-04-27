import numpy as np
import tensorflow as tf
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense, LSTM, Flatten

#---------[SETTINGS]---------#
NUM_SAMPLES = 1000  # samples per label
TIME_STEPS = 240    # 4 hours of minute-by-minute data
#-----------------------------#

#----------------------[GENERATE DATA]----------------------#
def generate_health_data(label):
    hr = np.random.normal(70, 10, size=TIME_STEPS)  
    spo2 = np.random.normal(98, 2, size=TIME_STEPS)
    
    if label == "Hypoxemia":
        spo2[:50] = np.random.normal(85, 3, size=50)
    elif label == "Tachycardia":
        hr[:50] = np.random.normal(140, 10, size=50)
    elif label == "Bradycardia":
        hr[:50] = np.random.normal(50, 5, size=50)
    elif label == "HeartSpike":
        hr[100:110] = np.random.normal(160, 5, size=10)
    elif label == "O2_Anomaly":
        spo2[100:120] = np.random.normal(92, 2, size=20)
    elif label == "SleepApnea":
        hr[50:60] = np.random.normal(40, 5, size=10)
        spo2[50:60] = np.random.normal(80, 3, size=10)
    return hr, spo2

labels = ["Healthy", "Hypoxemia", "Tachycardia", "Bradycardia", "HeartSpike", "O2_Anomaly", "SleepApnea"]
X, y = [], []

for label in labels:
    for _ in range(NUM_SAMPLES):
        hr, spo2 = generate_health_data(label)
        X.append(np.stack((hr, spo2), axis=1)) 
        y.append(label)

X = np.array(X)
y = np.array(y)
encoder = LabelEncoder()
y = encoder.fit_transform(y)
#-----------------------------------------------------------#

#----------------------[MODEL TRAINING]----------------------#
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

model = Sequential([
    LSTM(64, input_shape=(TIME_STEPS, 2), return_sequences=True),
    LSTM(32),
    Dense(32, activation='relu'),
    Dense(len(labels), activation='softmax')
])
model.summary()

model.compile(optimizer='adam', loss='sparse_categorical_crossentropy', metrics=['accuracy'])

history = model.fit(X_train, y_train, validation_data=(X_test, y_test), epochs=20, batch_size=32)

loss, accuracy = model.evaluate(X_test, y_test)
print(f"Test Accuracy: {accuracy * 100:.2f}%")
model.save('health_problem_model.h5')
#------------------------------------------------------------#

#----------------------[MODEL PREDICTION]----------------------#
hr, spo2 = generate_health_data("Tachycardia")
test_sample = np.expand_dims(np.stack((hr, spo2), axis=1), axis=0)
prediction = model.predict(test_sample)
predicted_label = encoder.inverse_transform([np.argmax(prediction)])
print(f"Predicted Label: {predicted_label[0]}")

hr, spo2 = generate_health_data("Hypoxemia")
test_sample = np.expand_dims(np.stack((hr, spo2), axis=1), axis=0)
prediction = model.predict(test_sample)
predicted_label = encoder.inverse_transform([np.argmax(prediction)])
print(f"Predicted Label: {predicted_label[0]}")

hr, spo2 = generate_health_data("HeartSpike")
test_sample = np.expand_dims(np.stack((hr, spo2), axis=1), axis=0)
prediction = model.predict(test_sample)
predicted_label = encoder.inverse_transform([np.argmax(prediction)])
print(f"Predicted Label: {predicted_label[0]}")
#--------------------------------------------------------------#