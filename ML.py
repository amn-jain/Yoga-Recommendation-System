import pandas as pd
import os

os.environ["CUDA_VISIBLE_DEVICES"] = "-1"
import tensorflow as tf
from tensorflow import keras
import numpy as np
import csv
import sys
import json
import warnings

warnings.filterwarnings("ignore", message=r"Passing", category=FutureWarning)

user = sys.argv[1]
user = (
    user.replace('"', "")
    .replace("[", "")
    .replace("]", "")
    .replace(" ", ",")
    .lower()
    .split(",")
)

data = "../Machine_Learning/final_asan1_1.csv"

data = pd.read_csv("../Machine_Learning/map.csv")

a = np.array(data)

word_to_index_map = {}
for i in range(0, 1424):
    word_to_index_map[a[i][1]] = a[i][0]

tokens = []
for words in user:
    flag = 0
    for i in range(0, 1424):
        if a[i][1] == words:
            flag = 1
    if flag == 1:
        tokens.append(word_to_index_map[words])
    else:
        tokens.append(1)

model = keras.models.load_model("../Machine_Learning/weight.h5")


def top_5(z):
    output = []
    max = 0
    max_i = 0
    for j in range(5):
        for i in range(np.shape(z)[0]):
            if z[i] > max:
                max = z[i]
                max_i = i
        z[max_i] = 0
        max = 0
        output.append(max_i)
    return output


y = model.predict(tokens)
z = np.sum(y, axis=0)
z = z / 50
output = top_5(z)

output = np.array(output)
output = output + 1

for i in range(np.shape(output)[0]):
    print(output[i])
