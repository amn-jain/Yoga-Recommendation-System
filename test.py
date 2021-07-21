import sys
import json

x = sys.argv[1]
print(x.replace('"', '').replace(
    '[', '').replace(']', '').replace(' ', ',').split(","))
p = [1, 2, 3]
# print(json.dumps(x))
