# ============================================================
# FILE: CH01 - Getting Started / 02 - Comments and Print.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE COMMENTS?
# ------------------------------------------------------------
# Comments are lines that Python IGNORES.
# They are used to explain code for humans.
#
# Python will NOT execute comments.
# ------------------------------------------------------------


# ------------------------------------------------------------
# SINGLE LINE COMMENT
# ------------------------------------------------------------
# This is a single-line comment

print("This line will run")   # This is also a comment (inline comment)


# ------------------------------------------------------------
# MULTI-LINE COMMENT (IMPORTANT)
# ------------------------------------------------------------
# Python does NOT have true multi-line comments like some languages.
# But we simulate it using multiple # symbols.

# This is line 1 of comment
# This is line 2 of comment
# This is line 3 of comment


# ------------------------------------------------------------
# DOCSTRING STYLE (ADVANCED COMMENT)
# ------------------------------------------------------------
# Triple quotes can be used like documentation
# Usually used in functions (you will learn later)

"""
This is a docstring
It can span multiple lines
Python can read this as documentation
"""


# ------------------------------------------------------------
# PRINT FUNCTION (DEEPER USAGE)
# ------------------------------------------------------------
# print() can display text, numbers, and more

print("Hello")          # printing text
print(123)              # printing number
print("Age:", 20)       # printing multiple values


# ------------------------------------------------------------
# PRINT MULTIPLE VALUES
# ------------------------------------------------------------
# Python automatically adds space between values

print("Name:", "Galen", "Age:", 21)


# ------------------------------------------------------------
# USING SEPARATOR (sep)
# ------------------------------------------------------------
# sep controls what separates values

print("2026", "04", "05", sep="-")   # Output: 2026-04-05


# ------------------------------------------------------------
# USING END (end)
# ------------------------------------------------------------
# By default, print() ends with a newline
# end="" lets you change that behavior

print("Hello", end=" ")
print("World")   # Output: Hello World


# ------------------------------------------------------------
# ESCAPE CHARACTERS
# ------------------------------------------------------------
# Special characters inside strings

print("Line1\nLine2")   # \n = new line
print("Tab\tSpace")     # \t = tab
print("He said \"Hello\"")  # \" = quote inside string


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forgetting quotes
# print(Hello)

# ❌ Mixing quotes incorrectly
# print("Hello')

# ❌ Wrong indentation (Python is sensitive later)
#  print("Hello")   <-- avoid random spaces


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------
# Use print() to check values while coding
# Example:

print("DEBUG: Program reached here")


# ------------------------------------------------------------
# MINI PRACTICE (TRY YOURSELF)
# ------------------------------------------------------------
# Uncomment and modify below:

# print("My name is ______")
# print("I am ___ years old")
# print("Today is", "Monday", sep="-")
# print("Hello", end=" ")
# print("Python")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand comments + print deeply 🎯
# ------------------------------------------------------------