# ============================================================
# FILE: CH07 - Functions / 02 - Parameters and Arguments.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE PARAMETERS AND ARGUMENTS?
# ------------------------------------------------------------
# Parameter → variable inside function
# Argument  → value passed into function
#
# Example:
# def greet(name):      ← parameter
#     print(name)
#
# greet("Galen")        ← argument
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

def greet(name):
    print(f"Hello {name}")

greet("Galen")
greet("Ali")


# ------------------------------------------------------------
# MULTIPLE PARAMETERS
# ------------------------------------------------------------

def introduce(name, age):
    print(f"My name is {name}, I am {age} years old")

introduce("Galen", 21)


# ------------------------------------------------------------
# ORDER MATTERS (IMPORTANT)
# ------------------------------------------------------------

def subtract(a, b):
    print(a - b)

subtract(10, 5)   # 5
subtract(5, 10)   # -5


# ------------------------------------------------------------
# KEYWORD ARGUMENTS
# ------------------------------------------------------------
# You can specify parameter names

def introduce(name, age):
    print(f"{name} is {age} years old")

introduce(age=21, name="Galen")   # order doesn't matter


# ------------------------------------------------------------
# DEFAULT PARAMETERS
# ------------------------------------------------------------

def greet(name="Guest"):
    print(f"Hello {name}")

greet("Galen")
greet()   # uses default value


# ------------------------------------------------------------
# MIXING DEFAULT AND NORMAL PARAMETERS
# ------------------------------------------------------------

def login(username, password="1234"):
    print(f"Username: {username}, Password: {password}")

login("admin")
login("admin", "abcd")


# ------------------------------------------------------------
# FUNCTION WITH USER INPUT
# ------------------------------------------------------------

def add_numbers(a, b):
    print(f"Sum: {a + b}")

x = int(input("Enter first number: "))
y = int(input("Enter second number: "))

add_numbers(x, y)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Missing argument
# greet()   <-- ERROR if no default

# ❌ Wrong number of arguments

# ❌ Confusing parameter vs argument


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

def debug_test(value):
    print("DEBUG value:", value)

debug_test(100)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# def multiply(a, b):
#     print(a * b)
#
# multiply(3, 4)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand parameters & arguments 🎯
# Functions are becoming powerful 🔥
# ------------------------------------------------------------