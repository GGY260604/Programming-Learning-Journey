# ============================================================
# FILE: CH11 - Modules and Packages / 02 - Built-in Modules.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE BUILT-IN MODULES?
# ------------------------------------------------------------
# Python comes with many ready-to-use modules
#
# Examples:
# - math
# - random
# - datetime
# - os
# ------------------------------------------------------------


# ------------------------------------------------------------
# 1. MATH MODULE
# ------------------------------------------------------------

import math

print("Square root:", math.sqrt(16))
print("Power:", math.pow(2, 3))
print("Pi:", math.pi)


# ------------------------------------------------------------
# 2. RANDOM MODULE
# ------------------------------------------------------------

import random

print("Random number:", random.randint(1, 10))
print("Random choice:", random.choice(["apple", "banana", "orange"]))


# ------------------------------------------------------------
# 3. DATETIME MODULE
# ------------------------------------------------------------

from datetime import datetime

now = datetime.now()

print("Current time:", now)
print("Year:", now.year)
print("Month:", now.month)
print("Day:", now.day)


# ------------------------------------------------------------
# FORMAT DATE
# ------------------------------------------------------------

print(now.strftime("%Y-%m-%d %H:%M:%S"))


# ------------------------------------------------------------
# 4. OS MODULE
# ------------------------------------------------------------

import os

print("Current directory:", os.getcwd())

# List files in current folder
print("Files:", os.listdir())


# ------------------------------------------------------------
# 5. TIME MODULE
# ------------------------------------------------------------

import time

print("Waiting 2 seconds...")
time.sleep(2)
print("Done!")


# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------

# Generate random password

import random

chars = "abcdefghijklmnopqrstuvwxyz123456789"
password = ""

for i in range(8):
    password += random.choice(chars)

print("Generated password:", password)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget import

# ❌ Using wrong function name

# ❌ Not checking module documentation


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: Modules working correctly")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# import random
#
# print(random.randint(100, 999))
#
# from datetime import datetime
# print(datetime.now())


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now know useful built-in modules 🎯🔥
# These make your programs powerful quickly
# ------------------------------------------------------------