# ============================================================
# FILE: CH02 - Operators and Expressions / 03 - Logical Operators.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE LOGICAL OPERATORS?
# ------------------------------------------------------------
# Logical operators are used to combine multiple conditions
#
# They return:
#   True or False
#
# Operators:
# - and
# - or
# - not
# ------------------------------------------------------------


# ------------------------------------------------------------
# 1. AND OPERATOR
# ------------------------------------------------------------
# True ONLY if BOTH conditions are True

age = 20
has_id = True

print("Can enter?", age >= 18 and has_id)   # True


# ------------------------------------------------------------
# 2. OR OPERATOR
# ------------------------------------------------------------
# True if AT LEAST ONE condition is True

is_student = False
has_discount_card = True

print("Get discount?", is_student or has_discount_card)   # True


# ------------------------------------------------------------
# 3. NOT OPERATOR
# ------------------------------------------------------------
# Reverses the result

is_logged_in = False

print("Not logged in?", not is_logged_in)   # True


# ------------------------------------------------------------
# COMBINING MULTIPLE CONDITIONS
# ------------------------------------------------------------

age = 25
has_ticket = True
is_vip = False

# Condition:
# Must be 18+ AND (has ticket OR VIP)

can_enter = age >= 18 and (has_ticket or is_vip)

print("Can enter event?", can_enter)


# ------------------------------------------------------------
# USING INPUT WITH LOGICAL OPERATORS
# ------------------------------------------------------------

age = int(input("Enter your age: "))
has_id_input = input("Do you have ID? (yes/no): ")

has_id = has_id_input.lower() == "yes"

print("Access granted?", age >= 18 and has_id)


# ------------------------------------------------------------
# TRUTH TABLE (IMPORTANT UNDERSTANDING)
# ------------------------------------------------------------
# AND:
# True  and True  → True
# True  and False → False
# False and True  → False
# False and False → False
#
# OR:
# True  or True  → True
# True  or False → True
# False or True  → True
# False or False → False
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using wrong operator
# if age >= 18 & has_id   <-- WRONG (& is bitwise)

# ❌ Forget parentheses (can cause confusion)
# age >= 18 and has_ticket or is_vip

# Better:
# age >= 18 and (has_ticket or is_vip)


# ------------------------------------------------------------
# SHORT-CIRCUIT BEHAVIOR (IMPORTANT)
# ------------------------------------------------------------
# Python may stop evaluating early

# Example:
print(False and print("This won't run"))

# Because first is False → no need to check second


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

age = 17
has_id = True

print("DEBUG age >= 18:", age >= 18)
print("DEBUG has_id:", has_id)

print("Final result:", age >= 18 and has_id)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try building access system:

# age = int(input("Enter age: "))
# has_id = input("Have ID? (yes/no): ").lower() == "yes"
# is_member = input("Member? (yes/no): ").lower() == "yes"
#
# print("Access granted?", age >= 18 and (has_id or is_member))


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You can now combine multiple conditions like real systems 🎯
# Next: IF statements (decision making) 🔥
# ------------------------------------------------------------