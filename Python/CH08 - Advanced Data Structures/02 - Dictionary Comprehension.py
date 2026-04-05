# ============================================================
# FILE: CH08 - Advanced Data Structures / 02 - Dictionary Comprehension.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS DICTIONARY COMPREHENSION?
# ------------------------------------------------------------
# A concise way to create dictionaries
#
# Syntax:
# {key: value for item in iterable}
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

# Create dictionary of numbers and their squares

squares = {x: x * x for x in range(5)}
print(squares)


# ------------------------------------------------------------
# USING EXISTING LIST
# ------------------------------------------------------------

names = ["Ali", "John", "Mei"]

lengths = {name: len(name) for name in names}
print(lengths)


# ------------------------------------------------------------
# WITH CONDITION
# ------------------------------------------------------------

# Only even numbers

even_squares = {x: x * x for x in range(10) if x % 2 == 0}
print(even_squares)


# ------------------------------------------------------------
# MODIFY VALUES
# ------------------------------------------------------------

prices = {"apple": 2, "banana": 3}

# Increase price by 10%

updated = {k: v * 1.1 for k, v in prices.items()}
print(updated)


# ------------------------------------------------------------
# SWAP KEY AND VALUE
# ------------------------------------------------------------

data = {"a": 1, "b": 2}

swapped = {v: k for k, v in data.items()}
print(swapped)


# ------------------------------------------------------------
# CONDITIONAL VALUE (IMPORTANT)
# ------------------------------------------------------------

nums = [1, 2, 3, 4]

result = {x: ("Even" if x % 2 == 0 else "Odd") for x in nums}
print(result)


# ------------------------------------------------------------
# FILTER DICTIONARY
# ------------------------------------------------------------

scores = {"Ali": 80, "John": 45, "Mei": 90}

passed = {k: v for k, v in scores.items() if v >= 50}
print(passed)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget key:value format

# ❌ Mixing list comprehension syntax

# ❌ Overcomplicated expressions


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = {x: x + 1 for x in range(3)}
print("DEBUG:", test)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# nums = [1, 2, 3, 4]
#
# squares = {x: x * x for x in nums}
# print(squares)
#
# even_only = {x: x for x in nums if x % 2 == 0}
# print(even_only)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand dictionary comprehension 🎯
# This is powerful for structured data processing 🔥
# ------------------------------------------------------------