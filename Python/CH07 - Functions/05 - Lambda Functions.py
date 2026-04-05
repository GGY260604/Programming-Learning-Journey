# ============================================================
# FILE: CH07 - Functions / 05 - Lambda Functions.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A LAMBDA FUNCTION?
# ------------------------------------------------------------
# A lambda function is a small anonymous function
#
# Syntax:
# lambda parameters: expression
#
# It returns value automatically (no return keyword needed)
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

# Normal function
def add(a, b):
    return a + b

print(add(2, 3))


# Lambda version
add_lambda = lambda a, b: a + b

print(add_lambda(2, 3))


# ------------------------------------------------------------
# SINGLE PARAMETER
# ------------------------------------------------------------

square = lambda x: x * x

print(square(4))   # 16


# ------------------------------------------------------------
# MULTIPLE PARAMETERS
# ------------------------------------------------------------

multiply = lambda a, b: a * b

print(multiply(3, 5))


# ------------------------------------------------------------
# USING LAMBDA WITH LISTS
# ------------------------------------------------------------

numbers = [1, 2, 3, 4]

# Apply square to each number
result = list(map(lambda x: x * x, numbers))

print(result)   # [1, 4, 9, 16]


# ------------------------------------------------------------
# FILTERING DATA (VERY USEFUL)
# ------------------------------------------------------------

numbers = [1, 2, 3, 4, 5, 6]

# Keep only even numbers
evens = list(filter(lambda x: x % 2 == 0, numbers))

print(evens)   # [2, 4, 6]


# ------------------------------------------------------------
# SORTING WITH LAMBDA
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
# WHEN TO USE LAMBDA?
# ------------------------------------------------------------
# Use lambda when:
# - simple, short function
# - used only once
#
# Use def when:
# - complex logic
# - reused multiple times
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Trying to write multiple lines in lambda

# ❌ Overusing lambda (reduces readability)

# ❌ Confusing lambda with normal function


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = lambda x: x + 10
print("DEBUG:", test(5))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# nums = [10, 20, 30]
#
# doubled = list(map(lambda x: x * 2, nums))
# print(doubled)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand lambda functions 🎯
# Useful for quick operations and data processing 🔥
# ------------------------------------------------------------