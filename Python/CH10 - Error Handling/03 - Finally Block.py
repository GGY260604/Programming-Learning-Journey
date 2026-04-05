# ============================================================
# FILE: CH10 - Error Handling / 03 - Finally Block.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS FINALLY?
# ------------------------------------------------------------
# finally block ALWAYS runs:
# - whether error occurs or not
#
# Used for:
# - closing files
# - releasing resources
# - cleanup operations
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

try:
    print("Trying...")
    x = int("10")   # no error

except ValueError:
    print("Error occurred")

finally:
    print("Finally always runs")


# ------------------------------------------------------------
# WITH ERROR
# ------------------------------------------------------------

try:
    print("Trying...")
    x = int("abc")   # error

except ValueError:
    print("ValueError occurred")

finally:
    print("Cleanup done")


# ------------------------------------------------------------
# FINALLY WITH FILE HANDLING
# ------------------------------------------------------------

file = None

try:
    file = open("sample.txt", "r")
    print(file.read())

except FileNotFoundError:
    print("File not found")

finally:
    if file:
        file.close()
        print("File closed")


# ------------------------------------------------------------
# FINALLY + RETURN (IMPORTANT)
# ------------------------------------------------------------

def test():
    try:
        return "From try"
    finally:
        print("Finally executed")

print(test())


# ------------------------------------------------------------
# REAL EXAMPLE (SIMULATION)
# ------------------------------------------------------------

try:
    print("Connecting to system...")
    # simulate error
    x = 10 / 0

except ZeroDivisionError:
    print("Error occurred during operation")

finally:
    print("Closing connection...")


# ------------------------------------------------------------
# FINALLY VS ELSE
# ------------------------------------------------------------

try:
    x = int("10")
except ValueError:
    print("Error")
else:
    print("No error occurred")
finally:
    print("Always executed")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget that finally always runs

# ❌ Using finally incorrectly for logic

# ❌ Not checking if resource exists before closing


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

try:
    print("DEBUG start")
except:
    print("Error")
finally:
    print("DEBUG cleanup done")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# try:
#     num = int(input("Enter number: "))
#     print(100 / num)
# except:
#     print("Error occurred")
# finally:
#     print("Program finished")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand finally block 🎯🔥
# This is critical for safe and clean programs
# ------------------------------------------------------------