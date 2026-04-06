# ============================================================
# FILE: CH11 - Modules and Packages / 03 - Creating Modules.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A CUSTOM MODULE?
# ------------------------------------------------------------
# A module is just a Python file (.py)
#
# You can create your own modules to organize code
# ------------------------------------------------------------


# ------------------------------------------------------------
# STEP 1: CREATE A MODULE FILE
# ------------------------------------------------------------
# Create a file in the same folder:
#
# filename: my_module.py
#
# Example content:
#
# def greet(name):
#     return f"Hello {name}"
#
# def add(a, b):
#     return a + b
# ------------------------------------------------------------


# ------------------------------------------------------------
# STEP 2: IMPORT YOUR MODULE
# ------------------------------------------------------------

import my_module

print(my_module.greet("Galen"))
print(my_module.add(2, 3))


# ------------------------------------------------------------
# IMPORT SPECIFIC FUNCTION
# ------------------------------------------------------------

from my_module import greet

print(greet("Ali"))


# ------------------------------------------------------------
# USING ALIAS
# ------------------------------------------------------------

import my_module as mm

print(mm.add(5, 5))


# ------------------------------------------------------------
# HOW PYTHON FINDS MODULES
# ------------------------------------------------------------
# Python searches:
# 1. Current folder
# 2. Installed packages
# 3. System paths
# ------------------------------------------------------------


# ------------------------------------------------------------
# CHECK MODULE PATH
# ------------------------------------------------------------

import sys

print(sys.path)


# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------
# Suppose you create:
#
# calculator.py
#
# def multiply(a, b):
#     return a * b
#
# Then use:

# import calculator
# print(calculator.multiply(3, 4))


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ File name mismatch

# ❌ Module not in same folder

# ❌ Forget to save file before importing


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: Custom module loaded successfully")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:
#
# 1. Create file: utils.py
#
# def square(x):
#     return x * x
#
# 2. Import and use it here


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand how to create modules 🎯🔥
# This is key for organizing large projects
# ------------------------------------------------------------