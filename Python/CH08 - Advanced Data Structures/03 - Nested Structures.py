# ============================================================
# FILE: CH08 - Advanced Data Structures / 03 - Nested Structures.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE NESTED STRUCTURES?
# ------------------------------------------------------------
# Nested structure = data inside data
#
# Examples:
# - list inside list
# - dictionary inside dictionary
# - list inside dictionary
# ------------------------------------------------------------


# ------------------------------------------------------------
# LIST INSIDE LIST (2D LIST)
# ------------------------------------------------------------

matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
]

print(matrix)

# Access element
print(matrix[0][1])   # 2


# ------------------------------------------------------------
# LOOP THROUGH 2D LIST
# ------------------------------------------------------------

for row in matrix:
    for value in row:
        print(value, end=" ")
    print()


# ------------------------------------------------------------
# DICTIONARY INSIDE DICTIONARY
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
# LIST OF DICTIONARIES (VERY COMMON)
# ------------------------------------------------------------

students = [
    {"name": "Ali", "score": 80},
    {"name": "John", "score": 90},
    {"name": "Mei", "score": 70}
]

# Loop through
for s in students:
    print(s["name"], "→", s["score"])


# ------------------------------------------------------------
# MODIFY NESTED DATA
# ------------------------------------------------------------

students[0]["score"] = 85
print(students)


# ------------------------------------------------------------
# REAL-LIFE EXAMPLE (LIKE API RESPONSE)
# ------------------------------------------------------------

data = {
    "user": {
        "name": "Galen",
        "email": "galen@gmail.com"
    },
    "orders": [
        {"id": 1, "amount": 100},
        {"id": 2, "amount": 200}
    ]
}

# Access data
print(data["user"]["name"])
print(data["orders"][0]["amount"])


# ------------------------------------------------------------
# ADDING NESTED DATA
# ------------------------------------------------------------

data["orders"].append({"id": 3, "amount": 300})
print(data)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Wrong indexing order
# matrix[1][0] vs matrix[0][1]

# ❌ Forget structure type (list vs dict)

# ❌ Key error in nested dictionary


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG full data:", data)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# students = [
#     {"name": "A", "marks": {"math": 80}},
#     {"name": "B", "marks": {"math": 90}}
# ]
#
# for s in students:
#     print(s["name"], s["marks"]["math"])


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand nested structures 🎯🔥
# This is how real-world data is stored and accessed
# ------------------------------------------------------------