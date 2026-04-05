# ============================================================
# FILE: CH08 - Advanced Data Structures / 01 - List Comprehension.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS LIST COMPREHENSION?
# ------------------------------------------------------------
# A concise way to create lists
#
# Instead of using loops, you can write in ONE line
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

# Normal way
numbers = []

for i in range(5):
    numbers.append(i)

print(numbers)


# Using list comprehension
numbers = [i for i in range(5)]
print(numbers)


# ------------------------------------------------------------
# WITH CONDITION
# ------------------------------------------------------------

# Get even numbers

evens = [i for i in range(10) if i % 2 == 0]
print(evens)


# ------------------------------------------------------------
# MODIFY VALUES
# ------------------------------------------------------------

# Square numbers

squares = [i * i for i in range(5)]
print(squares)


# ------------------------------------------------------------
# USING EXISTING LIST
# ------------------------------------------------------------

nums = [1, 2, 3, 4]

doubled = [x * 2 for x in nums]
print(doubled)


# ------------------------------------------------------------
# WITH IF-ELSE (IMPORTANT)
# ------------------------------------------------------------

nums = [1, 2, 3, 4]

result = ["Even" if x % 2 == 0 else "Odd" for x in nums]
print(result)


# ------------------------------------------------------------
# STRING EXAMPLE
# ------------------------------------------------------------

text = "hello"

upper_chars = [char.upper() for char in text]
print(upper_chars)


# ------------------------------------------------------------
# NESTED LOOP (ADVANCED)
# ------------------------------------------------------------

pairs = [(i, j) for i in range(2) for j in range(2)]
print(pairs)


# ------------------------------------------------------------
# WHEN TO USE LIST COMPREHENSION?
# ------------------------------------------------------------
# Use when:
# - simple transformation
# - shorter and cleaner code
#
# Avoid when:
# - too complex (reduces readability)
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget order
# [expression for item in iterable]

# ❌ Confusing if placement


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = [x for x in range(3)]
print("DEBUG:", test)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# nums = [1, 2, 3, 4, 5]
#
# squares = [x * x for x in nums]
# print(squares)
#
# odds = [x for x in nums if x % 2 != 0]
# print(odds)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand list comprehension 🎯
# This makes your code cleaner and more Pythonic 🔥
# ------------------------------------------------------------