# ============================================================
# FILE: CH07 - Functions / 03 - Return Values.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS RETURN?
# ------------------------------------------------------------
# return sends a value BACK from a function
#
# Without return → function only prints
# With return → function gives value to be used later
# ------------------------------------------------------------


# ------------------------------------------------------------
# FUNCTION WITHOUT RETURN
# ------------------------------------------------------------

def add(a, b):
    print(a + b)

result = add(5, 3)
print("Result:", result)   # None (no return)


# ------------------------------------------------------------
# FUNCTION WITH RETURN
# ------------------------------------------------------------

def add(a, b):
    return a + b

result = add(5, 3)
print("Result:", result)   # 8


# ------------------------------------------------------------
# WHY RETURN IS IMPORTANT
# ------------------------------------------------------------
# You can reuse the result

def multiply(a, b):
    return a * b

x = multiply(2, 3)
y = multiply(4, 5)

print(x + y)   # 6 + 20 = 26


# ------------------------------------------------------------
# RETURN MULTIPLE VALUES
# ------------------------------------------------------------

def get_user():
    name = "Galen"
    age = 21
    return name, age   # returns tuple

user_name, user_age = get_user()

print(user_name)
print(user_age)


# ------------------------------------------------------------
# RETURN WITH CONDITION
# ------------------------------------------------------------

def check_even(num):
    if num % 2 == 0:
        return True
    else:
        return False

print(check_even(4))   # True


# ------------------------------------------------------------
# EARLY RETURN
# ------------------------------------------------------------
# Function stops immediately when return is reached

def test():
    print("Start")
    return
    print("This will NOT run")

test()


# ------------------------------------------------------------
# RETURN VS PRINT (IMPORTANT)
# ------------------------------------------------------------

# ❌ print only shows result
# return gives result to be used later

def square(num):
    return num * num

result = square(4)
print("Square:", result)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget return
# function returns None

# ❌ Writing code after return (won't execute)

# ❌ Confusing print vs return


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

def debug_add(a, b):
    print("DEBUG:", a, b)
    return a + b

print(debug_add(2, 3))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# def calculate(a, b):
#     return a + b, a - b, a * b
#
# result = calculate(10, 5)
# print(result)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand return values 🎯🔥
# This is the key to building real applications
# ------------------------------------------------------------