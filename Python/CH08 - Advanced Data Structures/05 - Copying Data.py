# ============================================================
# FILE: CH08 - Advanced Data Structures / 05 - Copying Data.py
# ============================================================

# ------------------------------------------------------------
# WHY COPYING IS IMPORTANT?
# ------------------------------------------------------------
# Sometimes assigning a variable DOES NOT create a new copy
# It just creates a reference to the same data
# ------------------------------------------------------------


# ------------------------------------------------------------
# REFERENCE (NOT A COPY)
# ------------------------------------------------------------

a = [1, 2, 3]
b = a   # b points to same list as a

b.append(4)

print("a:", a)   # [1, 2, 3, 4]
print("b:", b)   # [1, 2, 3, 4]


# ------------------------------------------------------------
# SHALLOW COPY
# ------------------------------------------------------------
# Creates a new list, but inner objects are shared

a = [1, 2, 3]
b = a.copy()

b.append(4)

print("a:", a)   # unchanged
print("b:", b)


# ------------------------------------------------------------
# SHALLOW COPY WITH SLICING
# ------------------------------------------------------------

a = [1, 2, 3]
b = a[:]

b.append(4)

print("a:", a)
print("b:", b)


# ------------------------------------------------------------
# PROBLEM WITH NESTED DATA
# ------------------------------------------------------------

a = [[1, 2], [3, 4]]
b = a.copy()

b[0][0] = 99   # modifies inner list

print("a:", a)   # affected!
print("b:", b)


# ------------------------------------------------------------
# DEEP COPY (IMPORTANT)
# ------------------------------------------------------------
# Copies EVERYTHING, including nested objects

import copy

a = [[1, 2], [3, 4]]
b = copy.deepcopy(a)

b[0][0] = 99

print("a:", a)   # unchanged
print("b:", b)


# ------------------------------------------------------------
# SUMMARY
# ------------------------------------------------------------
# =           → reference (same object)
# .copy()     → shallow copy
# deepcopy()  → full independent copy
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Assuming b = a creates a new copy

# ❌ Forget nested structures share inner data

# ❌ Not using deepcopy when needed


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

a = [1, 2]
b = a

print("Same object?", a is b)   # True


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# import copy
#
# a = [[1, 2], [3, 4]]
# b = copy.deepcopy(a)
#
# b[1][1] = 100
#
# print("a:", a)
# print("b:", b)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand copying data 🎯🔥
# This prevents MANY hidden bugs in real applications
# ------------------------------------------------------------