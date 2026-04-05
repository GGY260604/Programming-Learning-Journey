# ============================================================
# FILE: CH03 - Control Flow / 02 - If Else.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS IF-ELSE?
# ------------------------------------------------------------
# if-else allows your program to choose between TWO paths
#
# Syntax:
#
# if condition:
#     run this if TRUE
# else:
#     run this if FALSE
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

age = 16

if age >= 18:
    print("You can enter")
else:
    print("Access denied")


# ------------------------------------------------------------
# HOW IT WORKS
# ------------------------------------------------------------
# If condition is TRUE → run IF block
# If condition is FALSE → run ELSE block
# ------------------------------------------------------------


# ------------------------------------------------------------
# USING USER INPUT
# ------------------------------------------------------------

age = int(input("Enter your age: "))

if age >= 18:
    print("You are an adult")
else:
    print("You are underage")


# ------------------------------------------------------------
# EVEN OR ODD CHECK
# ------------------------------------------------------------

num = int(input("Enter a number: "))

if num % 2 == 0:
    print("Even number")
else:
    print("Odd number")


# ------------------------------------------------------------
# BOOLEAN EXAMPLE
# ------------------------------------------------------------

is_logged_in = False

if is_logged_in:
    print("Welcome back!")
else:
    print("Please log in")


# ------------------------------------------------------------
# MULTIPLE STATEMENTS IN BLOCK
# ------------------------------------------------------------

score = int(input("Enter your score: "))

if score >= 50:
    print("You passed")
    print("Congratulations!")
else:
    print("You failed")
    print("Try again next time")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget colon :
# if age >= 18
#     print("Adult")

# ❌ Wrong indentation
# else must align with if

# ❌ Writing condition in else (not allowed)
# else age < 18:   <-- WRONG


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test_score = 40
print("DEBUG score >= 50:", test_score >= 50)

if test_score >= 50:
    print("Pass")
else:
    print("Fail")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# temp = int(input("Enter temperature: "))
#
# if temp > 30:
#     print("Hot weather")
# else:
#     print("Cool weather")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You can now handle two-way decisions 🎯
# Next: IF ELIF ELSE (multiple conditions) 🔥
# ------------------------------------------------------------