# ============================================================
# FILE: CH06 - Strings / 03 - String Slicing.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS STRING SLICING?
# ------------------------------------------------------------
# Slicing allows you to extract parts of a string
#
# Syntax:
# string[start:end:step]
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC SLICING
# ------------------------------------------------------------

text = "Python"

print(text[0:3])   # Pyt
print(text[2:5])   # tho


# ------------------------------------------------------------
# OMITTING START OR END
# ------------------------------------------------------------

print(text[:3])    # Pyt (start from 0)
print(text[3:])    # hon (go to end)


# ------------------------------------------------------------
# NEGATIVE INDEX
# ------------------------------------------------------------

print(text[-3:])   # hon
print(text[:-2])   # Pyth


# ------------------------------------------------------------
# STEP (VERY IMPORTANT)
# ------------------------------------------------------------

print(text[::2])   # Pto (skip 1 character)
print(text[1::2])  # yhn


# ------------------------------------------------------------
# REVERSE STRING
# ------------------------------------------------------------

print(text[::-1])   # nohtyP


# ------------------------------------------------------------
# PRACTICAL EXAMPLES
# ------------------------------------------------------------

# Extract domain from email
email = "user@gmail.com"

domain = email[email.find("@") + 1:]
print("Domain:", domain)


# Extract year from date
date = "2026-04-05"

year = date[:4]
print("Year:", year)


# ------------------------------------------------------------
# SLICING WITH VARIABLES
# ------------------------------------------------------------

word = "Programming"

start = 3
end = 8

print(word[start:end])   # gramm


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ End index is EXCLUDED
# [0:3] → includes 0,1,2 (NOT 3)

# ❌ Index out of range
# print(text[100])   <-- ERROR

# ❌ Forget step syntax


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = "HelloWorld"

print("DEBUG full:", test)
print("First 5:", test[:5])
print("Last 5:", test[-5:])


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# name = input("Enter your name: ")
#
# print("First 2 letters:", name[:2])
# print("Last 2 letters:", name[-2:])
# print("Reversed:", name[::-1])


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now MASTER string slicing 🎯🔥
# This is heavily used in real-world data processing
# ------------------------------------------------------------