# ============================================================
# FILE: CH01 - Getting Started / 05 - Basic Errors.py
# ============================================================

# ------------------------------------------------------------
# WHY LEARN ERRORS?
# ------------------------------------------------------------
# Errors are NORMAL in programming.
# Even professionals face errors every day.
#
# The goal is NOT to avoid errors,
# but to UNDERSTAND and FIX them.
# ------------------------------------------------------------


# ------------------------------------------------------------
# TYPE 1: SYNTAX ERROR
# ------------------------------------------------------------
# Happens when you break Python rules (grammar mistake)
# Python cannot even run your code

# ❌ Example:
# print("Hello"

# Error: missing closing bracket

# ✅ Fix:
print("Hello")


# ------------------------------------------------------------
# TYPE 2: NAME ERROR
# ------------------------------------------------------------
# Happens when you use a variable that does NOT exist

# ❌ Example:
# print(username)

# Error: username is not defined

# ✅ Fix:
username = "Galen"
print(username)


# ------------------------------------------------------------
# TYPE 3: TYPE ERROR
# ------------------------------------------------------------
# Happens when you mix incompatible data types

# ❌ Example:
# age = "21"
# print(age + 5)   # string + integer = ERROR

# ✅ Fix:
age = "21"
print(int(age) + 5)


# ------------------------------------------------------------
# TYPE 4: VALUE ERROR
# ------------------------------------------------------------
# Happens when data type is correct but value is wrong

# ❌ Example:
# int("abc")   # cannot convert text to number

# ✅ Fix:
num = "123"
print(int(num))


# ------------------------------------------------------------
# TYPE 5: INDEX ERROR (Preview)
# ------------------------------------------------------------
# Happens when accessing invalid position

my_list = [10, 20, 30]

# ❌ Example:
# print(my_list[5])   # index out of range

# ✅ Fix:
print(my_list[0])   # valid index


# ------------------------------------------------------------
# TYPE 6: ZERO DIVISION ERROR
# ------------------------------------------------------------

# ❌ Example:
# print(10 / 0)

# ✅ Fix:
print(10 / 2)


# ------------------------------------------------------------
# READING ERROR MESSAGES (VERY IMPORTANT)
# ------------------------------------------------------------
# Example error:
#
# Traceback (most recent call last):
#   File "test.py", line 5, in <module>
#     print(age + 5)
# TypeError: can only concatenate str (not "int") to str
#
# Key parts:
# - line 5 → where error happened
# - TypeError → type of error
# - message → what went wrong
# ------------------------------------------------------------


# ------------------------------------------------------------
# DEBUGGING TECHNIQUE 1: PRINT DEBUG
# ------------------------------------------------------------

x = "10"

print("DEBUG: x =", x, type(x))  # check type

# Fix problem
x = int(x)
print("After fix:", x + 5)


# ------------------------------------------------------------
# DEBUGGING TECHNIQUE 2: STEP BY STEP
# ------------------------------------------------------------

# ❌ Bad (hard to debug)
# result = int(input("Enter number: ")) + 10

# ✅ Good (step-by-step)
user_input = input("Enter number: ")
print("DEBUG:", user_input)

number = int(user_input)
print("DEBUG:", number)

result = number + 10
print("Result:", result)


# ------------------------------------------------------------
# DEBUGGING TECHNIQUE 3: COMMENT OUT CODE
# ------------------------------------------------------------
# Disable parts of code to find error

print("Step 1")
# print("Step 2")   # temporarily disabled
print("Step 3")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try fixing these errors:

# ❌ Fix 1:
# print("Hello

# ❌ Fix 2:
# age = "20"
# print(age + 5)

# ❌ Fix 3:
# num = "abc"
# print(int(num))


# ------------------------------------------------------------
# IMPORTANT MINDSET
# ------------------------------------------------------------
# ❌ Beginner mindset:
# "Error = I am bad"
#
# ✅ Programmer mindset:
# "Error = I am learning"
# ------------------------------------------------------------


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# If you master errors, you master programming 💯
# ------------------------------------------------------------