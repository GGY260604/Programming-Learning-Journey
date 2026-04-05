# ============================================================
# FILE: CH03 - Control Flow / 03 - If Elif Else.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS IF-ELIF-ELSE?
# ------------------------------------------------------------
# Used when you have MULTIPLE conditions
#
# Syntax:
#
# if condition1:
#     run this
# elif condition2:
#     run this
# elif condition3:
#     run this
# else:
#     run this if none are true
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

score = 85

if score >= 90:
    print("Grade A")
elif score >= 75:
    print("Grade B")
elif score >= 50:
    print("Grade C")
else:
    print("Grade F")


# ------------------------------------------------------------
# HOW IT WORKS
# ------------------------------------------------------------
# Python checks from TOP → DOWN
# Once a condition is TRUE → it stops checking
# ------------------------------------------------------------


# ------------------------------------------------------------
# USING USER INPUT
# ------------------------------------------------------------

score = int(input("Enter your score: "))

if score >= 90:
    print("Excellent")
elif score >= 75:
    print("Good")
elif score >= 50:
    print("Pass")
else:
    print("Fail")


# ------------------------------------------------------------
# RANGE CHECKING (IMPORTANT)
# ------------------------------------------------------------
# Order matters!

age = int(input("Enter your age: "))

if age < 13:
    print("Child")
elif age < 18:
    print("Teenager")
elif age < 60:
    print("Adult")
else:
    print("Senior")


# ------------------------------------------------------------
# MULTIPLE CONDITIONS WITH LOGIC
# ------------------------------------------------------------

temp = int(input("Enter temperature: "))

if temp > 35:
    print("Very Hot")
elif 25 <= temp <= 35:
    print("Warm")
elif 15 <= temp < 25:
    print("Cool")
else:
    print("Cold")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Wrong order
# if score >= 50:
#     print("Pass")
# elif score >= 90:
#     print("Excellent")   <-- NEVER reached!

# ❌ Missing colon :
# elif score >= 75

# ❌ Using multiple if instead of elif (inefficient)


# ------------------------------------------------------------
# DIFFERENCE: if vs elif
# ------------------------------------------------------------

score = 80

# Using multiple IF (all checked)
if score >= 50:
    print("Pass")

if score >= 75:
    print("Good")

# Using ELIF (only one runs)
if score >= 90:
    print("A")
elif score >= 75:
    print("B")


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test_score = 70

print("DEBUG:", test_score)

if test_score >= 90:
    print("A")
elif test_score >= 75:
    print("B")
elif test_score >= 50:
    print("C")
else:
    print("F")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# marks = int(input("Enter marks: "))
#
# if marks >= 80:
#     print("Distinction")
# elif marks >= 60:
#     print("Credit")
# elif marks >= 40:
#     print("Pass")
# else:
#     print("Fail")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You can now handle multiple decision paths 🎯
# This is used in real systems everywhere 🔥
# ------------------------------------------------------------