# ============================================================
# FILE: CH01 - Getting Started / 03 - Variables and Data Types.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A VARIABLE?
# ------------------------------------------------------------
# A variable is like a container used to store data.
#
# Example:
# name = "Galen"
#
# "name" is the variable
# "Galen" is the value stored inside it
# ------------------------------------------------------------


# ------------------------------------------------------------
# CREATING VARIABLES
# ------------------------------------------------------------

name = "Galen"
age = 21
height = 1.75

print(name)
print(age)
print(height)


# ------------------------------------------------------------
# RULES FOR VARIABLE NAMES
# ------------------------------------------------------------
# ✅ Allowed:
# - letters (a-z, A-Z)
# - numbers (0-9)
# - underscore (_)
#
# ❌ NOT allowed:
# - cannot start with number
# - no spaces
# - no special symbols (!, @, #, etc)
# ------------------------------------------------------------

# Valid
user_name = "Ali"
age2 = 25

# Invalid (will cause error)
# 2age = 25
# user name = "Ali"


# ------------------------------------------------------------
# DATA TYPES IN PYTHON
# ------------------------------------------------------------
# Python automatically detects the data type
# ------------------------------------------------------------

# String (text)
name = "Galen"

# Integer (whole number)
age = 21

# Float (decimal number)
price = 19.99

# Boolean (True / False)
is_student = True

print(name)
print(age)
print(price)
print(is_student)


# ------------------------------------------------------------
# CHECKING DATA TYPE
# ------------------------------------------------------------
# Use type() function

print(type(name))        # <class 'str'>
print(type(age))         # <class 'int'>
print(type(price))       # <class 'float'>
print(type(is_student))  # <class 'bool'>


# ------------------------------------------------------------
# TYPE CASTING (CONVERTING DATA TYPES)
# ------------------------------------------------------------
# Sometimes you need to convert data types manually

# Convert int → string
age = 21
age_str = str(age)

# Convert string → int
num = "100"
num_int = int(num)

# Convert int → float
value = 10
value_float = float(value)

print(age_str)
print(num_int)
print(value_float)


# ------------------------------------------------------------
# COMBINING VARIABLES IN PRINT
# ------------------------------------------------------------

name = "Galen"
age = 21

print("My name is", name)
print("I am", age, "years old")

# OR (better way - f-string, learn more later)
print(f"My name is {name} and I am {age} years old")


# ------------------------------------------------------------
# VARIABLE REASSIGNMENT
# ------------------------------------------------------------
# Variables can change value anytime

score = 10
print(score)

score = 20   # updated value
print(score)


# ------------------------------------------------------------
# MULTIPLE VARIABLES IN ONE LINE
# ------------------------------------------------------------

a, b, c = 1, 2, 3
print(a, b, c)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using variable before defining
# print(x)

# ❌ Mixing types incorrectly
# age = "21"
# print(age + 5)   <-- ERROR

# Fix:
age = "21"
print(int(age) + 5)


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------
# Always print variables to check values

test_value = 100
print("DEBUG:", test_value, type(test_value))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try editing below:

# name = "Your Name"
# age = 20
# height = 1.7
#
# print("Name:", name)
# print("Age:", age)
# print("Height:", height)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand variables + data types 🎯
# This is the foundation of EVERYTHING in programming
# ------------------------------------------------------------