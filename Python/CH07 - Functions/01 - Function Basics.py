# ============================================================
# FILE: CH07 - Functions / 01 - Function Basics.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A FUNCTION?
# ------------------------------------------------------------
# A function is a block of reusable code
#
# Instead of repeating code many times,
# you define it once and call it whenever needed
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC FUNCTION SYNTAX
# ------------------------------------------------------------
# def function_name():
#     code
# ------------------------------------------------------------

def greet():
    print("Hello, welcome!")


# ------------------------------------------------------------
# CALLING A FUNCTION
# ------------------------------------------------------------
# You must CALL the function to run it

greet()


# ------------------------------------------------------------
# WHY USE FUNCTIONS?
# ------------------------------------------------------------
# Without function (repetition)

print("Hello, welcome!")
print("Hello, welcome!")
print("Hello, welcome!")

# With function (clean)

def greet():
    print("Hello, welcome!")

greet()
greet()
greet()


# ------------------------------------------------------------
# FUNCTION WITH INPUT (INSIDE)
# ------------------------------------------------------------

def ask_name():
    name = input("Enter your name: ")
    print(f"Hello {name}")

ask_name()


# ------------------------------------------------------------
# FUNCTION WITH PARAMETERS (INTRO)
# ------------------------------------------------------------
# Parameter = input to function

def greet_user(name):
    print(f"Hello {name}")


greet_user("Galen")
greet_user("Ali")


# ------------------------------------------------------------
# FUNCTION EXECUTION FLOW
# ------------------------------------------------------------
# Code runs from top to bottom
# Function only runs when called

print("Start")

def test():
    print("Inside function")

print("Before call")
test()
print("End")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget parentheses
# greet   <-- does not run

# ❌ Call before defining (in some cases)

# ❌ Wrong indentation


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

def debug_func():
    print("DEBUG: Function is running")

debug_func()


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# def say_hello():
#     print("Hello Python")
#
# say_hello()


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand basic functions 🎯
# This is the foundation of clean coding 🔥
# ------------------------------------------------------------