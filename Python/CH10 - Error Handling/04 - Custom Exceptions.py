# ============================================================
# FILE: CH10 - Error Handling / 04 - Custom Exceptions.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A CUSTOM EXCEPTION?
# ------------------------------------------------------------
# A custom exception is an error YOU define
#
# Used when:
# - built-in errors are not enough
# - you want meaningful error messages
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC CUSTOM EXCEPTION
# ------------------------------------------------------------

# pass is used when you don't want to add extra functionality
class MyError(Exception):
    pass


# ------------------------------------------------------------
# RAISING CUSTOM ERROR
# ------------------------------------------------------------

def check_age(age):
    if age < 18:
        raise MyError("Age must be 18 or above")
    print("Access granted")

try:
    check_age(16)
except MyError as e:
    print("Error:", e)


# ------------------------------------------------------------
# CUSTOM EXCEPTION WITH MESSAGE
# ------------------------------------------------------------

# _init_ allows you to add custom attributes or messages to your exception
class NegativeNumberError(Exception):
    def __init__(self, message):
        super().__init__(message)


def check_number(num):
    if num < 0:
        raise NegativeNumberError("Number cannot be negative")
    return num


try:
    check_number(-5)
except NegativeNumberError as e:
    print("Error:", e)


# ------------------------------------------------------------
# USING BUILT-IN ERROR IN REAL CASE
# ------------------------------------------------------------

def withdraw(balance, amount):
    if amount > balance:
        raise ValueError("Insufficient balance")
    return balance - amount


try:
    print(withdraw(100, 150))
except ValueError as e:
    print("Error:", e)


# ------------------------------------------------------------
# MULTIPLE CUSTOM ERRORS
# ------------------------------------------------------------

class InvalidUsername(Exception):
    pass

class InvalidPassword(Exception):
    pass


def login(username, password):
    if username != "admin":
        raise InvalidUsername("Username not found")
    if password != "1234":
        raise InvalidPassword("Wrong password")
    print("Login successful")


try:
    login("user", "2222")
except InvalidUsername as e:
    print(e)
except InvalidPassword as e:
    print(e)


# ------------------------------------------------------------
# WHY USE CUSTOM EXCEPTIONS?
# ------------------------------------------------------------
# - clearer error meaning
# - better control of program logic
# - used in APIs and large systems
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Not inheriting from Exception

# ❌ Overusing custom exceptions unnecessarily

# ❌ Not handling raised exceptions


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

try:
    raise MyError("Debugging custom error")
except MyError as e:
    print("DEBUG:", e)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# class TooSmallError(Exception):
#     pass
#
# def check_value(x):
#     if x < 10:
#         raise TooSmallError("Value too small")
#
# try:
#     check_value(5)
# except TooSmallError as e:
#     print(e)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand custom exceptions 🎯🔥
# This is used in real-world systems and APIs
# ------------------------------------------------------------