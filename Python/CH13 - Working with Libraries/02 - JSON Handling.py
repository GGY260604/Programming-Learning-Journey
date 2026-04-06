# ============================================================
# FILE: CH13 - Working with Libraries / 02 - JSON Handling.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS JSON?
# ------------------------------------------------------------
# JSON = JavaScript Object Notation
#
# It is a data format used to store and exchange data
#
# Example:
# {
#   "name": "Galen",
#   "age": 21
# }
#
# In Python → JSON becomes dictionary
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORT JSON MODULE
# ------------------------------------------------------------

import json


# ------------------------------------------------------------
# CONVERT DICTIONARY → JSON STRING
# ------------------------------------------------------------

data = {
    "name": "Galen",
    "age": 21,
    "skills": ["Python", "Java"]
}

# Convert to JSON string
json_string = json.dumps(data)

print("JSON string:", json_string)


# ------------------------------------------------------------
# CONVERT JSON STRING → DICTIONARY
# ------------------------------------------------------------

json_text = '{"name": "Ali", "age": 25}'

python_data = json.loads(json_text)

print("Name:", python_data["name"])


# ------------------------------------------------------------
# WRITE JSON TO FILE
# ------------------------------------------------------------

data = {
    "name": "John",
    "age": 30
}

with open("CH13 - Working with Libraries/02 - Data.json", "w") as file:
    json.dump(data, file)


# ------------------------------------------------------------
# READ JSON FROM FILE
# ------------------------------------------------------------

with open("CH13 - Working with Libraries/02 - Data.json", "r") as file:
    data = json.load(file)

print("Loaded data:", data)


# ------------------------------------------------------------
# PRETTY PRINT JSON
# ------------------------------------------------------------

print(json.dumps(data, indent=4))


# ------------------------------------------------------------
# PRACTICAL EXAMPLE (API)
# ------------------------------------------------------------

import requests

response = requests.get("https://jsonplaceholder.typicode.com/todos/1")

data = response.json()

print("Title:", data["title"])
print("Completed:", data["completed"])


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Mixing JSON string and Python dictionary

# ❌ Forget to import json

# ❌ Wrong key access


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG JSON:", json.dumps(data, indent=2))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# user = {"name": "Ali", "age": 20}
#
# json_text = json.dumps(user)
# print(json_text)
#
# new_user = json.loads(json_text)
# print(new_user["name"])


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand JSON handling 🎯🔥
# This is used in almost ALL modern applications
# ------------------------------------------------------------