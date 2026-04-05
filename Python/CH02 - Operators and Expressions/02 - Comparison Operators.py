# ============================================================
# FILE: CH02 - Operators and Expressions / 02 - Comparison Operators.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE COMPARISON OPERATORS?
# ------------------------------------------------------------
# Comparison operators compare two values
# and return either:
#   True  or  False
#
# This is called BOOLEAN result
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC COMPARISON OPERATORS
# ------------------------------------------------------------

a = 10
b = 5

# Equal to
print("a == b:", a == b)   # False

# Not equal to
print("a != b:", a != b)   # True

# Greater than
print("a > b:", a > b)     # True

# Less than
print("a < b:", a < b)     # False

# Greater than or equal to
print("a >= b:", a >= b)   # True

# Less than or equal to
print("a <= b:", a <= b)   # False


# ------------------------------------------------------------
# COMPARISON RESULT IS BOOLEAN
# ------------------------------------------------------------

result = a > b
print(result)
print(type(result))   # <class 'bool'>


# ------------------------------------------------------------
# COMPARING USER INPUT
# ------------------------------------------------------------

x = int(input("Enter a number: "))
y = int(input("Enter another number: "))

print("x == y:", x == y)
print("x > y:", x > y)
print("x < y:", x < y)


# ------------------------------------------------------------
# COMPARING STRINGS
# ------------------------------------------------------------

name1 = "Galen"
name2 = "galen"

print("Are names equal?", name1 == name2)   # False (case-sensitive)


# ------------------------------------------------------------
# USING COMPARISON IN PRINT
# ------------------------------------------------------------

age = 20

print("Is adult?", age >= 18)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using = instead of ==
# if a = b   <-- WRONG

# ❌ Comparing different types
# print("10" > 5)   <-- ERROR

# Fix:
print(int("10") > 5)


# ------------------------------------------------------------
# CHAIN COMPARISON (ADVANCED BUT SIMPLE)
# ------------------------------------------------------------

num = 15

print(10 < num < 20)   # True


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test_x = "5"
test_y = 10

print("DEBUG:", test_x, type(test_x))

# Fix
test_x = int(test_x)
print("After fix:", test_x < test_y)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# num = int(input("Enter a number: "))
#
# print("Greater than 100?", num > 100)
# print("Equal to 50?", num == 50)
# print("Between 10 and 20?", 10 < num < 20)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You can now compare values and produce logic 🎯
# This is the foundation for IF statements 🔥
# ------------------------------------------------------------