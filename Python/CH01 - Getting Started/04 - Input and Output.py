# ============================================================
# FILE: CH01 - Getting Started / 04 - Input and Output.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS INPUT?
# ------------------------------------------------------------
# input() allows user to type something into the program
# The program will WAIT until user enters something
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC INPUT
# ------------------------------------------------------------

name = input("Enter your name: ")
print("Hello", name)


# ------------------------------------------------------------
# IMPORTANT NOTE (VERY IMPORTANT)
# ------------------------------------------------------------
# input() ALWAYS returns STRING (text)
# Even if user types a number
# ------------------------------------------------------------

age = input("Enter your age: ")

print(age)
print(type(age))   # will be <class 'str'>


# ------------------------------------------------------------
# CONVERT INPUT TO NUMBER
# ------------------------------------------------------------
# Use type casting (int / float)

age = int(input("Enter your age: "))   # convert to integer
print("Next year, you will be", age + 1)


# ------------------------------------------------------------
# FLOAT INPUT
# ------------------------------------------------------------

height = float(input("Enter your height (e.g. 1.75): "))
print("Your height is", height)


# ------------------------------------------------------------
# COMBINING INPUT + OUTPUT
# ------------------------------------------------------------

name = input("Enter your name: ")
age = int(input("Enter your age: "))

print(f"My name is {name} and I am {age} years old")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget to convert input to int
# age = input("Enter age: ")
# print(age + 1)   <-- ERROR (string + int)

# ❌ Invalid input
# age = int(input("Enter age: "))  
# If user types "abc" → ERROR


# ------------------------------------------------------------
# SAFE INPUT (BASIC ERROR HANDLING PREVIEW)
# ------------------------------------------------------------
# You will learn this properly later

age_input = input("Enter your age: ")

if age_input.isdigit():   # check if input is number
    age = int(age_input)
    print("Valid age:", age)
else:
    print("Invalid input, please enter numbers only")


# ------------------------------------------------------------
# MULTIPLE INPUT IN ONE LINE
# ------------------------------------------------------------
# User enters: 10 20

x, y = input("Enter two numbers separated by space: ").split()

print("x =", x)
print("y =", y)

# Convert to int
x = int(x)
y = int(y)

print("Sum =", x + y)


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------
# Always print input values to verify

test = input("Type something: ")
print("DEBUG:", test, type(test))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try building a simple profile system:

# name = input("Enter your name: ")
# age = int(input("Enter your age: "))
# height = float(input("Enter your height: "))
#
# print("----- PROFILE -----")
# print("Name:", name)
# print("Age:", age)
# print("Height:", height)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now know how to interact with users 🎯
# Your programs are no longer static 🔥
# ------------------------------------------------------------