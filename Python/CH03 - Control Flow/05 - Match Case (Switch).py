# ============================================================
# FILE: CH03 - Control Flow / 05 - Match Case (Switch).py
# ============================================================

# ------------------------------------------------------------
# WHAT IS MATCH-CASE?
# ------------------------------------------------------------
# match-case is similar to "switch" in other languages
#
# It is used when comparing ONE variable
# against multiple possible values
#
# Only available in Python 3.10+
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

day = "Monday"

match day:
    case "Monday":
        print("Start of the week")
    case "Tuesday":
        print("Second day")
    case "Wednesday":
        print("Midweek")
    case _:
        print("Other day")


# ------------------------------------------------------------
# HOW IT WORKS
# ------------------------------------------------------------
# Python checks each case from top → bottom
# If matched → runs that block
# "_" means default (like else)
# ------------------------------------------------------------


# ------------------------------------------------------------
# USING USER INPUT
# ------------------------------------------------------------

command = input("Enter command (start/stop/restart): ").lower()

match command:
    case "start":
        print("System starting...")
    case "stop":
        print("System stopping...")
    case "restart":
        print("System restarting...")
    case _:
        print("Unknown command")


# ------------------------------------------------------------
# MATCHING NUMBERS
# ------------------------------------------------------------

num = int(input("Enter a number (1-3): "))

match num:
    case 1:
        print("You chose ONE")
    case 2:
        print("You chose TWO")
    case 3:
        print("You chose THREE")
    case _:
        print("Invalid number")


# ------------------------------------------------------------
# MULTIPLE VALUES IN ONE CASE
# ------------------------------------------------------------

grade = input("Enter grade (A/B/C): ").upper()

match grade:
    case "A" | "B":
        print("Good job")
    case "C":
        print("Pass")
    case _:
        print("Fail")


# ------------------------------------------------------------
# WHEN TO USE MATCH-CASE?
# ------------------------------------------------------------
# Use match-case when:
# - comparing ONE variable
# - many fixed values (menu, commands)
#
# Use if-elif when:
# - conditions involve ranges (>, <, etc)
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMPARISON: IF vs MATCH
# ------------------------------------------------------------

day = "Monday"

# Using if-elif
if day == "Monday":
    print("Using if")
elif day == "Tuesday":
    print("Using if")
else:
    print("Other")

# Using match-case
match day:
    case "Monday":
        print("Using match")
    case "Tuesday":
        print("Using match")
    case _:
        print("Other")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using match for range conditions
# case x > 10   <-- WRONG

# ❌ Forget case _
# (no default handling)

# ❌ Wrong Python version (<3.10)


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = "start"

print("DEBUG:", test)

match test:
    case "start":
        print("Matched start")
    case _:
        print("No match")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try building menu:

# choice = input("Enter choice (1/2/3): ")
#
# match choice:
#     case "1":
#         print("Option 1 selected")
#     case "2":
#         print("Option 2 selected")
#     case "3":
#         print("Option 3 selected")
#     case _:
#         print("Invalid choice")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now know match-case (switch) 🎯
# Cleaner alternative for multiple fixed conditions 🔥
# ------------------------------------------------------------