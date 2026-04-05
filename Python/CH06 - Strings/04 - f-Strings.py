# ============================================================
# FILE: CH06 - Strings / 04 - f-Strings.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS f-STRING?
# ------------------------------------------------------------
# f-string = formatted string
#
# It allows you to embed variables directly inside a string
#
# Syntax:
# f"Text {variable}"
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

name = "Galen"
age = 21

print(f"My name is {name} and I am {age} years old")


# ------------------------------------------------------------
# EXPRESSIONS INSIDE f-STRING
# ------------------------------------------------------------

a = 10
b = 5

print(f"Sum: {a + b}")
print(f"Multiplication: {a * b}")


# ------------------------------------------------------------
# FORMAT NUMBERS
# ------------------------------------------------------------

price = 19.999

print(f"Price: {price:.2f}")   # 2 decimal places


# ------------------------------------------------------------
# ALIGNMENT (ADVANCED)
# ------------------------------------------------------------

text = "Python"

print(f"{text:<10}")   # left align
print(f"{text:>10}")   # right align
print(f"{text:^10}")   # center align


# ------------------------------------------------------------
# USING f-STRING WITH INPUT
# ------------------------------------------------------------

name = input("Enter your name: ")
age = int(input("Enter your age: "))

print(f"Hello {name}, next year you will be {age + 1}")


# ------------------------------------------------------------
# MULTI-LINE f-STRING
# ------------------------------------------------------------

name = "Galen"
score = 85

report = f"""
--- REPORT ---
Name : {name}
Score: {score}
Status: {"Pass" if score >= 50 else "Fail"}
"""

print(report)


# ------------------------------------------------------------
# OLD METHOD (FOR COMPARISON)
# ------------------------------------------------------------

name = "Galen"
age = 21

# Old way
print("My name is {} and I am {} years old".format(name, age))

# f-string (better)
print(f"My name is {name} and I am {age} years old")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget 'f'
# print("Hello {name}")   <-- will not replace

# ❌ Wrong brackets
# print(f"Hello (name)")  <-- wrong


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

value = 100
print(f"DEBUG value = {value}")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# name = input("Name: ")
# score = int(input("Score: "))
#
# print(f"{name} scored {score} marks")
# print(f"Status: {'Pass' if score >= 50 else 'Fail'}")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now mastered f-strings 🎯🔥
# This is the BEST way to format strings in Python
# ------------------------------------------------------------