# ============================================================
# FILE: CH10 - Error Handling / 02 - Multiple Exceptions.py
# ============================================================

# ------------------------------------------------------------
# WHY MULTIPLE EXCEPTIONS?
# ------------------------------------------------------------
# Different errors need different handling
#
# Example:
# - invalid input → ValueError
# - divide by zero → ZeroDivisionError
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC MULTIPLE EXCEPT
# ------------------------------------------------------------

try:
    a = int(input("Enter a: "))
    b = int(input("Enter b: "))
    result = a / b
    print("Result:", result)

except ValueError:
    print("Please enter valid numbers!")

except ZeroDivisionError:
    print("Cannot divide by zero!")


# ------------------------------------------------------------
# COMBINING EXCEPTIONS
# ------------------------------------------------------------
# Handle multiple errors the same way

try:
    num = int(input("Enter number: "))
    print(10 / num)

except (ValueError, ZeroDivisionError):
    print("Invalid input or division error!")


# ------------------------------------------------------------
# CAPTURING ERROR MESSAGE
# ------------------------------------------------------------

try:
    x = int("abc")
except ValueError as e:
    print("Error message:", e)


# ------------------------------------------------------------
# GENERIC EXCEPTION (CAREFUL)
# ------------------------------------------------------------
# Catch any error (not recommended as main approach)

try:
    x = int("abc")
except Exception as e:
    print("Something went wrong:", e)


# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------

while True:
    try:
        num = int(input("Enter number (0 to exit): "))
        
        if num == 0:
            break

        result = 100 / num
        print("Result:", result)

    except ValueError:
        print("Invalid number!")

    except ZeroDivisionError:
        print("Cannot divide by zero!")

    except Exception as e:
        print("Unexpected error:", e)


# ------------------------------------------------------------
# ORDER OF EXCEPT BLOCKS (IMPORTANT)
# ------------------------------------------------------------
# Specific exceptions must come BEFORE general ones

# ❌ WRONG:
# except Exception:
# except ValueError:

# ✅ CORRECT:
# except ValueError:
# except Exception:


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Putting Exception first

# ❌ Catching too many errors unnecessarily

# ❌ Ignoring useful error messages


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

try:
    x = int("abc")
except ValueError as e:
    print("DEBUG:", type(e), e)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# try:
#     a = int(input("Enter number: "))
#     print(50 / a)
# except ValueError:
#     print("Invalid input")
# except ZeroDivisionError:
#     print("Cannot divide by zero")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand multiple exceptions 🎯🔥
# This makes your programs more reliable
# ------------------------------------------------------------