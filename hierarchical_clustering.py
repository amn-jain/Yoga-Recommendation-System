import json
import random

with open('../Machine_Learning/cluster.json') as json_file:
    data = json.load(json_file)
    for i in range(10):
      k = random.randint(0, len(data[str(i)]) - 1)
      print(data[str(i)][k])
