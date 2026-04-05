# ============================================================
# FILE: CH03 - Control Flow / 01 - If Statement.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS CONTROL FLOW?
# ------------------------------------------------------------
# Control flow determines how your program runs
#
# Instead of running line-by-line only,
# the program can make decisions
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC IF STATEMENT
# ------------------------------------------------------------
# Syntax:
#
# if condition:
#     code to run
#
# IMPORTANT:
# - condition must be True or False
# - indentation (spaces) is REQUIRED
# ------------------------------------------------------------

age = 20

if age >= 18:
    print("You are an adult")


# ------------------------------------------------------------
# HOW IF WORKS
# ------------------------------------------------------------
# If condition is TRUE → code runs
# If condition is FALSE → code is skipped
# ------------------------------------------------------------

age = 15

if age >= 18:
    print("You can enter")

print("Program continues...")   # always runs


# ------------------------------------------------------------
# USING USER INPUT
# ------------------------------------------------------------

age = int(input("Enter your age: "))

if age >= 18:
    print("Access granted")


# ------------------------------------------------------------
# INDENTATION (VERY IMPORTANT)
# ------------------------------------------------------------
# Python uses indentation (spaces) to define blocks

# ❌ Wrong (no indentation)
# if age >= 18:
# print("Adult")

# ✅ Correct
if age >= 18:
    print("Correct indentation")


# ------------------------------------------------------------
# MULTIPLE CONDITIONS
# ------------------------------------------------------------

score = 80

if score >= 50:
    print("You passed")

if score >= 75:
    print("You got distinction")


# ------------------------------------------------------------
# BOOLEAN VARIABLES
# ------------------------------------------------------------

is_logged_in = True

if is_logged_in:
    print("Welcome user")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using = instead of ==
# if age = 18   <-- ERROR

# ❌ Forget colon :
# if age >= 18   <-- ERROR

# ❌ Wrong indentation
# if age >= 18:
# print("Hello")


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test_age = 17
print("DEBUG condition:", test_age >= 18)

if test_age >= 18:
    print("Adult")
else:
    print("Not adult (this will not run here)")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# num = int(input("Enter a number: "))
#
# if num > 0:
#     print("Positive number")
#
# if num % 2 == 0:
#     print("Even number")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You can now control program flow using IF 🎯
# Next: IF ELSE (two-way decision) 🔥
# ------------------------------------------------------------