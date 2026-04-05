# ============================================================
# FILE: CH03 - Control Flow / 04 - Nested If.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS NESTED IF?
# ------------------------------------------------------------
# Nested if = an if statement inside another if
#
# Used when a second condition depends on the first
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

age = 20
has_id = True

if age >= 18:
    if has_id:
        print("Access granted")
    else:
        print("ID required")
else:
    print("Underage")


# ------------------------------------------------------------
# HOW IT WORKS
# ------------------------------------------------------------
# Step 1: Check outer condition
# Step 2: If TRUE → go inside and check inner condition
# Step 3: If FALSE → skip inner block
# ------------------------------------------------------------


# ------------------------------------------------------------
# USING USER INPUT
# ------------------------------------------------------------

age = int(input("Enter your age: "))
has_id = input("Do you have ID? (yes/no): ").lower() == "yes"

if age >= 18:
    if has_id:
        print("Welcome!")
    else:
        print("You need ID")
else:
    print("You are too young")


# ------------------------------------------------------------
# MULTIPLE LEVEL NESTING
# ------------------------------------------------------------

username = input("Enter username: ")
password = input("Enter password: ")

if username == "admin":
    if password == "1234":
        print("Login successful")
    else:
        print("Wrong password")
else:
    print("User not found")


# ------------------------------------------------------------
# NESTED IF VS LOGICAL OPERATORS
# ------------------------------------------------------------
# These two are equivalent:

# Nested if
age = 20
has_ticket = True

if age >= 18:
    if has_ticket:
        print("Allowed")

# Logical operator (cleaner)
if age >= 18 and has_ticket:
    print("Allowed (short version)")


# ------------------------------------------------------------
# WHEN TO USE NESTED IF?
# ------------------------------------------------------------
# Use nested if when:
# - Conditions are dependent
# - You want more detailed control
#
# Use logical operators when:
# - Conditions are simple
# - You want cleaner code
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Too many nested levels → messy code

# ❌ Wrong indentation
# if age >= 18:
# if has_id:   <-- ERROR

# ❌ Forget else blocks


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

age = 17
has_id = True

print("DEBUG age:", age)
print("DEBUG has_id:", has_id)

if age >= 18:
    print("Passed age check")
    if has_id:
        print("Passed ID check")
    else:
        print("Failed ID check")
else:
    print("Failed age check")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try building login system:

# username = input("Username: ")
# password = input("Password: ")
#
# if username == "admin":
#     if password == "pass123":
#         print("Login success")
#     else:
#         print("Wrong password")
# else:
#     print("User not found")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand nested decision making 🎯
# This is how real systems check multiple layers 🔥
# ------------------------------------------------------------