# ============================================================
# FILE: CH08 - Advanced Data Structures / 04 - Sorting.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS SORTING?
# ------------------------------------------------------------
# Sorting arranges data in order:
# - ascending (small → large)
# - descending (large → small)
# ------------------------------------------------------------


# ------------------------------------------------------------
# SORTING LIST (BASIC)
# ------------------------------------------------------------

nums = [5, 2, 9, 1]

nums.sort()   # ascending
print(nums)

nums.sort(reverse=True)   # descending
print(nums)


# ------------------------------------------------------------
# SORTED() FUNCTION
# ------------------------------------------------------------
# Returns NEW sorted list (does NOT modify original)

nums = [5, 2, 9, 1]

sorted_nums = sorted(nums)
print("Original:", nums)
print("Sorted:", sorted_nums)


# ------------------------------------------------------------
# SORTING STRINGS
# ------------------------------------------------------------

names = ["Ali", "John", "Mei"]

names.sort()
print(names)


# ------------------------------------------------------------
# SORT BY LENGTH
# ------------------------------------------------------------

words = ["apple", "kiwi", "banana"]

words.sort(key=len)
print(words)


# ------------------------------------------------------------
# SORT LIST OF DICTIONARIES (VERY IMPORTANT)
# ------------------------------------------------------------

students = [
    {"name": "Ali", "score": 80},
    {"name": "John", "score": 90},
    {"name": "Mei", "score": 70}
]

# Sort by score
students.sort(key=lambda x: x["score"])
print(students)


# ------------------------------------------------------------
# SORT DESCENDING BY KEY
# ------------------------------------------------------------

students.sort(key=lambda x: x["score"], reverse=True)
print(students)


# ------------------------------------------------------------
# SORT BY MULTIPLE KEYS (ADVANCED)
# ------------------------------------------------------------

data = [
    {"name": "Ali", "score": 80},
    {"name": "Ali", "score": 90},
    {"name": "John", "score": 70}
]

# Sort by name, then score
data.sort(key=lambda x: (x["name"], x["score"]))
print(data)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget key for complex data

# ❌ Confusing sort() vs sorted()

# ❌ Sorting mixed data types


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = [3, 1, 2]
print("Before:", test)

test.sort()
print("After:", test)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# nums = [10, 5, 20, 1]
#
# nums.sort()
# print(nums)
#
# nums.sort(reverse=True)
# print(nums)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand sorting 🎯🔥
# This is used in real-world applications everywhere
# ------------------------------------------------------------