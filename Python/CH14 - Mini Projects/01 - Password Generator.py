# ============================================================
# FILE: CH14 - Mini Projects / 01 - Password Generator.py
# ============================================================

# ------------------------------------------------------------
# PROJECT: PASSWORD GENERATOR
# ------------------------------------------------------------
# This program:
# - generates a random password
# - allows user to choose length
# - uses letters and numbers
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORT MODULE
# ------------------------------------------------------------

import random


# ------------------------------------------------------------
# CHARACTER SET
# ------------------------------------------------------------

chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"


# ------------------------------------------------------------
# USER INPUT
# ------------------------------------------------------------

length = int(input("Enter password length: "))


# ------------------------------------------------------------
# GENERATE PASSWORD
# ------------------------------------------------------------

password = ""

for i in range(length):
    password += random.choice(chars)


# ------------------------------------------------------------
# OUTPUT RESULT
# ------------------------------------------------------------

print("Generated password:", password)


# ------------------------------------------------------------
# IMPROVED VERSION (WITH VALIDATION)
# ------------------------------------------------------------

while True:
    try:
        length = int(input("Enter password length (>=4): "))
        
        if length < 4:
            print("Password too short!")
            continue

        break

    except ValueError:
        print("Please enter a valid number")


password = ""

for i in range(length):
    password += random.choice(chars)

print("Secure password:", password)


# ------------------------------------------------------------
# OPTIONAL IMPROVEMENT
# ------------------------------------------------------------
# - include symbols
# - ensure at least one uppercase, digit, etc.
# ------------------------------------------------------------


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG password length:", len(password))


# ------------------------------------------------------------
# MINI CHALLENGE
# ------------------------------------------------------------
# Try:
# - Add special characters (!@#$%)
# - Ensure password has at least 1 number
# - Save password to file


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You built your first real mini project 🎯🔥
# ------------------------------------------------------------