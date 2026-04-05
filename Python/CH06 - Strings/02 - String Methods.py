# ============================================================
# FILE: CH06 - Strings / 02 - String Methods.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE STRING METHODS?
# ------------------------------------------------------------
# String methods are built-in functions used to
# manipulate and process text
#
# Format:
# string.method()
# ------------------------------------------------------------


# ------------------------------------------------------------
# LOWER AND UPPER CASE
# ------------------------------------------------------------

text = "Hello World"

print(text.lower())   # hello world
print(text.upper())   # HELLO WORLD


# ------------------------------------------------------------
# STRIP (REMOVE SPACES)
# ------------------------------------------------------------

text = "   Hello   "

print(text.strip())    # remove both sides
print(text.lstrip())   # remove left spaces
print(text.rstrip())   # remove right spaces


# ------------------------------------------------------------
# REPLACE TEXT
# ------------------------------------------------------------

text = "I like Java"

new_text = text.replace("Java", "Python")
print(new_text)


# ------------------------------------------------------------
# SPLIT STRING
# ------------------------------------------------------------
# Convert string → list

text = "apple,banana,orange"

fruits = text.split(",")
print(fruits)


# ------------------------------------------------------------
# JOIN LIST → STRING
# ------------------------------------------------------------

words = ["Hello", "World"]

result = " ".join(words)
print(result)


# ------------------------------------------------------------
# FIND TEXT
# ------------------------------------------------------------

text = "Hello Python"

print(text.find("Python"))   # index position
print(text.find("Java"))     # -1 (not found)


# ------------------------------------------------------------
# COUNT TEXT
# ------------------------------------------------------------

text = "banana"

print(text.count("a"))   # 3


# ------------------------------------------------------------
# CHECK STRING CONTENT
# ------------------------------------------------------------

text = "12345"

print(text.isdigit())   # True (all numbers)

text = "Hello"
print(text.isalpha())   # True (letters only)

text = "Hello123"
print(text.isalnum())   # True (letters + numbers)


# ------------------------------------------------------------
# STARTS WITH / ENDS WITH
# ------------------------------------------------------------

text = "hello@gmail.com"

print(text.startswith("hello"))   # True
print(text.endswith(".com"))      # True


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget that strings are immutable
# text.replace(...) does NOT change original unless assigned

# ❌ Case-sensitive matching
# "hello" != "Hello"


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = "  Python  "
print("Original:", test)
print("Stripped:", test.strip())


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# email = input("Enter email: ").strip()
#
# if email.endswith("@gmail.com"):
#     print("Valid Gmail")
# else:
#     print("Invalid email")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now know how to manipulate strings 🎯
# This is essential for real-world applications 🔥
# ------------------------------------------------------------