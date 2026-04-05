# ============================================================
# FILE: CH10 - Error Handling / 01 - Try Except.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS ERROR HANDLING?
# ------------------------------------------------------------
# Error handling allows your program to:
# - handle errors without crashing
# - show user-friendly messages
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC TRY-EXCEPT
# ------------------------------------------------------------
# Syntax:
#
# try:
#     risky code
# except:
#     handle error
# ------------------------------------------------------------

try:
    num = int(input("Enter a number: "))
    print("Number:", num)
except:
    print("Invalid input!")


# ------------------------------------------------------------
# WHY USE TRY-EXCEPT?
# ------------------------------------------------------------
# Without it → program crashes
# With it → program continues safely
# ------------------------------------------------------------


# ------------------------------------------------------------
# SPECIFIC EXCEPTION (BEST PRACTICE)
# ------------------------------------------------------------

try:
    num = int(input("Enter number: "))
except ValueError:
    print("Please enter a valid number!")


# ------------------------------------------------------------
# MULTIPLE EXCEPT
# ------------------------------------------------------------

try:
    a = int(input("Enter a: "))
    b = int(input("Enter b: "))
    print(a / b)
except ValueError:
    print("Invalid number!")
except ZeroDivisionError:
    print("Cannot divide by zero!")


# ------------------------------------------------------------
# USING ELSE
# ------------------------------------------------------------
# Runs if NO error occurs

try:
    num = int(input("Enter number: "))
except ValueError:
    print("Error")
else:
    print("Valid input:", num)


# ------------------------------------------------------------
# USING FINALLY
# ------------------------------------------------------------
# Runs ALWAYS (error or not)

try:
    print("Trying...")
except:
    print("Error")
finally:
    print("Always runs")


# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------

while True:
    try:
        num = int(input("Enter number (0 to exit): "))
        if num == 0:
            break
        print("Square:", num * num)
    except ValueError:
        print("Invalid input, try again")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using bare except (too broad)

# ❌ Ignoring error type

# ❌ Overusing try-except


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

try:
    x = int("abc")
except Exception as e:
    print("DEBUG error:", e)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# try:
#     x = int(input("Enter number: "))
#     print(10 / x)
# except ValueError:
#     print("Invalid input")
# except ZeroDivisionError:
#     print("Cannot divide by zero")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand try-except 🎯🔥
# Your programs will no longer crash easily
# ------------------------------------------------------------