# ============================================================
# FILE: CH11 - Modules and Packages / 01 - Import Modules.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A MODULE?
# ------------------------------------------------------------
# A module is a file that contains Python code
#
# You can import and reuse code from modules
#
# Python has many built-in modules
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORTING A MODULE
# ------------------------------------------------------------

import math

print(math.sqrt(16))   # 4.0
print(math.pi)         # 3.1415...


# ------------------------------------------------------------
# IMPORT SPECIFIC FUNCTION
# ------------------------------------------------------------

from math import sqrt, pi

print(sqrt(25))
print(pi)


# ------------------------------------------------------------
# IMPORT WITH ALIAS
# ------------------------------------------------------------

import math as m

print(m.sqrt(36))


# ------------------------------------------------------------
# IMPORT EVERYTHING (NOT RECOMMENDED)
# ------------------------------------------------------------

# from math import *
# print(sqrt(49))

# ❌ Can cause confusion and name conflicts


# ------------------------------------------------------------
# USING MULTIPLE MODULES
# ------------------------------------------------------------

import random

print(random.randint(1, 10))


# ------------------------------------------------------------
# CHECK MODULE FUNCTIONS
# ------------------------------------------------------------

print(dir(math))   # list available functions


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget to import module

# ❌ Typo in module name

# ❌ Using function without module prefix


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: math module loaded")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# import math
#
# print(math.sqrt(81))
# print(math.factorial(5))


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand modules 🎯
# This allows you to use powerful built-in tools 🔥
# ------------------------------------------------------------