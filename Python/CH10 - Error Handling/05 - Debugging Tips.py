# ============================================================
# FILE: CH10 - Error Handling / 05 - Debugging Tips.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS DEBUGGING?
# ------------------------------------------------------------
# Debugging = finding and fixing errors (bugs) in your code
#
# Every programmer spends a LOT of time debugging
# ------------------------------------------------------------


# ------------------------------------------------------------
# TIP 1: READ ERROR MESSAGE CAREFULLY
# ------------------------------------------------------------
# Example error:
#
# TypeError: can only concatenate str (not "int") to str
#
# Meaning:
# You are trying to combine string + integer
# ------------------------------------------------------------

# ❌ Example
# age = "20"
# print(age + 5)

# ✅ Fix
age = "20"
print(int(age) + 5)


# ------------------------------------------------------------
# TIP 2: USE PRINT FOR DEBUGGING
# ------------------------------------------------------------

x = "10"

print("DEBUG x =", x, type(x))

x = int(x)
print("After conversion:", x + 5)


# ------------------------------------------------------------
# TIP 3: BREAK CODE INTO STEPS
# ------------------------------------------------------------

# ❌ Hard to debug
# result = int(input("Enter number: ")) + 10

# ✅ Easier to debug
user_input = input("Enter number: ")
print("DEBUG input:", user_input)

number = int(user_input)
print("DEBUG number:", number)

result = number + 10
print("Result:", result)


# ------------------------------------------------------------
# TIP 4: USE TRY-EXCEPT FOR TESTING
# ------------------------------------------------------------

try:
    x = int(input("Enter number: "))
    print(100 / x)
except Exception as e:
    print("DEBUG ERROR:", e)


# ------------------------------------------------------------
# TIP 5: CHECK VARIABLE VALUES
# ------------------------------------------------------------

a = 5
b = "10"

print("DEBUG a:", a)
print("DEBUG b:", b)

# Fix
b = int(b)
print("Result:", a + b)


# ------------------------------------------------------------
# TIP 6: TEST SMALL PARTS
# ------------------------------------------------------------

def calculate(x, y):
    return x + y

# Test function separately
print(calculate(2, 3))


# ------------------------------------------------------------
# TIP 7: USE COMMENTS TO ISOLATE BUGS
# ------------------------------------------------------------

print("Step 1")

# print("Step 2")   # temporarily disabled

print("Step 3")


# ------------------------------------------------------------
# TIP 8: CHECK DATA TYPES
# ------------------------------------------------------------

value = input("Enter number: ")

print("DEBUG type:", type(value))


# ------------------------------------------------------------
# TIP 9: USE MEANINGFUL VARIABLE NAMES
# ------------------------------------------------------------

# ❌ Bad
x = 100

# ✅ Good
user_age = 100


# ------------------------------------------------------------
# TIP 10: STAY CALM (IMPORTANT)
# ------------------------------------------------------------
# ❌ "My code is broken!"
#
# ✅ "Where is the mistake?"
#
# Debugging is normal — even experts do it daily
# ------------------------------------------------------------


# ------------------------------------------------------------
# PRACTICAL DEBUG EXAMPLE
# ------------------------------------------------------------

# ❌ Buggy code
# num = input("Enter number: ")
# print(num + 5)

# Step-by-step fix
num = input("Enter number: ")
print("DEBUG:", num)

num = int(num)
print("Fixed:", num + 5)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try debugging this:

# x = input("Enter number: ")
# y = 10
# print(x + y)   # Fix the error


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# If you master debugging,
# you can solve ANY programming problem 🔥
# ------------------------------------------------------------