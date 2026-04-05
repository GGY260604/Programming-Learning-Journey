# ============================================================
# FILE: CH02 - Operators and Expressions / 01 - Arithmetic Operators.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE OPERATORS?
# ------------------------------------------------------------
# Operators are symbols used to perform operations on values
#
# Example:
# 5 + 3
# + is the operator
# 5 and 3 are operands
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC ARITHMETIC OPERATORS
# ------------------------------------------------------------

a = 10
b = 3

# Addition
print("Addition:", a + b)   # 13

# Subtraction
print("Subtraction:", a - b)   # 7

# Multiplication
print("Multiplication:", a * b)   # 30

# Division (always returns float)
print("Division:", a / b)   # 3.333...


# ------------------------------------------------------------
# FLOOR DIVISION (//)
# ------------------------------------------------------------
# Removes decimal part

print("Floor Division:", a // b)   # 3


# ------------------------------------------------------------
# MODULUS (%)
# ------------------------------------------------------------
# Returns remainder

print("Modulus:", a % b)   # 1


# ------------------------------------------------------------
# EXPONENT (**)
# ------------------------------------------------------------
# Power (raise to the power)

print("Exponent:", a ** b)   # 10^3 = 1000


# ------------------------------------------------------------
# COMBINING OPERATIONS
# ------------------------------------------------------------

result = a + b * 2
print("Result:", result)   # follows precedence


# ------------------------------------------------------------
# OPERATOR PRECEDENCE (IMPORTANT)
# ------------------------------------------------------------
# Order of operations:
# 1. ()
# 2. **
# 3. *, /, //, %
# 4. +, -

result = (a + b) * 2
print("With parentheses:", result)


# ------------------------------------------------------------
# USING INPUT WITH OPERATORS
# ------------------------------------------------------------

x = int(input("Enter first number: "))
y = int(input("Enter second number: "))

print("Sum:", x + y)
print("Difference:", x - y)
print("Product:", x * y)
print("Quotient:", x / y)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forgetting type conversion
# x = input("Enter number: ")
# print(x + 5)   # ERROR

# ❌ Division by zero
# print(10 / 0)   # ERROR


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test_a = "10"
test_b = "5"

print("DEBUG:", test_a, type(test_a))

# Fix
test_a = int(test_a)
test_b = int(test_b)

print("After conversion:", test_a + test_b)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try making your own calculator:

# num1 = int(input("Enter number 1: "))
# num2 = int(input("Enter number 2: "))
#
# print("Add:", num1 + num2)
# print("Subtract:", num1 - num2)
# print("Multiply:", num1 * num2)
# print("Divide:", num1 / num2)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You can now perform calculations in Python 🎯
# ------------------------------------------------------------