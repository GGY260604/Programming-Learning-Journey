# ============================================================
# FILE: CH05 - Data Structures (Basic) / 05 - Dictionaries.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A DICTIONARY?
# ------------------------------------------------------------
# A dictionary stores data in KEY : VALUE pairs
#
# Example:
# name → "Galen"
# age  → 21
#
# Uses { key: value }
# ------------------------------------------------------------


# ------------------------------------------------------------
# CREATING A DICTIONARY
# ------------------------------------------------------------

person = {
    "name": "Galen",
    "age": 21,
    "height": 1.75
}

print(person)


# ------------------------------------------------------------
# ACCESSING VALUES
# ------------------------------------------------------------

print(person["name"])   # Galen
print(person["age"])    # 21


# ------------------------------------------------------------
# ADDING / UPDATING VALUES
# ------------------------------------------------------------

person["age"] = 22   # update
person["city"] = "Penang"   # add new key

print(person)


# ------------------------------------------------------------
# REMOVING VALUES
# ------------------------------------------------------------

person.pop("height")
print(person)


# ------------------------------------------------------------
# LOOP THROUGH DICTIONARY
# ------------------------------------------------------------

# Loop keys
for key in person:
    print("Key:", key)

# Loop values
for value in person.values():
    print("Value:", value)

# Loop both key and value
for key, value in person.items():
    print(key, "→", value)


# ------------------------------------------------------------
# CHECKING KEY EXISTS
# ------------------------------------------------------------

print("name" in person)   # True
print("salary" in person) # False


# ------------------------------------------------------------
# GET METHOD (SAFE ACCESS)
# ------------------------------------------------------------
# Prevents error if key doesn't exist

print(person.get("name"))
print(person.get("salary"))   # None (no error)


# ------------------------------------------------------------
# NESTED DICTIONARY (IMPORTANT)
# ------------------------------------------------------------

student = {
    "name": "Ali",
    "marks": {
        "math": 80,
        "science": 90
    }
}

print(student["marks"]["math"])


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Accessing non-existing key
# print(person["salary"])   <-- ERROR

# ❌ Using duplicate keys (last one overrides)

# ❌ Confusing list and dictionary


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG dictionary:", person)
print("Keys:", person.keys())
print("Values:", person.values())


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# student = {
#     "name": "Your Name",
#     "age": 20,
#     "course": "IT"
# }
#
# print(student["name"])
#
# student["age"] = 21
# student["grade"] = "A"
#
# for key, value in student.items():
#     print(key, ":", value)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand dictionaries 🎯
# This is one of the MOST used structures in real systems 🔥
# ------------------------------------------------------------