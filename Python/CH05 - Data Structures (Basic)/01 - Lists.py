# ============================================================
# FILE: CH05 - Data Structures (Basic) / 01 - Lists.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A LIST?
# ------------------------------------------------------------
# A list is a collection of multiple values
# stored in a single variable
#
# Lists are:
# - ordered
# - changeable (mutable)
# - allow duplicates
# ------------------------------------------------------------


# ------------------------------------------------------------
# CREATING A LIST
# ------------------------------------------------------------

numbers = [10, 20, 30, 40]
print(numbers)

names = ["Alice", "Bob", "Charlie"]
print(names)


# ------------------------------------------------------------
# ACCESSING ELEMENTS
# ------------------------------------------------------------
# Index starts from 0

print(numbers[0])   # 10
print(numbers[2])   # 30

# Negative index (from end)
print(numbers[-1])  # 40


# ------------------------------------------------------------
# MODIFYING LIST
# ------------------------------------------------------------

numbers[1] = 99
print(numbers)


# ------------------------------------------------------------
# LIST LENGTH
# ------------------------------------------------------------

print(len(numbers))   # number of elements


# ------------------------------------------------------------
# ADDING ELEMENTS
# ------------------------------------------------------------

numbers.append(50)   # add to end
print(numbers)

numbers.insert(1, 15)   # insert at index
print(numbers)


# ------------------------------------------------------------
# REMOVING ELEMENTS
# ------------------------------------------------------------

numbers.remove(99)   # remove by value
print(numbers)

numbers.pop()   # remove last element
print(numbers)

numbers.pop(0)   # remove by index
print(numbers)


# ------------------------------------------------------------
# LOOP THROUGH LIST
# ------------------------------------------------------------

for num in numbers:
    print("Value:", num)


# ------------------------------------------------------------
# CHECKING VALUE IN LIST
# ------------------------------------------------------------

print(20 in numbers)   # True or False


# ------------------------------------------------------------
# MIXED DATA TYPES
# ------------------------------------------------------------

mixed = [1, "Hello", 3.5, True]
print(mixed)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Index out of range
# print(numbers[10])

# ❌ Confusing index and value
# numbers.remove(0)   # removes value 0, not index 0


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG list:", numbers)
print("Length:", len(numbers))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# fruits = ["apple", "banana", "orange"]
#
# fruits.append("grape")
# fruits.remove("banana")
#
# for fruit in fruits:
#     print(fruit)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand LISTS 🎯
# This is one of the MOST used data structures 🔥
# ------------------------------------------------------------